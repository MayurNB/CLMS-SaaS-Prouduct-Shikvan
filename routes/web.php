<?php

use Illuminate\Support\Facades\Route;
// Corrected import path for your custom login controller
use App\Http\Controllers; // Make sure this matches your controller's actual namespace
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\InstituteInfoShow\InstituteLoginPageController;
//use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\UserManagement\UserManagementController;
use App\Http\Controllers\BatchManagement\BatchManagementController;

use App\Http\Controllers\StudentManagement\StudentManagementController;

use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\BranchController\BranchManagementController;

use App\Http\Controllers\AccessControlManagement\AccessControlManagementController;

use App\Http\Controllers\ProgramsCoursesManagement\ProgramsCoursesManagementController;

use App\Http\Controllers\ContentManagement\ContentManagementController;

use App\Http\Controllers\AssignmentManagement\AssignmentManagementController;

use App\Http\Controllers\ExamManagement\ExamManagementController;

use App\Http\Controllers\Results\ResultsController;

use App\Http\Controllers\FeesManagement\FeesManagementController;

use App\Http\Controllers\SystemConfigurationManagement\SystemConfigurationController;

use App\Http\Controllers\Dashboard\DashboardController;

use App\Http\Controllers\Auth\LogoutController;

use App\Http\Controllers\AdminControllersManagements\EmployersManagementController;

use App\Http\Controllers\ProgramsCourses\ProgramsAndCoursesController;

use App\Http\Controllers\User\UserController;
use Symfony\Component\HttpKernel\Profiler\Profile;

use App\Http\Controllers\LearnerEnrollment\LearnerEnrollmentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Default Laravel welcome route
Route::get('/core', function () {
    return view('/CoreUI/views/index');
});

// IMPORTANT: These login routes MUST be in routes/web.php
// This route will handle GET requests for your branded login page:
// e.g., http://127.0.0.1:8000/login
// e.g., http://127.0.0.1:8000/login/shikvan
// e.g., http://127.0.0.1:8000/login/SVS01-SVPK01
Route::get('/login/{institute_slug?}', [InstituteLoginPageController::class, 'showLoginForm'])->name('login');

// This route handles the POST request when the user submits the login form.
// Ensure this is uncommented if you intend to use this for form submission later.
// If you have a separate controller for actual user login, point this to that controller's method.
// For now, if InstituteLoginPageController will also handle actual login logic, keep it like this.
// If not, you'd define a different controller here for the POST request.
//Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
//Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



//Route related to Admin

// Route::get('/Admin/Dashboard', [ProfileController::class, 'Admin_profile'])->name('Admin_profile');


// Route::get('/Admin/Profile', [ProfileController::class, 'Admin_profile'])->name('Admin_profile');

// Route::get('/Admin/Packages_Pricing', [SystemConfigurationController::class, 'Admin_packages_pricing'])->name('Admin_packages_pricing');
// Route::post('//Admin/Packages_Pricing/create', [SystemConfigurationController::class, 'Admin_create_product_package'])->name('Admin_create_product_package');




// Route related to Employer

// Route::get('/Profile/Employer', [ProfileController::class, 'Employer_profile'])->name('Employer_profile');

// Route::get('/Branch Management/Employer', [ BranchManagementController::class, 'Employer_branch'])->name('Employer_branch');

// Route::get('/Access Control Management/Employer', [ AccessControlManagementController::class, 'Employer_acm'])->name('Employer_acm');

// Route::get('/Programs Courses Management/Employer', [ ProgramsCoursesManagementController::class, 'Employer_programs_courses'])->name('Employer_programs_courses');

// Route::get('/Content Management/Employer', [ ContentManagementController::class, 'Employer_content'])->name('Employer_content');

// Route::get('/Assignment Management/Employer', [ AssignmentManagementController::class, 'Employer_assignment'])->name('Employer_assignment');

// Route::get('/Exam Management/Employer', [ ExamManagementController::class, 'Employer_exam'])->name('Employer_exam');

// Route::get('/Results/Employer', [ ResultsController::class, 'Employer_result'])->name('Employer_result');

// End Employer Route  


// Route Related to OE

// Route::get('/Profile/Operations Executive', [ProfileController::class, 'Operations_Executive_profile'])->name('Operations_Executive_profile');



// Route::get('/Access Control Management/Operations Executive', [ AccessControlManagementController::class, 'Operations_Executive_acm'])->name('Operations_Executive_acm');

