<?php

namespace App\Http\Controllers\ProgramsCourses;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Program;
use App\Models\Tag;
use App\Models\ProgramPrice;
use App\Models\DiscountOffer;
use App\Models\EmployerProfile;
use App\Models\Course;

class ProgramsAndCoursesController extends Controller
{
    /**
     * Helper function to normalize any name for uniqueness checking.
     */
    private function normalizeName(string $name): string
    {
        return str_replace(' ', '', strtolower(trim($name)));
    }

    /**
     * Show Program & Course Creation Page
     */
    public function employerProgramAndCourses()
{
    $user = Auth::user();

    // Correctly get the institute ID via employer profile
    $instituteId = $user->employerProfile?->institute?->id;

    if (!$instituteId) {
        return back()->with('error', 'No institute found for this employer.');
    }

    // Fetch all programs for this institute
    $programs = Program::where('institute_id', $instituteId)
        ->orderBy('created_at', 'desc')
        ->paginate(10); // or ->get() for all without pagination

        //dd($programs);
    return view('Access.Core.Employer.programs_courses', compact('programs'));
}


public function branchExecutiveProgramAndCourses()
{
    $user = Auth::user();

    // Correctly get the institute ID via employer profile
    $instituteId = $user->branchRoles()
                    ->with('branch.institute')
                    ->first()?->branch?->institute?->id;

    if (!$instituteId) {
        return back()->with('error', 'No institute found for this employer.');
    }

    // Fetch all programs for this institute
    $programs = Program::where('institute_id', $instituteId)
        ->orderBy('created_at', 'desc')
        ->paginate(10); // or ->get() for all without pagination

        //dd($programs);
    return view('Access.Core.Branch_Executive.programs_courses', compact('programs'));
}

public function show($id)
{
     $program = Program::find($id);

    if (!$program) {
        return response()->json(['success' => false, 'message' => 'Program not found.'], 404);
    }

    return response()->json(['success' => true, 'program' => $program]);
}


