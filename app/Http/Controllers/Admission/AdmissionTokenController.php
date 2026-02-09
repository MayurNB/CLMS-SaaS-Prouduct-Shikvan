<?php

namespace App\Http\Controllers\Admission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
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


use App\Models\AdmissionFormConfig; // Ensure this model exists

use App\Models\AdmissionToken;

class AdmissionTokenController extends Controller
{
    /**
     * Show token page + list
     */
    public function branchAdmissionTokenPageShow()
    {
        $branch = Branch::findOrFail(session('activeBranch_id'));

        $tokens = AdmissionToken::where('branch_id', $branch->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view(
            'Access.Core.Branch_Executive.admission_token',
            compact('tokens')
        );
    }

    /**
     * Generate new admission token
     */
    public function generateToken(Request $request)
    {
        $branch = Branch::findOrFail(session('activeBranch_id'));

        AdmissionToken::create([
            'id' => (string) Str::uuid(),
            'token' => strtoupper('ADM-' . Str::random(6)),
            'institute_id' => $branch->institute_id,
            'branch_id' => $branch->id,
            'status' => 'active',
            'expires_at' => Carbon::now()->addHours(24),
            'created_by' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Admission token generated successfully.');
    }
}