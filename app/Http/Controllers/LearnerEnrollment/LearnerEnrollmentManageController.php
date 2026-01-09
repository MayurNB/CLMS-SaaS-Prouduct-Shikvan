<?php

namespace App\Http\Controllers\LearnerEnrollment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LearnerEnrollmentManageController extends Controller
{
    // Show all enrollments with search/filter
    public function enrollmentManage(Request $request)
    {
        $branchId = session('activeBranch_id');

        $enrollments = DB::table('enrollments')
            ->join('learners', 'learners.id', '=', 'enrollments.learner_id')
            ->join('programs', 'programs.id', '=', 'enrollments.program_id')
            ->leftJoin('enrollment_fees', 'enrollment_fees.enrollment_id', '=', 'enrollments.id')
            ->where('enrollments.branch_id', $branchId)
            
            // SEARCH FILTERS
            ->when($request->learner_code, fn($q) =>
                $q->where('learners.learner_code', 'like', "%{$request->learner_code}%")
            )
            ->when($request->program_name, fn($q) =>
                $q->where('programs.program_name', 'like', "%{$request->program_name}%")
            )
            ->when($request->fee_status, fn($q) =>
                $q->where('enrollment_fees.fee_status', $request->fee_status)
            )
            ->when($request->enrollment_date, fn($q) =>
                $q->whereDate('enrollments.enrollment_date', $request->enrollment_date)
            )

            ->select(
                'enrollments.id',
                'learners.learner_code',
                'learners.raw_learner_name',
                'programs.program_name',
                'enrollment_fees.total_fee_charged',
                'enrollment_fees.paid_amount',
                DB::raw('(enrollment_fees.total_fee_charged - enrollment_fees.paid_amount) AS balance_fee'),
                'enrollment_fees.fee_status'
            )
            ->orderByDesc('enrollments.created_at')
            ->get();

        return view('Access.Core.Branch_Executive.enrollment_manage', compact('enrollments'));
    }

    // Show single enrollment with all details
    public function enrollmentManageView($id)
{
    $branchId = session('activeBranch_id');

    // ✅ LOAD ENROLLMENTS LIST (REQUIRED)
    $enrollments = DB::table('enrollments')
        ->join('learners', 'learners.id', '=', 'enrollments.learner_id')
        ->join('programs', 'programs.id', '=', 'enrollments.program_id')
        ->leftJoin('enrollment_fees', 'enrollment_fees.enrollment_id', '=', 'enrollments.id')
        ->where('enrollments.branch_id', $branchId)
        ->select(
            'enrollments.id',
            'learners.learner_code',
            'learners.raw_learner_name',
            'programs.program_name',
            'enrollment_fees.total_fee_charged',
            'enrollment_fees.paid_amount',
            DB::raw('(enrollment_fees.total_fee_charged - enrollment_fees.paid_amount) AS balance_fee'),
            'enrollment_fees.fee_status'
        )
        ->orderByDesc('enrollments.created_at')
        ->get();

    // Selected enrollment
    $selectedEnrollment = DB::table('enrollments')
    ->join('learners', 'learners.id', '=', 'enrollments.learner_id')
    ->join('programs', 'programs.id', '=', 'enrollments.program_id')

    // 👇 ADD THIS JOIN
    ->leftJoin('program_prices', function ($join) {
        $join->on('program_prices.program_id', '=', 'programs.id')
             ->where('program_prices.is_active', 1);
    })

    ->where('enrollments.id', $id)
    ->where('enrollments.branch_id', $branchId)

    ->select(
        'enrollments.*',

        // learner
        'learners.learner_code',
        'learners.raw_learner_name',
        'learners.raw_phone',
        'learners.raw_email',

        // program
        'programs.program_name',
        'programs.description',
        'programs.duration_days',

        // program prices
        'program_prices.price_type',
        'program_prices.base_price',
        'program_prices.discount_offer_id'
    )
    ->first();


    abort_if(!$selectedEnrollment, 404);

    // Courses
    $courses = DB::table('enrolled_courses')
        ->join('courses', 'courses.id', '=', 'enrolled_courses.course_id')
        ->where('enrolled_courses.enrollment_id', $id)
        ->select('courses.course_name', 'courses.price', 'enrolled_courses.status')
        ->get();

    // Fees
    $fees = DB::table('enrollment_fees')
        ->where('enrollment_id', $id)
        ->first();

    // Applied fees
    $appliedFees = DB::table('enrollment_applied_fees')
        ->where('enrollment_id', $id)
        ->get();

    // Discounts
    $discounts = DB::table('enrollment_discounts')
        ->join('discounts_offers', function ($join) {
            $join->on(
                DB::raw('discounts_offers.id COLLATE utf8mb4_unicode_ci'),
                '=',
                DB::raw('enrollment_discounts.discount_id COLLATE utf8mb4_unicode_ci')
            );
        })
        ->where(
            DB::raw('enrollment_discounts.enrollment_id COLLATE utf8mb4_unicode_ci'),
            '=',
            (string) $id
        )
        ->select(
            'discounts_offers.name',
            'discounts_offers.type',
            'discounts_offers.value',
            'enrollment_discounts.discount_amount'
        )
        ->get();

    // Payments
    $payments = $fees
        ? DB::table('payments')
            ->where('payable_id', $fees->id)
            ->where('payable_type', 'LF')
            ->orderByDesc('paid_at')
            ->get()
        : collect();

    return view('Access.Core.Branch_Executive.enrollment_manage', compact(
        'enrollments',
        'selectedEnrollment',
        'courses',
        'fees',
        'appliedFees',
        'discounts',
        'payments'
    ));
}

}
