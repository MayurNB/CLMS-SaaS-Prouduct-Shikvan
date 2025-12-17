<?php

namespace App\Http\Controllers\BillingControllersManagements;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\UserProfile;
use Illuminate\Support\Str;
use App\Models\EmployerProfile;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;

use App\Models\Learner;
use App\Models\InstituteInfo;

use App\Models\Branch;
use App\Models\Enrollment;
use App\Models\UserBranchRole;
use App\Models\Learners;
use App\Models\Program;
use App\Models\EnrollmentFee;
use App\Models\Course;
use App\Modeles\EmpoyerProfile;
use App\Models\Payment;


use App\Models\Role;
use App\Models\UserRole;


class UnitBillController extends Controller
{
        public function UnitBillView()
        {
                $user = Auth::user();

    // Employer → Institute
    $employerProfile = $user->employerProfile;
    $institute = $employerProfile->institute;

    // All Branch IDs under this institute
    $branchIds = Branch::where('institute_id', $institute->id)
        ->where('is_active', 1)
        ->pluck('id');

    /*
    |--------------------------------------------------------------------------
    | LEARNERS
    |--------------------------------------------------------------------------
    */
    // Learners enrolled in any branch of this institute
    $activeLearners = Learners::whereIn('id', function ($q) use ($branchIds) {
        $q->select('learner_id')
          ->from('enrollments')
          ->whereIn('branch_id', $branchIds)
          ->where('status', 'active');
    })->count();

    

    $deactiveLearners = Learners::whereIn('id', function ($q) use ($branchIds) {
        $q->select('learner_id')
          ->from('enrollments')
          ->whereIn('branch_id', $branchIds)
          ->where('status', '!=', 'active');
    })->count();

    /*
    |--------------------------------------------------------------------------
    | ENROLLMENTS
    |--------------------------------------------------------------------------
    */
    $activeEnrollments = Enrollment::whereIn('branch_id', $branchIds)
        ->where('status', 'active')
        ->count();

    $deactiveEnrollments = Enrollment::whereIn('branch_id', $branchIds)
        ->where('status', '!=', 'active')
        ->count();

    /*
    |--------------------------------------------------------------------------
    | FEES
    |--------------------------------------------------------------------------
    */
    $feeRows = EnrollmentFee::whereIn('enrollment_id', function ($q) use ($branchIds) {
        $q->select('id')
          ->from('enrollments')
          ->whereIn('branch_id', $branchIds);
    })->get();

    $totalFeesExpected = $feeRows->sum('total_fee_charged');
    $totalFeesCollected = $feeRows->sum('paid_amount');
    $totalFeesBalance   = $totalFeesExpected - $totalFeesCollected;

    $totalFeesLost = $feeRows->where('fee_status', 'lost')->sum('total_fee_charged');

    /*
    |--------------------------------------------------------------------------
    | PROGRAMS & COURSES
    |--------------------------------------------------------------------------
    */
    $activePrograms = Program::where('institute_id', $institute->id)
        ->where('is_active', 1)
        ->count();

    $activeCourses = Course::where('institute_id', $institute->id)
        ->where('is_published', 1)
        ->count();

    /*
    |--------------------------------------------------------------------------
    | STAFF (via user_branch_roles)
    |--------------------------------------------------------------------------
    */
    $staff = UserBranchRole::whereIn('branch_id', $branchIds)
        ->where('is_active', 1)
        ->whereHas('role', function ($q) {
            $q->whereNotIn('name', ['Learner', 'Instructor']);
        })
        ->distinct('user_id')
        ->count('user_id');

    /* 
|--------------------------------------------------------------------------
| BRANCH COUNTS
|--------------------------------------------------------------------------
*/
$totalBranches = $branchIds->count();

/* 
|--------------------------------------------------------------------------
| ROLE COUNTS (Instructor & Branch Executive)
|--------------------------------------------------------------------------
*/

// Branch Executives count
$branchExecutivesCount = UserBranchRole::whereIn('branch_id', $branchIds)
    ->where('is_active', 1)
    ->whereHas('role', function ($q) {
        $q->where('name', 'BranchExecutive');
    })
    ->distinct('user_id')
    ->count('user_id');

// Instructors count
$instructorsCount = UserBranchRole::whereIn('branch_id', $branchIds)
    ->where('is_active', 1)
    ->whereHas('role', function ($q) {
        $q->where('name', 'Instructor');
    })
    ->distinct('user_id')
    ->count('user_id');

// Optional: total staff (Instructor + Branch Executive)
$totalTeachingStaff = $branchExecutivesCount + $instructorsCount;


/* 
|--------------------------------------------------------------------------
| STEP 1: GET ALL ENROLLMENTS UNDER THIS INSTITUTE
|--------------------------------------------------------------------------
*/
$enrollmentIds = Enrollment::whereIn('branch_id', $branchIds)
    ->pluck('id');

/* 
|--------------------------------------------------------------------------
| STEP 2: GET ALL ENROLLMENT FEES UNDER THOSE ENROLLMENTS
|--------------------------------------------------------------------------
*/
$enrollmentFeeIds = EnrollmentFee::whereIn('enrollment_id', $enrollmentIds)
    ->pluck('id');

/* 
|--------------------------------------------------------------------------
| STEP 3: BASE PAYMENT QUERY FOR THIS INSTITUTE
| NOTE:
| payable_type = 'LF' (as per DB)
|--------------------------------------------------------------------------
*/
$institutePaymentsQuery = Payment::whereIn('payable_id', $enrollmentFeeIds)
    ->where('payable_type', 'LF');

/* 
|--------------------------------------------------------------------------
| STEP 4: PAYMENT COUNTS
|--------------------------------------------------------------------------
*/

// Total payment transactions
$totalPaymentTransactions = (clone $institutePaymentsQuery)->count();

// Successful payments
$successfulPayments = (clone $institutePaymentsQuery)
    ->where('status', 'COMPLETE')
    ->count();

// Pending / Failed payments (if any)
$pendingPayments = (clone $institutePaymentsQuery)
    ->where('status', '!=', 'COMPLETE')
    ->count();

/* 
|--------------------------------------------------------------------------
| STEP 5: TOTAL AMOUNT COLLECTED
|--------------------------------------------------------------------------
*/
$totalAmountCollected = (clone $institutePaymentsQuery)
    ->where('status', 'COMPLETE')
    ->sum('amount');



    /*
    |--------------------------------------------------------------------------
    | SEND TO VIEW
    |--------------------------------------------------------------------------
    */
    return view('Access/Core/Employer/billing_view', [
        'activeLearners'      => $activeLearners,
        'deactiveLearners'    => $deactiveLearners,
        'activeEnrollments'   => $activeEnrollments,
        'deactiveEnrollments' => $deactiveEnrollments,
        'totalFeesExpected'   => $totalFeesExpected,
        'totalFeesCollected'  => $totalFeesCollected,
        'totalFeesBalance'    => $totalFeesBalance,
        'totalFeesLost'       => $totalFeesLost,
        'activePrograms'      => $activePrograms,
        'activeCourses'       => $activeCourses,
        'activeBranches'      => $branchIds->count(),
        'totalStaff'          => $staff,
        'branchExecutivesCount' => $branchExecutivesCount,
    'instructorsCount'      => $instructorsCount,
    'totalPaymentTransactions' => $totalPaymentTransactions,
    ]);
            
            
            
        
        }
}


