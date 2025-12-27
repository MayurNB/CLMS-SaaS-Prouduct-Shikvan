<?php

namespace App\Http\Controllers\ComingSoon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\UserProfile;
use Illuminate\Support\Str;
use App\Models\EmployerProfile;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;


class ComingSoonController extends Controller
{
        public function employerComingSoon()
        {
                return view('Access/Core/Employer/coming_soon');
        }

         public function branch_ExecutiveComingSoon()
        {
                return view('Access/Core/Branch_Executive/coming_soon');
        }

         public function instructorComingSoon()
        {
                return view('Access/Core/Instructor/coming_soon');
        }

         public function learnerComingSoon()
        {
                return view('Access/Core/Learner/coming_soon');
        }

    }
          