<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    /**
     * Show login form.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle login attempt.
     */
    public function login(Request $request)
    {
        // ✅ Validate input
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        // ✅ Decide if login field is email or username
        $loginField = filter_var($credentials['username'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        // ✅ Try login
        if (Auth::attempt([$loginField => $credentials['username'], 'password' => $credentials['password']], $request->filled('remember'))) {
            $request->session()->regenerate();

            $user = Auth::user();

            // ✅ Load roles with dashboard route
           $role = $user->roles()
    ->wherePivot('status', 'active') // 👈 correct for pivot columns
    ->first();

            if ($role && !empty($role->dashboard_route_name)) {
                return redirect()->route($role->dashboard_route_name);
            }

            // If no route found → fallback
            return redirect()->intended('/');
        }

        // ❌ Authentication failed
        return back()->withErrors([
            'username' => 'Invalid credentials. Please try again.',
        ])->onlyInput('username');
    }

    /**
     * Handle logout.
     */
    

    public function logout(Request $request)
    {
        Auth::logout(); // Log out the user

        // Invalidate the session and regenerate CSRF token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect to login or home page
        return redirect()->route('login');
    }
}
