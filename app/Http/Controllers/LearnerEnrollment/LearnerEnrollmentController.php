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
             $programs = Program::all();

            return view('Access.Core.Employer.learner_enrollment', compact('programs'));
        }

        function employerLearnerEnrollmentDataStoreInDB(Request $request)
    {
        $user = Auth::user();

        // validate the request
        $validated = $request->validate([
            'LearnerName'    => 'required|string|max:255',
            'LearnerEmailId'  => 'nullable|email|max:255',
            'LearnerPhoneNo' => 'nullable|string|max:20',
            'ProgramName'    => 'required|string|max:255',
            'ProgramFees'    => 'required|numeric|min:0',
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
        ]);

        return redirect()->back()->with('success', 'Learner enrollment saved successfully!');
    }

public function getEnrolledLearnersByProgram($programName)
{
    try {
        // Remove extra spaces in program name
        $programName = trim($programName);

        Log::info('Fetching learners for program: "' . $programName . '"');

        // Fetch the paginated data
        $learnersPaginator = LearnerCatalog::whereRaw('TRIM(raw_program_name) = ?', [$programName])
            // Select all necessary fields, including 'id' for completeness
            ->select('id', 'raw_learner_name', 'raw_email',  'raw_phone',  'raw_fee_amount', 'status')
            ->paginate(10);
            
        Log::info('Learners found: ' . $learnersPaginator->total());

        // *** CRUCIAL FIX ***
        // Manually convert the collection of Eloquent Models to a simple array 
        // to bypass any underlying serialization issues (like the decimal cast error).
        $learnerData = $learnersPaginator->getCollection()->map(function ($learner) {
            return $learner->toArray();
        })->all();
        
        return response()->json([
            'learners' => $learnerData,
            'total'    => $learnersPaginator->total(),
            'per_page' => $learnersPaginator->perPage(),
        ]);
        
    } catch (\Exception $e) {
        // Improved error logging for future debugging
        Log::error("Final Error on Serialization: " . $e->getMessage() . " - Trace: " . $e->getTraceAsString());
        
        return response()->json([
            'error' => 'Server Error: Could not fetch learners.',
            // Include the message for easier debugging in the Network tab
            'debug_message' => $e->getMessage() 
        ], 500);
    }
}




}