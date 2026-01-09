<?php

namespace App\Http\Controllers\Fees;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;


use App\Models\User;
use App\Models\UserProfile;
use App\Models\Learners;
use App\Models\Program;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\EnrolledCourse;
use App\Models\EnrollmentFee;
use App\Models\Payment;
use App\Models\ProgramPrice;
use App\Models\DiscountOffer;
use App\Models\EnrollmentDiscount;
use App\Models\Fee;
use App\Models\Branch;
use App\Models\UserBranchRole;


class FeesSetupController extends Controller
{
    /**
     * Display the Fee Setup Page for Employers
     */
    public function employerSetupFees()
    {
        $user = Auth::user();
        $employerProfile = $user?->employerProfile;
        $institute = $employerProfile?->institute;

        if (!$institute) {
            return back()->with('error', 'Institute profile not found.');
        }

        $fees = DB::table('fees')
                  ->where('institute_id', $institute->id)
                  ->orderBy('created_at', 'desc')
                  ->get();

        return view('Access.Core.Employer.fees_setup', compact('fees'));
    }

    /**
     * Store a new fee
     */
    public function storeFee(Request $request)
    {
        $user = Auth::user();
        $institute = $user?->employerProfile?->institute;

        if (!$institute) {
            return back()->with('error', 'Unauthorized: No Institute associated with this account.');
        }

        $request->validate([
            'fee_name' => 'required|string|max:255',
            'amount'   => 'required|numeric|min:0',
            'type'     => 'required|in:common,extra'
        ]);

        DB::table('fees')->insert([
            'id'           => (string) Str::uuid(),
            'institute_id' => $institute->id, // Corrected to use profile relation
            'fee_name'     => $request->fee_name,
            'amount'       => $request->amount,
            'type'         => $request->type,
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ]);

        return back()->with('success', 'New fee item added successfully.');
    }

    /**
     * Deactivate a fee by setting amount to 0
     */
    public function deactivateFee($id)
    {
        $user = Auth::user();
        $institute = $user?->employerProfile?->institute;

        DB::table('fees')
            ->where('id', $id)
            ->where('institute_id', $institute->id) // Security check
            ->update([
                'amount'     => 0,
                'updated_at' => Carbon::now()
            ]);

        return back()->with('success', 'Fee has been deactivated.');
    }


    /**
 * Reactivate a fee by setting a new amount
 */
public function reactivateFee(Request $request)
{
    $user = Auth::user();
    $institute = $user?->employerProfile?->institute;

    $request->validate([
        'fee_id' => 'required',
        'amount' => 'required|numeric|min:0.01', // Must be greater than 0
    ]);

    DB::table('fees')
        ->where('id', $request->fee_id)
        ->where('institute_id', $institute->id)
        ->update([
            'amount'     => $request->amount,
            'updated_at' => Carbon::now()
        ]);

    return back()->with('success', 'Fee has been reactivated with the new price.');
}



        public function feesPaymentsPage()
{
    $user = Auth::user();
    
    // 1. Try to get branch_id from session
    $branch_id = session('activeBranch_id');

    // 2. Fetch the branch record
    $branch = DB::table('branches')->where('id', $branch_id)->first();

    // 3. Fallback: If session branch is missing, try getting it from user profile
    if (!$branch) {
        $employerProfile = $user?->employerProfile; // Or however staff profile is linked
        $institute = $employerProfile?->institute;
        $institute_id = $institute?->id;
    } else {
        $institute_id = $branch->institute_id;
    }

    // 4. Final check before query to prevent "Attempt to read property on null"
    if (!$institute_id) {
        return redirect()->back()->with('error', 'Session expired or Branch not assigned. Please re-login.');
    }

    $programs = DB::table('programs')
        ->where('is_active', 1)
        ->where('institute_id', $institute_id)
        ->get();

    return view('Access.Core.Branch_Executive.fees_payments', compact('programs'));
}



        public function fetchEnrollmentForPayment(Request $request)
    {
        // 1. Get IDs from Request and Session
        $branch_id = session('activeBranch_id'); // Staff's current branch
        $query = $request->input('query'); // Learner code or email
        $program_id = $request->input('program_id');

        // 2. Find Learner first
        $learner = DB::table('learners')
            ->where('learner_code', $query)
            ->orWhere('email', $query)
            ->first();

        if (!$learner) return response()->json(['error' => 'Learner not found.'], 404);

        // 3. Find unique Enrollment (The Triple Check)
        $enrollment = DB::table('enrollments')
            ->where('learner_id', $learner->id)
            ->where('program_id', $program_id)
            ->where('branch_id', $branch_id)
            ->first();

        if (!$enrollment) return response()->json(['error' => 'No active enrollment found for this program in your branch.'], 404);

        // 4. Gather Financial Data
        $programPrice = DB::table('program_prices')->where('program_id', $program_id)->value('amount') ?? 0;
        
        $courseFees = DB::table('enrolled_courses')
            ->join('courses', 'enrolled_courses.course_id', '=', 'courses.id')
            ->where('enrolled_courses.enrollment_id', $enrollment->id)
            ->sum('courses.course_fee');

        $discount = DB::table('enrollment_discounts')
            ->where('enrollment_id', $enrollment->id)
            ->sum('discount_amount');

        // 5. Fetch Global Fee Config
        $fees = DB::table('fees')->where('institute_id', Auth::user()->institute_id)->get();

        return response()->json([
            'enrollment_id' => $enrollment->id,
            'program_fee'   => (float)$programPrice,
            'course_fee'    => (float)$courseFees,
            'discount'      => (float)$discount,
            'common_fees'   => $fees->where('type', 'common')->where('amount', '>', 0)->values(),
            'extra_fees'    => $fees->where('type', 'extra')->where('amount', '>', 0)->values(),
        ]);
    }

    /**
     * Final Store: Handle Enrollment Fees and Payment Transaction
     */
    public function storePayment(Request $request)
    {
        return DB::transaction(function () use ($request) {
            $enrollment_id = $request->enrollment_id;
            
            // 1. Create or Update Enrollment Fee Record
            // We use updateOrInsert or find if it exists to maintain the total balance
            $feeRecordId = (string) Str::uuid();
            
            DB::table('enrollment_fees')->updateOrInsert(
                ['enrollment_id' => $enrollment_id],
                [
                    'id'                => $feeRecordId, // Only used if inserting
                    'total_fee_charged' => $request->total_charged,
                    'discount_applied'  => $request->discount_applied,
                    'flexi_amount'      => $request->flexi_amount,
                    'flexi_remark'      => $request->flexi_remark,
                    'fee_status'        => 'paid', // Or logic to check if full/partial
                    'updated_at'        => Carbon::now()
                ]
            );

            // Fetch the ID if it was an update
            $finalFeeId = DB::table('enrollment_fees')->where('enrollment_id', $enrollment_id)->value('id');

            // 2. Insert Payment Transaction
            DB::table('payments')->insert([
                'id'             => (string) Str::uuid(),
                'amount'         => $request->paid_amount,
                'payment_method' => $request->payment_method,
                'transaction_id' => $request->transaction_id ?? 'CASH-'.time(),
                'status'         => 'completed',
                'paid_at'        => Carbon::now(),
                'payable_id'     => $finalFeeId, // Links to enrollment_fees
                'payable_type'   => 'App\Models\EnrollmentFee',
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
            ]);

            return response()->json(['success' => 'Payment processed successfully!']);
        });
    }
}