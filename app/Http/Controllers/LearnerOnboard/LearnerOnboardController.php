<?php

namespace App\Http\Controllers\LearnerOnboard;

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


class LearnerOnboardController extends Controller
{

         function learnerOnboard()
        {
                       
                

                $LearnersData = Learners::where('branch_id', session('activeBranch_id'))
    ->whereDate('created_at', today())
    ->get();
 

                
                return view('Access.Core.Branch_Executive.learner_onboard', compact('LearnersData'));
 
        }

        function learnerDataOnboard(Request $request)
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

            $BranchData = Branch ::where('id',$branchId)->first();

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
                'institute_id' =>  $BranchData->institute_id, 
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

}