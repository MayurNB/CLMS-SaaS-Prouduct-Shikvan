<?php

namespace App\Http\Controllers\Batch;

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

class BatchController extends Controller
{
    /* SHOW PAGE */
    public function batchCreationPageShow()
    {
        $branch = Branch::findOrFail(session('activeBranch_id'));

        $programs = Program::where([
            'is_active'     => 1,
            'institute_id' => $branch->institute_id
        ])->orderBy('program_name')->get();


        // Get batches linked to this branch
    $batches = Batch::where('branch_id', $branch->id)
                    ->with('program') // load program relationship
                    ->orderBy('created_at', 'desc')
                    ->get();

        return view(
            'Access.Core.Branch_Executive.batch_creation',
            compact('programs','batches')
        );
    }

    /* STORE */
    public function batchDataStore(Request $request)
    {
        $request->validate([
            'program_id'   => 'required',
            'batch_code'   => 'required|max:50',
            'batch_name'   => 'required|max:150',
            'max_size'     => 'required|integer|min:1',
            'start_date'   => 'required|date',
            'end_date'     => 'required|date|after_or_equal:start_date',
            'academic_year'=> 'required',
            'batch_type'   => 'required',
        ]);

        $branch = Branch::findOrFail(session('activeBranch_id'));

        Batch::create([
            'id'            => (string) Str::uuid(),
            'institute_id'  => $branch->institute_id,
            'branch_id'     => $branch->id,
            'program_id'    => $request->program_id,
            'batch_code'    => $request->batch_code,
            'batch_name'    => $request->batch_name,
            'description'   => $request->description,
            'max_size'      => $request->max_size,
            'start_date'    => $request->start_date,
            'end_date'      => $request->end_date,
            'academic_year' => $request->academic_year,
            'batch_type'    => $request->batch_type,
            'status'        => 'active',
            'created_by'    => Auth::id(),
        ]);

        return back()->with('success', 'Batch created successfully.');
    }
}