    /**
     * Handle Program Creation with Dynamic Tags, Prices, Discounts & Multiple Courses
     */
    public function employerProgramCreation(Request $request)
    {
        $user = Auth::user();

        

       
            $validated = $request->validate([
    'program_name' => 'required|string|max:255',
    'description' => 'nullable|string',
    'is_active' => 'required|boolean',
    'duration_days' => 'nullable|integer|min:0',

    'tags' => 'nullable|array',
    'tags.*.name' => 'required_with:tags|string|max:255',
    'tags.*.type' => 'nullable|string|max:255',
    'tags.*.description' => 'nullable|string',

    'prices' => 'nullable|array',
    'prices.*.price_type' => 'required_with:prices|string|max:255',
    'prices.*.base_price' => 'nullable|numeric|min:0',
    'prices.*.internal_notes' => 'nullable|string',
    'prices.*.is_active' => 'nullable|boolean',

    'discounts' => 'nullable|array',
    'discounts.*.name' => 'required_with:discounts|string|max:255',
    'discounts.*.description_public' => 'nullable|string',
    'discounts.*.description_internal' => 'nullable|string',
    'discounts.*.type' => 'nullable|string|max:50',
    'discounts.*.value' => 'nullable|numeric',
    'discounts.*.start_date' => 'nullable|date',
    'discounts.*.end_date' => 'nullable|date',
    'discounts.*.is_active' => 'nullable|boolean',

    'courses' => 'nullable|array',
    'courses.*.course_name' => 'required_with:courses|string|max:255',
    'courses.*.description' => 'nullable|string',
    'courses.*.thumbnail_url' => 'nullable|string|max:255',
    'courses.*.price' => 'nullable|numeric|min:0',
    'courses.*.is_published' => 'required_with:courses|in:0,1',
]);

       


        //dd($validated);

        try {
            // Get employer profile and institute
            $employerProfile = $user->employerProfile;
            if (!$employerProfile) {
                return back()->with('error', 'Employer profile not found.');
            }

            $institute = $employerProfile->institute;
            if (!$institute) {
                return back()->with('error', 'Institute not found for this employer.');
            }

            // Create Program
            $program = Program::create([
                'id' => Str::uuid(),
                'institute_id' => $institute->id,
                'program_name' => $validated['program_name'],
                'description' => $validated['description'] ?? null,
                'duration_days' => $validated['duration_days'] ?? null,
                'is_active' => $validated['is_active'] ?? 1,
            ]);

            // Save Tags
            if (!empty($validated['tags'])) {
                foreach ($validated['tags'] as $tagData) {
                    if (empty($tagData['name'])) continue;

                    $tag = Tag::firstOrCreate([
                        'name' => $tagData['name'],
                        'type' => $tagData['type'] ?? null,
                        'description' => $tagData['description'] ?? null,
                        'institute_id' => $institute->id,
                    ]);

                    DB::table('program_tags')->insert([
                        'program_id' => $program->id,
                        'tag_id' => $tag->id,
                        'created_at' => now(),
                    ]);
                }
            }

            // Save Prices
            if (!empty($validated['prices'])) {
                foreach ($validated['prices'] as $priceData) {
                    if (empty($priceData['price_type'])) continue;

                    ProgramPrice::create([
                        'id' => Str::uuid(),
                        'program_id' => $program->id,
                        'price_type' => $priceData['price_type'],
                        'base_price' => $priceData['base_price'] ?? 0,
                        'internal_notes' => $priceData['internal_notes'] ?? null,
                        'institute_id' => $institute->id,
                        'is_active' => $priceData['is_active'] ?? 1,
                    ]);
                }
            }

            // Save Discounts
            if (!empty($validated['discounts'])) {
                foreach ($validated['discounts'] as $discountData) {
                    if (empty($discountData['name'])) continue;

                    DiscountOffer::create([
                        'id' => Str::uuid(),
                        'program_id' => $program->id,
                        'name' => $discountData['name'],
                        'description_public' => $discountData['description_public'] ?? null,
                        'description_internal' => $discountData['description_internal'] ?? null,
                        'type' => $discountData['type'] ?? 0,
                        'value' => $discountData['value'] ?? 0,
                        'start_date' => $discountData['start_date'] ?? null,
                        'end_date' => $discountData['end_date'] ?? null,
                        'institute_id' => $institute->id,
                        'is_active' => $discountData['is_active'] ?? 1,
                    ]);
                }
            }

            // Save Courses (dynamic multiple)
            if (!empty($validated['courses'])) {
                foreach ($validated['courses'] as $courseData) {
                    $normalizedName = $this->normalizeName($courseData['course_name']);

                    $existingCourse = Course::where('program_id', $program->id)
                        ->where('normalized_name', $normalizedName)
                        ->first();

                    if ($existingCourse) continue; // skip duplicates

                    Course::create([
                        'id' => Str::uuid(),
                        'program_id' => $program->id,
                        'course_name' => $courseData['course_name'],
                        'normalized_name' => $normalizedName,
                        'description' => $courseData['description'] ?? null,
                        'thumbnail_url' => $courseData['thumbnail_url'] ?? null,
                        'price' => $courseData['price'] ?? null,
                        'is_published' => $courseData['is_published'],
                        'created_by_user_id' => $user->id,
                        'institute_id' => $program->institute_id, // ✅ Add this
                    ]);
                }
            }

            return back()->with('success', 'Program, courses, and related data created successfully!');

        } catch (\Exception $e) {
            return back()->with('error', 'Unexpected error: ' . $e->getMessage());
        }
    }


