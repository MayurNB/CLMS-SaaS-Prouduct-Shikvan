<?php

namespace App\Http\Controllers\Payments;


use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

/* MODELS */
use App\Models\Program;
use App\Models\Enrollment;
use App\Models\EnrollmentFee;
use App\Models\Payment;
use App\Models\Fee;
use App\Models\ProgramPrice;
use App\Models\EnrolledCourse;
use App\Models\DiscountOffer;
use App\Models\Learners;

class FeesPaymentsController extends Controller
{
    /* ==========================================================
       PAGE
    ========================================================== */
    public function feesPaymentsPage()
    {
        $programs = Program::where('is_active', 1)
            ->orderBy('program_name')
            ->get();

        return view('Access.Core.Branch_Executive.fees_payments', compact('programs'));
    }

    public function learnerSearch(Request $request)
{
    $query = Learners::query();

    if ($request->filled('code')) {
        $query->where('learner_code', $request->code);
    }

    if ($request->filled('email')) {
        $query->orWhere('raw_email', $request->email);
    }

    $learner = $query->firstOrFail();

    $enrollments = Enrollment::with(['program'])
        ->where('learner_id', $learner->id)
        ->where('status', 'active')
        ->get();

    return view('Access.Core.Branch_Executive.fees_payments', compact(
        'learner',
        'enrollments'
    ));
}

public function loadEnrollment($enrollmentId)
{
    $enrollment = Enrollment::with(['learner','program'])
        ->findOrFail($enrollmentId);

    $enrollments = Enrollment::with('program')
        ->where('learner_id', $enrollment->learner_id)
        ->where('status', 'active')
        ->get();

    $fee = EnrollmentFee::where('enrollment_id', $enrollment->id)
        ->firstOrFail();

    $payments = Payment::where('payable_id', $fee->id)
        ->orderBy('created_at','desc')
        ->get();

    return view('Access.Core.Branch_Executive.fees_payments', compact(
        'enrollment',
        'enrollments',
        'fee',
        'payments'
    ));
}



    public function paymentStore(Request $request)
{

    $request->validate([
    'enrollment_fee_id' => 'required|exists:enrollment_fees,id',
    'amount' => 'required|numeric|min:1',
    'payment_method' => 'required',
    'trans_id' => 'required|unique:payments,transaction_id',
]);

    $fee = EnrollmentFee::findOrFail($request->enrollment_fee_id);

    $balance = ($fee->total_fee_charged - $fee->discount_applied) - $fee->paid_amount;

    if ($request->amount > $balance) {
        return back()->with('error','Payment exceeds remaining balance');
    }

    DB::transaction(function () use ($request, $fee) {

        Payment::create([
            'id' => Str::uuid(),
            'amount' => $request->amount,
            'payment_method' => $request->payment_method,
            'transaction_id' => $request->trans_id,
            'status' => 'completed',
            'paid_at' => now(),
            'payable_id' => $fee->id,
            'payable_type' => 'LF',
        ]);

        $fee->increment('paid_amount', $request->amount);

        $totalDue = $fee->total_fee_charged - $fee->discount_applied;

        $fee->update([
            'fee_status' => $fee->paid_amount >= $totalDue ? 'paid' : 'partial'
        ]);
    });

    return back()->with('success','Payment recorded successfully');
}

}
