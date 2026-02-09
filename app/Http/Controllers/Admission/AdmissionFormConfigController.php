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


use App\Models\AdmissionFormConfig; // Ensure this model exists



class AdmissionFormConfigController extends Controller
{
    /**
     * Show admission form configuration page
     */
    public function employerAdmissionFormConfigPageShow()
    {
         $user = Auth::user();
    $employerProfile = $user?->employerProfile;
    $institute = $employerProfile?->institute;

        $configs = AdmissionFormConfig::where('institute_id',  $institute->id)
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy('type');

        return view('Access.Core.Employer.admission_form_config', compact('configs'));
    }

    /**
     * Save new field configuration
     */
    public function saveConfig(Request $request)
    {

    $user = Auth::user();
    $employerProfile = $user?->employerProfile;
    $institute = $employerProfile?->institute;

        $request->validate([
            'type' => 'required|in:Personal,Academic,Guardian,Documents',
            'field_label' => 'required|string|max:255',
        ]);

        $fieldName = Str::snake($request->field_label);

        // Prevent duplicate fields per institute
        $exists = AdmissionFormConfig::where('institute_id', $institute->id)
            ->where('field_name', $fieldName)
            ->exists();

        if ($exists) {
            return back()
                ->withErrors(['field_label' => 'This field already exists.'])
                ->withInput();
        }

        AdmissionFormConfig::create([
            'id' => (string) Str::uuid(),
            'institute_id' => $institute->id,
            'type' => $request->type,
            'field_name' => $fieldName,
            'field_label' => $request->field_label,
            'is_required' => $request->has('is_required'),
            'created_by' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'New field added successfully.');
    }

    /**
     * Delete field configuration
     */
    public function delete($id)
    {
        $user = Auth::user();
    $employerProfile = $user?->employerProfile;
    $institute = $employerProfile?->institute;

        $config = AdmissionFormConfig::where('id', $id)
            ->where('institute_id', $institute->id)
            ->firstOrFail();

        $config->delete();

        return back()->with('success', 'Field deleted successfully.');
    }
}