    /**
 * Handle Program Update with Dynamic Tags, Prices, Discounts & Multiple Courses
 */
public function employerProgramUpdate(Request $request, $programId)
{
    $user = Auth::user();
    $instituteId = $user->employerProfile?->institute?->id;

    if (!$instituteId) {
        return back()->with('error', 'No institute found for this employer.');
    }

    //dd($request);

    // 1. Validate the incoming request data
    $validated = $request->validate([
        'program_name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'is_active' => 'required|boolean',
        'duration_days' => 'nullable|integer|min:0',
        
        // Validation for sub-data (only fields for *new/existing* items are needed here)
        'tags' => 'nullable|array',
        'tags.*.name' => 'required_with:tags|string|max:255',
        'prices' => 'nullable|array',
        'prices.*.id' => 'nullable|string|max:36', // Expect existing price ID for update/sync
        'prices.*.price_type' => 'required_with:prices|string|max:255',
        'prices.*.base_price' => 'required_with:prices|numeric|min:0',
        'prices.*.is_active' => 'required_with:prices|boolean',

        'discounts' => 'nullable|array',
        'discounts.*.id' => 'nullable|string|max:36', // Expect existing discount ID
        'discounts.*.name' => 'required_with:discounts|string|max:255',
        'discounts.*.value' => 'required_with:discounts|numeric|min:0',
        'discounts.*.type' => 'required_with:discounts|in:0,1',
        
        'courses' => 'nullable|array',
        'courses.*.id' => 'nullable|string|max:36', // Expect existing course ID
        'courses.*.course_name' => 'required_with:courses|string|max:255',
        'courses.*.description' => 'nullable|string',
        'courses.*.is_published' => 'required_with:courses|in:0,1',
    ]);

    try {
        // Find the program and ensure it belongs to the institute
        $program = Program::where('id', $programId)
                          ->where('institute_id', $instituteId)
                          ->firstOrFail();

        // 2. Update Program Details
        $program->update([
            'program_name' => $validated['program_name'],
            'description' => $validated['description'] ?? null,
            'duration_days' => $validated['duration_days'] ?? null,
            'is_active' => $validated['is_active'] ?? 1,
        ]);

        // --- 3. Sync/Update Related Data ---

        // A. Update/Create Prices and Delete missing ones
        $this->syncProgramRelations($program, $validated['prices'] ?? [], ProgramPrice::class, 'program_id');

        // B. Update/Create Discounts and Delete missing ones
        $this->syncProgramRelations($program, $validated['discounts'] ?? [], DiscountOffer::class, 'program_id');

        // C. Update/Create Courses and Delete missing ones
        // Note: For Courses, you may want a more complex sync (e.g., check 'normalized_name')
        $this->syncProgramRelations($program, $validated['courses'] ?? [], Course::class, 'program_id', function(&$data) {
            // Add normalized name before update/create
            $data['normalized_name'] = $this->normalizeName($data['course_name']);
        });

        // D. Sync Tags (Assumes ProgramTag pivot table)
        // Collect all tag names from the request
        $tagNames = collect($validated['tags'] ?? [])->pluck('name')->filter()->unique();
        $tagIds = [];

        foreach ($tagNames as $tagName) {
            // Find or create the tag globally/at institute level
            $tag = Tag::firstOrCreate(
                ['name' => $tagName, 'institute_id' => $instituteId],
                ['type' => null, 'description' => null]
            );
            $tagIds[] = $tag->id;
        }
        
        // Sync the program_tags pivot table (detach missing, attach new)
        $program->tags()->sync($tagIds);


        return response()->json(['success' => true, 'message' => 'Program updated successfully!']);

    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => 'Update failed: ' . $e->getMessage()], 500);
    }
}


/**
 * Helper to sync related models (Prices, Discounts, Courses).
 * This will update existing records (if ID is present) or create new ones.
 * Records that existed in the database but are NOT in the request will be deleted.
 */
private function syncProgramRelations($program, array $requestData, string $modelClass, string $foreignKey, ?callable $beforeSave = null)
{
    // ✅ 1. Get all existing records for this program
    $existingItems = $modelClass::where($foreignKey, $program->id)->get();
    $currentDbIds = $existingItems->pluck('id')->toArray();
    $itemsToKeep = [];

    foreach ($requestData as $data) {
        // Run before-save callback (if provided)
        if ($beforeSave) {
            $beforeSave($data);
        }

        if (isset($data['id']) && in_array($data['id'], $currentDbIds)) {
            // ✅ Update existing
            $item = $modelClass::find($data['id']);
            if ($item) {
                $item->update($data);
                $itemsToKeep[] = $item->id;
            }
        } else {
            // ✅ Create new
            $data['id'] = $data['id'] ?? (string) Str::uuid();
            $data[$foreignKey] = $program->id;
            $data['institute_id'] = $program->institute_id ?? null;

            $item = $modelClass::create($data);
            $itemsToKeep[] = $item->id;
        }
    }

    // ✅ Delete any removed items
    $itemsToDelete = array_diff($currentDbIds, $itemsToKeep);
    if (!empty($itemsToDelete)) {
        $modelClass::whereIn('id', $itemsToDelete)->delete();
    }
}
    /**
     * Get courses for a program (AJAX)
     */
    public function getProgramCourses(Request $request, $programId)
{
    $user = Auth::user();
    $instituteId = $user->employerProfile?->institute?->id;

    if (!$instituteId) {
        return response()->json([
            'success' => false,
            'message' => 'No institute found for this employer.'
        ]);
    }

    // Only fetch courses of the requested program
    $courses = Course::where('program_id', $programId)
        ->where('institute_id', $instituteId)
        ->get(); // or paginate if needed

    return response()->json([
        'success' => true,
        'courses' => $courses
    ]);
}

    
    /**
 * Get program details with all related data (AJAX)
 */

    public function getProgramDetails($programId) 
{
    try {
        // Fetch the program and its relationships (tags, prices, etc.)
        $program = Program::with(['tags', 'prices', 'discounts', 'courses'])
                            ->findOrFail($programId);

        // ✅ CORRECT: Return a JSON structure with 'success' and 'program' keys
        return response()->json([
            'success' => true,
            'program' => $program
        ], 200);

    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        return response()->json([
            'success' => false,
            'message' => 'Program not found.'
        ], 404);
    } catch (\Exception $e) {
        // This handles unexpected errors, preventing a 500 error in the AJAX response
        return response()->json([
            'success' => false,
            'message' => 'An internal server error occurred while fetching details.'
        ], 500);
    }
}




