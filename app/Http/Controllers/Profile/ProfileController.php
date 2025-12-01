<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\UserProfile;



class ProfileController extends Controller
{
    public function adminProfile()
    {
        return view('Access/Core/Admin/profile');
    }

    public function updateAdminprofile(Request $request)
    {
            $user = Auth::user();

        // Ensure the user has a profile, otherwise create one
        $userProfile = $user->userProfile ?: new UserProfile(['user_id' => $user->id]);

        // Validate request inputs
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string|max:20',
            'address_line_1' => 'nullable|string|max:255',
            'address_line_2' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:100',
            'state_province' => 'nullable|string|max:100',
            'postal_code' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:100',
            'profile_picture_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bio' => 'nullable|string|max:1000',
            'preferred_language' => 'nullable|string|max:50',
        ]);

        // Update profile fields
        foreach ($validatedData as $key => $value) {
            if ($key !== 'profile_picture_url') { // Skip file here
                $userProfile->$key = $value;
            }
        }

        // Handle profile picture upload
        if ($request->hasFile('profile_picture_url')) {
            $file = $request->file('profile_picture_url');
            $path = $file->store('uploads/profile_pictures', 'public');
            $userProfile->profile_picture_url = Storage::url($path);
        }

        // Save profile
        $userProfile->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Profile updated successfully.');
     }


     public function employerProfile()
     {
        return view('Access.Core.Employer.profile');
     }

     public function updateEmployerprofile(Request $request)
     {

        $user = Auth::user();

        // Ensure the user has a profile, otherwise create one
        $userProfile = $user->userProfile ?: new UserProfile(['user_id' => $user->id]);
       
           if($request->exists('first_name') && $request->exists('last_name')) 
           {
                $validatedData = $request->validate([
                    'first_name' => 'required|string|max:255',
                    'last_name' => 'required|string|max:255',
                ]);

                  // Save profile
                   $userProfile->update($validatedData);

                   return redirect()->back()->with('success', 'Profile in name updated successfully.');

           }
           else if($request->exists('date_of_birth') && $request->exists('gender')) 
           {
                $validatedData = $request->validate([
                     'date_of_birth' => 'required|date',
                     'gender' => 'required|string|max:20',
                ]);

                  // Save profile
                   $userProfile->update($validatedData);

                   return redirect()->back()->with('success', 'Profile in DOB and gender updated successfully.');

           }
           else if($request->exists('address_line_1') ) 
           {
                $validatedData = $request->validate([
                    'address_line_1' => 'nullable|string|max:255',
                    'address_line_2' => 'nullable|string|max:255',
                    'city' => 'nullable|string|max:100',
                    'state_province' => 'nullable|string|max:100',
                    'postal_code' => 'nullable|string|max:20',
                    'country' => 'nullable|string|max:100',
                ]);

                  // Save profile
                   $userProfile->update($validatedData);

                   return redirect()->back()->with('success', 'Profile in Address updated successfully.');

           }
           else if($request->exists('profile_picture_url')) 
           {
                $validatedData = $request->validate([
                                'profile_picture_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

                ]);

                

           // Handle profile picture upload
           if ($request->hasFile('profile_picture_url')) {
            $file = $request->file('profile_picture_url');
            $path = $file->store('uploads/profile_pictures', 'public');
            $userProfile->profile_picture_url = Storage::url($path);
            }

                  // Save profile
                   $userProfile->update();

                   return redirect()->back()->with('success', 'Profile in image updated successfully.');

           }
           
           else if($request->exists('bio') && $request->exists('preferred_language')) 
           {
                $validatedData = $request->validate([
                    'bio' => 'nullable|string|max:1000',
                    'preferred_language' => 'nullable|string|max:50',
                ]);

                  // Save profile
                   $userProfile->update($validatedData);

                   return redirect()->back()->with('success', 'Profile in bio updated successfully.');

           }
        

        //return redirect()->back()->with('success', 'Profile updated successfully.');

     }


      public function branchExecutiveProfile()
     {
        return view('Access.Core.Branch_Executive.profile');
     }

      public function updatebranchExecutiveProfile(Request $request)
     {

        $user = Auth::user();

        

        // Ensure the user has a profile, otherwise create one
        $userProfile = $user->userProfile ?: new UserProfile(['user_id' => $user->id]);
       
           if($request->exists('first_name') && $request->exists('last_name')) 
           {
                $validatedData = $request->validate([
                    'first_name' => 'required|string|max:255',
                    'last_name' => 'required|string|max:255',
                ]);

                

                  // Save profile
                   $userProfile->update($validatedData);

                   return redirect()->back()->with('success', 'Profile in name updated successfully.');

           }
           else if($request->exists('date_of_birth') && $request->exists('gender')) 
           {
                $validatedData = $request->validate([
                     'date_of_birth' => 'required|date',
                     'gender' => 'required|string|max:20',
                ]);

                  // Save profile
                   $userProfile->update($validatedData);

                   return redirect()->back()->with('success', 'Profile in DOB and gender updated successfully.');

           }
           else if($request->exists('address_line_1') ) 
           {
                $validatedData = $request->validate([
                    'address_line_1' => 'nullable|string|max:255',
                    'address_line_2' => 'nullable|string|max:255',
                    'city' => 'nullable|string|max:100',
                    'state_province' => 'nullable|string|max:100',
                    'postal_code' => 'nullable|string|max:20',
                    'country' => 'nullable|string|max:100',
                ]);

                  // Save profile
                   $userProfile->update($validatedData);

                   return redirect()->back()->with('success', 'Profile in Address updated successfully.');

           }
           else if($request->exists('profile_picture_url')) 
           {
                $validatedData = $request->validate([
                                'profile_picture_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

                ]);

                

           // Handle profile picture upload
           if ($request->hasFile('profile_picture_url')) {
            $file = $request->file('profile_picture_url');
            $path = $file->store('uploads/profile_pictures', 'public');
            $userProfile->profile_picture_url = Storage::url($path);
            }

                  // Save profile
                   $userProfile->update();

                   return redirect()->back()->with('success', 'Profile in image updated successfully.');

           }
           
           else if($request->exists('bio') && $request->exists('preferred_language')) 
           {
                $validatedData = $request->validate([
                    'bio' => 'nullable|string|max:1000',
                    'preferred_language' => 'nullable|string|max:50',
                ]);

                  // Save profile
                   $userProfile->update($validatedData);

                   return redirect()->back()->with('success', 'Profile in bio updated successfully.');

           }
        

        //return redirect()->back()->with('success', 'Profile updated successfully.');

     }

     public function InstructorProfile()
     {
        return view('Access.Core.Instructor.profile');
     }

      public function updateInstructorProfile(Request $request)
     {

        $user = Auth::user();

        

        // Ensure the user has a profile, otherwise create one
        $userProfile = $user->userProfile ?: new UserProfile(['user_id' => $user->id]);
       
           if($request->exists('first_name') && $request->exists('last_name')) 
           {
                $validatedData = $request->validate([
                    'first_name' => 'required|string|max:255',
                    'last_name' => 'required|string|max:255',
                ]);

                

                  // Save profile
                   $userProfile->update($validatedData);

                   return redirect()->back()->with('success', 'Profile in name updated successfully.');

           }
           else if($request->exists('date_of_birth') && $request->exists('gender')) 
           {
                $validatedData = $request->validate([
                     'date_of_birth' => 'required|date',
                     'gender' => 'required|string|max:20',
                ]);

                  // Save profile
                   $userProfile->update($validatedData);

                   return redirect()->back()->with('success', 'Profile in DOB and gender updated successfully.');

           }
           else if($request->exists('address_line_1') ) 
           {
                $validatedData = $request->validate([
                    'address_line_1' => 'nullable|string|max:255',
                    'address_line_2' => 'nullable|string|max:255',
                    'city' => 'nullable|string|max:100',
                    'state_province' => 'nullable|string|max:100',
                    'postal_code' => 'nullable|string|max:20',
                    'country' => 'nullable|string|max:100',
                ]);

                  // Save profile
                   $userProfile->update($validatedData);

                   return redirect()->back()->with('success', 'Profile in Address updated successfully.');

           }
           else if($request->exists('profile_picture_url')) 
           {
                $validatedData = $request->validate([
                                'profile_picture_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

                ]);

                

           // Handle profile picture upload
           if ($request->hasFile('profile_picture_url')) {
            $file = $request->file('profile_picture_url');
            $path = $file->store('uploads/profile_pictures', 'public');
            $userProfile->profile_picture_url = Storage::url($path);
            }

                  // Save profile
                   $userProfile->update();

                   return redirect()->back()->with('success', 'Profile in image updated successfully.');

           }
           
           else if($request->exists('bio') && $request->exists('preferred_language')) 
           {
                $validatedData = $request->validate([
                    'bio' => 'nullable|string|max:1000',
                    'preferred_language' => 'nullable|string|max:50',
                ]);

                  // Save profile
                   $userProfile->update($validatedData);

                   return redirect()->back()->with('success', 'Profile in bio updated successfully.');

           }
        

        //return redirect()->back()->with('success', 'Profile updated successfully.');

     }

      public function LearnerProfile()
     {
        return view('Access.Core.Learner.profile');
     }

      public function updateLearnerProfile(Request $request)
     {

        $user = Auth::user();

        

        // Ensure the user has a profile, otherwise create one
        $userProfile = $user->userProfile ?: new UserProfile(['user_id' => $user->id]);
       
           if($request->exists('first_name') && $request->exists('last_name')) 
           {
                $validatedData = $request->validate([
                    'first_name' => 'required|string|max:255',
                    'last_name' => 'required|string|max:255',
                ]);

                

                  // Save profile
                   $userProfile->update($validatedData);

                   return redirect()->back()->with('success', 'Profile in name updated successfully.');

           }
           else if($request->exists('date_of_birth') && $request->exists('gender')) 
           {
                $validatedData = $request->validate([
                     'date_of_birth' => 'required|date',
                     'gender' => 'required|string|max:20',
                ]);

                  // Save profile
                   $userProfile->update($validatedData);

                   return redirect()->back()->with('success', 'Profile in DOB and gender updated successfully.');

           }
           else if($request->exists('address_line_1') ) 
           {
                $validatedData = $request->validate([
                    'address_line_1' => 'nullable|string|max:255',
                    'address_line_2' => 'nullable|string|max:255',
                    'city' => 'nullable|string|max:100',
                    'state_province' => 'nullable|string|max:100',
                    'postal_code' => 'nullable|string|max:20',
                    'country' => 'nullable|string|max:100',
                ]);

                  // Save profile
                   $userProfile->update($validatedData);

                   return redirect()->back()->with('success', 'Profile in Address updated successfully.');

           }
           else if($request->exists('profile_picture_url')) 
           {
                $validatedData = $request->validate([
                                'profile_picture_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

                ]);

                

           // Handle profile picture upload
           if ($request->hasFile('profile_picture_url')) {
            $file = $request->file('profile_picture_url');
            $path = $file->store('uploads/profile_pictures', 'public');
            $userProfile->profile_picture_url = Storage::url($path);
            }

                  // Save profile
                   $userProfile->update();

                   return redirect()->back()->with('success', 'Profile in image updated successfully.');

           }
           
           else if($request->exists('bio') && $request->exists('preferred_language')) 
           {
                $validatedData = $request->validate([
                    'bio' => 'nullable|string|max:1000',
                    'preferred_language' => 'nullable|string|max:50',
                ]);

                  // Save profile
                   $userProfile->update($validatedData);

                   return redirect()->back()->with('success', 'Profile in bio updated successfully.');

           }
        

        //return redirect()->back()->with('success', 'Profile updated successfully.');

     }
}