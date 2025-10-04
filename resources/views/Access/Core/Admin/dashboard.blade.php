@extends('layouts.app')

@section('quick')

 <div class="container-fluid border-bottom px-4">
          <button class="header-toggler" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()" style="margin-inline-start: -14px;">
            <svg class="icon icon-lg">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-menu') }}"></use>
            </svg>
          </button>
          <ul class="header-nav d-none d-lg-flex">
            <li class="nav-item"><a class="nav-link" href="#">Dashboard</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Employers Mgt</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Users Mgt</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Subscription Mgt</a></li>
           <!-- <li class="nav-item"><a class="nav-link" href="#">add it new module name</a></li> -->
          </ul>
          <ul class="header-nav ms-auto">
            <b>Welcome Admin!</b>
          </ul>
          <ul class="header-nav">
            <li class="nav-item py-1">
              <div class="vr h-100 mx-2 text-body text-opacity-75"></div>
            </li>
            <li class="nav-item dropdown">
              <button class="btn btn-link nav-link py-2 px-2 d-flex align-items-center" type="button" aria-expanded="false" data-coreui-toggle="dropdown">
                <svg class="icon icon-lg theme-icon-active">
                  <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-contrast') }}"></use>
                </svg>
              </button>
              <ul class="dropdown-menu dropdown-menu-end" style="--cui-dropdown-min-width: 8rem;">
                <li>
                  <button class="dropdown-item d-flex align-items-center" type="button" data-coreui-theme-value="light">
                    <svg class="icon icon-lg me-3">
                      <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-sun') }}"></use>
                    </svg>Light
                  </button>
                </li>
                <li>
                  <button class="dropdown-item d-flex align-items-center" type="button" data-coreui-theme-value="dark">
                    <svg class="icon icon-lg me-3">
                      <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-moon') }}"></use>
                    </svg>Dark
                  </button>
                </li>
                <li>
                  <button class="dropdown-item d-flex align-items-center active" type="button" data-coreui-theme-value="auto">
                    <svg class="icon icon-lg me-3">
                      <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-contrast') }}"></use>
                    </svg>Auto
                  </button>
                </li>
              </ul>
            </li>
            <li class="nav-item py-1">
              <div class="vr h-100 mx-2 text-body text-opacity-75"></div>
            </li>
            <li class="nav-item dropdown"><a class="nav-link py-0 pe-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <div class="avatar avatar-md"> {{-- Check if a profile picture URL exists in the user profile --}}
    @php
    $user = Auth::user();
    $userProfile = $user ? $user->userProfile : null;
@endphp
@if ($userProfile && $userProfile->profile_picture_url)
    <img class="avatar-img" src="{{ $userProfile->profile_picture_url }}" alt="User Profile Picture">
@else
    <img class="avatar-img" src="{{ asset('coreui/assets/img/avatars/8.jpg') }}" alt="Default Profile Picture">
@endif
</div>
              </a>
              <div class="dropdown-menu dropdown-menu-end pt-0">
                <div class="dropdown-header bg-body-tertiary text-body-secondary fw-semibold rounded-top mb-2">Account</div><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-bell') }}"></use>
                  </svg> Updates<span class="badge badge-sm bg-info ms-2">42</span></a><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-envelope-open') }}"></use>
                  </svg> Messages<span class="badge badge-sm bg-success ms-2">42</span></a><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-task') }}"></use>
                  </svg> Tasks<span class="badge badge-sm bg-danger ms-2">42</span></a><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-comment-square') }}"></use>
                  </svg> Comments<span class="badge badge-sm bg-warning ms-2">42</span>

                </a>
                <div class="dropdown-header bg-body-tertiary text-body-secondary fw-semibold my-2">
                  <div class="fw-semibold">Settings</div>
                </div><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-user') }}"></use>
                  </svg> Profile</a><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-settings') }}"></use>
                  </svg> Settings</a><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-credit-card') }}"></use>
                  </svg> Payments<span class="badge badge-sm bg-secondary ms-2">42</span></a><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-file') }}"></use>
                  </svg> Projects<span class="badge badge-sm bg-primary ms-2">42</span></a>
                <div class="dropdown-divider"></div><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-lock-locked') }}"></use>
                  </svg> Lock Account</a><!-- Hidden logout form -->
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

