<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        $selectedRole = session('selected_role_prefix');

        if (!$selectedRole) {
            return redirect()->route('login.showBranchRole');
        }

        if (strtolower($selectedRole) === strtolower($role)) {
            return $next($request);
        }

        abort(403, 'Unauthorized action.');
    }
}
