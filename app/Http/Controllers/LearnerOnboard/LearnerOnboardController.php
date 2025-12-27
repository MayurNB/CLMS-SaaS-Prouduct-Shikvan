<?php

namespace App\Http\Controllers\LearnerOnboard;

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


class LearnerOnboardController extends Controller
{

         function learnerOnboard()
        {
                       return view('Access.Core.Branch_Executive.learner_onboard');
 
        }

}