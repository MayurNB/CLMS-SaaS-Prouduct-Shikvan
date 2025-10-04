<?php

namespace App\Http\Controllers\LearnerEnrollment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Program;
use App\Models\Course;
use Illuminate\Http\JsonResponse;
use App\Models\LearnerCatalog;
use App\Models\User;
use Illuminate\Support\Facades\Log;


class LearnerEnrollmentController extends Controller
{
    function employerLearnerEnrollment()
    {
        // 1. Fetch general programs (for the enrollment form)
        $programs = Program::all();

        // 2. FIX: Define and assign the missing variable $userProgramsForFilter
        // This securely fetches the distinct program names entered by the current user.
        $userId = Auth::id();
        $userProgramsForFilter = LearnerCatalog::where('created_by', $userId)
            ->selectRaw('TRIM(raw_program_name) as program_name')
            ->distinct()
            ->pluck('program_name')
            ->toArray();
        
        // 3. Pass both variables to the view
        return view('Access.Core.Employer.learner_enrollment', compact('programs', 'userProgramsForFilter'));
    }

    function employerLearnerEnrollmentDataStoreInDB(Request $request)
    {
        $user = Auth::user();

        // validate the request
        $validated = $request->validate([
            'LearnerName'     => 'required|string|max:255',
            'LearnerEmailId'  => 'nullable|email|max:255',
            'LearnerPhoneNo' => 'nullable|string|max:20',
            'ProgramName'     => 'required|string|max:255',
            'ProgramFees'     => 'required|numeric|min:0',
        ]);

        
        // store in learner_catalog
        $learner = LearnerCatalog::create([
            'raw_learner_name' => $validated['LearnerName'],
            'raw_email'        => $validated['LearnerEmailId'],
            'raw_phone'        => $validated['LearnerPhoneNo'],
            'raw_program_name' => $validated['ProgramName'],
            'raw_fee_amount'   => $validated['ProgramFees'],
            'status'           => 'initial_entry',
            'learner_id'       => null, // future linking
            'program_id'       => null, // future linking
            'created_by'       => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Learner enrollment saved successfully!');
    }

public function getEnrolledLearnersByProgram($programName = null)
{
    try {
        $userId = Auth::id();

        // 1️⃣ Get all distinct programs created by the current user
        $myPrograms = LearnerCatalog::where('created_by', $userId)
            ->selectRaw('TRIM(raw_program_name) as program_name')
            ->distinct()
            ->pluck('program_name');

        $learners = [];
        $total = 0;
        $perPage = 10;

        if ($programName) {
            $programName = trim($programName);

            $learnersPaginator = LearnerCatalog::where('created_by', $userId)
                ->whereRaw('TRIM(raw_program_name) = ?', [$programName])
                ->select('id', 'raw_learner_name', 'raw_email', 'raw_phone', 'raw_fee_amount', 'status')
                ->paginate($perPage);
            
            // Getting the current page's items
            $learners = $learnersPaginator->items();
            $total = $learnersPaginator->total();
            $perPage = $learnersPaginator->perPage();
        }

        return response()->json([
            'programs' => $myPrograms,
            'learners' => $learners,
            'total'    => $total,
            'per_page' => $perPage,
        ]);

    } catch (\Exception $e) {
        Log::error("Error fetching programs/learners: " . $e->getMessage() . " Trace: " . $e->getTraceAsString());

        return response()->json([
            'error' => 'Server Error: Could not fetch programs/learners.',
            'debug_message' => $e->getMessage()
        ], 500);
    }
}


}