// Route::get('/Branch Management/Operations Executive', [ BranchManagementController::class, 'Operations_Executive_branch'])->name('Operations_Executive_branch');

// Route::get('/Programs Courses creation/Operations Executive', [ ProgramsCoursesManagementController::class, 'Operations_Executive_programs_courses_creation'])->name('Operations_Executive_programs_courses_creation');

// Route::get('/Programs Courses assign learner/Operations Executive', [ ProgramsCoursesManagementController::class, 'Operations_Executive_programs_courses_learner_assign'])->name('Operations_Executive_programs_courses_learner_assign');

// Route::get('/Programs Courses assign employee/Operations Executive', [ ProgramsCoursesManagementController::class, 'Operations_Executive_programs_courses_emp_assign'])->name('Operations_Executive_programs_courses_emp_assign');

// Route::get('/Fees Dashboard/Operations Executive', [ FeesManagementController::class, 'Operations_Executive_fees_dashboard'])->name('Operations_Executive_fees_dashboard');

// Route::get('/Learner Payment/Operations Executive', [ FeesManagementController::class, 'Operations_Executive_learner_payment'])->name('Operations_Executive_learner_payment');

// Route::get('/Fees Structure/Operations Executive', [ FeesManagementController::class, 'Operations_Executive_fees_structures'])->name('Operations_Executive_fees_structures');

// End OE Route




//Route::get('/profile', [LoginController::class, 'logout'])->name('logout');

// Route::get('/User Management', [UserManagementController::class, 'UserMgt'])->name('UserMgt');






// Route::get('/Profile', [ProfileController::class, 'Head_of_Department'])->name('Head_of_Department');

// Route::get('/Profile', [ProfileController::class, 'Exam_Manager'])->name('Exam_Manager');

// Route::get('/Profile', [ProfileController::class, 'Instructor'])->name('Instructor');

// Route::get('/Profile', [ProfileController::class, 'Learner'])->name('Learner');

// Route::get('/Batch Management/Batch Performance', [BatchManagementController::class, 'BatchMgt1'])->name('BatchMgt1');

// Route::get('/Batch Management/Manage Batch', [BatchManagementController::class, 'BatchMgt2'])->name('BatchMgt2');

// Route::get('/Batch Management/Manage Subject', [BatchManagementController::class, 'BatchMgt3'])->name('BatchMgt3');

// Route::get('/Batch Management/Manage Schedule', [BatchManagementController::class, 'BatchMgt4'])->name('BatchMgt4');


// Route::get('/Student Management/student registration manage', [StudentManagementController::class, 'StdMgt1'])->name('StdMgt1');



// Route::get('/dashboard/learner', function () {
//     return view('Access.Core.Learner.dashboard');
// })->name('learner_dashboard');


Route::middleware(['auth'])->group(function () {


 
    Route::get('/oe/dashboard', [DashboardController::class, 'oeDashboard'])->name('oe.dashboard');


});

// Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])
//     ->middleware(['auth', 'role:Admin'])
//     ->name('adminDashboard');

Route::middleware(['auth', 'role:Admin'])->group(function () {
    
   //Admin Routes:
    //Admin Dashboard related Route
    Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])->name('adminDashboard');
    //Admin Dashboard End

    //Admin Profile related Route
    Route::get('/admin/profile', [ProfileController::class, 'adminProfile'])->name('adminProfile');

    Route::post('/admin/profile/update', [ProfileController::class, 'updateAdminprofile'])->name('updateAdminprofile');
    //Admin Profile End

    //Admin Employers Mgt Routes 
    Route::get('/admin/employers-mgt-info/',[EmployersManagementController::class,'employerMgtinfo'])->name('employerMgtinfo');

    Route::get('/admin/onboard-employer/',[EmployersManagementController::class,'onboardEmployer'])->name('onboardEmployer');

    Route::post('/admin/employer-user-creation/',[EmployersManagementController::class,'creationOfemployerAsuser'])->name('creationOfemployerAsuser');

    //Route::post('/search-user-by-email', [UserController::class, 'searchUserByEmail'])->name('searchUserByEmail');

    Route::post('/admin/employer-profile-creation/',[EmployersManagementController::class,'creationOfemployerAsprofile'])->name('creationOfemployerAsprofile');

    Route::post('/search-user-by-email-for-confirm-data', [EmployersManagementController::class, 'searchUserByEmailforConfirmData'])->name('searchUserByEmailforConfirmData');

    Route::post('/admin/employer-onboard-data-confirm/',[EmployersManagementController::class,'employerOnboarddataConfirm'])->name('employerOnboarddataConfirm');

    Route::get('/admin/employer-subscriptions-setup/',[EmployersManagementController::class,'employerSetupSubscriptions'])->name('employerSetupSubscriptions');

    Route::post('/employer-subscriptions-data-check-and-send',[EmployersManagementController::class,'employerSubscriptionsDataCheckSend'])->name('employerSubscriptionsDataCheckSend');


