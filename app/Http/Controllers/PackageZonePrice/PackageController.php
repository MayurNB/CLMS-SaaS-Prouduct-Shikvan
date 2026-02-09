<?php

namespace App\Http\Controllers\PackageZonePrice;
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
use App\Models\Package;
use Carbon\Carbon;


class PackageController extends Controller
{
    public function packageCreationPageAdmin()
    {
        $packages = Package::orderBy('sort_order')
            ->orderBy('created_at', 'desc')
            ->get();

        return view(
            'Access.Core.Admin.Package_Zone_Price.package_creation',
            compact('packages')
        );
    }

    public function packageCreationByAdmin(Request $request)
    {
        $request->validate([
            'package_name'              => 'required|unique:packages,package_name',
            'description'               => 'nullable|string',
            'min_learner_capacity'       => 'required|integer|min:0',
            'max_learner_capacity'       => 'required|integer|min:0',
            'base_per_learner_rate_urban'=> 'required|numeric|min:0',
            'is_active'                  => 'required|boolean',
            'features'                   => 'nullable|json',
            'sort_order'                 => 'nullable|integer'
        ]);

        Package::create([
            'package_id'                => (string) Str::uuid(),
            'package_name'              => $request->package_name,
            'description'               => $request->description,
            'min_learner_capacity'       => $request->min_learner_capacity,
            'max_learner_capacity'       => $request->max_learner_capacity,
            'base_per_learner_rate_urban'=> $request->base_per_learner_rate_urban,
            'features'                  => $request->features,
            'is_active'                  => $request->is_active,
            'sort_order'                 => $request->sort_order
        ]);

        return redirect()
            ->back()
            ->with('success', 'Package created successfully');
    }

}