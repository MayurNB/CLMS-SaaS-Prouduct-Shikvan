<?php

namespace App\Http\Controllers\Admission;

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

use App\Models\Payment;


use App\Models\Role;
use App\Models\UserRole;

use App\Models\Batch;
use App\Models\LearnerAttendance;
use App\Models\LectureAttendance;
use Illuminate\Support\Facades\Log;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;



use App\Models\AdmissionFormConfig; // Ensure this model exists



class AdmissionPublicFormController extends Controller
{
    /**
     * Show public admission page
     */
    public function AdmissionPublicFormPageShow()
    {
        return view('Access.Core.Public.admission_public_form');
    }

    /**
     * Verify token & fetch institute + form config
     */
   public function verifyToken(Request $request)
{
    $token = DB::table('admission_tokens')->where('token', $request->token)->first();

    if (!$token) {
        return response()->json(['status' => false, 'message' => 'Invalid Admission Token']);
    }

    if ($token->status === 'used') {
        $admission = DB::table('admission')->where('token_id', $token->id)->first();
        return response()->json([
            'status' => true,
            'mode' => 'track',
            'admission_status' => $admission ? $admission->status : 'Under Review'
        ]);
    }

    // MANDATORY CORE FIELDS
    $coreFields = [
        ['type' => 'Personal', 'field_label' => 'First Name', 'field_name' => 'learner_first_name', 'is_required' => 1],
        ['type' => 'Personal', 'field_label' => 'Middle Name', 'field_name' => 'learner_middle_name', 'is_required' => 0],
        ['type' => 'Personal', 'field_label' => 'Surname', 'field_name' => 'learner_surname', 'is_required' => 1],
        ['type' => 'Personal', 'field_label' => 'Date of Birth', 'field_name' => 'learner_date_of_birth', 'is_required' => 1],
        ['type' => 'Personal', 'field_label' => 'Gender', 'field_name' => 'learner_gender', 'is_required' => 1],
        ['type' => 'Contact', 'field_label' => 'Email Address', 'field_name' => 'email', 'is_required' => 1],
        ['type' => 'Contact', 'field_label' => 'Phone Number', 'field_name' => 'phone', 'is_required' => 1],
        ['type' => 'Contact', 'field_label' => 'Address Line 1', 'field_name' => 'Address_line1', 'is_required' => 1],
        ['type' => 'Contact', 'field_label' => 'Address Line 2', 'field_name' => 'Address_line2', 'is_required' => 1],
        ['type' => 'Contact', 'field_label' => 'City', 'field_name' => 'city', 'is_required' => 1],
        ['type' => 'Contact', 'field_label' => 'State', 'field_name' => 'state', 'is_required' => 1],
        ['type' => 'Contact', 'field_label' => 'Postal Code', 'field_name' => 'postal_code', 'is_required' => 1],
        ['type' => 'Contact', 'field_label' => 'Country', 'field_name' => 'country', 'is_required' => 1],



    ];

    // FETCH CUSTOM FIELDS
    $customFields = DB::table('admission_form_configs')
        ->where('institute_id', $token->institute_id)
        ->orderBy('type', 'desc')
        ->get();

    // MERGE BOTH
    $allFields = array_merge($coreFields, $customFields->toArray());

    return response()->json([
        'status' => true,
        'mode' => 'new',
        'token' => $token->token,
        'institute' => DB::table('institute_infos')->where('id', $token->institute_id)->first(),
        'branch' => DB::table('branches')->where('id', $token->branch_id)->first(),
        'fields' => $allFields
    ]);
}

