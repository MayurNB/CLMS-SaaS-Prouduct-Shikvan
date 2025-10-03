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

        $activeRole = $user->roles()
            ->wherePivot('status', 'active')
            ->first();

        // Ensure there are no hidden characters in the route's role name
        $role = trim($role);

        if ($activeRole && $activeRole->name === $role) {
            return $next($request);
        }

        abort(403, 'Unauthorized action.');
    }
}