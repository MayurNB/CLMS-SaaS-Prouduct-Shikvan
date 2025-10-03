@extends('layouts.app') {{-- Assumes your main layout file is layouts/app.blade.php --}}

@section('breadcrumb_item_active', 'Dashboard') {{-- Assuming this is for your breadcrumbs --}}

@section('quick')

 <div class="container-fluid border-bottom px-4">
          <button class="header-toggler" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()" style="margin-inline-start: -14px;">
            <svg class="icon icon-lg">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-menu') }}"></use>
            </svg>
          </button>
          <ul class="header-nav d-none d-lg-flex">
            <li class="nav-item"><a class="nav-link" href="#">Dashboard</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Batch Mgt</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Student Mgt</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Staff Mgt</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Fees Mgt</a></li>
          </ul>
          <ul class="header-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="#">
                
             <li class="nav-item dropdown"><a class="nav-link py-0 pe-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <div class="avatar avatar-md">
                    <svg class="icon icon-lg">
                  <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-bell') }}"></use>
                </svg>
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
                  </svg> Comments<span class="badge badge-sm bg-warning ms-2">42</span></a>
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
                  </svg> Lock Account</a><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-account-logout') }}"></use>
                  </svg> Logout</a>
              </div>
            </li>
            </a></li>
                
            <li class="nav-item"><a class="nav-link" href="#">
                <svg class="icon icon-lg">
                  <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-list-rich') }}"></use>
                </svg></a></li>
            <li class="nav-item"><a class="nav-link" href="#">
                <svg class="icon icon-lg">
                  <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-envelope-open') }}"></use>
                </svg></a></li>
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
                <div class="avatar avatar-md"><img class="avatar-img" src="{{ asset('coreui/assets/img/avatars/8.jpg') }}" alt="user@email.com"></div>
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
                  </svg> Comments<span class="badge badge-sm bg-warning ms-2">42</span></a>
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
                  </svg> Lock Account</a><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-account-logout') }}"></use>
                  </svg> Logout</a>
              </div>
            </li>
          </ul>
        </div>

@endsection