    /**
     * Submit admission form (ONE TIME)
     */
   public function submitAdmission(Request $request)
{
    Log::info('===== NEW ADMISSION REQUEST =====');
    Log::info('Full Request Data:', $request->all());

    //dd(config('cloudinary.cloud_url'));

    DB::beginTransaction();

    try {

        // ---------------- TOKEN CHECK ----------------
        $tokenValue = $request->get('token');
        Log::info('Token Received:', ['token' => $tokenValue]);

        if (!$tokenValue) {
            throw new \Exception('Token missing in request');
        }

        $token = DB::table('admission_tokens')
            ->where('token', trim($tokenValue))
            ->first();

        Log::info('Token DB Result:', ['token_record' => $token]);

        if (!$token) {
            throw new \Exception('Token not found in database');
        }

        if ($token->status !== 'active') {
            throw new \Exception('Token is not active');
        }

        // ---------------- FORM DATA ----------------
        $formDataRaw = $request->get('form_data');
        Log::info('Form Data Raw:', ['form_data' => $formDataRaw]);

        if (!$formDataRaw || !is_array($formDataRaw)) {
            throw new \Exception('form_data is missing or not array');
        }

        $processedFormData = [];

        foreach ($formDataRaw as $field => $value) {

    if (empty($value)) {
        $processedFormData[$field] = null;
        continue;
    }

    // If it is Cloudinary URL, just store it
    if (is_string($value) && str_contains($value, 'res.cloudinary.com')) {
        $processedFormData[$field] = $value;
    } else {
        $processedFormData[$field] = is_string($value) ? trim($value) : $value;
    }
}

        // ---------------- INSERT ----------------
        DB::table('admission')->insert([
    'id'           => (string) \Illuminate\Support\Str::uuid(),
    'institute_id' => $token->institute_id,
    'branch_id'    => $token->branch_id,
    'token_id'     => $token->id,
    'learner_name' => trim(
        ($processedFormData['learner_first_name'] ?? '') . ' ' .
        ($processedFormData['learner_surname'] ?? '')
    ) ?: 'Unknown',
    'phone_no'     => $processedFormData['phone'] ?? '0000000000',
    'email'        => $processedFormData['email'] ?? null,
    'form_data'    => json_encode($processedFormData), // ✅ FIXED
    'status'       => 'pending',
    'created_at'   => now(),
    'updated_at'   => now()
]);

// ✅ Mark token used
        DB::table('admission_tokens')
            ->where('id', $token->id)
            ->update(['status' => 'used']);

        DB::commit();

        Log::info('===== ADMISSION SUCCESS =====');

        return response()->json([
            'status' => true,
            'message' => 'Admission submitted successfully'
        ]);

    } catch (\Throwable $e) {

        DB::rollBack();

        Log::error('===== ADMISSION FAILURE =====', [
            'error_message' => $e->getMessage(),
            'error_line' => $e->getLine(),
            'error_file' => $e->getFile()
        ]);

        return response()->json([
            'status' => false,
            'message' => 'Server Error',
            'error' => $e->getMessage()
        ], 500);
    }
}
    /**
     * Track admission using token
     */
    public function trackAdmission(Request $request)
    {
        $admission = DB::table('admission')
            ->where('token_id', function ($q) use ($request) {
                $q->select('id')
                    ->from('admission_tokens')
                    ->where('token', $request->token);
            })
            ->first();

        if (!$admission) {
            return response()->json([
                'status' => false,
                'message' => 'No admission found'
            ]);
        }

        return response()->json([
            'status' => true,
            'admission_status' => $admission->status
        ]);
    }




     // List all admissions
    public function branchReviewAdmissionForm()
    {
        $admissions = DB::table('admission')
            ->join('admission_tokens', 'admission.token_id', '=', 'admission_tokens.id')
            ->select(
                'admission.id',
                'admission.learner_name',
                'admission.created_at',
                'admission.status',
                'admission_tokens.token'
            )
            ->orderBy('admission.created_at', 'desc')
            ->get();

        return view('Access.Core.Branch_Executive.admission_review', compact('admissions'));
    }

    // Show Full Review Page
    public function editAdmission($id)
    {
        $admission = DB::table('admission')->where('id', $id)->first();
        if (!$admission) abort(404);

        // 1. Your exact Core Fields list
    $coreFields = collect([
        (object)['type' => 'Personal', 'field_label' => 'Learner Portrait', 'field_name' => 'learner_image_url', 'is_required' => 1, 'is_image' => true],
        (object)['type' => 'Personal', 'field_label' => 'First Name', 'field_name' => 'learner_first_name', 'is_required' => 1],
        (object)['type' => 'Personal', 'field_label' => 'Middle Name', 'field_name' => 'learner_middle_name', 'is_required' => 0],
        (object)['type' => 'Personal', 'field_label' => 'Surname', 'field_name' => 'learner_surname', 'is_required' => 1],
        (object)['type' => 'Personal', 'field_label' => 'Date of Birth', 'field_name' => 'learner_date_of_birth', 'is_required' => 1],
        (object)['type' => 'Personal', 'field_label' => 'Gender', 'field_name' => 'learner_gender', 'is_required' => 1],
        (object)['type' => 'Contact', 'field_label' => 'Email Address', 'field_name' => 'email', 'is_required' => 1],
        (object)['type' => 'Contact', 'field_label' => 'Phone Number', 'field_name' => 'phone', 'is_required' => 1],
        (object)['type' => 'Contact', 'field_label' => 'Address Line 1', 'field_name' => 'Address_line1', 'is_required' => 1],
        (object)['type' => 'Contact', 'field_label' => 'Address Line 2', 'field_name' => 'Address_line2', 'is_required' => 1],
        (object)['type' => 'Contact', 'field_label' => 'City', 'field_name' => 'city', 'is_required' => 1],
        (object)['type' => 'Contact', 'field_label' => 'State', 'field_name' => 'state', 'is_required' => 1],
        (object)['type' => 'Contact', 'field_label' => 'Postal Code', 'field_name' => 'postal_code', 'is_required' => 1],
        (object)['type' => 'Contact', 'field_label' => 'Country', 'field_name' => 'country', 'is_required' => 1],
    ]);

    // 2. Fetch Custom Configs (like Documents, Guardian info, etc.)
    $customConfigs = DB::table('admission_form_configs')
        ->where('institute_id', $admission->institute_id)
        ->get();

    // 3. Combine and Group
    $configs = $coreFields->concat($customConfigs)->groupBy('type');

        return view('Access.Core.Branch_Executive.admission_edit_page', compact('admission', 'configs'));
    }

