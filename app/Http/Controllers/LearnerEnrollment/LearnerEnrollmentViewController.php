<?php

namespace App\Http\Controllers\LearnerEnrollment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class LearnerEnrollmentViewController extends Controller
{

        public function learnerEnrollmentView()
{
    $userId = Auth::id();

    

    // Use with('branch') so we can show the branch name on the front end
    $learner = \App\Models\Learners::with('branch')
        ->where('user_id', $userId)
        ->firstOrFail();

    $enrollments = \App\Models\Enrollment::with([
            'program', 
            'enrolledCourses.course', 
            'enrollmentFee.payments' => function($query) {
                // Optional: Ensure we only get successful payments
                $query->orderBy('created_at', 'desc');
            }
        ])
        ->where('learner_id', $learner->id)
        ->get();

    return view("Access.Core.Learner.enrollment_view", compact('learner', 'enrollments'));
}


}