@section('side bar')
<ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-speedometer') }}"></use>
            </svg> Dashboard<span class="badge badge-sm bg-info ms-auto">NEW</span></a></li>
        <li class="nav-title">Theme</li>
        <li class="nav-item"><a class="nav-link" href="{{ route('Operations_Executive_profile') }}">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-drop') }}"></use>
            </svg> Profile</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('Operations_Executive_profile') }}">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-pencil') }}"></use>
            </svg> User Mgt</a></li>
        <li class="nav-title">Working</li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-puzzle') }}"></use>
            </svg> Batch Mgt</a>
          <ul class="nav-group-items compact">
            <li class="nav-item"><a class="nav-link" href="{{ url('/base/accordion') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Accordion</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/base/breadcrumb') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Breadcrumb</a></li>
            <li class="nav-item"><a class="nav-link" href="https://coreui.io/bootstrap/docs/components/calendar/" target="_blank"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Calendar
                <svg class="icon icon-sm ms-2">
                  <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-external-link') }}"></use>
                </svg><span class="badge badge-sm bg-danger ms-auto">PRO</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/base/cards') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Cards</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/base/carousel') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Carousel</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/base/collapse') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Collapse</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/base/list-group') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> List group</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/base/navs-tabs') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Navs &amp; Tabs</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/base/pagination') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Pagination</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/base/placeholders') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Placeholders</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/base/popovers') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Popovers</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/base/progress') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Progress</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/base/spinners') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Spinners</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/base/tables') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Tables</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/base/tooltips') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Tooltips</a></li>
          </ul>
        </li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-cursor') }}"></use>
            </svg> Staff Mgt</a>
          <ul class="nav-group-items compact">
            <li class="nav-item"><a class="nav-link" href="{{ url('/buttons/buttons') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Buttons</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/buttons/button-group') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Buttons Group</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/buttons/dropdowns') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Dropdowns</a></li>
            <li class="nav-item"><a class="nav-link" href="https://coreui.io/bootstrap/docs/components/loading-buttons/" target="_blank"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Loading Buttons
                <svg class="icon icon-sm ms-2">
                  <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-external-link') }}"></use>
                </svg><span class="badge badge-sm bg-danger ms-auto">PRO</span></a></li>
          </ul>
        </li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/charts') }}">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-chart-pie') }}"></use>
            </svg> Salary Mgt</a></li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-notes') }}"></use>
            </svg> Attandance Mgt</a>
          <ul class="nav-group-items compact">
            <li class="nav-item"><a class="nav-link" href="{{ url('/forms/form-control') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Form Control</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/forms/select') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Select</a></li>
            <li class="nav-item"><a class="nav-link" href="https://coreui.io/bootstrap/docs/forms/multi-select/" target="_blank"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Multi Select
                <svg class="icon icon-sm ms-2">
                  <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-external-link') }}"></use>
                </svg><span class="badge badge-sm bg-danger ms-auto">PRO</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/forms/checks-radios') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Checks and radios</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/forms/range') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Range</a></li>
            <li class="nav-item"><a class="nav-link" href="https://coreui.io/bootstrap/docs/forms/range-slider/" target="_blank"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Range Slider
                <svg class="icon icon-sm ms-2">
                  <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-external-link') }}"></use>
                </svg><span class="badge badge-sm bg-danger ms-auto">PRO</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/forms/input-group') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Input group</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/forms/floating-labels') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Floating labels</a></li>
            <li class="nav-item"><a class="nav-link" href="https://coreui.io/bootstrap/docs/forms/date-picker/" target="_blank"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Date Picker
                <svg class="icon icon-sm ms-2">
                  <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-external-link') }}"></use>
                </svg><span class="badge badge-sm bg-danger ms-auto">PRO</span></a></li>
            <li class="nav-item"><a class="nav-link" href="https://coreui.io/bootstrap/docs/forms/date-range-picker/" target="_blank"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Date Range Picker<span class="badge badge-sm bg-danger ms-auto">PRO</span></a></li>
            <li class="nav-item"><a class="nav-link" href="https://coreui.io/bootstrap/docs/forms/rating/" target="_blank"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Rating
                <svg class="icon icon-sm ms-2">
                  <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-external-link') }}"></use>
                </svg><span class="badge badge-sm bg-danger ms-auto">PRO</span></a></li>
            <li class="nav-item"><a class="nav-link" href="https://coreui.io/bootstrap/docs/forms/time-picker/" target="_blank"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Time Picker
                <svg class="icon icon-sm ms-2">
                  <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-external-link') }}"></use>
                </svg><span class="badge badge-sm bg-danger ms-auto">PRO</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/forms/layout') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Layout</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/forms/validation') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Validation</a></li>
          </ul>
        </li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-star') }}"></use>
            </svg> Communication </a>
          <ul class="nav-group-items compact">
            <li class="nav-item"><a class="nav-link" href="{{ url('/icons/coreui-icons-free') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> CoreUI Icons<span class="badge badge-sm bg-success ms-auto">Free</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/icons/coreui-icons-brand') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> CoreUI Icons - Brand</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/icons/coreui-icons-flag') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> CoreUI Icons - Flag</a></li>
          </ul>
        </li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-bell') }}"></use>
            </svg> Notifications</a>
          <ul class="nav-group-items compact">
            <li class="nav-item"><a class="nav-link" href="{{ url('/notifications/alerts') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Alerts</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/notifications/badge') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Badge</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/notifications/modals') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Modals</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/notifications/toasts') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Toasts</a></li>
          </ul>
        </li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/widgets') }}">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-calculator') }}"></use>
            </svg> Fees Mgt<span class="badge badge-sm bg-info ms-auto">NEW</span></a></li>
        <li class="nav-divider"></li>
        <li class="nav-title">Extras</li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-star') }}"></use>
            </svg> ShikVan Team </a>
          <ul class="nav-group-items compact">
            <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}" target="_top">
                <svg class="nav-icon">
                  <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-account-logout') }}"></use>
                </svg> Login</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/register') }}" target="_top">
                <svg class="nav-icon">
                  <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-account-logout') }}"></use>
                </svg> Register</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/404') }}" target="_top">
                <svg class="nav-icon">
                  <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-bug') }}"></use>
                </svg> Error 404</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/500') }}" target="_top">
                <svg class="nav-icon">
                  <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-bug') }}"></use>
                </svg> Error 500</a></li>
          </ul>
        </li>
        <li class="nav-item mt-auto"><a class="nav-link" href="https://coreui.io/docs/templates/installation/" target="_blank">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-description') }}"></use>
            </svg> Services Mgt</a></li>
        <li class="nav-item"><a class="nav-link text-primary fw-semibold" href="https://coreui.io/product/bootstrap-dashboard-template/" target="_top">
            <svg class="nav-icon text-primary">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-layers') }}"></use>
            </svg> Try CoreUI PRO</a></li>
      </ul>
  

 @endsection

