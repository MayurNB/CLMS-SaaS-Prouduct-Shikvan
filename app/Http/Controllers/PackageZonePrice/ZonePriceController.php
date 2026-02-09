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
use App\Models\PricingZone;
use Carbon\Carbon;


class ZonePriceController extends Controller
{
    /**
     * Display the enrollment form view.
     */
    public function zonePricePageAdmin()
    {
        $zones = PricingZone::orderBy('created_at', 'desc')->get();

        return view(
            'Access.Core.Admin.Package_Zone_Price.zone_price_creation',
            compact('zones')
        );
    }

    /**
     * Store Zone
     */
    public function zonePriceByAdmin(Request $request)
    {
        $request->validate([
            'zone_name'       => 'required|string|max:100|unique:pricing_zones,zone_name',
            'description'     => 'nullable|string',
            'rate_multiplier' => 'required|numeric|min:0',
            'is_active'       => 'required|boolean',
        ]);

        PricingZone::create([
            'zone_id'         => (string) Str::uuid(),
            'zone_name'       => $request->zone_name,
            'description'     => $request->description,
            'rate_multiplier' => $request->rate_multiplier,
            'is_active'       => $request->is_active,
        ]);

        return redirect()
            ->back()
            ->with('success', 'Pricing zone created successfully');
    }

}