@extends('layouts.app') {{-- Assumes your main layout file is layouts/app.blade.php --}}

@section('breadcrumb_item_active', 'Branch Management') {{-- Changed for clarity for this page --}}

@section('quick')
{{-- This section seems to be for your header content --}}
<div class="container-fluid border-bottom px-4">
    <button class="header-toggler" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()" style="margin-inline-start: -14px;">
        <svg class="icon icon-lg">
            <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-menu') }}"></use>
        </svg>
    </button>
    <ul class="header-nav d-none d-lg-flex">
        <li class="nav-item"><a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a></li>
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
                </div><a class="dropdown-item" href="#"> {{-- Changed to point to a 'profile' route --}}
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
                </div><a class="dropdown-item" href="#"> {{-- Changed to point to a 'profile' route --}}
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
    <li class="nav-item"><a class="nav-link" href="{{ url('/dashboard') }}"> {{-- Changed to explicit dashboard route --}}
            <svg class="nav-icon">
                <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-speedometer') }}"></use>
            </svg> Dashboard<span class="badge badge-sm bg-info ms-auto">NEW</span></a></li>
    <li class="nav-title">Theme</li>
    {{-- This link was originally pointing to UserMgt, but is labeled Profile. Changed to point to actual profile route --}}
    <li class="nav-item"><a class="nav-link" href="#"> {{-- Changed to point to a 'profile' route --}}
            <svg class="nav-icon">
                <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-drop') }}"></use>
            </svg> Profile</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ url('UserMgt') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-pencil') }}"></use>
            </svg> User Mgt</a></li>
    <li class="nav-title">Working</li>
    <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-puzzle') }}"></use>
            </svg> Batch Mgt</a>
        <ul class="nav-group-items compact">
            <li class="nav-item"><a class="nav-link" href="{{ url('/base/accordion') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Batch Performance</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/base/breadcrumb') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Manage Batch</a></li>
            <li class="nav-item"><a class="nav-link" href="https://coreui.io/bootstrap/docs/components/calendar/" target="_blank"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Manage Subject 
                    <svg class="icon icon-sm ms-2">
                        <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-external-link') }}"></use>
                    </svg><span class="badge badge-sm bg-danger ms-auto">PRO</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/base/cards') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Manage Schedule </a></li>
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
                    <svg class="icon nav-icon">
                        <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-bug') }}"></use>
                    </svg> Error 500</a></li>
        </ul>
    </li>
    <li class="nav-item mt-auto"><a class="nav-link" href="https://coreui.io/docs/templates/installation/" target="_blank">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-description') }}"></use>
            </svg> Services Mgt</a></li>
    <li class="nav-item"><a class="nav-link text-primary fw-semibold" href="https://coreui.io/product/bootstrap-dashboard-template/" target="_top">
            <svg class="icon nav-icon text-primary">
                <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-layers') }}"></use>
            </svg> Try CoreUI PRO</a></li>
</ul>
@endsection





