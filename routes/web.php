<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\InstituteInfoShow\InstituteLoginPageController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\Branch\BranchController;
use App\Http\Controllers\AdminControllersManagements\EmployersManagementController;
use App\Http\Controllers\AdminControllersManagements\EmployerUserManagementController;
use App\Http\Controllers\ProgramsCourses\ProgramsAndCoursesController;
use App\Http\Controllers\LearnerEnrollment\LearnerEnrollmentController;

use App\Http\Controllers\BillingControllersManagements\UnitBillController;

use App\Http\Controllers\LearnerOnboard;
use App\Http\Controllers\LearnerOnboard\LearnerOnboardController;

use App\Http\Controllers\ComingSoon\ComingSoonController;

// ✅ Root Redirect
Route::get('/fine', fn() => Redirect::to('https://mnbsolutions.vercel.app/'));

// ✅ LOGIN ROUTES
Route::get('/login/{institute_slug?}', [InstituteLoginPageController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Branch + Role selection
Route::get('/login/branch-role', [LoginController::class, 'showBranchRoleSelection'])->name('login.showBranchRole');
Route::post('/select-branch-role', [LoginController::class, 'selectBranchRole'])->name('selectBranchRole');


// ✅ AUTH-PROTECTED ROUTES
Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Global Roles (Admin + SystemEmployer)
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:Admin')->prefix('admin')->group(function () {
        //Admin Routes:
    //Admin Dashboard related Route
    Route::get('/dashboard', [DashboardController::class, 'adminDashboard'])->name('adminDashboard');
    //Admin Dashboard End

    //Admin Profile related Route
    Route::get('/profile', [ProfileController::class, 'adminProfile'])->name('adminProfile');

    Route::post('/profile/update', [ProfileController::class, 'updateAdminprofile'])->name('updateAdminprofile');
    //Admin Profile End

    //Admin Employers Mgt Routes 
    Route::get('/employers-mgt-info',[EmployersManagementController::class,'employerMgtinfo'])->name('employerMgtinfo');

    Route::get('/onboard-employer',[EmployersManagementController::class,'onboardEmployer'])->name('onboardEmployer');

    Route::post('/employer-user-creation',[EmployersManagementController::class,'creationOfemployerAsuser'])->name('creationOfemployerAsuser');

    //Route::post('/search-user-by-email', [UserController::class, 'searchUserByEmail'])->name('searchUserByEmail');

    Route::post('/employer-profile-creation',[EmployersManagementController::class,'creationOfemployerAsprofile'])->name('creationOfemployerAsprofile');

    Route::post('/search-user-by-email-for-confirm-data', [EmployersManagementController::class, 'searchUserByEmailforConfirmData'])->name('searchUserByEmailforConfirmData');

    Route::post('/employer-onboard-data-confirm',[EmployersManagementController::class,'employerOnboarddataConfirm'])->name('employerOnboarddataConfirm');

    Route::get('/employer-subscriptions-setup',[EmployersManagementController::class,'employerSetupSubscriptions'])->name('employerSetupSubscriptions');

    Route::post('/employer-subscriptions-data-check-and-send',[EmployersManagementController::class,'employerSubscriptionsDataCheckSend'])->name('employerSubscriptionsDataCheckSend');

    Route::get('/employer-user-onboard',[EmployerUserManagementController::class,'adminOnboardToUser'])->name('adminOnboardToUser');

    Route::get('/institutes', [EmployerUserManagementController::class, 'getInstitutes'])->name('getInstitutes');
    Route::get('/branches/{institute_id}', [EmployerUserManagementController::class, 'getBranches']);
    Route::get('/roles/{branch_id}', [EmployerUserManagementController::class, 'getRoles']);
    Route::get('/users/{branch_id}/{role_id}', [EmployerUserManagementController::class, 'getUsers']);
    Route::get('/user/{user_id}', [EmployerUserManagementController::class, 'getSingleUser']);
    Route::post('/user/save', [EmployerUserManagementController::class, 'storeOrUpdateUser']);
//End Admin Routes. 
    });

    Route::middleware('role:SystemEmployer')->prefix('employer')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'employerDashboard'])->name('employerDashboard');
    Route::get('/profile', [ProfileController::class, 'employerProfile'])->name('employerProfile');
    Route::post('/profile/update', [ProfileController::class, 'updateEmployerprofile'])->name('updateEmployerprofile');

    Route::get('/institute', [InstituteLoginPageController::class, 'employerInstituteManage'])->name('employerInstituteManage');

    Route::get('/branch', [BranchController::class, 'employerBranch'])->name('employerBranch');

    Route::post('/branch-create', [BranchController::class, 'employerBranchCreate'])->name('employerBranchCreate');

    Route::post('/branch-update', [BranchController::class, 'employerBranchUpdate'])->name('employerBranchUpdate');


    //Route::post('/profile/update', [ProfileController::class, 'updateEmployerProfile'])->name('updateEmployerProfile');


    Route::get('/programs-courses',[ProgramsAndCoursesController::class, 'employerProgramAndCourses'])->name('employerProgramAndCourses');

    Route::post('/programs-courses/create', [ProgramsAndCoursesController::class, 'employerProgramCreation'])->name('employerProgramCreation');

   Route::get('/courses/create', [ProgramsAndCoursesController::class, 'showCourseCreationForm'])->name('course.create.form'); // show course creation form with program dropdown
    Route::post('/courses', [ProgramsAndCoursesController::class, 'employerCoursesCreation'])->name('employerCoursesCreation'); // handle course creation

  // AJAX: get courses for selected program
    Route::get('/programs/{program}/courses', [ProgramsAndCoursesController::class, 'getProgramCourses'])->name('getProgramCourses');
   
    // 3. 🆕 NEW: Handle Program Update (POST request from the edit form)
    Route::post('/programs/update/{programId}', [ProgramsAndCoursesController::class, 'employerProgramUpdate'])->name('employerProgramUpdate');

    // 4. 🚀 NEW: AJAX route to fetch ALL program details (for the edit modal)
    // Renamed this to be clearer for AJAX use, using your existing pattern.
    Route::get('/programs/{programId}/edit-data', [ProgramsAndCoursesController::class, 'getProgramDetails'])->name('employer.program.details.ajax');

    // AJAX Add Routes (Keep these)
    Route::post('/programs/courses/add', [ProgramsAndCoursesController::class, 'addCourse']);
    Route::post('/programs/prices/add', [ProgramsAndCoursesController::class, 'addPrice']);
    Route::post('/programs/discounts/add', [ProgramsAndCoursesController::class, 'addDiscount']);
    Route::post('/programs/tags/add', [ProgramsAndCoursesController::class, 'addTag']);
    Route::get('/branch-learner-fees-data', [LearnerEnrollmentController::class, 'employerBranchWiseLearnerAndFeesTotolInfo'])->name('employerBranchWiseLearnerAndFeesTotolInfo');


    Route::get('/not-use', [LearnerEnrollmentController::class, 'employerLearnerEnrollment'])->name('employerLearnerEnrollment');


    Route::post(
    '/Learner-Enrollment/data-store',
    [LearnerEnrollmentController::class, 'employerLearnerEnrollmentDataStoreInDB']
)->name('employerLearnerEnrollmentDataStoreInDB');