<!-- Link that triggers form submission -->
<a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    <svg class="icon me-2">
        <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-account-logout') }}"></use>
    </svg> 
    Logout
</a>
              </div>
            </li>
          </ul>
        </div>

@endsection




@section('breadcrumb_item_active', 'Dashboard')



@section('side bar')
<ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
     <li class="nav-title">Overview</li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-speedometer') }}"></use>
            </svg> Dashboard<span class="badge badge-sm bg-info ms-auto">NEW</span></a></li>
        <li class="nav-title">PERSONAL</li>
        <li class="nav-item"><a class="nav-link" href="{{ route('adminProfile') }}">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-drop') }}"></use>
            </svg> Profile</a></li>
        <li class="nav-title">EMPLOYERS MANAGEMENT</li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-puzzle') }}"></use>
            </svg> Employers Mgt </a>
          <ul class="nav-group-items compact">
            <li class="nav-item"><a class="nav-link" href="{{ route('employerMgtinfo') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Employers Info Mgt</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> New Employers Mgt</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('employerSetupSubscriptions') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Subscriptions Setup</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('onboardEmployer') }}" ><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Onboard Employers
                <svg class="icon icon-sm ms-2">
                  <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-external-link') }}"></use>
                </svg><span class="badge badge-sm bg-danger ms-auto">PRO</span></a></li>
          </ul>
        </li>
         <li class="nav-title">USERS MANAGEMENT</li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-puzzle') }}"></use>
            </svg> Employers Users Mgt </a>
          <ul class="nav-group-items compact">
            <li class="nav-item"><a class="nav-link" href="{{ url('/') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Users Info Mgt</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Control Access Mgt</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/') }}" ><span class="nav-icon"><span class="nav-icon-bullet"></span></span> User Deletion Mgt
                <svg class="icon icon-sm ms-2">
                  <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-external-link') }}"></use>
                </svg><span class="badge badge-sm bg-danger ms-auto">PRO</span></a></li>
          </ul>
        </li>
         <li class="nav-title">SUBSCRIPTION MANAGEMENT</li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-puzzle') }}"></use>
            </svg> Employers Subscription </a>
          <ul class="nav-group-items compact">
            <li class="nav-item"><a class="nav-link" href="{{ url('/') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Subscriber details </a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Payment details</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/') }}" ><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Transaction details
                <svg class="icon icon-sm ms-2">
                  <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-external-link') }}"></use>
                </svg><span class="badge badge-sm bg-danger ms-auto">PRO</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Pending Payments </a></li>

            </ul>

        </li>
        <li class="nav-title">PRICE & PACKAGE MGT</li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-puzzle') }}"></use>
            </svg> Price Package</a>
          <ul class="nav-group-items compact">
            <li class="nav-item"><a class="nav-link" href="{{ url('/') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Creation Price & Package</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Update Price & Package </a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/') }}" ><span class="nav-icon"><span class="nav-icon-bullet"></span></span> View
                <svg class="icon icon-sm ms-2">
                  <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-external-link') }}"></use>
                </svg><span class="badge badge-sm bg-danger ms-auto">PRO</span></a></li>
          </ul>
        </li>

         <li class="nav-title">PRODUCT INFOS & VERSION MGT</li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-puzzle') }}"></use>
            </svg> Product infos version </a>
          <ul class="nav-group-items compact">
            <li class="nav-item"><a class="nav-link" href="{{ url('/') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> product version</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> product infos </a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/') }}" ><span class="nav-icon"><span class="nav-icon-bullet"></span></span> View
                <svg class="icon icon-sm ms-2">
                  <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-external-link') }}"></use>
                </svg><span class="badge badge-sm bg-danger ms-auto">PRO</span></a></li>
          </ul>
        </li>

        
        <li class="nav-divider"></li>
        <li class="nav-title">SHIKVAN SUPPORT & BILLING</li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-star') }}"></use>
            </svg> My Subscription & Billing </a>
          <ul class="nav-group-items compact">
            <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}" target="_top">
                <svg class="nav-icon">
                  <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-account-logout') }}"></use>
                </svg> Contact Support</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/register') }}" target="_top">
                <svg class="nav-icon">
                  <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-account-logout') }}"></use>
                </svg> Legal & Formal Documents </a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/404') }}" target="_top">
                <svg class="nav-icon">
                  <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-bug') }}"></use>
                </svg> Help Center / Documentation</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/500') }}" target="_top">
                <svg class="nav-icon">
                  <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-bug') }}"></use>
                </svg> Term's & Conditions</a></li>
          </ul>
        </li>
       
        <li class="nav-item"><a class="nav-link text-primary fw-semibold" href="https://coreui.io/product/bootstrap-dashboard-template/" target="_top">
            <svg class="nav-icon text-primary">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-layers') }}"></use>
            </svg> Try upgrade</a></li>
      </ul>
  

 @endsection

 @section('content')

