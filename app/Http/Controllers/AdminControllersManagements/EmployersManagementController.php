<?php

namespace App\Http\Controllers\AdminControllersManagements;

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


use App\Models\Role;
use App\Models\UserRole;

class EmployersManagementController extends Controller
{
        public function employerMgtinfo()
        {
            return view('Access/Core/Admin/Employers_Mgt/Employer_Info_Mgt');
        }

        public function onboardEmployer()
        {
            return view('Access/Core/Admin/Employers_Mgt/Onboard_Employer_Mgt');
        }

       public function creationOfemployerAsuser(Request $request)
{
    // Validate input and uniqueness (Assume this is correct now)
    $request->validate([
        'name'     => 'required|string|max:255',
        'email'    => 'required|string|email|max:255|unique:users,email',
        'username' => 'required|string|max:255|unique:users,username',
        'password' => 'required|string|min:8',
    ]);

    DB::transaction(function () use ($request) {

        // Step 1: Create User
        $user = User::create([
            'id'       => (string) Str::uuid(),
            'name'     => $request->name,
            'email'    => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        // Step 2: Create Employer Profile
        EmployerProfile::create([
            'user_id'              => $user->id,
            'onboarded_by_user_id' => Auth::id(),
        ]);

        // Step 3: Assign Employer Role (FIXED LOGIC)
        // CRITICAL FIX 1: Use 'SystemEmployer' role name
        $employerRole = Role::where('name', 'SystemEmployer')->first();
        
        if ($employerRole) {
            // CRITICAL FIX 2: Use the robust Eloquent ATTACH method
            $user->roles()->attach($employerRole->id, [ 
                'status'       => 'inactive',
                'assigned_by'  => Auth::id(),
                'activated_at' => null, // Keep this null as per your pivot table structure
            ]);
        } else {
             // If role is missing, we must throw an error to fail the transaction
             throw new \Exception("Required role 'SystemEmployer' not found.");
        }

    }); // transaction ensures all-or-nothing

    // Success!
    return redirect()->back()->with('success', 'Employer user created successfully!');
}


}