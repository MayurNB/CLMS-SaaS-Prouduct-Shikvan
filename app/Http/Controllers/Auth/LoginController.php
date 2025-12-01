<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserBranchRole;

use Illuminate\Support\Facades\Log;

use App\Services\LogService;

class LoginController extends Controller
{
    /**
     * Show login form
     */
    public function showLoginForm()
    {

       

    dd('open');
        $branding = [
            'name' => 'Your Institution',
            'logo_url' => '/images/logo.png',
            'background_image_url' => '/images/bg.jpg',
        ];

        
        

        return view('auth.login', compact('branding'));
    }

    /**
     * Handle login request
     */
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (!Auth::attempt($credentials)) {
            return back()->withErrors(['Invalid credentials']);
        }

        $user = Auth::user();

        // 1️⃣ Global Roles
        $systemRoles = $user->roles()
            ->whereIn('name', ['Admin', 'SystemEmployer'])
            ->wherePivot('status', 'active')
            ->get();

        // 2️⃣ Branch Roles
        $branchRoles = UserBranchRole::with(['branch', 'role'])
            ->where('user_id', $user->id)
            ->whereHas('role', function ($q) {
                $q->whereIn('name', ['BranchExecutive', 'Instructor', 'Learner']);
            })
            ->where('is_active', 1)
            ->get();

        // 3️⃣ Combine roles
        $combinedRoles = collect();

        foreach ($systemRoles as $role) {
            $combinedRoles->push([
                'type' => 'global',
                'id' => $role->role_id,
                'name' => $role->name,
                'branch' => null,
                'dashboard' => $role->dashboard_route_name ?? 'dashboard',
            ]);
        }

        foreach ($branchRoles as $br) {
            $combinedRoles->push([
                'type' => 'branch',
                'id' => $br->id,
                'name' => $br->role->name,
                'branch' => $br->branch->branch_name ?? 'No Branch',
                'dashboard' => $br->role->dashboard_route_name ?? 'dashboard',
            ]);
        }

        if ($combinedRoles->isEmpty()) {
            Auth::logout();
            return back()->withErrors(['No roles assigned to this user.']);
        }

        // Single role → auto redirect
        if ($combinedRoles->count() === 1) {
            $selected = $combinedRoles->first();

            if ($selected['type'] === 'global') {
                session(['selected_role_prefix' => strtolower($selected['name'])]);
                return redirect()->route($selected['dashboard']);
            }

            if ($selected['type'] === 'branch') {
                $branchRole = UserBranchRole::with(['branch', 'role'])->find($selected['id']);
                session([
                    'activeBranch_id' => $branchRole->branch_id,
                    'activeRole_id' => $branchRole->role_id,
                    'selected_role_prefix' => strtolower($branchRole->role->name),
                ]);
                return redirect()->route($selected['dashboard']);
            }
        }

        // Multi-role → select
        session(['combinedRoles' => $combinedRoles]);
        return redirect()->route('login.showBranchRole');
    }

    /**
     * Show branch/role selection page
     */
    public function showBranchRoleSelection()
    {
        $combinedRoles = session('combinedRoles');
        if (!$combinedRoles) {
            return redirect()->route('login');
        }

        $branding = [
            'name' => 'Your Institution',
            'logo_url' => '/images/logo.png',
            'background_image_url' => '/images/bg.jpg',
        ];

        return view('auth.role_selection', compact('branding', 'combinedRoles'));
    }

    /**
     * Select role after login
     */
    public function selectBranchRole(Request $request)
    {
        $request->validate([
            'role_type' => 'required',
            'role_id' => 'required',
        ]);

        $type = $request->input('role_type');
        $id = $request->input('role_id');

        if ($type === 'global') {
            // ⚡ Fix ambiguous column here
            $role = Auth::user()->roles()->where('roles.role_id', $id)->first();
            if (!$role) return back()->withErrors(['Invalid global role selected.']);

            session(['selected_role_prefix' => strtolower($role->name)]);

            return redirect()->route($role->dashboard_route_name ?? 'dashboard');
        }

        if ($type === 'branch') {
            $branchRole = UserBranchRole::with(['branch', 'role'])->find($id);
            if (!$branchRole) return back()->withErrors(['Invalid branch role selected.']);

            session([
                'activeBranch_id' => $branchRole->branch_id,
                'activeRole_id' => $branchRole->role_id,
                'selected_role_prefix' => strtolower($branchRole->role->name),
            ]);

            return redirect()->route($branchRole->role->dashboard_route_name ?? 'dashboard');
        }

        return redirect()->route('login');
    }

    /**
     * Logout
     */
    public function logout(Request $request)
    {
       // Logout authenticated user
    Auth::logout();

    // Clear all data from session
    $request->session()->flush();

    // Invalidate old session completely
    $request->session()->invalidate();

    // Regenerate session token for safety
    $request->session()->regenerateToken();

    // Redirect
    return redirect()->route('login');
    }
}
