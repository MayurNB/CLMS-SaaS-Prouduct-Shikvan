<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\LearnerCatalog;


class DashboardController extends Controller
{
    public function adminDashboard()
    {
        return view('Access.Core.Admin.dashboard');
    }

    public function employerDashboard()
    {
        // 1. Get the ID of the currently logged-in Employer
        $employerId = Auth::id();

        // 2. Calculate the Total Learner Count (i.e., total entries/enrollments)
        // We count all rows in learner_catalog where the current employer is the creator.
        $learnerCount = LearnerCatalog::where('created_by', $employerId)->count();

        // 3. Calculate the Total Fees Collection (Revenue)
        // We sum the 'raw_fee_amount' column for all entries created by this employer.
        $totalFeesCollected = LearnerCatalog::where('created_by', $employerId)->sum('raw_fee_amount');
        
        // Use a currency symbol (e.g., Indian Rupee)
        $currencySymbol = '₹'; 

        // 4. Pass the data to the view
        return view('Access.Core.Employer.dashboard', [
            'learnerCount' => $learnerCount,
            'totalFees' => $totalFeesCollected,
            'currencySymbol' => $currencySymbol,
        ]);
    }
}