Route::get(
    '/programs/{programName}/learners',
    [LearnerEnrollmentController::class, 'getEnrolledLearnersByProgram']
)->name('getEnrolledLearnersByProgram');

Route::get('/programs/{programId}/details', [ProgramsAndCoursesController::class, 'getProgramDetails'])->name('getProgramDetails');

Route::post('/employer/programs/courses/add', [ProgramsAndCoursesController::class, 'addCourse']);
Route::post('/employer/programs/prices/add', [ProgramsAndCoursesController::class, 'addPrice']);
Route::post('/employer/programs/discounts/add', [ProgramsAndCoursesController::class, 'addDiscount']);
Route::post('/employer/programs/tags/add', [ProgramsAndCoursesController::class, 'addTag']);

// routes/web.php
Route::get('/programs/{id}', [ProgramsAndCoursesController::class, 'show']);


Route::get('/unit-bill-show', [UnitBillController::class, 'UnitBillView'])->name('UnitBillView');


    


});


    /*
    |--------------------------------------------------------------------------
    | Branch-Level Roles
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:BranchExecutive')->prefix('branch-executive')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'branchExecutiveDashboard'])->name('branchExecutiveDashboard');
        Route::get('/profile', [ProfileController::class, 'branchExecutiveProfile'])->name('branchExecutiveProfile');
    
        Route::post('/profile/update', [ProfileController::class, 'updatebranchExecutiveProfile'])->name('updatebranchExecutiveProfile');

        Route::get('/institute', [InstituteLoginPageController::class, 'branchExecutiveInstitute'])->name('branchExecutiveInstitute');

        Route::get('/branch', [BranchController::class, 'branchExecutiveBranch'])->name('branchExecutiveBranch');
    
        Route::get('/branch/programs/{id}', [ProgramsAndCoursesController::class, 'show']);

        Route::get('/programs-courses',[ProgramsAndCoursesController::class, 'branchExecutiveProgramAndCourses'])->name('branchExecutiveProgramAndCourses');

        Route::get('/programs/{programId}/details', [ProgramsAndCoursesController::class, 'getProgramDetails'])->name('getProgramDetails');

          Route::get('/branch/programs/{programId}/edit-data', [ProgramsAndCoursesController::class, 'getProgramDetails'])->name('employer.program.details.ajax.branch');

         Route::get('/Learner Onboard', [LearnerOnboardController::class, 'learnerOnboard'])->name('learnerOnboard');

            Route::get('/Learner Enrollment', [LearnerEnrollmentController::class, 'branchExecutiveLearnerEnrollment'])->name('branchExecutiveLearnerEnrollment');

            // Learn Enrollment procedure 

            // Learner creation 
                    Route::post('/branch/learner/store', [LearnerEnrollmentController::class, 'storeLearner'])->name('branchExecutive.storeLearner');



         // 🔹 ✅ Add this route — list programs for enrollment (missing before)
    Route::get('/branch-executive/programs/list', [LearnerEnrollmentController::class, 'listPrograms'])
        ->name('programs.list');

    

    Route::get('/programs/{id}/details', [LearnerEnrollmentController::class, 'programDetails'])
        ->name('programs.details');

    Route::post('/enrollments/store', [LearnerEnrollmentController::class, 'store'])
        ->name('enrollments.store');

        Route::get('/create', [LearnerEnrollmentController::class, 'showEnrollmentForm'])->name('enrollments.create');
 Route::get('/program/{program_id}/courses', [LearnerEnrollmentController::class, 'fetchProgramCourses'])
        ->name('branchExecutive.program.courses');  
    
    Route::post('/store', [LearnerEnrollmentController::class, 'saveEnrollment'])->name('enrollments.store');
    
//Route::post('/enrollment/get-program-details', [LearnerEnrollmentController::class, 'getProgramDetails'])->name('enrollment.getProgramDetails');




// web.php
Route::match(['get', 'post'], '/learner-fees-overview', [LearnerEnrollmentController::class, 'ViewOverviewOfFeesBeforePayment'])
    ->name('ViewOverviewOfFeesBeforePayment');


        Route::post('/enrollment-fees-payment', [LearnerEnrollmentController::class, 'EnrollmentFeesPayment'])->name('EnrollmentFeesPayment');


Route::get('/learner-enrollment-manage',[LearnerEnrollmentController::class,'LearnerEnrollmentManage'])->name('LearnerEnrollmentManage');

    Route::get('/learner-enrollment-update', [LearnerEnrollmentController::class, 'branchExecutiveLearnerEnrollmentUpdate'])->name('branchExecutiveLearnerEnrollmentUpdate');


    Route::post('/learner-enrollment-deactive',[LearnerEnrollmentController::class,'enrollmentDeactive'])->name('enrollmentDeactive');


    Route::get('/Coming Soon',[ComingSoonController::class, 'branch_ExecutiveComingSoon'])->name('branch_ExecutiveComingSoon');
});



    Route::middleware('role:Instructor')->prefix('instructor')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'instructorDashboard'])->name('instructorDashboard');

        Route::get('/profile', [ProfileController::class, 'InstructorProfile'])->name('InstructorProfile');
    
        Route::post('/profile/update', [ProfileController::class, 'updateInstructorProfile'])->name('updateInstructorProfile');
    
        Route::get('/institute', [InstituteLoginPageController::class, 'InstructorInstitute'])->name('InstructorInstitute');

        Route::get('/branch', [BranchController::class, 'InstructorBranch'])->name('InstructorBranch');

    
    });

    Route::middleware('role:Learner')->prefix('learner')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'learnerDashboard'])->name('learnerDashboard');
    
        Route::get('/profile', [ProfileController::class, 'LearnerProfile'])->name('LearnerProfile');
    
        Route::post('/profile/update', [ProfileController::class, 'updateLearnerProfile'])->name('updateLearnerProfile');
    
        Route::get('/institute', [InstituteLoginPageController::class, 'LearnerInstitute'])->name('LearnerInstitute');

        Route::get('/branch', [BranchController::class, 'LearnerBranch'])->name('LearnerBranch');

        Route::get('/just-view',[LearnerEnrollmentController::class,'JustView'])->name('JustView');
    
    });
});

Route::get('/test-log', function() {
    \App\Services\LogService::app("APP_LOG TEST ENTRY");
    \App\Services\LogService::security("SECURITY TEST ENTRY");
    \App\Services\LogService::payment("PAYMENTS TEST ENTRY");
    return "LOGGING TEST COMPLETED";
});


Route::get('/', function () {
    Log::info("HOST=".env('DB_HOST'));
    Log::info("PORT=".env('DB_PORT'));
    Log::info("DB_SOCKET=".env('DB_SOCKET'));
    try {
        DB::connection()->getPdo();
        Log::info("SUCCESS");
        return "OK";
    } catch (\Throwable $e) {
        Log::error("ERROR: ".$e->getMessage());
        return $e->getMessage();
    }
});



/*

some common route like help , support , faq etc also need to be make.

with also make some pring and policy related pages means routes also..

*/