    // Process Update & Status Change
    public function updateAction(Request $request, $id)
{
    // 1. Initial Fetch
    $admission = DB::table('admission')->where('id', $id)->first();
    if (!$admission) return redirect()->back()->with('error', 'Admission not found.');

    // Decode existing data to preserve fields not present in the current request
    $formData = json_decode($admission->form_data, true) ?? [];

    // 2. Update text fields & files from the Review Form
    $updatedTextData = $request->input('form_data', []);
    foreach($updatedTextData as $key => $value) {
        $formData[$key] = $value;
    }

    if ($request->hasFile('files')) {
        foreach ($request->file('files') as $fieldName => $file) {
            $path = $file->store("admissions/{$admission->institute_id}", 'public');
            $formData[$fieldName] = $path;
        }
    }

    // 3. Start Transaction
    DB::beginTransaction();
    try {
        $currentUser = Auth::user();
        $isVerified = ($request->action === 'verify');

        // Extract updated names for record keeping
        $fName = $formData['learner_first_name'] ?? '';
        $mName = $formData['learner_middle_name'] ?? '';
        $sName = $formData['learner_surname'] ?? '';
        $fullName = trim("$fName $mName $sName");

        // Update Admission Table first
        DB::table('admission')->where('id', $id)->update([
            'form_data'   => json_encode($formData),
            'learner_name'=> $fullName,
            'status'      => $isVerified ? 'verified' : 'rejected',
            'remarks'     => $request->input('remarks'),
            'verified_at' => now(),
            'verified_by' => $currentUser->id,
            'updated_at'  => now(),
        ]);

        // 4. If verified, create the User and Learner records
        if ($isVerified) {
            $activeBranchId = session('activeBranch_id') ?? $admission->branch_id;

            $learnerRoleId = DB::table('roles')
                ->where('name', 'Learner')
                ->where('status', 'Active')
                ->value('role_id');

            if (!$learnerRoleId) throw new \Exception("Learner role not found.");

            // Create User account for Login
            $userId = (string) Str::uuid();
            $username = strtolower($fName . '.' . $sName) . rand(100, 999);

            DB::table('users')->insert([
                'id' => $userId,
                'name' => $fullName,
                'email' => $admission->email,
                'username' => $username,
                'password' => bcrypt('Password@123'), // Default temporary password
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Create User Profile (Mapping portrait and details)
            DB::table('user_profiles')->insert([
                'id' => (string) Str::uuid(),
                'user_id' => $userId,
                'first_name' => $fName,
                'last_name' => $sName,
                'gender' => $formData['learner_gender'] ?? null,
                'date_of_birth' => $formData['learner_date_of_birth'] ?? null,
                'profile_picture_url' => $formData['learner_image_url'] ?? null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Assign Global Role
            DB::table('user_roles')->insert([
                'user_id' => $userId,
                'role_id' => $learnerRoleId,
                'status'  => 'active',
                'assigned_by' => $currentUser->id,
                'activated_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Assign Branch Role
            DB::table('user_branch_roles')->insert([
                'id' => (string) Str::uuid(),
                'user_id' => $userId,
                'branch_id' => $activeBranchId,
                'role_id' => $learnerRoleId,
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Create Learner Entry (The Student Record)
            $learnerCode = 'LRN-' . strtoupper(Str::random(6));
            DB::table('learners')->insert([
                'id' => (string) Str::uuid(),
                'institute_id' =>  $admission->institute_id, 
                'raw_learner_name' => $fullName,
                'raw_email' => $admission->email,
                'raw_phone' => $formData['phone'] ?? $admission->phone_no,
                'status' => 'initial_entry',
                'user_id' => $userId,
                'learner_code' => $learnerCode,
                'created_by' => $currentUser->id,
                'branch_id' => $activeBranchId,
                'admission_id' => $admission->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Store User Consent
            DB::table('user_consents')->insert([
                'id' => (string) Str::uuid(),
                'user_id' => $userId,
                'consent_type' => 'learner',
                'consent_version' => 'INSTITUTE-AGREE',
                'is_accepted' => 1,
                'ip_address' => $request->ip(),
                'consented_at' => now(),
            ]);

            // Log Activity
            DB::table('activity_logs')->insert([
                'id' => (string) Str::uuid(),
                'user_id' => $currentUser->id,
                'activity_type' => 'Admission Verified',
                'description' => "Verified admission for $fullName and created learner account.",
                'loggable_id' => $id,
                'loggable_type' => 'Admission',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        DB::commit();
        
        $msg = $isVerified ? 'Admission verified and learner account created.' : 'Admission rejected.';
        return redirect()->route('branchReviewAdmissionForm')->with('success', $msg);

    } catch (\Throwable $e) {
        DB::rollBack();
        Log::error('Verification failed: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Critical Error: ' . $e->getMessage());
    }
}
}