@section('content')

<div class="card text-center">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs" id="myCoreUITabs" role="tablist">
            <li class="nav-item" role="presentation">
                {{-- 'active' class on the first tab link to make it default --}}
                <a class="nav-link active" id="view-tab" data-bs-toggle="tab" data-bs-target="#viewContent" type="button" role="tab" aria-controls="viewContent" aria-selected="true">View</a>
            </li>
            
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content" id="myCoreUITabContent">
            {{-- View Tab Content --}}
            {{-- 'show active' classes on the first tab pane to make it visible by default --}}
            <div class="tab-pane fade show active" id="viewContent" role="tabpanel" aria-labelledby="view-tab">
                <h5 class="card-title">OE Profile</h5>
                  <div class="mb-3 row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Your Name</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="email@example.com">
    </div>
    <label for="staticEmail" class="col-sm-2 col-form-label">Your Email</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="email@example.com">
    </div>
     <label for="staticEmail" class="col-sm-2 col-form-label">Your Phone Number</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="email@example.com">
    </div>
     <label for="staticEmail" class="col-sm-2 col-form-label">Your Role</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="email@example.com">
    </div>
     <label for="staticEmail" class="col-sm-2 col-form-label">Your Username/System ID</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="email@example.com">
    </div>
     <label for="staticEmail" class="col-sm-2 col-form-label">Your Password</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="email@example.com">
    </div>
    <label for="staticEmail" class="col-sm-2 col-form-label">Official ID</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="email@example.com">
    </div>
    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel">Modal 1</h5>
        <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h6>NOTE: use policy of 1 new and 2 old info due to security checkup, you can't update at time more than 1 data at time 1 only can be do with help of 2 data are the old.</h6>
        <br>
        <form class="row g-3">
  <div class="col-auto">
    <label for="staticEmail2" class="visually">Email</label>
    <input type="text"  class="form-control-plaintext" id="staticEmail2" value="email@example.com">
  </div>
  <div class="col-auto">
    <label for="staticEmail2" class="visually">Phone Number</label>
    <input type="text"  class="form-control-plaintext" id="staticEmail2" value="email@example.com">
  </div>
  <div class="col-auto">
    <label for="inputPassword2" class="visually">Password</label>
    <input type="password" class="form-control" id="inputPassword2" placeholder="Password">
  </div>
  <div class="col-auto">
    <button type="submit" class="btn btn-primary mb-3">Confirm identity</button>
  </div>
</form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-coreui-target="#exampleModalToggle2" data-coreui-toggle="modal">Open second modal</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered **modal-fullscreen**">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel2">Modal 2</h5>
        <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Hide this modal and show the first with the button below.
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-coreui-target="#exampleModalToggle" data-coreui-toggle="modal">Back to first</button>
      </div>
    </div>
  </div>
</div>
<button class="btn btn-primary w-auto" data-coreui-target="#exampleModalToggle" data-coreui-toggle="modal">Open first modal</button>

  </div>
  <!-- <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword">
    </div> 
  </div>-->
            </div>

            

            
        </div>
    </div>
</div>

@endsection

{{-- No @push('scripts') needed here if CoreUI's JS is already loaded globally --}}