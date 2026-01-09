<?php

namespace App\Http\Controllers\LearnerEnrollment;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

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
use Carbon\Carbon;


class LearnerEnrollmentCreationController extends Controller
{

        public function learnerNewEnrollment()
    {
                

        $Branches = Branch :: where ('id', session('activeBranch_id'))->first();

   //dd($Branches);

   






    //dd($learners);

    // Get active programs for this branch executive's institute
$programs = Program::where('is_active', 1)
    ->where('institute_id', $Branches->institute_id)
    ->get();
        
        $appliedFees = Fee::where('institute_id', $Branches->institute_id)
            ->whereIn('type', ['extra', 'common'])
            ->get();

        $extraCommonTotal = $appliedFees->sum('amount');
        
        return view('Access.Core.Branch_Executive.new_learner_enrollment', compact('programs','extraCommonTotal'));

    }


    public function learnerDataSearch(Request $request)
{

    try{
    $branchId = session('activeBranch_id');

        $learnerCode  = trim($request->learner_code);
        $learnerEmail = trim($request->learner_email);

        // ✅ ERROR UPDATE (Top-visible, standard Laravel way)
        if (empty($learnerCode) && empty($learnerEmail)) {
                return back()->with('error', 'Please Enter the Learner Code or Email..!!');

        }

        $query = Learners::where('branch_id', $branchId);

        if (!empty($learnerCode)) {
            $query->where('learner_code', $learnerCode);
        }

        if (!empty($learnerEmail)) {
            $query->where('raw_email', $learnerEmail);
        }

        $learners = $query->orderBy('created_at', 'desc')->get();

        // ✅ ERROR UPDATE
        if ($learners->isEmpty()) {
            return back()
                ->withErrors(['search' => 'Learner not found..!!'])
                ->withInput();
        }

        $Branches = Branch::where('id', session('activeBranch_id'))->first();

        $programs = Program::where('is_active', 1)
            ->where('institute_id', $Branches->institute_id)
            ->get();

        $appliedFees = Fee::where('institute_id', $Branches->institute_id)
            ->whereIn('type', ['extra', 'common'])
            ->get();

        $extraCommonTotal = $appliedFees->sum('amount');

        return view(
            'Access.Core.Branch_Executive.new_learner_enrollment',
            compact('learners', 'programs','extraCommonTotal')
        );

    }
    catch (\Exception $e) {
    

        // Log for developer (important)
        Log::error('Learner Enrollment Search Failed', [
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ]);

        // User-friendly message
        return back()->with('error', 'Something went wrong. Please try again.');
    }
    }


