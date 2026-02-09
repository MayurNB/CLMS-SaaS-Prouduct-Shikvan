<?php

namespace App\Http\Controllers\Attendance;

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

use App\Models\Payment;


use App\Models\Role;
use App\Models\UserRole;

use App\Models\Batch;
use App\Models\LearnerAttendance;
use App\Models\LectureAttendance;

class  AttendanceController extends Controller
{
    /* SHOW PAGE */

    public function branchAttendanceMasterView()
{
    $branchId = session('activeBranch_id');
    if (!$branchId) {
        return redirect()->back()->with('error', 'Please select a branch first.');
    }

    $attendanceSheets = LectureAttendance::with(['program', 'course', 'batch', 'instructor'])
        ->where('branch_id', $branchId)
        ->orderBy('attendance_date', 'desc')
        ->get();

    $groupedData = $attendanceSheets->groupBy([
        fn($item) => $item->program->program_name ?? 'Unassigned Program',
        'attendance_date'
    ]);

    return view('Access.Core.Branch_Executive.attendance_master_view', compact('groupedData'));
}



    public function instructorAttendanceView()
{
    $groupedSheets = LectureAttendance::with(['program', 'course', 'batch'])
        ->where('instructor_id', Auth::id())
        ->orderBy('attendance_date', 'desc')
        ->get()
        ->groupBy(['attendance_date', fn($item) => $item->program->program_name ?? 'No Program']);

    return view('Access.Core.Instructor.attendance_view', compact('groupedSheets'));
}

public function getAttendanceDetailsJSON($id)
{
    // Use a join to get the learner names from the learners table
    $details = LearnerAttendance::where('lecture_attendance_id', $id)
        ->join('learners', 'learner_attendances.learner_id', '=', 'learners.id')
        ->select('learner_attendances.status', 'learners.raw_learner_name', 'learners.learner_code')
        ->get();

    return response()->json($details);
}


public function learnerAttendanceView()
{
     $userId = Auth :: id();

    // 1. Get the learner profile
    $learner = \App\Models\Learners::where('user_id', $userId)->firstOrFail();

    // 2. Get attendance records with lecture, course, and program details
    $attendanceRecords = \App\Models\LearnerAttendance::with([
            'lectureAttendance.course', 
            'lectureAttendance.program',
            'lectureAttendance.batch'
        ])
        ->where('learner_id', $learner->id)
        ->orderBy('created_at', 'desc') // Show latest first
        ->get();

    // 3. (Optional) Calculate percentage for a quick summary
    $totalSessions = $attendanceRecords->count();
    $presentSessions = $attendanceRecords->where('status', 'present')->count();
    $attendanceRate = $totalSessions > 0 ? round(($presentSessions / $totalSessions) * 100, 1) : 0;

    return view('Access.Core.Learner.attendance', compact('attendanceRecords', 'attendanceRate'));

}

}


