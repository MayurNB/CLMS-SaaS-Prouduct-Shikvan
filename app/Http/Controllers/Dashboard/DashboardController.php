<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Learner;
use App\Models\InstituteInfo;
use App\Models\user;
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

class DashboardController extends Controller
{
    public function adminDashboard()
    {
        return view('Access.Core.Admin.dashboard');
    }

    public function employerDashboard()
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
    | SEND TO VIEW
    |--------------------------------------------------------------------------
    */
    return view('Access.Core.Employer.dashboard', [
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
    ]);
}


    public function branchExecutiveDashboard()
{
    $user = Auth::user();

    // -----------------------------------------
    // 1) Branch Executive Role
    // -----------------------------------------


    $branchId = session('activeBranch_id');

    //dd($branchRole);


    

   $branchId = session()->has('activeBranch_id')
    ? session('activeBranch_id')
    : $branchId;


    

    //dd($branchId);
    // -----------------------------------------
    // 2) Total Fees Expected (ENTIRE BRANCH)
    // -----------------------------------------
    $learnerCount = EnrollmentFee::whereIn(
        'enrollment_id',
        Enrollment::where('branch_id', $branchId)->pluck('id')
    )
    ->sum('total_fee_charged');

    // -----------------------------------------
    // 3) Total Fees Collected (ENTIRE BRANCH)
    //    - This matches $totalFees on your UI
    // -----------------------------------------
    $totalFees = EnrollmentFee::whereHas('enrollment', function ($q) use ($branchId) {
        $q->where('branch_id', $branchId);
    })->sum('paid_amount');


    // -----------------------------------------
    // 5) Total Fees Lost
    // -----------------------------------------
    // fee_status is a column on enrollment_fees, so filter it here, then restrict by enrollment.branch_id
    $totalFeesLost = EnrollmentFee::where('fee_status', 'lost')
        ->whereHas('enrollment', function ($q) use ($branchId) {
            $q->where('branch_id', $branchId);
        })->sum('total_fee_charged');


    // -----------------------------------------
    // 4) Total Fees Balance
    //    (Expected - Collected - Lost)
    // -----------------------------------------
    $totalFeesBalance = floatval($learnerCount) - (floatval($totalFees) + floatval($totalFeesLost));


    // -----------------------------------------
    // 6) Active Learners Count
    //    (Widget shows "Active Learners")
    // -----------------------------------------
    $activeLearners = Enrollment::where('branch_id', $branchId)
        ->where('status', 'active')
        ->distinct('learner_id')
        ->count('learner_id');


    // -----------------------------------------
    // 7) Today Payments Received
    // -----------------------------------------
    $todayPayments = EnrollmentFee::whereDate('created_at', today())
        ->whereHas('enrollment', function ($q) use ($branchId) {
            $q->where('branch_id', $branchId);
        })
        ->sum('paid_amount');


    // -----------------------------------------
    // 8) Learner Overdue (TEMP FIX - STATIC)
    //    (You show 2.49% in UI)
    // -----------------------------------------
    $denominator = floatval($learnerCount) - floatval($totalFeesLost);

    if ($denominator <= 0) {
        $learnerOverdue = 0;
    } else {
        $learnerOverdue = ($totalFeesBalance / $denominator) * 100;
    }


    // -----------------------------------------
    // 9) Total Staff in this branch only
    // -----------------------------------------
  // -----------------------------------------
// Role IDs for Instructor and Branch Executive
// -----------------------------------------
$excludeRoles = ['BranchExecutive', 'Instructor'];

// Get excluded role IDs
$excludedRoleIds = Role::whereIn('name', $excludeRoles)->pluck('role_id');

// Staff count EXCLUDING instructor + branch executive (your existing logic)
$totalStaff = UserBranchRole::where('branch_id', $branchId)
    ->whereNotIn('role_id', $excludedRoleIds)
    ->where('is_active', 1)
    ->distinct('user_id')
    ->count('user_id');


    // -----------------------------------------
    // 10) Currency Symbol
    // -----------------------------------------
    $currencySymbol = "₹";

    return view('Access.Core.Branch_Executive.dashboard', compact(
        'learnerCount',
        'totalFees',
        'totalFeesBalance',
        'totalFeesLost',
        'activeLearners',
        'todayPayments',
        'learnerOverdue',
        'totalStaff',
        'currencySymbol'
    ));
}

    public function instructorDashboard()
    {
        // 1. Get the ID of the currently logged-in Employer
        $employerId = Auth::id();

        // 2. Calculate the Total Learner Count (i.e., total entries/enrollments)
        // We count all rows in learner_catalog where the current employer is the creator.
        $learnerCount = 0;
        //Learner::where('created_by', $employerId)->count();

        // 3. Calculate the Total Fees Collection (Revenue)
        // We sum the 'raw_fee_amount' column for all entries created by this employer.
        $totalFeesCollected = 0;
        //Learner::where('created_by', $employerId)->sum('raw_fee_amount');
        
        // Use a currency symbol (e.g., Indian Rupee)
        $currencySymbol = '₹'; 

        

        // 4. Pass the data to the view
        return view('Access.Core.Instructor.dashboard',[
            'learnerCount' => $learnerCount,
            'totalFees' => $totalFeesCollected,
            'currencySymbol' => $currencySymbol,
        ]);
    }

    public function learnerDashboard()
    {
         // 1. Get the ID of the currently logged-in Employer
        $employerId = Auth::id();

        // 2. Calculate the Total Learner Count (i.e., total entries/enrollments)
        // We count all rows in learner_catalog where the current employer is the creator.
        $learnerCount = 0;
        //Learner::where('created_by', $employerId)->count();

        // 3. Calculate the Total Fees Collection (Revenue)
        // We sum the 'raw_fee_amount' column for all entries created by this employer.
        $totalFeesCollected = 0;
        //Learner::where('created_by', $employerId)->sum('raw_fee_amount');
        
        // Use a currency symbol (e.g., Indian Rupee)
        $currencySymbol = '₹'; 

        

        // 4. Pass the data to the view
        return view('Access.Core.Learner.dashboard',[
            'learnerCount' => $learnerCount,
            'totalFees' => $totalFeesCollected,
            'currencySymbol' => $currencySymbol,
        ]);
    }
}