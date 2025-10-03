<?php

namespace App\Http\Controllers\ProgramsCourses;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Program;
use App\Models\Course;
use Illuminate\Http\JsonResponse;

class ProgramsAndCoursesController extends Controller
{

    /**
     * Helper function to normalize any name for uniqueness checking.
     * Converts to lowercase and removes all spaces, preventing client workarounds.
     * @param string $name
     * @return string
     */
    private function normalizeName(string $name): string
    {
        return str_replace(' ', '', strtolower(trim($name)));
    }
    // 1️⃣ Show Program & Course Creation Page
    public function employerProgramAndCourses()
    {
        $user = Auth::user();

        // Get programs created by this employer
        $programs = Program::where('created_by_user_id', $user->id)->get();

        return view('Access.Core.Employer.programs_courses', compact('programs'));
    }

     /**
     * 2️⃣ Handle Program Creation with Normalized Uniqueness Check
     */
    public function employerProgramCreation(Request $request)
    {
        $user = Auth::user();

        $validatedData = $request->validate([
            'ProgramName' => 'required|string|max:255',
            'ProgramDescription' => 'required|string|max:255',
            'ProgramStatus' => 'required|in:0,1',
        ]);

        $rawProgramName = $validatedData['ProgramName'];
        $normalizedName = $this->normalizeName($rawProgramName);
        
        // 1. Check if any other program created by this user has the same normalized name
        $existingProgram = Program::where('created_by_user_id', $user->id)
                                  ->where('normalized_name', $normalizedName)
                                  ->first();

        if ($existingProgram) {
            // Error is passed back to the 'ProgramName' field in the view
           return redirect()->back()->with('error', 'Program name already exist!');
    }
        

        // 2. Create the Program (after ensuring the model is updated with 'normalized_name')
        Program::create([
            'id' => Str::uuid(),
            'program_name' => $rawProgramName, 
            'normalized_name' => $normalizedName, 
            'description' => $validatedData['ProgramDescription'],
            'duration_days' => null,
            'is_active' => $validatedData['ProgramStatus'],
            'created_by_user_id' => $user->id,
        ]);

        return redirect()->back()->with('success', 'Program created successfully!');
    }

    /**
     * 3️⃣ Handle Course Creation with Normalized Uniqueness Check (within Program)
     */
    public function employerCoursesCreation(Request $request)
    {
        $user = Auth::user();

        $validatedData = $request->validate([
            'ProgramId' => 'required|exists:programs,id',
            'CourseName' => 'required|string|max:255',
            'CourseDescription' => 'nullable|string',
            'CourseStatus' => 'required|in:0,1',
        ]);

        $rawCourseName = $validatedData['CourseName'];
        $normalizedName = $this->normalizeName($rawCourseName);

        // 1. Perform Normalized Uniqueness Check
        $existingCourse = Course::where('program_id', $validatedData['ProgramId'])
                                ->where('normalized_name', $normalizedName)
                                ->first();

        if ($existingCourse) {
            // Error is passed back to the 'CourseName' field in the view
            // Error is passed back to the 'ProgramName' field in the view
           return redirect()->back()->with('error', 'Course name already exist!');
        }

        // 2. Create the Course (after ensuring the model is updated with 'normalized_name')
        Course::create([
            'id' => Str::uuid(),
            'program_id' => $validatedData['ProgramId'],
            'course_name' => $rawCourseName,
            'normalized_name' => $normalizedName, 
            'description' => $validatedData['CourseDescription'] ?? null,
            'is_published' => $validatedData['CourseStatus'],
            'created_by_user_id' => $user->id,
        ]);

        return redirect()->back()->with('success', 'Course created successfully!');
    }

   public function getProgramCourses(Request $request, $programId)
{
    $page = $request->get('page', 1); // current page, default 1
    $perPage = 10; // 10 courses per request
    $skip = ($page - 1) * $perPage;

    $courses = Course::where('program_id', $programId)
        ->orderBy('created_at', 'desc')
        ->skip($skip)
        ->take($perPage)
        ->get(['course_name', 'description']);

    $total = Course::where('program_id', $programId)->count();

    return response()->json([
        'courses' => $courses,
        'total' => $total,
        'per_page' => $perPage,
        'current_page' => $page
    ]);
}


}
