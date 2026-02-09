<?php

namespace App\Http\Controllers\InstructorCourseAssignments;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\UserProfile;
use App\Models\Learners;
use App\Models\Program;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\EnrolledCourse;
use App\Models\EnrollmentFee;
use App\Models\Payment;
use App\Models\ProgramPrice;
use App\Models\DiscountOffer;
use App\Models\EnrollmentDiscount;
use App\Models\Fee;
use App\Models\Branch;
use App\Models\UserBranchRole;
use App\Models\Role;
use App\Models\InstructorCourseAssignment;
use Carbon\Carbon;


class InstructorCourseAssignmentsController extends Controller
{
    public function InstructorCourseShow()
    {
        $branch = Branch::findOrFail(session('activeBranch_id'));

        $instructorRole = Role::where('name', 'Instructor')->firstOrFail();

        $InstructorData = UserBranchRole::where([
                'branch_id' => $branch->id,
                'role_id'   => $instructorRole->role_id,
                'is_active' => 1
            ])
            ->with('user')
            ->get();

        $programs = Program::where([
                'is_active'    => 1,
                'institute_id'=> $branch->institute_id
            ])->get();

        $assignments = InstructorCourseAssignment::where([
                'branch_id'    => $branch->id,
                'institute_id'=> $branch->institute_id
            ])
            ->with(['instructor','program','course'])
            ->latest()
            ->get();

        return view(
            'Access.Core.Branch_Executive.instructor_course_assignments',
            compact('InstructorData','programs','assignments')
        );
    }

    /* STORE */
    public function store(Request $request)
    {
        $request->validate([
            'user_id'    => 'required',
            'program_id' => 'required',
            'course_id'  => 'required',
        ]);

        $branch = Branch::findOrFail(session('activeBranch_id'));

        $valid = Course::where('id', $request->course_id)
            ->where('program_id', $request->program_id)
            ->exists();

        if (!$valid) {
            return back()->with('error','Invalid Program–Course mapping.');
        }

        $exists = InstructorCourseAssignment::where([
            'branch_id' => $branch->id,
            'user_id'   => $request->user_id,
            'course_id'=> $request->course_id,
        ])->exists();

        if ($exists) {
            return back()->with('error','Instructor already assigned.');
        }

        InstructorCourseAssignment::create([
            'id'           => (string) Str::uuid(),
            'institute_id' => $branch->institute_id,
            'branch_id'    => $branch->id,
            'program_id'   => $request->program_id,
            'course_id'    => $request->course_id,
            'user_id'      => $request->user_id,
            'status'       => 'active',
            'created_by'   => Auth::id(),
        ]);

        return back()->with('success','Instructor assigned successfully.');
    }

    /* UPDATE */
    public function update(Request $request, InstructorCourseAssignment $assignment)
    {
        $request->validate([
            'program_id' => 'required',
            'course_id'  => 'required',
        ]);

        $assignment->update([
            'program_id' => $request->program_id,
            'course_id'  => $request->course_id,
        ]);

        return back()->with('success','Assignment updated.');
    }

    /* TOGGLE */
    public function toggleStatus(InstructorCourseAssignment $assignment)
    {
        $assignment->update([
            'status' => $assignment->status === 'active' ? 'inactive' : 'active'
        ]);

        return back()->with('success','Status updated.');
    }

    /* AJAX */
    public function getProgramCourses($programId)
    {
        return Course::where('program_id', $programId)
            ->where('is_published', 1)
            ->select('id','course_name')
            ->orderBy('course_name')
            ->get();
    }

    public function getInstructorInfo($userId)
    {
        return User::select('id','name','email','username')
            ->where('id',$userId)
            ->firstOrFail();
    }
}