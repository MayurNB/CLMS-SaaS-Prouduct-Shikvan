<?php

namespace App\Http\Controllers\TimeTable;

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

class TimeTableController extends Controller
{
    public function timeTableCreationPageShow()
    {
        $branchId = session('activeBranch_id');
        if (!$branchId) return redirect()->back()->with('error', 'Please select a branch first.');
        
        $branch = Branch::findOrFail($branchId);
        $programs = Program::where('institute_id', $branch->institute_id)
                           ->where('is_active', 1)
                           ->get();
        
        return view('Access.Core.Branch_Executive.timetable_creation', compact('programs'));
    }

    public function getProgramData($programId)
    {
        $branchId = session('activeBranch_id');
        
        $assignments = InstructorCourseAssignment::with('instructor')
            ->where('program_id', $programId)
            ->where('status', 'active')
            ->get();

        return response()->json([
            'batches' => Batch::where('program_id', $programId)
                ->where('branch_id', $branchId)
                ->where('status', 'active')
                ->get(),
            'courses' => Course::where('program_id', $programId)->get(),
            'assignments' => $assignments->map(function($a) {
                return [
                    'course_id' => $a->course_id,
                    'instructor_id' => $a->instructor->id,
                    'instructor_name' => $a->instructor->name
                ];
            })
        ]);
    }

    public function timeTableDataStore(Request $request)
    {
        try {
            $request->validate([
                'program_id' => 'required|exists:programs,id',
                'sessions'   => 'required|array',
            ]);

            return DB::transaction(function () use ($request) {
                $branchId = session('activeBranch_id');
                $branch   = Branch::findOrFail($branchId);

                // 🛠 FIX: Remove old timetable for THIS program/branch before saving new one
                // This prevents the 422 "Duplicate" error and allows updates.
                Timetable::where('branch_id', $branchId)
                         ->where('program_id', $request->program_id)
                         ->delete();

                $daySequences = [];

                foreach ($request->sessions as $index => $session) {
                    // Internal Validation
                    if (empty($session['course_id']) || empty($session['instructor_id']) || empty($session['batch_ids'])) {
                        throw new \Exception("Slot #" . ($index + 1) . " is missing required info.");
                    }

                    $day = $session['day'];
                    $daySequences[$day] = ($daySequences[$day] ?? 0) + 1;
                    $course = Course::findOrFail($session['course_id']);

                    foreach ($session['batch_ids'] as $batchId) {
                        Timetable::create([
                            'institute_id'  => $branch->institute_id,
                            'branch_id'     => $branchId,
                            'program_id'    => $request->program_id,
                            'batch_id'      => $batchId,
                            'course_id'     => $session['course_id'],
                            'instructor_id' => $session['instructor_id'],
                            'title'         => $course->course_name,
                            'day'           => $day,
                            'sequence_no'   => $daySequences[$day],
                            'start_time'    => $session['start_time'],
                            'end_time'      => $session['end_time'],
                            'classroom'     => $session['classroom'] ?? 'General',
                            'status'        => 'active',
                            'created_by'    => Auth::id(),
                        ]);
                    }
                }

                return response()->json([
                    'success' => true,
                    'message' => 'Timetable synced successfully! 🚀'
                ]);
            });

        } catch (\Throwable $e) {
            Log::error('Timetable Error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 422);
        }
    }



    public function timeTableViewPage(Request $request)
{
    $branchId = session('activeBranch_id');
    if (!$branchId) return redirect()->back()->with('error', 'Select a branch.');

    $branch = Branch::findOrFail($branchId);
    
    // Get all programs for the filter dropdown
    $programs = Program::where('institute_id', $branch->institute_id)->where('is_active', 1)->get();

    // Get the selected program from the request, or default to the first one
    $selectedProgramId = $request->get('program_id', $programs->first()->id ?? null);

    // Fetch timetable only for the selected program
    $timetable = [];
    if ($selectedProgramId) {
        $timetable = Timetable::with(['course', 'instructor', 'batch'])
            ->where('branch_id', $branchId)
            ->where('program_id', $selectedProgramId)
            ->orderBy('start_time')
            ->get()
            ->groupBy('day');
    }

    $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

    return view('Access.Core.Branch_Executive.timetable_view', compact('timetable', 'days', 'programs', 'selectedProgramId'));
}

public function instructorTimeTableView()
{
   // Get the currently logged-in user's ID
    $instructorId = Auth::id(); 
    $today = now()->format('l'); // Get current day name (e.g., 'Monday')

    // Fetch only this instructor's slots with relationships
    $weeklySchedule = Timetable::with(['course', 'batch', 'program'])
        ->where('instructor_id', $instructorId)
        ->where('status', 'active')
        ->orderBy('start_time')
        ->get()
        ->groupBy('day');

    // Filter out today's specific classes for the "Indicative/Highlight" section
    $todaysClasses = $weeklySchedule->get($today, collect());

    $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

    return view('Access.Core.Instructor.timetable', compact('weeklySchedule', 'todaysClasses', 'days', 'today'));
}

   public function learnerViewTimeTable()
{
    $userId = Auth :: id();
    $learner = \App\Models\Learners::where('user_id', $userId)->firstOrFail();

    $enrolledProgramIds = \App\Models\Enrollment::where('learner_id', $learner->id)
        ->where('status', 'active')
        ->pluck('program_id');

    $timetable = \App\Models\Timetable::with(['program', 'course', 'batch']) // Added batch here
        ->whereIn('program_id', $enrolledProgramIds)
        ->where('status', 'active')
        ->orderByRaw("FIELD(day, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday')")
        ->orderBy('start_time', 'asc')
        ->get()
        ->groupBy('day');

    return view('Access.Core.Learner.timetable', compact('timetable'));
}
}