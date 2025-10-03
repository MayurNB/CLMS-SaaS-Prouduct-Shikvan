<?php

namespace App\Http\Controllers\InstituteInfoShow;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InstituteInfo;

class InstituteLoginPageController extends Controller
{
    /**
     * Show the login page with institute branding.
     */
    public function showLoginForm($employerId = null)
{
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
}