//End Admin Routes. 
});

// Route::middleware(['auth', 'role:Admin'])->prefix('Admin')->group(function () {
//    //Admin Routes:
//     //Admin Dashboard related Route
//     Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])->name('adminDashboard');
//     //Admin Dashboard End

//     //Admin Profile related Route
//     Route::get('/admin/profile', [ProfileController::class, 'adminProfile'])->name('adminProfile');

//     Route::post('/admin/profile/update', [ProfileController::class, 'updateAdminprofile'])->name('updateAdminprofile');
//     //Admin Profile End

//     //Admin Employers Mgt Routes 
//     Route::get('/admin/employers-mgt-info/',[EmployersManagementController::class,'employerMgtinfo'])->name('employerMgtinfo');

//     Route::get('/admin/onboard-employer/',[EmployersManagementController::class,'onboardEmployer'])->name('onboardEmployer');

//     Route::post('/admin/employer-user-creation/',[EmployersManagementController::class,'creationOfemployerAsuser'])->name('creationOfemployerAsuser');

//     Route::post('/search-user-by-email', [UserController::class, 'searchUserByEmail'])->name('searchUserByEmail');

//     Route::post('/admin/employer-profile-creation/',[EmployersManagementController::class,'creationOfemployerAsprofile'])->name('creationOfemployerAsprofile');

//     Route::post('/search-user-by-email-for-confirm-data', [EmployersManagementController::class, 'searchUserByEmailforConfirmData'])->name('searchUserByEmailforConfirmData');

//     Route::post('/admin/employer-onboard-data-confirm/',[EmployersManagementController::class,'employerOnboarddataConfirm'])->name('employerOnboarddataConfirm');

//     Route::get('/admin/employer-subscriptions-setup/',[EmployersManagementController::class,'employerSetupSubscriptions'])->name('employerSetupSubscriptions');

//     Route::post('/employer-subscriptions-data-check-and-send',[EmployersManagementController::class,'employerSubscriptionsDataCheckSend'])->name('employerSubscriptionsDataCheckSend');


// //End Admin Routes. 
// });

Route::middleware(['auth', 'role:Employer'])->prefix('Employer')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'employerDashboard'])->name('employerDashboard');
    Route::get('/profile', [ProfileController::class, 'employerProfile'])->name('employerProfile');
    Route::post('/profile/update', [ProfileController::class, 'updateEmployerProfile'])->name('updateEmployerProfile');

    Route::get('/programs-courses',[ProgramsAndCoursesController::class, 'employerProgramAndCourses'])->name('employerProgramAndCourses');

    Route::post('/programs-courses/create', [ProgramsAndCoursesController::class, 'employerProgramCreation'])->name('employerProgramCreation');

   Route::get('/courses/create', [ProgramsAndCoursesController::class, 'showCourseCreationForm'])->name('course.create.form'); // show course creation form with program dropdown
    Route::post('/courses', [ProgramsAndCoursesController::class, 'employerCoursesCreation'])->name('employerCoursesCreation'); // handle course creation

  // AJAX: get courses for selected program
    Route::get('/programs/{program}/courses', [ProgramsAndCoursesController::class, 'getProgramCourses'])->name('getProgramCourses');
   
    Route::get('/Learner Enrollment', [LearnerEnrollmentController::class, 'employerLearnerEnrollment'])->name('employerLearnerEnrollment');

    Route::post(
    '/Learner-Enrollment/data-store',
    [LearnerEnrollmentController::class, 'employerLearnerEnrollmentDataStoreInDB']
)->name('employerLearnerEnrollmentDataStoreInDB');

Route::get(
    '/programs/{programName}/learners',
    [LearnerEnrollmentController::class, 'getEnrolledLearnersByProgram']
)->name('getEnrolledLearnersByProgram');
});