<div class="container-lg px-4">
    <div class="row g-4 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card text-white bg-primary">
                <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                    <div>
                        <div class="fs-4 fw-semibold">26K <span class="fs-6 fw-normal">(-12.4%
                                <svg class="icon">
                                    <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-arrow-bottom') }}"></use>
                                </svg>)</span></div>
                        <div>Total Users</div>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg class="icon">
                                <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-options') }}"></use>
                            </svg>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
                    </div>
                </div>
                <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                    <canvas class="chart" id="card-chart4" height="70"></canvas>
                </div>
            </div>
        </div>
       
        
        <div class="col-sm-6 col-xl-3">
            <div class="card text-white bg-info">
                <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                    <div>
                        <div class="fs-4 fw-semibold">$6.200 <span class="fs-6 fw-normal">(40.9%
                                <svg class="icon">
                                    <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-arrow-top') }}"></use>
                                </svg>)</span></div>
                        <div>Total Active Clients</div>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg class="icon">
                                <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-options') }}"></use>
                            </svg>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
                    </div>
                </div>
                <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                    <canvas class="chart" id="card-chart2" height="70"></canvas>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card text-white bg-warning">
                <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                    <div>
                        <div class="fs-4 fw-semibold">2.49% <span class="fs-6 fw-normal">(84.7%
                                <svg class="icon">
                                    <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-arrow-top') }}"></use>
                                </svg>)</span></div>
                        <div>Total Active Subscriptions</div>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg class="icon">
                                <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-options') }}"></use>
                            </svg>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
                    </div>
                </div>
                <div class="c-chart-wrapper mt-3" style="height:70px;">
                    <canvas class="chart" id="card-chart3" height="70"></canvas>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card text-white bg-danger">
                <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                    <div>
                        <div class="fs-4 fw-semibold">44K <span class="fs-6 fw-normal">(-23.6%
                                <svg class="icon">
                                    <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-arrow-bottom') }}"></use>
                                </svg>)</span></div>
                        <div>client drop</div>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg class="icon">
                                <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-options') }}"></use>
                            </svg>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
                    </div>
                </div>
                <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                    <canvas class="chart" id="card-chart4" height="70"></canvas>
                </div>
            </div>
        </div>
        
        </div>

        <div class="container-lg px-4">
    <div class="row g-4 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card text-white bg-primary">
                <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                    <div>
                        <div class="fs-4 fw-semibold">26K <span class="fs-6 fw-normal">(-12.4%
                                <svg class="icon">
                                    <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-arrow-bottom') }}"></use>
                                </svg>)</span></div>
                        <div>Total Revenue</div>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg class="icon">
                                <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-options') }}"></use>
                            </svg>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
                    </div>
                </div>
                <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                    <canvas class="chart" id="card-chart4" height="70"></canvas>
                </div>
            </div>
        </div>
       
        
        <div class="col-sm-6 col-xl-3">
            <div class="card text-white bg-info">
                <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                    <div>
                        <div class="fs-4 fw-semibold">$6.200 <span class="fs-6 fw-normal">(40.9%
                                <svg class="icon">
                                    <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-arrow-top') }}"></use>
                                </svg>)</span></div>
                        <div>Total Upcoming Payment</div>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg class="icon">
                                <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-options') }}"></use>
                            </svg>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
                    </div>
                </div>
                <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                    <canvas class="chart" id="card-chart2" height="70"></canvas>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card text-white bg-warning">
                <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                    <div>
                        <div class="fs-4 fw-semibold">2.49% <span class="fs-6 fw-normal">(84.7%
                                <svg class="icon">
                                    <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-arrow-top') }}"></use>
                                </svg>)</span></div>
                        <div>Today New Client Payment</div>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg class="icon">
                                <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-options') }}"></use>
                            </svg>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
                    </div>
                </div>
                <div class="c-chart-wrapper mt-3" style="height:70px;">
                    <canvas class="chart" id="card-chart3" height="70"></canvas>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card text-white bg-danger">
                <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                    <div>
                        <div class="fs-4 fw-semibold">44K <span class="fs-6 fw-normal">(-23.6%
                                <svg class="icon">
                                    <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-arrow-bottom') }}"></use>
                                </svg>)</span></div>
                        <div>Subscription Payment Pending</div>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg class="icon">
                                <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-options') }}"></use>
                            </svg>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
                    </div>
                </div>
                <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                    <canvas class="chart" id="card-chart4" height="70"></canvas>
                </div>
            </div>
        </div>
        
        </div>
        
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div>
                    <h4 class="card-title mb-0">Growth</h4>
                    <div class="small text-body-secondary">January - July 2023</div>
                </div>
                <div class="btn-toolbar d-none d-md-block" role="toolbar" aria-label="Toolbar with buttons">
                    <div class="btn-group btn-group-toggle mx-3" data-coreui-toggle="buttons">
                        <input class="btn-check" id="option1" type="radio" name="options" autocomplete="off">
                        <label class="btn btn-outline-secondary"> Day</label>
                        <input class="btn-check" id="option2" type="radio" name="options" autocomplete="off" checked="">
                        <label class="btn btn-outline-secondary active"> Month</label>
                        <input class="btn-check" id="option3" type="radio" name="options" autocomplete="off">
                        <label class="btn btn-outline-secondary"> Year</label>
                    </div>
                    <button class="btn btn-primary" type="button">
                        <svg class="icon">
                            <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-cloud-download') }}"></use>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="c-chart-wrapper" style="height:300px;margin-top:40px;">
                <canvas class="chart" id="main-chart" height="300"></canvas>
            </div>
        </div>
        <div class="card-footer">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 row-cols-xl-5 g-4 mb-2 text-center">
                <div class="col">
                    <div class="text-body-secondary">Attandance</div>
                    <div class="fw-semibold text-truncate">29.703 Students (40%)</div>
                    <div class="progress progress-thin mt-2">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="col">
                    <div class="text-body-secondary">Attadance</div>
                    <div class="fw-semibold text-truncate">24.093 Employee (20%)</div>
                    <div class="progress progress-thin mt-2">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="col">
                    <div class="text-body-secondary">Batch</div>
                    <div class="fw-semibold text-truncate">78.706 Conduct (60%)</div>
                    <div class="progress progress-thin mt-2">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="col">
                    <div class="text-body-secondary">Fees</div>
                    <div class="fw-semibold text-truncate">22.123 Uncollected (80%)</div>
                    <div class="progress progress-thin mt-2">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="col d-none d-xl-block">
                    <div class="text-body-secondary">Bounce Rate</div>
                    <div class="fw-semibold text-truncate">40.15%</div>
                    <div class="progress progress-thin mt-2">
                        <div class="progress-bar" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row g-4 mb-4">
        <div class="col-sm-6 col-lg-4">
            <div class="card" style="--cui-card-cap-bg: #3b5998">
                <div class="card-header position-relative d-flex justify-content-center align-items-center">
                    <svg class="icon icon-3xl text-white my-4">
                        <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/brand.svg#cib-facebook-f') }}"></use>
                    </svg>
                    <div class="chart-wrapper position-absolute top-0 start-0 w-100 h-100">
                        <canvas id="social-box-chart-1" height="90"></canvas>
                    </div>
                </div>
                <div class="card-body row text-center">
                    <div class="col">
                        <div class="fs-5 fw-semibold">3</div>
                        <div class="text-uppercase text-body-secondary small">Completed</div>
                    </div>
                    <div class="vr"></div>
                    <div class="col">
                        <div class="fs-5 fw-semibold">10</div>
                        <div class="text-uppercase text-body-secondary small">Today Batchs</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="card" style="--cui-card-cap-bg: #00aced">
                <div class="card-header position-relative d-flex justify-content-center align-items-center">
                    <svg class="icon icon-3xl text-white my-4">
                        <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/brand.svg#cib-twitter') }}"></use>
                    </svg>
                    <div class="chart-wrapper position-absolute top-0 start-0 w-100 h-100">
                        <canvas id="social-box-chart-2" height="90"></canvas>
                    </div>
                </div>
                <div class="card-body row text-center">
                    <div class="col">
                        <div class="fs-5 fw-semibold">23</div>
                        <div class="text-uppercase text-body-secondary small">Active Today</div>
                    </div>
                    <div class="vr"></div>
                    <div class="col">
                        <div class="fs-5 fw-semibold">50</div>
                        <div class="text-uppercase text-body-secondary small">Total Employee</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="card" style="--cui-card-cap-bg: #4875b4">
                <div class="card-header position-relative d-flex justify-content-center align-items-center">
                    <svg class="icon icon-3xl text-white my-4">
                        <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/brand.svg#cib-linkedin') }}"></use>
                    </svg>
                    <div class="chart-wrapper position-absolute top-0 start-0 w-100 h-100">
                        <canvas id="social-box-chart-3" height="90"></canvas>
                    </div>
                </div>
                <div class="card-body row text-center">
                    <div class="col">
                        <div class="fs-5 fw-semibold">50000rs</div>
                        <div class="text-uppercase text-body-secondary small">Remain</div>
                    </div>
                    <div class="vr"></div>
                    <div class="col">
                        <div class="fs-5 fw-semibold">100000rs</div>
                        <div class="text-uppercase text-body-secondary small">Total Fees</div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">Sales &amp; Marketing</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-6">
                                    <div class="border-start border-start-4 border-start-info px-3 mb-3">
                                        <div class="small text-body-secondary text-truncate">New Clients</div>
                                        <div class="fs-5 fw-semibold">9.123</div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="border-start border-start-4 border-start-danger px-3 mb-3">
                                        <div class="small text-body-secondary text-truncate">Recuring Clients</div>
                                        <div class="fs-5 fw-semibold">22.643</div>
                                    </div>
                                </div>
                                </div>
                            <hr class="mt-0">
                            <div class="progress-group mb-4">
                                <div class="progress-group-prepend"><span class="text-body-secondary small">Monday</span></div>
                                <div class="progress-group-bars">
                                    <div class="progress progress-thin">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 34%" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="progress progress-thin">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 78%" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="progress-group mb-4">
                                <div class="progress-group-prepend"><span class="text-body-secondary small">Tuesday</span></div>
                                <div class="progress-group-bars">
                                    <div class="progress progress-thin">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 56%" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="progress progress-thin">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 94%" aria-valuenow="94" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="progress-group mb-4">
                                <div class="progress-group-prepend"><span class="text-body-secondary small">Wednesday</span></div>
                                <div class="progress-group-bars">
                                    <div class="progress progress-thin">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 12%" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="progress progress-thin">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 67%" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="progress-group mb-4">
                                <div class="progress-group-prepend"><span class="text-body-secondary small">Thursday</span></div>
                                <div class="progress-group-bars">
                                    <div class="progress progress-thin">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 43%" aria-valuenow="43" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="progress progress-thin">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 91%" aria-valuenow="91" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="progress-group mb-4">
                                <div class="progress-group-prepend"><span class="text-body-secondary small">Friday</span></div>
                                <div class="progress-group-bars">
                                    <div class="progress progress-thin">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 22%" aria-valuenow="22" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="progress progress-thin">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 73%" aria-valuenow="73" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="progress-group mb-4">
                                <div class="progress-group-prepend"><span class="text-body-secondary small">Saturday</span></div>
                                <div class="progress-group-bars">
                                    <div class="progress progress-thin">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 53%" aria-valuenow="53" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="progress progress-thin">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 82%" aria-valuenow="82" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="progress-group mb-4">
                                <div class="progress-group-prepend"><span class="text-body-secondary small">Sunday</span></div>
                                <div class="progress-group-bars">
                                    <div class="progress progress-thin">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 9%" aria-valuenow="9" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="progress progress-thin">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 69%" aria-valuenow="69" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-6">
                                    <div class="border-start border-start-4 border-start-warning px-3 mb-3">
                                        <div class="small text-body-secondary text-truncate">Pageviews</div>
                                        <div class="fs-5 fw-semibold">78.623</div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="border-start border-start-4 border-start-success px-3 mb-3">
                                        <div class="small text-body-secondary text-truncate">Organic</div>
                                        <div class="fs-5 fw-semibold">49.123</div>
                                    </div>
                                </div>
                                </div>
                            <hr class="mt-0">
                            <div class="progress-group">
                                <div class="progress-group-header">
                                    <svg class="icon icon-lg me-2">
                                        <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-user') }}"></use>
                                    </svg>
                                    <div>Male</div>
                                    <div class="ms-auto fw-semibold">43%</div>
                                </div>
                                <div class="progress-group-bars">
                                    <div class="progress progress-thin">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 43%" aria-valuenow="43" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="progress-group mb-5">
                                <div class="progress-group-header">
                                    <svg class="icon icon-lg me-2">
                                        <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-user-female') }}"></use>
                                    </svg>
                                    <div>Female</div>
                                    <div class="ms-auto fw-semibold">37%</div>
                                </div>
                                <div class="progress-group-bars">
                                    <div class="progress progress-thin">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 43%" aria-valuenow="43" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="progress-group">
                                <div class="progress-group-header">
                                    <svg class="icon icon-lg me-2">
                                        <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/brand.svg#cib-google') }}"></use>
                                    </svg>
                                    <div>Organic Search</div>
                                    <div class="ms-auto fw-semibold me-2">191.235</div>
                                    <div class="text-body-secondary small">(56%)</div>
                                </div>
                                <div class="progress-group-bars">
                                    <div class="progress progress-thin">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 56%" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="progress-group">
                                <div class="progress-group-header">
                                    <svg class="icon icon-lg me-2">
                                        <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/brand.svg#cib-facebook-f') }}"></use>
                                    </svg>
                                    <div>Facebook</div>
                                    <div class="ms-auto fw-semibold me-2">51.223</div>
                                    <div class="text-body-secondary small">(15%)</div>
                                </div>
                                <div class="progress-group-bars">
                                    <div class="progress progress-thin">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="progress-group">
                                <div class="progress-group-header">
                                    <svg class="icon icon-lg me-2">
                                        <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/brand.svg#cib-twitter') }}"></use>
                                    </svg>
                                    <div>Twitter</div>
                                    <div class="ms-auto fw-semibold me-2">37.564</div>
                                    <div class="text-body-secondary small">(11%)</div>
                                </div>
                                <div class="progress-group-bars">
                                    <div class="progress progress-thin">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 11%" aria-valuenow="11" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="progress-group">
                                <div class="progress-group-header">
                                    <svg class="icon icon-lg me-2">
                                        <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/brand.svg#cib-linkedin') }}"></use>
                                    </svg>
                                    <div>LinkedIn</div>
                                    <div class="ms-auto fw-semibold me-2">27.319</div>
                                    <div class="text-body-secondary small">(8%)</div>
                                </div>
                                <div class="progress-group-bars">
                                    <div class="progress progress-thin">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 8%" aria-valuenow="8" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    <br>
                    <div class="table-responsive">
                        <table class="table border mb-0">
                            <thead class="fw-semibold text-nowrap">
                                <tr class="align-middle">
                                    <th class="bg-body-secondary text-center">
                                        <svg class="icon">
                                            <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-people') }}"></use>
                                        </svg>
                                    </th>
                                    <th class="bg-body-secondary">User</th>
                                    <th class="bg-body-secondary text-center">Country</th>
                                    <th class="bg-body-secondary">Usage</th>
                                    <th class="bg-body-secondary text-center">Payment Method</th>
                                    <th class="bg-body-secondary">Activity</th>
                                    <th class="bg-body-secondary"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="align-middle">
                                    <td class="text-center">
                                        <div class="avatar avatar-md">
    {{-- Check if a profile picture URL exists in the user profile --}}
    @php
    $user = Auth::user();
    $userProfile = $user ? $user->userProfile : null;
