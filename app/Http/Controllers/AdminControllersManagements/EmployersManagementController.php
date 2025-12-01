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
    
    // CRITICAL: Provide values for ALL non-nullable fields defined in $fillable
    'company_name'         => $request->input('company_name', 'N/A'),
    
    'industry'             => $request->input('industry', 'General'),
]);



       UserProfile::create([

        'id' =>  (string) Str::uuid(),
        'user_id' => $user->id,
        'first_name' => "NA",
        'last_name' => "NA",
        

       ]);

        // 1. Retrieve the Role using the confirmed correct name and ID column
$employerRole = Role::where('name', 'SystemEmployer')->first();
        
if ($employerRole) {
    // 2. Determine the Role ID to use for the pivot table
    // It must use the property name that maps to the 'role_id' column.
    // Since the model is now fixed (Step 1), we can use the primary key property.
    $roleId = $employerRole->role_id; // Using 'role_id' explicitly for certainty

    // 3. Attach the Role using the robust Eloquent relationship
    // $user->roles() is defined in User.php and knows to insert into user_roles.
    $user->roles()->attach($roleId, [ 
        'status'       => 'active',
        'assigned_by'  => Auth::id(), // ID of the currently logged-in Admin
        'activated_at' => null, 
    ]);
} else {
     // Failsafe: if 'SystemEmployer' is missing, the transaction will roll back.
     throw new \Exception("Required role 'SystemEmployer' not found in database.");
}


    }); // transaction ensures all-or-nothing

    // Success!
    return redirect()->back()->with('success', 'Employer user created successfully!');
}


}