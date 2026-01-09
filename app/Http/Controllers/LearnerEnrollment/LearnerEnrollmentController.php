<?php

namespace App\Http\Controllers\LearnerEnrollment;
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
use Carbon\Carbon;


class LearnerEnrollmentController extends Controller
{
    /**
     * Display the enrollment form view.
     */
    function employerLearnerEnrollment()
    {
        // 1. Fetch programs from the canonical Programs table (for the enrollment form)
        $programs = Program::all(); 

        // 2. Fetch the program names currently used in enrollments by this user (for filtering)
        $userId = Auth::id();
        
        // --- FIX APPLIED HERE ---
        // Changed programs.name to programs.program_name
        $userProgramsForFilter = DB::table('learners')
            ->where('learners.created_by', $userId)
            ->join('enrollments', 'learners.learner_code', '=', 'enrollments.learner_id')
            ->join('programs', 'enrollments.program_id', '=', 'programs.id')
            ->selectRaw('TRIM(programs.program_name) as program_name') // <--- CORRECTED COLUMN NAME
            ->distinct()
            ->pluck('program_name')
            ->toArray();
        // -------------------------
        
        // 3. Pass both variables to the view
        return view('Access.Core.Employer.learner_enrollment', compact('programs', 'userProgramsForFilter'));
    }

    /**
     * Store learner identity, enrollment, fees, and initial payment in the normalized tables.
     */
    function employerLearnerEnrollmentDataStoreInDB(Request $request)
    {
        $user = Auth::user();

        // 1. Validate the request data
        $validated = $request->validate([
            'LearnerName'    => 'required|string|max:255',
            'LearnerEmailId' => 'nullable|email|max:255',
            'LearnerPhoneNo' => 'nullable|string|max:20',
            // We need the ID of the Program, but the user is sending 'ProgramName'.
            'ProgramName'    => 'required|string|max:255', 
            'ProgramFees'    => 'required|numeric|min:0',
            'PaidFees'       => 'required|numeric|min:0',
        ]);
        
        // --- Transaction ensures all 4 records (Learner, Enrollment, Fee, Payment) are created or none are ---
        try {
            DB::beginTransaction();

            // --- A. Prepare Core IDs ---
            // 🚨 CRITICAL: Look up the real Program ID based on the name sent by the form.
            // NOTE: The `firstOrCreate` logic here uses the 'name' field in the array, 
            // but the model uses 'program_name'. To prevent future errors, the model's 
            // $fillable array should be updated, or this code should use 'program_name'.
            // Based on the Program model:
            $program = Program::firstOrCreate(
                ['program_name' => trim($validated['ProgramName'])], // Use program_name
                [
                    'id' => (string) Str::uuid(),
                    // Add other required fields if using firstOrCreate on a Program model
                    'created_by_user_id' => Auth::id(), // Must satisfy NOT NULL
                ]
            );
            $programId = $program->id;
            
            // 🚨 CRITICAL: Placeholder for Branch ID. This must be dynamically determined.
            $branchId = 'b079a4e0-5e3e-4d4b-9d8a-9c7621c4b78c'; 

            // --- B. 1st Table: Create Learner Identity (learners) ---
            $learnerCode = 'LRN-' . time() . rand(100, 999);
            $learner = Learners::create([
                'raw_learner_name' => $validated['LearnerName'],
                'raw_email'        => $validated['LearnerEmailId'],
                'raw_phone'        => $validated['LearnerPhoneNo'],
                'status'           => 'initial_entry',
                // learner_code is the business ID, used as FK in enrollments
                'learner_code'     => $learnerCode, 
                'created_by'       => Auth::id(),
            ]);

            // --- C. 2nd Table: Create Enrollment Contract (enrollments) ---
            $enrollmentId = (string) Str::uuid();
            $enrollment = Enrollment::create([
                'id'              => $enrollmentId,
                'learner_id'      => $learner->learner_code, // Use learner_code as FK
                'program_id'      => $programId, 
                'branch_id'       => $branchId,
                'enrollment_date' => now()->toDateString(),
                'status'          => 'active',
            ]);

            // --- D. 3rd Table: Create Enrollment Financial Summary (enrollment_fees) ---
            $enrollmentFeeId = (string) Str::uuid();
            $paidAmount = $validated['PaidFees'];
            $totalCharged = $validated['ProgramFees'];
            $feeStatus = ($paidAmount >= $totalCharged) ? 'paid' : 'partial';

            $enrollmentFee = EnrollmentFee::create([
                'id'                 => $enrollmentFeeId,
                'enrollment_id'      => $enrollmentId,
                'total_fee_charged'  => $totalCharged,
                'paid_amount'        => $paidAmount,
                'discount_applied'   => 0.00, // Assuming no discount on initial entry
                'fee_status'         => $feeStatus,
            ]);

            // --- E. 4th Table: Record Initial Payment Transaction (payments) ---
            if ($paidAmount > 0) {
                Payment::create([
                    'id'             => (string) Str::uuid(),
                    'amount'         => $paidAmount,
                    'payment_method' => 'Initial Entry', // Or map to a real method
                    'transaction_id' => 'INIT-' . Str::random(10),
                    'status'         => 'completed', 
                    // Polymorphic link to the EnrollmentFee record
                    'payable_id'     => $enrollmentFeeId,
                    'payable_type'   => 'App\Models\EnrollmentFee', 
                ]);
            }
            
            DB::commit();

            return redirect()->back()->with('success', 'Learner enrollment saved successfully! All associated records (Enrollment, Fees, Payment) created.');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Enrollment failed: " . $e->getMessage() . " Trace: " . $e->getTraceAsString());
            return redirect()->back()->with('error', 'Enrollment failed due to a database error. Please check logs.');
        }
    }

