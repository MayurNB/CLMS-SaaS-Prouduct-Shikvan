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

class BatchLearnerController extends Controller
{
    public function batchLearnerPageShow()
    {
        $branchId = session('activeBranch_id');
        $branch = Branch::findOrFail($branchId);

        $programs = Program::where('institute_id', $branch->institute_id)
            ->where('is_active', 1)
            ->orderBy('program_name')
            ->get();

        return view('Access.Core.Branch_Executive.batch_learner', compact('programs'));
    }

    public function getProgramLearners($programId)
    {
        $branchId = session('activeBranch_id');

        // Fetch Enrollments + Filter the learner's batch by the specific Program ID
        $enrollments = Enrollment::with(['learner.learnerBatches' => function($query) use ($programId) {
                $query->where('program_id', $programId)
                      ->where('status', 'active')
                      ->with('batch'); 
            }])
            ->where('program_id', $programId)
            ->where('branch_id', $branchId)
            ->where('status', 'active')
            ->get();

        // Get only batches belonging to this program
        $batches = Batch::where('program_id', $programId)
            ->where('branch_id', $branchId)
            ->where('status', 'active')
            ->orderBy('batch_name')
            ->get();

        return response()->json([
            'learners' => $enrollments,
            'batches'  => $batches
        ]);
    }

    public function assignBatch(Request $request)
    {
        $request->validate([
            'learner_id' => 'required',
            'program_id' => 'required',
            'batch_id'   => 'required'
        ]);

        $branchId = session('activeBranch_id');
        $branch = Branch::findOrFail($branchId);
        $userId = Auth::id();

        $targetBatch = Batch::findOrFail($request->batch_id);
        if ($targetBatch->current_size >= $targetBatch->max_size) {
            return response()->json(['success' => false, 'message' => 'Error: Selected batch is full!'], 422);
        }

        try {
            DB::transaction(function () use ($request, $branch, $userId, $targetBatch) {
                
                // 1. Deactivate existing active batch ONLY for this specific program
                LearnerBatch::where('learner_id', $request->learner_id)
                    ->where('program_id', $request->program_id)
                    ->where('status', 'active')
                    ->each(function($oldAssignment) {
                        $oldAssignment->update(['status' => 'transferred']);
                        Batch::where('id', $oldAssignment->batch_id)->decrement('current_size');
                    });

                // 2. Create new assignment
                LearnerBatch::create([
                    'id'           => (string) Str::uuid(),
                    'institute_id' => $branch->institute_id,
                    'branch_id'    => $branch->id,
                    'program_id'   => $request->program_id,
                    'batch_id'     => $request->batch_id,
                    'learner_id'   => $request->learner_id,
                    'status'       => 'active',
                    'created_by'   => $userId
                ]);

                // 3. Increment batch count
                $targetBatch->increment('current_size');
            });

            return response()->json(['success' => true, 'message' => 'Batch updated successfully']);

        } catch (\Exception $e) {
            Log::error("Batch Assignment Error: " . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'System error: ' . $e->getMessage()], 500);
        }
    }



    public function learnerBatchView() 
    {
             $userId = Auth :: id();
    
   
    // 1. Identify the Learner
    $learner = \App\Models\Learners::where('user_id', $userId)->firstOrFail();

    // 2. Fetch ALL active batch assignments for this learner
    $activeBatches = \App\Models\LearnerBatch::with(['batch', 'program'])
        ->where('learner_id', $learner->id)
        ->where('status', 'active')
        ->get();
         
    
    
            return view('Access.Core.Learner.batch', compact('learner', 'activeBatches'));

    }
}