    public function programAjax(Request $r)
{
    $price = ProgramPrice::where('program_id',$r->program_id)->first();
    $courses = Course::where('program_id',$r->program_id)->get();
    $discount = DiscountOffer::where('program_id',$r->program_id)
                ->where('is_active',1)->first();

    return response()->json([
        'program_name' => Program::find($r->program_id)->program_name,
        'price' => $price->base_price ?? 0,
        'courses' => $courses,
        'discount_name' => $discount->name ?? null,
        'discount_value' => $discount->value ?? 0,
        'discount_type'=> $discount->type ?? null, // 🔥 REQUIRED
    ]);
}




public function storeEnrollment(Request $request)
{
    try {
        DB::beginTransaction();

        /* -----------------------------
         | BASIC VALIDATION
         -----------------------------*/
        if (!$request->learner_id || !$request->program_id) {
            throw new \Exception('Learner ID or Program ID missing');
        }

        $courseIds = $request->courses ?? []; // ✅ FIX
        if (!is_array($courseIds)) {
            throw new \Exception('Courses must be an array');
        }

        $branchId = session('activeBranch_id');
        if (!$branchId) {
            throw new \Exception('Active branch missing in session');
        }

        $branch = Branch::findOrFail($branchId);

        /* -----------------------------
         | 1. CREATE ENROLLMENT
         -----------------------------*/
        $enrollmentId = (string) Str::uuid();

        DB::table('enrollments')->insert([
            'id'              => $enrollmentId,
            'learner_id'      => $request->learner_id,
            'program_id'      => $request->program_id,
            'branch_id'       => $branchId,
            'enrollment_date' => now()->toDateString(),
            'status'          => 'active',
            'created_at'      => now(),
            'updated_at'      => now(),
        ]);

        /* -----------------------------
         | 2. ENROLLED COURSES
         -----------------------------*/
        if (!empty($courseIds)) {
            foreach ($courseIds as $courseId) {
                DB::table('enrolled_courses')->insert([
                    'id'            => (string) Str::uuid(),
                    'enrollment_id' => $enrollmentId,
                    'course_id'     => $courseId,
                    'status'        => 'in_progress',
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ]);
            }
        }

        /* -----------------------------
         | 3. FEE CALCULATION
         -----------------------------*/
        $programBaseFee = ProgramPrice::where('program_id', $request->program_id)
            ->where('is_active', 1)
            ->value('base_price');

        if ($programBaseFee === null) {
            throw new \Exception('Program base fee not found');
        }

        // ✅ COURSE FEE SUM (FIXED)
        $courseTotalFee = 0;
        if (!empty($courseIds)) {
            $courseTotalFee = Course::whereIn('id', $courseIds)->sum('price');
        }

        $programCourseTotal = $programBaseFee + $courseTotalFee;

        /* -----------------------------
         | 4. DISCOUNT
         -----------------------------*/
        $discount = DiscountOffer::where('program_id', $request->program_id)
            ->where('is_active', 1)
            ->first();

        $discountAmount = 0;

        if ($discount) {
            $discountAmount = $discount->type === 'percentage'
                ? ($programCourseTotal * $discount->value) / 100
                : $discount->value;
        }

        /* -----------------------------
         | 5. EXTRA + COMMON FEES
         -----------------------------*/
        $appliedFees = Fee::where('institute_id', $branch->institute_id)
            ->whereIn('type', ['extra', 'common'])
            ->get();

        $extraCommonTotal = $appliedFees->sum('amount');

        $finalTotal = ($programCourseTotal - $discountAmount) + $extraCommonTotal;

        if ($finalTotal < 0) {
            throw new \Exception('Final fee became negative');
        }

        /* -----------------------------
         | 6. ENROLLMENT FEES SNAPSHOT
         -----------------------------*/
        DB::table('enrollment_fees')->insert([
            'id'                => (string) Str::uuid(),
            'enrollment_id'     => $enrollmentId,
            'total_fee_charged' => $finalTotal,
            'paid_amount'       => 0,
            'discount_applied'  => $discountAmount,
            'fee_status'        => 'pending',
            'created_at'        => now(),
            'updated_at'        => now(),
        ]);

        /* -----------------------------
         | 7. DISCOUNT SNAPSHOT
         -----------------------------*/
        if ($discount && $discountAmount > 0) {
            DB::table('enrollment_discounts')->insert([
                'enrollment_id'   => $enrollmentId,
                'discount_id'     => $discount->id,
                'discount_amount' => $discountAmount,
                'applied_date'    => now()->toDateString(),
                'created_at'      => now(),
                'updated_at'      => now(),
            ]);
        }

        /* -----------------------------
         | 8. APPLIED FEES SNAPSHOT
         -----------------------------*/
        foreach ($appliedFees as $fee) {
            DB::table('enrollment_applied_fees')->insert([
                'id'            => (string) Str::uuid(),
                'enrollment_id' => $enrollmentId,
                'fee_type'      => $fee->type,
                'fee_name'      => $fee->fee_name,
                'fee_amount'    => $fee->amount,
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);
        }

        DB::commit();

        return response()->json([
            'success' => true,
            'enrollment_id' => $enrollmentId
        ]);

    } catch (\Throwable $e) {

        DB::rollBack();

        // ✅ CLOUD RUN SAFE LOG
        Log::error('Enrollment failed', [
            'message' => $e->getMessage(),
            'file'    => $e->getFile(),
            'line'    => $e->getLine(),
        ]);

        return response()->json([
            'success' => false,
            'message' => 'Enrollment failed'
        ], 500);
    }
}





}