// Add Course
public function addCourse(Request $request){
    $validated = $request->validate([
        'program_id'=>'required|exists:programs,id',
        'course_name'=>'required|string|max:255',
        'description'=>'nullable|string',
        'is_published'=>'required|in:0,1'
    ]);

    $course = Course::create([
        'id'=>Str::uuid(),
        'program_id'=>$validated['program_id'],
        'course_name'=>$validated['course_name'],
        'normalized_name'=>str_replace(' ','',strtolower($validated['course_name'])),
        'description'=>$validated['description'] ?? null,
        'is_published'=>$validated['is_published'],
        'created_by_user_id'=>Auth::id(),
        'institute_id'=>Auth::user()->employerProfile->institute_id,
    ]);

    return response()->json(['success'=>true,'course'=>$course]);
}

// Add Price
public function addPrice(Request $request){
    $validated = $request->validate([
        'program_id'=>'required|exists:programs,id',
        'price_type'=>'required|string|max:255',
        'base_price'=>'required|numeric|min:0',
    ]);

    $price = ProgramPrice::create([
        'id'=>Str::uuid(),
        'program_id'=>$validated['program_id'],
        'price_type'=>$validated['price_type'],
        'base_price'=>$validated['base_price'],
        'institute_id'=>Auth::user()->employerProfile->institute_id,
        'is_active'=>1
    ]);

    return response()->json(['success'=>true,'price'=>$price]);
}

// Add Discount
public function addDiscount(Request $request){
    $validated = $request->validate([
        'program_id'=>'required|exists:programs,id',
        'name'=>'required|string|max:255',
        'value'=>'required|numeric|min:0',
        'type'=>'required|in:0,1',
    ]);

    $discount = DiscountOffer::create([
        'id'=>Str::uuid(),
        'program_id'=>$validated['program_id'],
        'name'=>$validated['name'],
        'value'=>$validated['value'],
        'type'=>$validated['type'],
        'institute_id'=>Auth::user()->employerProfile->institute_id,
        'is_active'=>1
    ]);

    return response()->json(['success'=>true,'discount'=>$discount]);
}

// Add Tag
public function addTag(Request $request){
    $validated = $request->validate([
        'program_id'=>'required|exists:programs,id',
        'name'=>'required|string|max:255',
    ]);

    $tag = Tag::firstOrCreate([
        'name'=>$validated['name'],
        'institute_id'=>Auth::user()->employerProfile->institute_id,
    ]);

    DB::table('program_tags')->insert([
        'program_id'=>$validated['program_id'],
        'tag_id'=>$tag->id,
        'created_at'=>now()
    ]);

    return response()->json(['success'=>true,'tag'=>$tag]);
}






/******************************************************************************/


public function employerNewProgramAndCourses()
{
        
    $user = Auth::user();

    // Correctly get the institute ID via employer profile
    $instituteId = $user->employerProfile?->institute?->id;

    if (!$instituteId) {
        return back()->with('error', 'No institute found for this employer.');
    }

    // Fetch all programs for this institute
    $programs = Program::where('institute_id', $instituteId)
        ->orderBy('created_at', 'desc')
        ->paginate(10); // or ->get() for all without pagination

        //dd($programs);
    
    return view('Access.Core.Employer.new_programs_courses', compact('programs'));
}




/****************************************************************************/
























}
