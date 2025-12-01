<?php

namespace App\Http\Controllers\Branch;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Branch;
use App\Models\EmployerProfile;
use App\Models\InstituteInfo;

class BranchController extends Controller
{
    public function employerBranch(Request $request)
    {

        $user = Auth::user();
    $employerProfile = $user->employerProfile;
    $instituteProfile = $employerProfile->institute;

    $branches = Branch::where('institute_id', $instituteProfile->id)
        ->orderBy('created_at', 'desc')
        ->paginate(10); // load 10 rows per request

    // If AJAX request, return partial table rows
    if ($request->ajax()) {
        return view('Access.Core.Employer.partials.branch_rows', compact('branches'))->render();
    }

        return view('Access.Core.Employer.branch', compact('branches'));
    }

    public function employerBranchCreate(Request $request)
    {
        $user = Auth::user();

        // Get employer profile for this user
        $employerProfile = EmployerProfile::where('user_id', $user->id)->first();

        if (!$employerProfile) {
            return redirect()->back()->with('error', 'Employer profile not found.');
        }

        // Get related institute for that employer
        $institute = $employerProfile->institute;

        if (!$institute) {
            return redirect()->back()->with('error', 'Institute not found for this employer.');
        }

        // Validate request inputs
        $validatedData = $request->validate([
            'branch_name' => 'required|string|max:255',
            'address_line_1' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'state_province' => 'required|string|max:100',
            'postal_code' => 'required|string|max:20',
            'country' => 'required|string|max:100',
            'contact_email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
        ]);

        // Create new branch
        $branch = new Branch();
        $branch->id = Str::uuid();
        $branch->institute_id = $institute->id; // ✅ Correctly link branch to institute
        $branch->branch_name = $validatedData['branch_name'];
        $branch->address_line_1 = $validatedData['address_line_1'];
        $branch->city = $validatedData['city'];
        $branch->state_province = $validatedData['state_province'];
        $branch->postal_code = $validatedData['postal_code'];
        $branch->country = $validatedData['country'];
        $branch->contact_email = $validatedData['contact_email'];
        $branch->phone_number = $validatedData['phone_number'];
        $branch->is_active = 1;
        $branch->save();

        return redirect()->back()->with('success', 'Branch created successfully.');
    }

    public function employerBranchUpdate(Request $request)
{
    $user = Auth::user();

    // Validate inputs
    $validatedData = $request->validate([
        'branch_id' => 'required|uuid|exists:branches,id',
        'branch_name' => 'required|string|max:255',
        'address_line_1' => 'required|string|max:255',
        'city' => 'required|string|max:100',
        'state_province' => 'required|string|max:100',
        'postal_code' => 'required|string|max:20',
        'country' => 'required|string|max:100',
        'contact_email' => 'required|email|max:255',
        'phone_number' => 'required|string|max:20',
        'is_active' => 'required|boolean',
    ]);

    // Find the branch
    $branch = Branch::where('id', $validatedData['branch_id'])->first();

    if (!$branch) {
        return redirect()->back()->with('error', 'Branch not found.');
    }

    // Ensure the branch belongs to the logged-in employer’s institute
    $employerProfile = EmployerProfile::where('user_id', $user->id)->first();
    if (!$employerProfile || $branch->institute_id !== $employerProfile->institute->id) {
        return redirect()->back()->with('error', 'Unauthorized access.');
    }

    // Update branch fields
    $branch->branch_name = $validatedData['branch_name'];
    $branch->address_line_1 = $validatedData['address_line_1'];
    $branch->city = $validatedData['city'];
    $branch->state_province = $validatedData['state_province'];
    $branch->postal_code = $validatedData['postal_code'];
    $branch->country = $validatedData['country'];
    $branch->contact_email = $validatedData['contact_email'];
    $branch->phone_number = $validatedData['phone_number'];
    $branch->is_active = $validatedData['is_active'];

    $branch->save();

    return redirect()->back()->with('success', 'Branch updated successfully.');
}


public function branchExecutiveBranch()
{
    $user=Auth::user();

    $branch=Branch::where('id',session('activeBranch_id'))->first();
    
    return view('Access.Core.Branch_Executive.branch',compact('branch'));
}

public function InstructorBranch()
{
    return view('Access.Core.Instructor.branch');
}

public function LearnerBranch()
{
    return view('Access.Core.Learner.branch');
}
}
