<?php

namespace App\Http\Controllers\AdminControllersManagements;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EmployerUserManagementController extends Controller
{
    public function adminOnboardToUser()
    {
        return view('Access.Core.Admin.user');
    }

    // --- 1. Institutes ---
    public function getInstitutes()
    {
        return DB::table('institute_infos')
            ->select('id', 'institute_name')
            ->orderBy('institute_name')
            ->get();
    }

    // --- 2. Branches ---
    public function getBranches($institute_id)
    {
        return DB::table('branches')
            ->where('institute_id', $institute_id)
            ->select('id', 'branch_name')
            ->orderBy('branch_name')
            ->get();
    }

    // --- 3. Roles ---
    public function getRoles($branch_id)
    {
        return DB::table('roles')
            ->select('role_id', 'display_name')
            ->where('status', 'active')
            ->orderBy('display_name')
            ->get();
    }

    // --- 4. Users with Pagination + Search ---
    public function getUsers($branch_id, $role_id, Request $request)
    {
        $search  = $request->query('search', '');
        $perPage = (int) $request->query('per_page', 10);
        $page    = (int) $request->query('page', 1);

        $query = DB::table('users')
            ->join('user_branch_roles', 'users.id', '=', 'user_branch_roles.user_id')
            ->where('user_branch_roles.branch_id', $branch_id)
            ->where('user_branch_roles.role_id', $role_id)
            ->select(
                'users.id',
                'users.name',
                'users.email',
                'users.username',
                DB::raw("CASE WHEN user_branch_roles.is_active = 1 THEN 'active' ELSE 'inactive' END as status")
            );

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('users.name', 'like', "%$search%")
                  ->orWhere('users.email', 'like', "%$search%")
                  ->orWhere('users.username', 'like', "%$search%");
            });
        }

        $total = $query->count();
        $users = $query->orderBy('users.name')
            ->offset(($page - 1) * $perPage)
            ->limit($perPage)
            ->get();

        return response()->json([
            'data' => $users,
            'pagination' => [
                'total' => $total,
                'per_page' => $perPage,
                'current_page' => $page,
                'last_page' => ceil($total / $perPage),
            ],
        ]);
    }

    // --- 5. Single User ---
    public function getSingleUser($user_id)
    {
        return DB::table('users')
            ->select('id', 'name', 'email', 'username')
            ->where('id', $user_id)
            ->first();
    }

    // --- 6. Store or Update ---
    public function storeOrUpdateUser(Request $request)
    {
        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email',
            'username'  => 'required|string|max:100',
            'branch_id' => 'required',
            'role_id'   => 'required',
        ]);

        if ($request->formAction === 'update') {
            DB::table('users')->where('id', $request->user_id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'username' => $request->username,
                'updated_at' => now(),
            ]);
        } else {
            DB::beginTransaction();
            try {
                // Step 1: Insert into users
                $userId = Str::uuid()->toString();
                DB::table('users')->insert([
                    'id' => $userId,
                    'name' => $request->name,
                    'email' => $request->email,
                    'username' => $request->username,
                    'password' => Hash::make($request->password),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                //Step 2: Insert into user_profile
                
                DB::table('user_profiles')->insert([
                    'id' => Str::uuid()->toString(),
                    'user_id' => $userId,
                    
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);



                // Step 3: Insert into user_roles
                DB::table('user_roles')->insert([
                    'user_id' => $userId,
                    'role_id' => $request->role_id,
                    'status' => 'active',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                // Step 4: Insert into user_branch_roles
                DB::table('user_branch_roles')->insert([
                    'id' => Str::uuid()->toString(),
                    'user_id' => $userId,
                    'branch_id' => $request->branch_id,
                    'role_id' => $request->role_id,
                    'is_active' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(['success' => false, 'message' => $e->getMessage()]);
            }
        }

        return response()->json(['success' => true]);
    }
}
