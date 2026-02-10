<?php

namespace App\Http\Controllers\Tax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;


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


class TaxSetupController extends Controller
{
   public function employerTexCreationPageShow()
{

    $user = Auth::user();

    // Correctly get the institute ID via employer profile
    $instituteId = $user->employerProfile?->institute?->id;
    // Fetch all tax records to display in the table
    $taxes = \App\Models\TaxMaster::orderBy('created_at', 'desc')->where('institute_id',$instituteId)->where('status',1)->get();
    
    return view('Access.Core.Employer.tax_setup', compact('taxes'));
}

// Add this store method for the form submission
public function storeTax(Request $request)
{
     $user = Auth::user();

    // Correctly get the institute ID via employer profile
    $instituteId = $user->employerProfile?->institute?->id;


   $request->validate([
        'tax_name' => 'required|string|max:255',
        'tax_percentage' => 'required|numeric|between:0,99.99',
    ]);

    \App\Models\TaxMaster::create([
        'id' => \Illuminate\Support\Str::uuid(),
        'institute_id' => $instituteId,
        'tax_name' => $request->tax_name,
        'tax_code' => $request->tax_code,
        'tax_percentage' => $request->tax_percentage,
        'remark' => $request->remark,
        'status' => 1,
        'created_by' => Auth :: id(),
    ]);

    return redirect()->back()->with('success', 'Tax created successfully!');
}
}