    /**
     * API endpoint to get enrolled learners filtered by program name.
     */
    public function getEnrolledLearnersByProgram($programName = null)
    {
        try {
            $userId = Auth::id();

            // 1️⃣ Get all distinct programs created by the current user (using normalization)
            $myPrograms = DB::table('learners')
                ->where('learners.created_by', $userId)
                ->join('enrollments', 'learners.learner_code', '=', 'enrollments.learner_id')
                ->join('programs', 'enrollments.program_id', '=', 'programs.id')
                ->selectRaw('TRIM(programs.program_name) as program_name') // <--- CORRECTED COLUMN NAME
                ->distinct()
                ->pluck('program_name');

            $learners = [];
            $total = 0;
            $perPage = 10;
            
            if ($programName) {
                $programName = trim($programName);

                // 2️⃣ Fetch Learner and Fee details by joining the required tables
                $baseQuery = DB::table('learners')
                    ->where('learners.created_by', $userId)
                    ->join('enrollments', 'learners.learner_code', '=', 'enrollments.learner_id')
                    ->join('enrollment_fees', 'enrollments.id', '=', 'enrollment_fees.enrollment_id')
                    ->join('programs', 'enrollments.program_id', '=', 'programs.id')
                    ->whereRaw('TRIM(programs.program_name) = ?', [$programName]) // <--- CORRECTED COLUMN NAME
                    ->select(
                        'learners.id', 
                        'learners.raw_learner_name', 
                        'learners.raw_email', 
                        'learners.raw_phone', 
                        'enrollment_fees.total_fee_charged as raw_fee_amount', 
                        'enrollment_fees.paid_amount', 
                        'enrollments.status' // Enrollment status is more relevant
                    );

                // Apply pagination
                $learnersPaginator = $baseQuery->paginate($perPage);

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

    function branchExecutiveLearnerEnrollment()
    {
        // Fetch learners created by this branch executive
    $userId = Auth::user();

   

   


    //dd($userId);

    // Get learners associated with this branch executive
   $learners = \App\Models\Learners::where('created_by', $userId->id)->get();

   

   

  // dd($UserBranchRoles->branch_id);

   $Branches = Branch :: where ('id', session('activeBranch_id'))->first();

   //dd($Branches);

   






    //dd($learners);

    // Get active programs for this branch executive's institute
$programs = Program::where('is_active', 1)
    ->where('institute_id', $Branches->institute_id)
    ->get();


    $discounts_offers = \App\Models\DiscountOffer::where('institute_id',$Branches->institute_id)->get();

    // Pass data to view
    return view('Access.Core.Branch_Executive.learner_enrollment', compact('learners', 'programs','discounts_offers'));
    }


// Learner creation function step 1 learner creation :

public function storeLearner(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name'  => 'required|string|max:100',
            'gender'     => 'nullable|string|max:20',
            'email'      => 'required|email|max:255|unique:users,email',
            'phone'      => 'required|string|max:20',
        ]);

        DB::beginTransaction();
        try {
            $currentUser = Auth::user();

            // 1️⃣ Get current branch executive's branch_id
            $branchRole = UserBranchRole::where('user_id', $currentUser->id)
                ->where('branch_id',session('activeBranch_id'))
                ->where('is_active', 1)
                ->first();

            if (!$branchRole) {
                throw new \Exception("No active branch found for current user.");
            }

            $branchId = $branchRole->branch_id;

            // 2️⃣ Get learner role_id
            $learnerRoleId = DB::table('roles')
                ->where('name', 'Learner')
                ->where('status', 'Active')
                ->value('role_id');

            if (!$learnerRoleId) {
                throw new \Exception("Learner role not found in roles table.");
            }

            // 3️⃣ Create new user (Learner)
            $userId = (string) Str::uuid();
            $username = strtolower($validated['first_name'] . '.' . $validated['last_name']) . rand(100, 999);

            DB::table('users')->insert([
                'id' => $userId,
                'name' => trim($validated['first_name'] . ' ' . $validated['last_name']),
                'email' => $validated['email'],
                'username' => $username,
                'password' => bcrypt('Password@123'), // default password
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // 4️⃣ Assign role (Learner)
            DB::table('user_roles')->insert([
                'user_id' => $userId,
                'role_id' => $learnerRoleId,
                'status'  => 'active',
                'assigned_by' => $currentUser->id,
                'activated_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // 5️⃣ Assign branch role
            DB::table('user_branch_roles')->insert([
                'id' => (string) Str::uuid(),
                'user_id' => $userId,
                'branch_id' => $branchId,
                'role_id' => $learnerRoleId,
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // 6️⃣ Create user profile
            DB::table('user_profiles')->insert([
                'id' => (string) Str::uuid(),
                'user_id' => $userId,
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'gender' => $validated['gender'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // 7️⃣ Create learner entry
            $learnerCode = 'LRN-' . strtoupper(Str::random(6));
            DB::table('learners')->insert([
                'id' => (string) Str::uuid(),
                'raw_learner_name' => trim($validated['first_name'] . ' ' . $validated['last_name']),
                'raw_email' => $validated['email'],
                'raw_phone' => $validated['phone'],
                'status' => 'initial_entry',
                'user_id' => $userId,
                'learner_code' => $learnerCode,
                'created_by' => $currentUser->id,
                'branch_id' => $branchId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Learner successfully created!');
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('Learner creation failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed: ' . $e->getMessage());
        }
    }


    // learner creation above fucntion











     // ✅ List all programs available for the logged-in Branch Executive
    // List all programs for logged branch executive
    public function listPrograms()
{
    try {
        $user = Auth::user();

        // ✅ Try to find branch role
        $userBranchRole = UserBranchRole::where('user_id', $user->id)->first();

        if (!$userBranchRole) {
            Log::warning("No branch role found for user {$user->id}");
            return response()->json(['status' => 'error', 'message' => 'Branch not assigned.'], 400);
        }

        // ✅ Find branch
        $branch = Branch::where('id', $userBranchRole->branch_id)->first();
        if (!$branch) {
            Log::warning("No branch found for role {$userBranchRole->branch_id}");
            return response()->json(['status' => 'error', 'message' => 'Branch not found.'], 400);
        }

        $instituteId = $branch->institute_id;

        // ✅ Fetch active programs for this institute
        $programs = Program::where('institute_id', $instituteId)
            ->where('is_active', 1)
            ->select('id', 'program_name', 'description', 'duration_days')
            ->get();

        if ($programs->isEmpty()) {
            Log::info("No programs found for institute: {$instituteId}");
        }

        return response()->json([
            'status' => 'success',
            'data' => $programs,
        ]);

    } catch (\Exception $e) {
        Log::error("Program list error: " . $e->getMessage());
        return response()->json(['status' => 'error', 'message' => 'Server error.'], 500);
    }
}






    // ✅ Fetch single program with courses, fees, and discounts
    // Get details of a specific program
    public function programDetails($id)
    {
        $program = Program::find($id);

        if (!$program) {
            return response()->json(['success' => false, 'message' => 'Program not found.']);
        }

        $courses = Course::where('program_id', $id)->where('is_published', 1)->get();
        $programPrices = ProgramPrice::where('program_id', $id)->where('is_active', 1)->get();
        $discounts = DiscountOffer::where('program_id', $id)->where('is_active', 1)->get();

        return response()->json([
            'success' => true,
            'program' => $program,
            'courses' => $courses,
            'program_prices' => $programPrices,
            'discounts' => $discounts
        ]);
    }

    // Main store method
    // Store enrollment
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:120',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'paid_amount' => 'required|numeric|min:0',
            'total_amount' => 'required|numeric|min:0',
        ]);

        DB::beginTransaction();
        try {
            $user = Auth::user();
            $branchRole = UserBranchRole::where('user_id', $user->id)->first();
            if (!$branchRole) {
                throw new \Exception('Branch role not found.');
            }
            $branch = Branch::find($branchRole->branch_id);
            if (!$branch) {
                throw new \Exception('Branch not found.');
            }

            // Create learner
            $learner = Learners::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'gender' => $request->gender,
                'email' => $request->email,
                'phone' => $request->phone,
                'created_by' => $user->id,
                'institute_id' => $branch->institute_id,
                'branch_id' => $branch->id,
            ]);

            // Enroll for each program
            if ($request->has('selected_programs')) {
                foreach ($request->selected_programs as $pid) {
                    $enroll = Enrollment::create([
                        'learner_id' => $learner->learner_code ?? $learner->id,
                        'program_id' => $pid,
                        'total_amount' => $request->total_amount,
                        'paid_amount' => $request->paid_amount,
                        'remaining_amount' => $request->remaining_amount,
                        'payment_method' => $request->payment_method,
                        'transaction_id' => $request->transaction_id,
                        'paid_at' => $request->paid_at,
                    ]);
                }
            }

            DB::commit();
            return redirect()->back()->with('success', 'Enrollment successfully saved!');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    // 🟢 Step 1: Show form for creating enrollment
    public function showEnrollmentForm()
    {
          $userId = Auth::user();

   $learners = \App\Models\Learners::where('created_by', $userId->id)->get();
        $programs = Program::where('is_active', 1)->get();
        return view('enrollments.create', compact('programs'));
    }

    public function fetchProgramCourses($program_id)
{
    $courses = Course::where('program_id', $program_id)
        ->where('is_published', 1) // only published courses
        ->select('id', 'course_name')
        ->get();

    return response()->json($courses);
}

    // 🟢 Step 3: Store enrollment and linked data
    public function saveEnrollment(Request $request)
{

    //dd($request);
    $user = Auth::user();
    $branchId = session('activeBranch_id');


    $request->validate([
        'learner_id' => 'required|uuid|exists:learners,id',
        'program_id' => 'required|uuid|exists:programs,id',
        'course_ids' => 'required|array|min:1',
        'course_ids.*' => 'uuid|exists:courses,id',
    ]);


    $existingEnrollment = Enrollment::where('learner_id', $request->learner_id)
    ->where('program_id', $request->program_id)
    ->where('branch_id', $branchId)
    ->where('status', 'active') // program already active
    ->first();

// This variable will be NULL unless record exists
$EnrollmentIdAlwaysNull = $existingEnrollment ? $existingEnrollment->id : null;

if ($EnrollmentIdAlwaysNull !== null) {
    return back()->with('error', 'This learner already has an active enrollment for this program.');
}
      

    // ✅ Create enrollment
    $enrollment = Enrollment::create([
        'learner_id' => $request->learner_id,
        'program_id' => $request->program_id,
        'branch_id' => $branchId,
        'enrollment_date' => now(),
        'status' => 'active',
     
    ]);

    // ✅ Attach selected courses
    foreach ($request->course_ids as $courseId) {
        EnrolledCourse::create([
            'enrollment_id' => $enrollment->id,
            'course_id' => $courseId,
            'status' => 'in_progress',
        ]);
    }

    // ✅ Calculate total fees

  
$ProgramPrice = ProgramPrice::where('program_id', $request->program_id)->first();


    //dd($ProgramPrice->base_price);

    $total1 = $ProgramPrice->base_price;

    $total2 = Course::whereIn('id', $request->course_ids)->sum('price');

   $total = ($total1 + $total2);

    EnrollmentFee::create([
        'enrollment_id' => $enrollment->id,
        'total_fee_charged' => $total,
        'paid_amount' => 0,
        'discount_applied' => 0,
        'fee_status' => 'pending',
    ]);

    // ✅ Optionally mark learner as enrolled
    //Learners::where('id', $request->learner_id)->update(['status' => 'enrolled']);

    return redirect()->back()->with('success', 'Enrollment created successfully!');
}


public function getEnrollmentDetails(Request $request)
{
    $learnerId = $request->query('learner_id');

    $enrollment = DB::table('enrollments')
        ->join('learners', 'learners.id', '=', 'enrollments.learner_id')
        ->join('programs', 'programs.id', '=', 'enrollments.program_id')
        ->leftJoin('program_prices', 'program_prices.program_id', '=', 'programs.id')
        ->leftJoin('discounts_offers', 'discounts_offers.program_id', '=', 'programs.id')
        ->select(
            'learners.raw_learner_name as learner_name',
            'learners.raw_email as learner_email',
            'learners.raw_phone as learner_phone',
            'programs.id as program_id',
            'programs.program_name',
            'programs.description',
            'program_prices.base_price as program_price',
            'discounts_offers.value as discount_value',
            'enrollments.status as enrollment_status'
        )
        ->where('learners.id', $learnerId)
        ->first();

    if (!$enrollment) {
        return response()->json(['error' => 'No enrollment found'], 404);
    }

    // Get all related courses
    $courses = DB::table('courses')
        ->where('program_id', $enrollment->program_id)
        ->select('course_name as name', 'price')
        ->get();

    // Calculate total
    $total = (float)($enrollment->program_price ?? 0);
    foreach ($courses as $c) {
        $total += (float)$c->price;
    }
    $discount = (float)($enrollment->discount_value ?? 0);
    $total -= $discount;

    return response()->json([
        'learner' => [
            'name' => $enrollment->learner_name,
            'email' => $enrollment->learner_email,
            'phone' => $enrollment->learner_phone,
        ],
        'program' => [
            'id' => $enrollment->program_id,
            'program_name' => $enrollment->program_name,
            'description' => $enrollment->description,
            'program_price' => $enrollment->program_price,
        ],
        'courses' => $courses,
        'discount' => $discount,
        'total' => $total,
    ]);
}



public function getProgramDetails(Request $request)
    {
        $learnerId = $request->input('learner_id');

        if (!$learnerId) {
            return response()->json(['error' => 'Learner ID is required.'], 400);
        }

        try {
            // 1. Get Learner's Institute ID (assuming the 'created_by' in 'learners' is the Institute ID)
            $learner = Learners::where('id', $learnerId)
                               ->where('status', 'initial_entry')
                               ->first();

            if (!$learner) {
                 // Check if learner is already enrolled (status != 'initial_entry')
                 $alreadyEnrolled = Learners::where('id', $learnerId)->where('status', '!=', 'initial_entry')->exists();
                 if ($alreadyEnrolled) {
                    return response()->json(['error' => 'Learner is already enrolled in a program.'], 400);
                 }
                return response()->json(['error' => 'Learner not found or status is not initial_entry.'], 404);
            }
            $instituteId = $learner->created_by; // Assuming created_by holds the institute_id

            // 2. Fetch available Programs for the Institute
            $programs = Program::where('institute_id', $instituteId)
                               ->where('is_active', 1)
                               ->get(['id', 'program_name', 'description']);

            // 3. Fetch active Discounts for the Institute
            $discounts = DiscountOffer::where('institute_id', $instituteId)
                                      ->where('is_active', 1)
                                      ->whereDate('start_date', '<=', Carbon::now())
                                      ->whereDate('end_date', '>=', Carbon::now())
                                      ->get(['id', 'name', 'value', 'type']); // Type can be 'percentage' or 'fixed'

            // Convert discounts for easy front-end use (especially percentage)
            $discountOptions = $discounts->map(function ($discount) {
                return [
                    'id'    => $discount->id,
                    'name'  => $discount->name,
                    'value' => $discount->value,
                    'type'  => $discount->type, // percentage or fixed
                ];
            });

            return response()->json([
                'programs'  => $programs,
                'discounts' => $discountOptions,
                'institute_id' => $instituteId,
            ]);

        } catch (\Exception $e) {
            Log::error("Error in getProgramDetails: " . $e->getMessage());
            return response()->json(['error' => 'An error occurred while fetching details.'], 500);
        }
    }

    

    public function ViewOverviewOfFeesBeforePayment(Request $request)
    {

        
        $user = Auth::user();

    $discounts_offers = DiscountOffer::where('is_active', 1)->get();



    //dd($request);
    
    $Branches = Branch :: where ('id', session('activeBranch_id'))->first();

   //dd($Branches);

   
$learnerData=null;





    //dd($learners);

    // Get active programs for this branch executive's institute
$programs = Program::where('is_active', 1)
    ->where('institute_id', $Branches->institute_id)
    ->get();

    $learnerAllDetails = null;

    if ($request->isMethod('post')) {
    $learnerData = Learners::find($request->learner_id);

    

    // Fetch the first enrollment record for this learner
    $enrollmentData = Enrollment::where('learner_id', $learnerData->id)->first();

    $programPriceData = ProgramPrice :: where('program_id',$enrollmentData->program_id)->first();

    // Join 'enrolled_courses' with 'courses'
    $enrolledCoursesData = DB::table('enrolled_courses')
        ->join('courses', 'enrolled_courses.course_id', '=', 'courses.id')
        ->where('enrolled_courses.enrollment_id', $enrollmentData->id)
        ->select('courses.course_name', 'courses.price')
        ->get();

   

    $BranchData =  Branch :: where ('id', session('activeBranch_id'))->first();


    //program data store 

    $LearnerEnrolledProgram = null;

if ($enrollmentData && $enrollmentData->program_id) {
    $LearnerEnrolledProgram = Program::where('id', $enrollmentData->program_id)->first();
}

    

    

     

    

        

    // Protect against nulls (if learner not yet enrolled)
    $fee = null;
    if ($enrollmentData) {
        $fee = EnrollmentFee::where('enrollment_id', $enrollmentData->id)->first();
    }
$discount=null;
$discountValue=null;
    if($request->discount_id != 0)
    {
    $discount = DiscountOffer::find($request->discount_id);
    $discountValue = floatval($discount->value);
    }
    else
    {
        $discount = 0;
        $discountValue = 0;
    }
    
    $flexi_fee = floatval($request->Flexi_fees ?? 0);
    if (!$fee) {
        throw new \Exception("Fee record not found.");
    }

    // 2. Update flexi fields
    $fee->flexi_amount = $request->Flexi_fees ?? null;
    $fee->flexi_remark = $request->Flexi_fees_remark ?? null;

    $fee->save();

    

    $DiscountOnEnrollmentFees = floatval(floatval($fee->total_fee_charged) * floatval($discountValue/100));
    $TotalFeesToBePay = floatval(floatval($fee->total_fee_charged) - floatval($DiscountOnEnrollmentFees))-floatval($flexi_fee); 

    $learnerAllDetails = [
        'learnerData' => $learnerData,
        'ProgramData' =>$LearnerEnrolledProgram,
        'enrollment' => $enrollmentData,
        'programPriceData' => $programPriceData, 
        'enrolledCoursesData' => $enrolledCoursesData,
        'fees' => $fee,
        'discount' => $discount,
        'discountAfterPrice' => $DiscountOnEnrollmentFees,
        'flexi_fee' => $flexi_fee,
        'flaxi_remark' => $request->Flexi_fees_remark,
        'finalEnrollmentPrice' => $TotalFeesToBePay,
      
    ];
}

//dd($learnerAllDetails);
    return view('Access.Core.Branch_Executive.learner_enrollment', compact('programs','learnerData', 'discounts_offers','learnerAllDetails'));
        
        
    }
 
    public function EnrollmentFeesPayment(Request $request)
{
    $request->validate([
        'Enrollment_Id'  => 'required',
        'Fees_Payment'   => 'required|numeric|min:1',
        'Payment_Methods'=> 'required|string',
        'T_Id'           => 'nullable|string',
        'Payment_Status' => 'required|string',
        'Discount_Id'    => 'nullable|string'
    ]);

    DB::beginTransaction();

    try {

        $enrollmentId = $request->Enrollment_Id;

        // 1️⃣ Get Enrollment Fees Record
        $enrollFee = EnrollmentFee::where('enrollment_id', $enrollmentId)->first();

        if (!$enrollFee) {
            return back()->with('error', 'Enrollment Fees Record Not Found');
        }

        // 2️⃣ If Discount Selected → Apply in enrollment_discounts Table
        $discountValue = 0;

        if ($request->Discount_Id && $request->Discount_Id != "0") {

            $discount = DiscountOffer::find($request->Discount_Id);

            if ($discount) {

                // Calculate discount amount
                $discountValue = ($enrollFee->total_fee_charged * ($discount->value / 100));

                // Insert into enrollment_discounts
                EnrollmentDiscount::updateOrCreate(
                    [
                        'enrollment_id' => $enrollmentId,
                        'discount_id'   => $discount->id
                    ],
                    [
                        'discount_amount' => $discountValue,
                        'applied_date'    => now(),
                    ]
                );
            }
        }

        // 3️⃣ Update enrollment_fees table
        $newPaidAmount = $enrollFee->paid_amount + $request->Fees_Payment;

        // If discount applied → reduce charged amount (DO NOT change original total_fee_charged)
        $totalAfterDiscount = $enrollFee->total_fee_charged - $discountValue;

        // Fee Status
        $finalStatus = ($newPaidAmount >= $totalAfterDiscount) ? 'complete' : 'partial';

        $enrollFee->update([
            'total_fee_charged' => $totalAfterDiscount,
            'discount_applied' => $discountValue,
            'paid_amount'      => $newPaidAmount,
            'fee_status'       => $finalStatus,
        ]);

        // 4️⃣ Insert Payment Entry
        Payment::create([
            'id'             => Str::uuid(),
            'amount'         => $request->Fees_Payment,
            'payment_method' => $request->Payment_Methods,
            'transaction_id' => $request->T_Id ?? null,
            'status'         => $request->Payment_Status,
            'paid_at'        => now(),
            'payable_id'     => $enrollFee->id, // important
            'payable_type'   => 'LF', // as you required
        ]);


        $enrollmentData = Enrollment::find($enrollmentId);

if ($enrollmentData) {
    Learners::where('id', $enrollmentData->learner_id)
        ->update(['status' => 'Enrolled']);
}

        DB::commit();

        return back()->with('success', 'Fees Updated & Payment Completed Successfully.');

    } catch (\Exception $e) {

        DB::rollBack();
        return back()->with('error', $e->getMessage());
    }
}

 

  public function LearnerEnrollmentManage(Request $request)
{
    $user = Auth::user();

    // --------------------------
    // Determine branch_id for the logged-in user
    // --------------------------
    $branchId = null;

    // Try user_branch_roles (preferred)
    $ubr = DB::table('user_branch_roles')
        ->where('user_id', $user->id)
        ->where('branch_id', session('activeBranch_id'))
        ->where('is_active', 1)
        ->first();

    if ($ubr && isset($ubr->branch_id)) {
        $branchId = $ubr->branch_id;
    } else {
        // fallback: maybe user table stores branch_id (if present)
        if (isset($user->branch_id) && $user->branch_id) {
            $branchId = $user->branch_id;
        }
    }

    // If branch not found, we still continue but use empty enrollments collection
    if (!$branchId) {
        $Enrollments = collect();
        $Enrollment_Fees = collect();
    } else {
        // Load enrollments for this branch
        $Enrollments = Enrollment::where('branch_id', $branchId)->get();

        // Load fees for those enrollments
        $Enrollment_Fees = EnrollmentFee::whereIn(
            'enrollment_id',
            $Enrollments->pluck('id')->toArray()
        )->get();
    }

    // Programs (global)
    $Programs = Program::get();

    $filteredEnrollments = $Enrollments;

    // Filter by program
    if ($request->filled('program')) {
        $filteredEnrollments = $filteredEnrollments->where('program_id', $request->program);
    }

    // Filter by enrollment_date
    if ($request->filled('enrollment_date')) {
        $filteredEnrollments = $filteredEnrollments->where('enrollment_date', $request->enrollment_date);
    }

    // Filter by fee_status
    if ($request->filled('fee_status')) {
        $fs = $request->fee_status;
        $enrollmentIdsWithFeeStatus = $Enrollment_Fees
            ->where('fee_status', $fs)
            ->pluck('enrollment_id')
            ->unique()
            ->toArray();

        $filteredEnrollments = $filteredEnrollments->filter(function ($e) use ($enrollmentIdsWithFeeStatus) {
            return in_array($e->id, $enrollmentIdsWithFeeStatus);
        });
    }

    // Get learner ids allowed by filters
    $filteredLearnerIds = $filteredEnrollments->pluck('learner_id')->unique()->toArray();

    $learnersQuery = Learners::query();

    if (!empty($filteredLearnerIds)) {
        $learnersQuery = $learnersQuery->whereIn('id', $filteredLearnerIds);
    } else {
        $learnersQuery = $learnersQuery->whereRaw('1 = 0');
    }

    // Paginate learners
    $learners = $learnersQuery->paginate(25)->appends($request->query());

    $EnrolledLearnerData = [];

    foreach ($learners as $learner) {
        // Find the enrollment for this learner
        $enrollment = $Enrollments->where('learner_id', $learner->id)->first();

        if (!$enrollment) {
            $EnrolledLearnerData[] = [
                'LearnerID' => $learner->id,
                'LearnerName' => $learner->raw_learner_name,
                'LearnerEmail' => $learner->raw_email,
                'LearnerPhoneNo' => $learner->raw_phone,
                'LearnerStatus' => $learner->status,
                'Program' => 'N/A',
                'TotalFee' => 0,
                'Paid' => 0,
                'Balance' => 0,
                'FeeStatus' => 'N/A',
                'Courses' => [],
                'Payments' => [],
                'Discounts' => [],
                'EnrollmentDate' => null,
                'EnrollmentID' => null,
                'EnrollmentFeesId' => null,
            ];
            continue;
        }

        // --- SAFE FEE DATA ---
        $fee = $Enrollment_Fees->where('enrollment_id', $enrollment->id)->first();
        
        // Check if $fee exists before accessing properties
        $feeId = $fee->id ?? null;
        $totalFee = $fee->total_fee_charged ?? 0;
        $paidAmount = $fee->paid_amount ?? 0;
        $balance = floatval($totalFee - $paidAmount);
        $feeStatusText = $fee->fee_status ?? 'N/A';

        // Program for this enrollment
        $program = $Programs->where('id', $enrollment->program_id)->first();

        // --- ENROLLED COURSES ---
        $EnrolledCourses = DB::table('enrolled_courses')
            ->where('enrollment_id', $enrollment->id)
            ->get();

        $CourseList = [];
        foreach ($EnrolledCourses as $item) {
            $Course = DB::table('courses')->where('id', $item->course_id)->first();
            if ($Course) {
                $CourseList[] = [
                    'CourseId'    => $Course->id,
                    'CourseName'  => $Course->course_name,
                    'CoursePrice' => $Course->price,
                    'CourseStatus'=> $item->status,
                ];
            }
        }

        // --- PAYMENTS ---
        $PaymentList = [];
        if ($feeId) { // Only query payments if we actually have a fee ID
            $payments = DB::table('payments')
                ->where('payable_id', $feeId)
                ->where('payable_type', 'LF')
                ->orderBy('paid_at', 'desc')
                ->get();

            foreach ($payments as $p) {
                $PaymentList[] = [
                    'id' => $p->id,
                    'amount' => $p->amount,
                    'method' => $p->payment_method,
                    'transaction_id' => $p->transaction_id,
                    'status' => $p->status,
                    'paid_at' => $p->paid_at,
                    'payable_id' => $p->payable_id,
                    'payable_type' => $p->payable_type,
                ];
            }
        }

        // --- DISCOUNTS ---
        $DiscountList = [];
        $enrollmentDiscounts = DB::table('enrollment_discounts')
            ->where('enrollment_id', $enrollment->id)
            ->get();

        foreach ($enrollmentDiscounts as $ed) {
            $offer = DB::table('discounts_offers')->where('id', $ed->discount_id)->first();
            $DiscountList[] = [
                'discount_id' => $ed->discount_id,
                'discount_amount' => $ed->discount_amount,
                'applied_date' => $ed->applied_date,
                'offer_name' => $offer->name ?? null,
                'offer_type' => $offer->type ?? null,
                'offer_value' => $offer->value ?? null,
            ];
        }

        $EnrolledLearnerData[] = [
            'LearnerID' => $learner->id,
            'LearnerName' => $learner->raw_learner_name,
            'LearnerEmail' => $learner->raw_email,
            'LearnerPhoneNo' => $learner->raw_phone,
            'LearnerStatus' => $learner->status,
            'Program' => $program->program_name ?? 'N/A',
            'TotalFee' => $totalFee,
            'Paid' => $paidAmount,
            'Balance' => $balance,
            'FeeStatus' => $feeStatusText,
            'Courses' => $CourseList,
            'Payments' => $PaymentList,
            'Discounts' => $DiscountList,
            'EnrollmentDate' => $enrollment->enrollment_date,
            'EnrollmentID' => $enrollment->id,
            'EnrollmentFeesId' => $feeId,
        ];
    }

    // Wrap results into LengthAwarePaginator
    $pagedLearners = new \Illuminate\Pagination\LengthAwarePaginator(
        $EnrolledLearnerData,
        $learners->total(),
        $learners->perPage(),
        $learners->currentPage(),
        ['path' => request()->url(), 'query' => request()->query()]
    );

    $programOptions = $Programs->pluck('program_name', 'id')->toArray();

    return view('Access.Core.Branch_Executive.learner_enrollment_manage', [
        'EnrolledLearnerData' => $pagedLearners,
        'programOptions' => $programOptions,
        'filter_program' => $request->program,
        'filter_fee_status' => $request->fee_status,
        'filter_enrollment_date' => $request->enrollment_date,
    ]);
}



        
public function JustView()
{
    $user = Auth::user();

    
    // If user is not a learner OR learner profile missing
    if (!$user->learner) {
        return back()->with('error', 'Learner profile not found.');
    }

    $learner = $user->learner;

    // Load enrollments with all relations
    $enrollments = $learner->enrollments()
        ->with([
            'program',
            'enrolledCourses.course', // course details
            'fee'
        ])
        ->get();

    return view("Access.Core.Learner.just_view", compact(
        'user',
        'learner',
        'enrollments'
    ));
}

            


 public function employerBranchWiseLearnerAndFeesTotolInfo()
{
    $user = Auth::user();

    $instituteId = $user->employerProfile?->institute?->id;

    if (!$instituteId) {
        abort(403, 'Institute not found');
    }

    $branches = DB::table('branches')
        ->where('branches.institute_id', $instituteId) // 🔐 FILTER ADDED
        ->leftJoin('enrollments', function ($join) {
            $join->on('enrollments.branch_id', '=', 'branches.id')
                 ->where('enrollments.status', 'active');
        })
        ->leftJoin('learners', function ($join) {
            $join->on('learners.id', '=', 'enrollments.learner_id')
                 ->where('learners.status', '!=', 'delete');
        })
        ->leftJoin('enrollment_fees', 'enrollment_fees.enrollment_id', '=', 'enrollments.id')
        ->select(
            'branches.id',
            'branches.branch_name',
            DB::raw('COUNT(DISTINCT learners.id) as total_learners'),
            DB::raw('SUM(enrollment_fees.total_fee_charged) as total_expected'),
            DB::raw('SUM(enrollment_fees.paid_amount) as total_paid'),
            DB::raw('(SUM(enrollment_fees.total_fee_charged) - SUM(enrollment_fees.paid_amount)) as total_balance')
        )
        ->groupBy('branches.id', 'branches.branch_name')
        ->orderBy('branches.branch_name', 'asc')
        ->get();

    return view('Access.Core.Employer.learner_enrollment', compact('branches'));
}

       
    
function branchExecutiveLearnerEnrollmentUpdate()
    {
        // Fetch learners created by this branch executive
    $userId = Auth::user();

   

   


    //dd($userId);

    // Get learners associated with this branch executive
   $learners = \App\Models\Learners::where('created_by', $userId->id)->get();

   

   

  // dd($UserBranchRoles->branch_id);

   $Branches = Branch :: where ('id', session('activeBranch_id'))->first();

   //dd($Branches);

   






    //dd($learners);

    // Get active programs for this branch executive's institute
$programs = Program::where('is_active', 1)
    ->where('institute_id', $Branches->institute_id)
    ->get();


    $discounts_offers = \App\Models\DiscountOffer::where('institute_id',$Branches->institute_id)->get();

    // Pass data to view
    return view('Access.Core.Branch_Executive.learner_enrollment_update', compact('learners', 'programs','discounts_offers'));
    }

      
    function enrollmentDeactive(Request $request)
    {
            $userId = Auth::user();

           // dd($request);

            $enrollment = Enrollment::find($request->Enrollment_Id);
             $enrollment_fees = EnrollmentFee::where('enrollment_id',$request->Enrollment_Id)->first();
          
            if (!$enrollment) {
                         return back()->with('error', 'Enrollment not found');
                  }


                  $enrollment_fees->update([
                       'fee_status' => 'lost',
                       
                         ]);


                        EnrolledCourse::where('enrollment_id', $request->Enrollment_Id)
    ->update(['status' => 'deactive']);


              $enrollment->update([
                       'status' => 'deactive',
                       
                         ]);

                return back()->with('success', 'Enrollment Deactivated..!!');

    }








    

}