<?php

namespace App\Http\Controllers\ProgramsCourses;

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
use Illuminate\Support\Facades\Log;

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

use App\Models\Batch;
use App\Models\LearnerBatch;
use App\Models\Timetable;

use App\Models\InstructorCourseAssignment;

class ProgramViewController extends Controller
{
    public function learnerProgramView()
{
    $userId = Auth::id();

    // 1. Find the learner profile
    $learner = \App\Models\Learners::where('user_id', $userId)->first();

    if (!$learner) {
        return redirect()->back()->with('error', 'Learner profile not found.');
    }

    // 2. Fetch all enrollments with their Programs and their specific Enrolled Courses
    $enrollments = \App\Models\Enrollment::with([
        'program', 
        'enrolledCourses.course' // This links Enrollment -> EnrolledCourses -> Course details
    ])
    ->where('learner_id', $learner->id)
    ->where('status', 'active')
    ->get();

    return view('Access.Core.Learner.program', compact('enrollments'));
}

}