@endphp
@if ($userProfile && $userProfile->profile_picture_url)
    <img class="avatar-img" src="{{ $userProfile->profile_picture_url }}" alt="User Profile Picture">
@else
    <img class="avatar-img" src="{{ asset('coreui/assets/img/avatars/8.jpg') }}" alt="Default Profile Picture">
@endif
    <span class="avatar-status bg-success"></span>
</div>
                                    </td>
                                    <td>
                                        <div class="text-nowrap">Yiorgos Avraamu</div>
                                        <div class="small text-body-secondary text-nowrap"><span>New</span> | Registered: Jan 1, 2023</div>
                                    </td>
                                    <td class="text-center">
                                        <svg class="icon icon-xl">
                                            <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/flag.svg#cif-us') }}"></use>
                                        </svg>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-between align-items-baseline">
                                            <div class="fw-semibold">50%</div>
                                            <div class="text-nowrap small text-body-secondary ms-3">Jun 11, 2023 - Jul 10, 2023</div>
                                        </div>
                                        <div class="progress progress-thin">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <svg class="icon icon-xl">
                                            <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/brand.svg#cib-cc-mastercard') }}"></use>
                                        </svg>
                                    </td>
                                    <td>
                                        <div class="small text-body-secondary">Last login</div>
                                        <div class="fw-semibold text-nowrap">10 sec ago</div>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-transparent p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <svg class="icon">
                                                    <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-options') }}"></use>
                                                </svg>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Info</a><a class="dropdown-item" href="#">Edit</a><a class="dropdown-item text-danger" href="#">Delete</a></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="align-middle">
                                    <td class="text-center">
                                        <div class="avatar avatar-md"><img class="avatar-img" src="{{ asset('coreui/assets/img/avatars/2.jpg') }}" alt="user@email.com"><span class="avatar-status bg-danger"></span></div>
                                    </td>
                                    <td>
                                        <div class="text-nowrap">Avram Tarasios</div>
                                        <div class="small text-body-secondary text-nowrap"><span>Recurring</span> | Registered: Jan 1, 2023</div>
                                    </td>
                                    <td class="text-center">
                                        <svg class="icon icon-xl">
                                            <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/flag.svg#cif-br') }}"></use>
                                        </svg>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-between align-items-baseline">
                                            <div class="fw-semibold">10%</div>
                                            <div class="text-nowrap small text-body-secondary ms-3">Jun 11, 2023 - Jul 10, 2023</div>
                                        </div>
                                        <div class="progress progress-thin">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <svg class="icon icon-xl">
                                            <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/brand.svg#cib-cc-visa') }}"></use>
                                        </svg>
                                    </td>
                                    <td>
                                        <div class="small text-body-secondary">Last login</div>
                                        <div class="fw-semibold text-nowrap">5 minutes ago</div>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-transparent p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <svg class="icon">
                                                    <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-options') }}"></use>
                                                </svg>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Info</a><a class="dropdown-item" href="#">Edit</a><a class="dropdown-item text-danger" href="#">Delete</a></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="align-middle">
                                    <td class="text-center">
                                        <div class="avatar avatar-md"><img class="avatar-img" src="{{ asset('coreui/assets/img/avatars/3.jpg') }}" alt="user@email.com"><span class="avatar-status bg-warning"></span></div>
                                    </td>
                                    <td>
                                        <div class="text-nowrap">Quintin Ed</div>
                                        <div class="small text-body-secondary text-nowrap"><span>New</span> | Registered: Jan 1, 2023</div>
                                    </td>
                                    <td class="text-center">
                                        <svg class="icon icon-xl">
                                            <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/flag.svg#cif-in') }}"></use>
                                        </svg>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-between align-items-baseline">
                                            <div class="fw-semibold">74%</div>
                                            <div class="text-nowrap small text-body-secondary ms-3">Jun 11, 2023 - Jul 10, 2023</div>
                                        </div>
                                        <div class="progress progress-thin">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 74%" aria-valuenow="74" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <svg class="icon icon-xl">
                                            <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/brand.svg#cib-cc-stripe') }}"></use>
                                        </svg>
                                    </td>
                                    <td>
                                        <div class="small text-body-secondary">Last login</div>
                                        <div class="fw-semibold text-nowrap">1 hour ago</div>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-transparent p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <svg class="icon">
                                                    <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-options') }}"></use>
                                                </svg>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Info</a><a class="dropdown-item" href="#">Edit</a><a class="dropdown-item text-danger" href="#">Delete</a></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="align-middle">
                                    <td class="text-center">
                                        <div class="avatar avatar-md"><img class="avatar-img" src="{{ asset('coreui/assets/img/avatars/4.jpg') }}" alt="user@email.com"><span class="avatar-status bg-secondary"></span></div>
                                    </td>
                                    <td>
                                        <div class="text-nowrap">Enéas Kwadwo</div>
                                        <div class="small text-body-secondary text-nowrap"><span>New</span> | Registered: Jan 1, 2023</div>
                                    </td>
                                    <td class="text-center">
                                        <svg class="icon icon-xl">
                                            <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/flag.svg#cif-fr') }}"></use>
                                        </svg>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-between align-items-baseline">
                                            <div class="fw-semibold">98%</div>
                                            <div class="text-nowrap small text-body-secondary ms-3">Jun 11, 2023 - Jul 10, 2023</div>
                                        </div>
                                        <div class="progress progress-thin">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 98%" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <svg class="icon icon-xl">
                                            <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/brand.svg#cib-cc-paypal') }}"></use>
                                        </svg>
                                    </td>
                                    <td>
                                        <div class="small text-body-secondary">Last login</div>
                                        <div class="fw-semibold text-nowrap">Last month</div>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-transparent p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <svg class="icon">
                                                    <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-options') }}"></use>
                                                </svg>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Info</a><a class="dropdown-item" href="#">Edit</a><a class="dropdown-item text-danger" href="#">Delete</a></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="align-middle">
                                    <td class="text-center">
                                        <div class="avatar avatar-md"><img class="avatar-img" src="{{ asset('coreui/assets/img/avatars/5.jpg') }}" alt="user@email.com"><span class="avatar-status bg-success"></span></div>
                                    </td>
                                    <td>
                                        <div class="text-nowrap">Agapetus Tadeáš</div>
                                        <div class="small text-body-secondary text-nowrap"><span>New</span> | Registered: Jan 1, 2023</div>
                                    </td>
                                    <td class="text-center">
                                        <svg class="icon icon-xl">
                                            <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/flag.svg#cif-es') }}"></use>
                                        </svg>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-between align-items-baseline">
                                            <div class="fw-semibold">22%</div>
                                            <div class="text-nowrap small text-body-secondary ms-3">Jun 11, 2023 - Jul 10, 2023</div>
                                        </div>
                                        <div class="progress progress-thin">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 22%" aria-valuenow="22" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <svg class="icon icon-xl">
                                            <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/brand.svg#cib-cc-apple-pay') }}"></use>
                                        </svg>
                                    </td>
                                    <td>
                                        <div class="small text-body-secondary">Last login</div>
                                        <div class="fw-semibold text-nowrap">Last week</div>
                                    </td>
                                    <td>
                                        <div class="dropdown dropup">
                                            <button class="btn btn-transparent p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <svg class="icon">
                                                    <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-options') }}"></use>
                                                </svg>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Info</a><a class="dropdown-item" href="#">Edit</a><a class="dropdown-item text-danger" href="#">Delete</a></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="align-middle">
                                    <td class="text-center">
                                        <div class="avatar avatar-md"><img class="avatar-img" src="{{ asset('coreui/assets/img/avatars/6.jpg') }}" alt="user@email.com"><span class="avatar-status bg-danger"></span></div>
                                    </td>
                                    <td>
                                        <div class="text-nowrap">Friderik Dávid</div>
                                        <div class="small text-body-secondary text-nowrap"><span>New</span> | Registered: Jan 1, 2023</div>
                                    </td>
                                    <td class="text-center">
                                        <svg class="icon icon-xl">
                                            <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/flag.svg#cif-pl') }}"></use>
                                        </svg>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-between align-items-baseline">
                                            <div class="fw-semibold">43%</div>
                                            <div class="text-nowrap small text-body-secondary ms-3">Jun 11, 2023 - Jul 10, 2023</div>
                                        </div>
                                        <div class="progress progress-thin">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 43%" aria-valuenow="43" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <svg class="icon icon-xl">
                                            <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/brand.svg#cib-cc-amex') }}"></use>
                                        </svg>
                                    </td>
                                    <td>
                                        <div class="small text-body-secondary">Last login</div>
                                        <div class="fw-semibold text-nowrap">Yesterday</div>
                                    </td>
                                    <td>
                                        <div class="dropdown dropup">
                                            <button class="btn btn-transparent p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <svg class="icon">
                                                    <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-options') }}"></use>
                                                </svg>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Info</a><a class="dropdown-item" href="#">Edit</a><a class="dropdown-item text-danger" href="#">Delete</a></div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection