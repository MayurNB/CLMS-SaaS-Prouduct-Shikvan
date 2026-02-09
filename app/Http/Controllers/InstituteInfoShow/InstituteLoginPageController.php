<?php

namespace App\Http\Controllers\InstituteInfoShow;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InstituteInfo;
use App\Models\Program;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Branch;
use Illuminate\Support\Facades\Log;

use App\Services\LogService;


class InstituteLoginPageController extends Controller
{
    /**
     * Show the login page with institute branding.
     */
    public function showLoginForm($employerId = null)
{

     // --- Log at the very start of the request ---
    LogService::app("Login page requested", ['ip' => request()->ip()]);
    LogService::security("Login page requested", ['ip' => request()->ip()]);
    LogService::payment("Login page request recorded", ['ip' => request()->ip()]);

    // --- Force Monolog to flush immediately ---
    // foreach (Log::getMonolog()->getHandlers() as $handler) {
    //     $handler->close();
    // }
    $institute = null;
    if ($employerId) {
        $institute = InstituteInfo::where('employer_id', $employerId)->first();
    }

    $branding = [
        'name' => $institute->institute_name ?? 'Your Institution',
        'logo_url' => $institute->logo_url ?? 'https://via.placeholder.com/150?text=Logo',
        'background_image_url' => $institute->bg_url ?? 'https://via.placeholder.com/600x400?text=Background',
    ];

    return view('login', compact('branding'));
}

  public function employerInstituteManage()
  {

            $programs = Program::all(); 


     // We count all rows in learner_catalog where the current employer is the creator.
        $learnerCount = 0;
        //Learner::where('created_by', $employerId)->count();

        // 3. Calculate the Total Fees Collection (Revenue)
        // We sum the 'raw_fee_amount' column for all entries created by this employer.
        $totalFeesCollected = 0;
        //Learner::where('created_by', $employerId)->sum('raw_fee_amount');

        $programs =0;
        
        // Use a currency symbol (e.g., Indian Rupee)
        $currencySymbol = '₹'; 
     return view('Access.Core.Employer.institute' , [
            'learnerCount' => $learnerCount,
            'totalFees' => $totalFeesCollected,
            'currencySymbol' => $currencySymbol,
            
        ]);
  }

  public function branchExecutiveInstitute()
  {

            $user= Auth::user();

            // Get correct branch ID from session
    $branchId = session('activeBranch_id') ?? null;

            if (!$branchId) {
        dd("No activeBranch in session. Fix your login/session setter.");
    }

    // 2. get institute_id using branchId
    $instituteId = Branch::where('id', $branchId)->value('institute_id');

    if (!$instituteId) {
        dd("Branch does not have institute_id.");
    }

    // 3. get institute info
    $institute = InstituteInfo::where('id',$instituteId)->first();

    if (!$institute) {
        dd("Institute not found.");
    }

    // debug
    // dd($institute->id);

    // 4. return view
    return view('Access.Core.Branch_Executive.institute', [
        'institute' => $institute,
    ]);
  }

   public function InstructorInstitute()
  {

            $user= Auth::user();

            // Get correct branch ID from session
    $branchId = session('activeBranch_id') ?? null;

            if (!$branchId) {
        dd("No activeBranch in session. Fix your login/session setter.");
    }

    // 2. get institute_id using branchId
    $instituteId = Branch::where('id', $branchId)->value('institute_id');

    if (!$instituteId) {
        dd("Branch does not have institute_id.");
    }

    // 3. get institute info
    $institute = InstituteInfo::where('id',$instituteId)->first();

    if (!$institute) {
        dd("Institute not found.");
    }

    // debug
    // dd($institute->id);

    // 4. return view
    return view('Access.Core.Branch_Executive.institute', [
        'institute' => $institute,
    ]);
  }

  public function LearnerInstitute()
  {

           $user= Auth::user();

            // Get correct branch ID from session
    $branchId = session('activeBranch_id') ?? null;

            if (!$branchId) {
        dd("No activeBranch in session. Fix your login/session setter.");
    }

    // 2. get institute_id using branchId
    $instituteId = Branch::where('id', $branchId)->value('institute_id');

    if (!$instituteId) {
        dd("Branch does not have institute_id.");
    }

    // 3. get institute info
    $institute = InstituteInfo::where('id',$instituteId)->first();

    if (!$institute) {
        dd("Institute not found.");
    }

    // debug
    // dd($institute->id);
     return view('Access.Core.Learner.institute' , [
        'institute' => $institute,
    ]);
  }
}
