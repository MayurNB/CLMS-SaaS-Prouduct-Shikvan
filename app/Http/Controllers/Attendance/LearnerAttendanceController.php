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
use App\Modeles\EmpoyerProfile;
use App\Models\Payment;


use App\Models\Role;
use App\Models\UserRole;

use App\Models\Batch;
use App\Models\LearnerAttendance;
use App\Models\LectureAttendance;

class  LearnerAttendanceController extends Controller
{
    /* SHOW PAGE */
    public function learnerAttendances()
{
    $instructorId = Auth::id();
    $today = now()->format('l');

    // Fetch all today's slots
    $allSlots = \App\Models\Timetable::with(['course', 'batch', 'program'])
        ->where('instructor_id', $instructorId)
        ->where('day', $today)
        ->where('status', 'active')
        ->orderBy('start_time', 'asc')
        ->get();

    // Group by Start Time and Classroom to avoid duplicates in the UI
    $classes = $allSlots->groupBy(function($item) {
        return $item->start_time . $item->classroom;
    });

    return view('Access.Core.Instructor.learner_attendance', compact('classes'));
}

public function fetchStudents(Request $request, $timetableId)
{
    // 1. Find the main slot clicked
    $slot = \App\Models\Timetable::findOrFail($timetableId);
    
    // 2. Get all batch IDs that share this time and room (Combined Batches)
    $batchIds = \App\Models\Timetable::where('instructor_id', Auth::id())
        ->where('day', $slot->day)
        ->where('start_time', $slot->start_time)
        ->where('classroom', $slot->classroom)
        ->pluck('batch_id');

    // 3. Fetch learners through the 'learnerBatches' relationship
    $students = \App\Models\Learners::whereHas('learnerBatches', function($query) use ($batchIds) {
            $query->whereIn('batch_id', $batchIds)
                  ->where('status', 'active'); // Only active students
        })
        ->select('id', 'raw_learner_name', 'learner_code') 
        ->get();

    return response()->json([
        'students' => $students,
        'slot' => $slot
    ]);
}

public function storeAttendance(Request $request)
{
    return DB::transaction(function () use ($request) {
        // 1. Create the Lecture Header
        $lecture = LectureAttendance::create([
            'id' => \Illuminate\Support\Str::uuid(),
            'attendance_date' => now()->format('Y-m-d'),
            'timetable_id' => $request->timetable_id,
            'institute_id' => $request->institute_id,
            'branch_id' => $request->branch_id,
            'program_id' => $request->program_id,
            'batch_id' => $request->batch_id,
            'course_id' => $request->course_id,
            'instructor_id' => Auth::id(),
            'actual_start_time' => now()->format('H:i:s'),
            'is_guest_lecture' => $request->is_guest ?? 0,
            'remark' => $request->remark,
            'created_by' => Auth::id(),
        ]);

        // 2. Create individual Learner records
        foreach ($request->attendance as $learnerId => $status) {
            LearnerAttendance::create([
                'id' => \Illuminate\Support\Str::uuid(),
                'lecture_attendance_id' => $lecture->id,
                'learner_id' => $learnerId,
                'status' => $status, // present, absent, etc.
            ]);
        }

        return response()->json(['success' => true, 'message' => 'Attendance recorded!']);
    });
}


}