@section('content')
<style>
    .instructor-header { background: linear-gradient(45deg, #3c4b64, #212333); color: white; padding: 2rem; border-radius: 15px; margin-bottom: 2rem; }
    .today-indicator { background: #eef2ff; border-left: 5px solid #321fdb; border-radius: 8px; }
    .slot-card { transition: transform 0.2s; border: 1px solid #ebedef; }
    .slot-card:hover { transform: translateY(-3px); box-shadow: 0 4px 12px rgba(0,0,0,0.1); }
    .time-badge { background: #321fdb; color: white; padding: 3px 10px; border-radius: 20px; font-size: 0.75rem; }
    .day-chip { display: inline-block; padding: 5px 15px; border-radius: 20px; background: #ebedef; font-weight: bold; font-size: 0.8rem; margin-bottom: 1rem; }
</style>

<div class="container-fluid px-4">
    {{-- Header Section --}}
    <div class="instructor-header shadow-sm">
        <h2 class="mb-1">Hello, {{ Auth::user()->name }}</h2>
        <p class="mb-0 opacity-75">Here is your teaching schedule for this week.</p>
    </div>

    {{-- "Right Now" / Today Section --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="today-indicator p-4 shadow-sm">
                <h5 class="fw-bold mb-3"><i class="cil-calendar me-2"></i>Indicative: Your Sessions Today ({{ $today }})</h5>
                <div class="row">
                    @forelse($todaysClasses as $slot)
                        <div class="col-md-4">
                            <div class="card slot-card h-100">
                                <div class="card-body">
                                    <span class="time-badge mb-2 d-inline-block">
                                        {{ date('h:i A', strtotime($slot->start_time)) }} - {{ date('h:i A', strtotime($slot->end_time)) }}
                                    </span>
                                    <h6 class="fw-bold mb-1">{{ $slot->course->course_name }}</h6>
                                    <p class="small text-muted mb-2">{{ $slot->program->program_name ?? 'N/A' }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="badge bg-light text-dark">Batch: {{ $slot->batch->batch_name }}</span>
                                        <span class="small text-primary fw-bold">📍 {{ $slot->classroom }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-muted">No classes scheduled for today.</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    {{-- Weekly Roadmap Section --}}
    <h5 class="fw-bold mb-3">Weekly Roadmap</h5>
    <div class="row">
        @foreach($days as $day)
            @if(isset($weeklySchedule[$day])) {{-- Only show days that actually have classes --}}
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="day-chip {{ $day == $today ? 'bg-primary text-white' : '' }}">
                        {{ $day }} {{ $day == $today ? '(Today)' : '' }}
                    </div>
                    <div class="list-group shadow-sm">
                        @foreach($weeklySchedule[$day] as $slot)
                            <div class="list-group-item list-group-item-action border-0 mb-1 rounded shadow-sm">
                                <div class="d-flex w-100 justify-content-between">
                                    <h6 class="mb-1 fw-bold">{{ $slot->course->course_name }}</h6>
                                    <small class="text-primary fw-bold">{{ date('h:i A', strtotime($slot->start_time)) }}</small>
                                </div>
                                <p class="mb-1 small text-muted">Program: {{ $slot->program->program_name ?? 'N/A' }}</p>
                                <div class="small">
                                    <span class="text-danger fw-bold">Batch:</span> {{ $slot->batch->batch_name }} | 
                                    <span class="text-dark fw-bold">Room:</span> {{ $slot->classroom }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>
@endsection

{{-- No @push('scripts') needed here if CoreUI's JS is already loaded globally --}}

@push('scripts')
<script>
let page = 1;
let loading = false;
const branchList = document.getElementById('branchList');

branchList.addEventListener('scroll', function() {
    if(branchList.scrollTop + branchList.clientHeight >= branchList.scrollHeight - 10 && !loading) {
        loading = true;
        page++;
        document.getElementById('loading').style.display = 'block';

        fetch(`{{ route('employerBranch') }}?page=${page}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(res => res.text())
        .then(html => {
            if(html.trim().length > 0) {
                document.getElementById('branchRows').insertAdjacentHTML('beforeend', html);
                loading = false;
                document.getElementById('loading').style.display = 'none';
            }
        });
    }
});
</script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll(".viewBranchBtn").forEach(btn => {
        btn.addEventListener("click", function() {
            const branch = JSON.parse(this.dataset.branch);

            // Fill small modal with branch data
            document.getElementById("detailBranchId").value = branch.id;
            document.getElementById("detailBranchName").value = branch.branch_name;
            document.getElementById("detailAddressLine1").value = branch.address_line_1;
            document.getElementById("detailcity").value = branch.city; 
            document.getElementById("detailstate_province").value = branch.state_province;
            document.getElementById("detailpostal_code").value = branch.postal_code;
            document.getElementById("detailcountry").value = branch.country;  
            document.getElementById("detailEmail").value = branch.contact_email;
            document.getElementById("detailPhone").value = branch.phone_number;
            document.getElementById("detailStatus").value = branch.is_active == 1 ? "1" : "0";

            // Remove any leftover backdrops
            document.querySelectorAll('.modal-backdrop').forEach(b => b.remove());

            // Show small modal using CoreUI
            const modal = new coreui.Modal(document.getElementById('branchDetailModal'));
            modal.show();
        });
    });

    // Ensure small modal closes properly and removes any leftover backdrops
    const smallModalEl = document.getElementById('branchDetailModal');
    smallModalEl.addEventListener('hidden.coreui.modal', () => {
        document.querySelectorAll('.modal-backdrop').forEach(b => b.remove());
    });
});
</script>



@endpush