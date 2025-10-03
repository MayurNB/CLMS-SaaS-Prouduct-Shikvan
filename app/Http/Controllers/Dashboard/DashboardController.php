<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function adminDashboard()
    {
        return view('Access.Core.Admin.dashboard');
    }

    public function employerDashboard()
    {
        return view('Access.Core.Employer.dashboard');
    }
}