@extends('layouts.app') {{-- Assumes your main layout file is layouts/app.blade.php --}}

@section('breadcrumb_item_active', 'Programs and Courses') {{-- Changed for clarity for this page --}}

@section('quick')

 <div class="container-fluid border-bottom px-4">
          <button class="header-toggler" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()" style="margin-inline-start: -14px;">
            <svg class="icon icon-lg">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-menu') }}"></use>
            </svg>
          </button>
          <!-- <ul class="header-nav d-none d-lg-flex">
            <li class="nav-item"><a class="nav-link" href="#">Dashboard</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Batch Mgt</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Student Mgt</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Staff Mgt</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Fees Mgt</a></li>
          </ul> -->
          <ul class="header-nav ms-auto">
            {{--<li class="nav-item"><a class="nav-link" href="#">
                
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
            </a></li>--}}
                
          {{--  <li class="nav-item"><a class="nav-link" href="#">
                <svg class="icon icon-lg">
                  <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-list-rich') }}"></use>
                </svg></a></li>
            <li class="nav-item"><a class="nav-link" href="#">
                <svg class="icon icon-lg">
                  <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-envelope-open') }}"></use>
                </svg></a></li> --}}
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
                 {{-- <svg class="icon me-2">
                    <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-envelope-open') }}"></use>
                  </svg> Messages<span class="badge badge-sm bg-success ms-2">42</span></a><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-task') }}"></use>
                  </svg> Tasks<span class="badge badge-sm bg-danger ms-2">42</span></a><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-comment-square') }}"></use>
                  </svg> Comments<span class="badge badge-sm bg-warning ms-2">42</span>
--}}
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
     <li class="nav-title">Overview</li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-speedometer') }}"></use>
            </svg> Dashboard<span class="badge badge-sm bg-info ms-auto">NEW</span></a></li>
        <!-- <li class="nav-title">PERSONAL</li>
        <li class="nav-item"><a class="nav-link" href="{{ route('employerProfile') }}">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-drop') }}"></use>
            </svg> Profile</a></li> -->
        <!-- <li class="nav-title">Branch Management </li>
        <li class="nav-item"><a class="nav-link" href="{{ url('employerProfile') }}">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-pencil') }}"></use>
            </svg> Branch Management</a></li>
        <li class="nav-title">ACCESS CONTROL </li>
        <li class="nav-item"><a class="nav-link" href="{{ url('Employer_acm') }}">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-pencil') }}"></use>
            </svg> Access Control Mgt </a></li> -->
        <li class="nav-title">ACADEMIC MANAGEMENT</li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="{{ url('Employer_acm') }}">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-puzzle') }}"></use>
            </svg>Academic </a>
          <ul class="nav-group-items compact">
            <li class="nav-item"><a class="nav-link" href="{{ Route('employerProgramAndCourses') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Programs & Courses </a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('Employer_content') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Assign  </a></li>
            <!-- <li class="nav-item"><a class="nav-link" href="{{ url('Employer_assignment') }}" ><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Assignment Mgt 
                <svg class="icon icon-sm ms-2">
                  <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-external-link') }}"></use>
                </svg><span class="badge badge-sm bg-danger ms-auto">PRO</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('Employer_exam') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Exam Mgt</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('Employer_result') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Result Mgt </a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/base/collapse') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Collapse</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/base/list-group') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> List group</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/base/navs-tabs') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Navs &amp; Tabs</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/base/pagination') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Pagination</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/base/placeholders') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Placeholders</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/base/popovers') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Popovers</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/base/progress') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Progress</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/base/spinners') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Spinners</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/base/tables') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Tables</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/base/tooltips') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Tooltips</a></li> -->
          </ul>
        </li>
        <li class="nav-title">ADMINISTRATION MANAGEMENT</li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="{{ url('Employer_acm') }}">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-puzzle') }}"></use>
            </svg>Administration </a>
          <ul class="nav-group-items compact">
            <li class="nav-item"><a class="nav-link" href="{{ Route('employerLearnerEnrollment') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Enrollment </a></li>
            <!-- <li class="nav-item"><a class="nav-link" href="{{ url('Employer_content') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Content Mgt </a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('Employer_assignment') }}" ><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Assignment Mgt 
                <svg class="icon icon-sm ms-2">
                  <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-external-link') }}"></use>
                </svg><span class="badge badge-sm bg-danger ms-auto">PRO</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('Employer_exam') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Exam Mgt</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('Employer_result') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Result Mgt </a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/base/collapse') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Collapse</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/base/list-group') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> List group</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/base/navs-tabs') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Navs &amp; Tabs</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/base/pagination') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Pagination</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/base/placeholders') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Placeholders</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/base/popovers') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Popovers</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/base/progress') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Progress</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/base/spinners') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Spinners</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/base/tables') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Tables</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/base/tooltips') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Tooltips</a></li> -->
          </ul>
        </li>

         <!-- <li class="nav-title">PEOPLE MANAGEMENT & ENROLLMENT</li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-cursor') }}"></use>
            </svg> Student Mgt</a>
          <ul class="nav-group-items compact">
            <li class="nav-item"><a class="nav-link" href="{{ url('StdMgt1') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Student Enrollment</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/buttons/button-group') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Enrollment manage</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/buttons/dropdowns') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Student Overview</a></li>
            <li class="nav-item"><a class="nav-link" href="https://coreui.io/bootstrap/docs/components/loading-buttons/" target="_blank"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Loading Buttons
                <svg class="icon icon-sm ms-2">
                  <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-external-link') }}"></use>
                </svg><span class="badge badge-sm bg-danger ms-auto">PRO</span></a></li>
          </ul>
        </li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/charts') }}">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-chart-pie') }}"></use>
            </svg> Staff Mgt</a></li>
         <li class="nav-title">DAILY OPERATIONS</li>
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
         <li class="nav-title">FINANCIAL MANAGEMENT </li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-cursor') }}"></use>
            </svg> Fees Mgt</a>
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
          <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-cursor') }}"></use>
            </svg> Salary Mgt</a>
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
         <li class="nav-title">Communication </li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-star') }}"></use>
            </svg> Announcement</a>
          <ul class="nav-group-items compact">
            <li class="nav-item"><a class="nav-link" href="{{ url('/icons/coreui-icons-free') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> CoreUI Icons<span class="badge badge-sm bg-success ms-auto">Free</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/icons/coreui-icons-brand') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> CoreUI Icons - Brand</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/icons/coreui-icons-flag') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> CoreUI Icons - Flag</a></li>
          </ul>
        </li>
        
         <li class="nav-title">PRODUCT & SERVICES </li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/widgets') }}">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-calculator') }}"></use>
            </svg> Services Mgt<span class="badge badge-sm bg-info ms-auto">NEW</span></a></li>
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
   -->

 @endsection

@section('content')

<div class="card text-center">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs" id="myCoreUITabs" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="view-tab" data-bs-toggle="tab" data-bs-target="#viewContent" type="button" role="tab" aria-controls="viewContent" aria-selected="true">Programs & Courses</a>
            </li>
            <!-- <li class="nav-item" role="presentation">
                <a class="nav-link" id="create-tab" data-bs-toggle="tab" data-bs-target="#createContent" type="button" role="tab" aria-controls="createContent" aria-selected="false">Create User</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="edit-tab" data-bs-toggle="tab" data-bs-target="#editContent" type="button" role="tab" aria-controls="editContent" aria-selected="false">Edit User</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="search-tab" data-bs-toggle="tab" data-bs-target="#searchContent" type="button" role="tab" aria-controls="searchContent" aria-selected="false">Search User</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="delete-tab" data-bs-toggle="tab" data-bs-target="#deleteContent" type="button" role="tab" aria-controls="deleteContent" aria-selected="false">Delete User</a>
            </li> -->
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content" id="myCoreUITabContent">
           {{-- View Tab Content --}}
            <div class="tab-pane fade show active" id="viewContent" role="tabpanel" aria-labelledby="view-tab">
                <h5 class="card-title mb-4">Operations </h5>

                <div class="d-flex flex-wrap justify-content-center gap-3 mb-4"> {{-- Flex container for buttons --}}

                    {{-- Button 1: View Package & Pricing (Opens Modal for Type Selection) --}}
                    <button class="btn btn-primary px-4 py-2 rounded-md" data-coreui-toggle="modal" data-coreui-target="#ViewDataModal">
                        Creation of Programs
                    </button>

                    {{-- Button 2: Package creation (Opens Modal for Package creation) --}}
                    <button class="btn btn-info px-4 py-2 rounded-md" data-coreui-toggle="modal" data-coreui-target="#editUserModal">
                        Creation of Courses
                    </button>

                     {{-- Button 3: Pricing creation (Opens Modal for Pricing insert) --}}
                    <button class="btn btn-info px-4 py-2 rounded-md" data-coreui-toggle="modal" data-coreui-target="#getSpecificUserModal">
                        View
                    </button>

                    <!-- {{-- Button 3: Get Specific User Data (Opens Modal for Role/ID Input) --}}
                    <button class="btn btn-secondary px-4 py-2 rounded-md" data-coreui-toggle="modal" data-coreui-target="#getSpecificUserModal">
                        Get User by ID/Role
                    </button> -->

                </div>

                <p class="text-muted">Click a button above to perform a user management action.</p>

                {{-- Modals for Profile view Actions --}}

                <!-- Modal for "View All Users" (Primary Entry Point) -->
                <div class="modal fade" id="ViewDataModal" tabindex="-1" aria-labelledby="viewUserDataModalLabel" aria-hidden="true" >
                    <div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-lg-down"> {{-- Responsive full-screen on small/medium screens --}}
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="viewUserDataModalLabel">Creation of Program</h5>
                                <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <p><b style="color:red">NOTE: Program creation during carefully fill data becuase program never edit or delete by system due to security & legal complaince, anything need it contact to ADMIN.</b></p>
                                <!-- <div class="d-flex flex-column flex-md-row justify-content-center gap-3 mb-4">
                                    <button class="btn btn-outline-primary w-full w-md-auto" data-coreui-toggle="modal" data-coreui-target="#studentDataModal">View Student Data</button>
                                    <button class="btn btn-outline-info w-full w-md-auto" data-coreui-toggle="modal" data-coreui-target="#staffDataModal">View Staff Data</button>
                                    <button class="btn btn-outline-secondary w-full w-md-auto" data-coreui-toggle="modal" data-coreui-target="#combinedUserDataModal">View All User Types</button>
                               
                                </div> -->
                               
                                {{-- Placeholder for combined user data table, if needed --}}
                                <div id="combinedUserTableContainer" class="table-responsive mt-3">
                                    {{-- This is where a table of all users (students, staff, etc.) would be loaded --}}
                                  {{--  @php
    $user = Auth::user();
    userProfile = $user ? $user->userProfile : null;
@endphp --}}


                                    <table class="table table-striped table-hover">
                                      <form action="{{ route('employerProgramCreation') }}" method="POST" enctype="multipart/form-data">
                                       @csrf  

                                       <thead>
                                        <tr>
                                           
                                           
                                            <th>
                                                Program Name  
                                            </th>
                                            <th>
                                                Description
                                            </th>
                                            <th>
                                                Status 
                                            </th>
                                        </tr>
                                       </thead>
                                       <tbody>
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control" name="ProgramName" id="editUserId" placeholder="Program Name">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="ProgramDescription" id="editUserId" placeholder="Program Description">
                                            </td>
                                            <td>
 <div class="form-group">
           
            <select name="ProgramStatus" class="form-control" required>
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>                                            </td>
                                        </tr>
                                       </tbody>
                                      <!-- <thead>
                                            <tr>
                                                <th>first_name</th>
                                                <th>last_name </th>
                                                <th>date_of_birth</th>
                                                <th>gender </th>
                                               
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- Example Rows (replace with dynamic data from backend) --}}
                                            <tr>

                                            
{{-- @if (userProfile && userProfile->first_name) --}}

<td>                                    <input type="text" class="form-control" name="first_name" id="editUserId" placeholder= " userProfile first_name ">
</td>

{{-- @endif --}}
                                                
                                                 <td>                                    <input type="text" class="form-control" name="last_name" id="editUserId" placeholder="userProfile last_name ">
</td>
                                                 <td>                                    <input type="Date" class="form-control" name="date_of_birth" id="editUserId" placeholder=" userProfile date_of_birth ">
                                                 <p>DOB:   userProfile date_of_birth </p>
</td>
                                                 <td>                                    <input type="text" class="form-control" name="gender" id="editUserId" placeholder=" userProfile gender ">
</td>
                                                 
                                                 
                                                    
                                                           
                                                
                                            </tr>

                                             
                                           
                                        </tbody>
                                        <thead>
                                            <tr>
                                                
                                               
                                               
                                               
                                                <th>address_line_1</th>
                                                <th>address_line_2 </th>
                                                <th> city   </th>
                                                <th>state_province</th>
                                                <th>postal_code </th>
                                                <th>country </th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- Example Rows (replace with dynamic data from backend) --}}
                                            <tr>
                                                
                                                 
                                                 
                                                 
                                                 <td>                                    <input type="text" class="form-control" name="address_line_1" id="editUserId" placeholder=" userProfile address_line_1 ">
</td>
                                                 <td>                                    <input type="text" class="form-control" name="address_line_2" id="editUserId" placeholder=" userProfile address_line_2 ">
</td>
                                                   <td>                                    <input type="text" class="form-control" name="city" id="editUserId" placeholder=" userProfile city ">
</td>
                                                     <td>                                    <input type="text" class="form-control" name="state_province" id="editUserId" placeholder=" userProfile state_province ">
</td>
                                                       <td>                                    <input type="text" class="form-control" name="postal_code" id="editUserId" placeholder=" userProfile postal_code ">
</td>
                                                         <td>                                    <input type="text" class="form-control" name="country" id="editUserId" placeholder=" userProfile country ">
</td>
                                                           
                                                
                                            </tr>

                                             
                                           
                                        </tbody>
                                        <thead>
                                            <tr>
                                                
                                             
                                                <th>profile_picture_url</th>
                                                <th> bio  </th>
                                                <th>preferred_language  </th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- Example Rows (replace with dynamic data from backend) --}}
                                            <tr>
                                                
                                                 
                                                 
                                                 
                                                 <td>                                      <input class="form-control form-control-sm" name="profile_picture_url" id="formFileSm" type="file">
                                                 <p><a href=" userProfile profile_picture_url " target="_blank">View image</a></p>

</td>
                                                 <td>                                    <input type="text" class="form-control" name="bio" id="editUserId" placeholder=" userProfile bio ">
</td>
                                                   <td>                                    <input type="text" class="form-control" name="preferred_language" id="editUserId" placeholder=" userProfile preferred_language ">
</td>
                                                     
                                                       
                                                        
                                                           
                                                               
                                                               
                                                
                                            </tr>

                                             
                                           
                                      </tbody> -->
                                        
                                      
                                      
                                    </table>
                                </div>
                            
                             <div>
                                <p>NOTE: Learner never access this program untill you never assign. </p>
                               
                             </div>
                            </div>
                            <div class="modal-footer">
                                                                                                      <button type="submit" class="btn btn-primary">Save Changes</button>

</form>
    
                            <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Nested Modal: Student Data (Example) -->
                <!-- <div class="modal fade" id="studentDataModal" tabindex="-1" aria-labelledby="studentDataModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="studentDataModalLabel">Student Data Overview</h5>
                                <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>This modal would display comprehensive student data.</p>
                                <div class="mb-3">
                                    <label for="studentIdInput" class="form-label">Enter Student ID:</label>
                                    <input type="text" class="form-control" id="studentIdInput" placeholder="e.g., SIKV001">
                                </div>
                                <button class="btn btn-primary mt-2">Load Student Details</button>
                                <div id="studentDetailsContainer" class="mt-3">
                                    {{-- Student data will be displayed here --}}
                                     {{-- Placeholder for combined user data table, if needed --}}
                                <div id="combinedUserTableContainer" class="table-responsive mt-3 table-scrollable">
                                    {{-- This is where a table of all users (students, staff, etc.) would be loaded --}}
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Role</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- Example Rows (replace with dynamic data from backend) --}}
                                            <tr>
                                                <td>SIKV001</td>
                                                <td>Rahul Sharma</td>
                                                <td>Student</td>
                                                <td>rahul.s@example.com</td>
                                                <td>Active</td>
                                                <td><button class="btn btn-sm btn-outline-primary">Details</button></td>
                                            </tr>
                                            <tr>
                                                <td>SIKVSTAFF005</td>
                                                <td>Priya Patel</td>
                                                <td>Teacher</td>
                                                <td>priya.p@example.com</td>
                                                <td>Active</td>
                                                <td><button class="btn btn-sm btn-outline-primary">Details</button></td>
                                            </tr>
                                            <tr>
                                                <td>SIKVSTAFF005</td>
                                                <td>Priya Patel</td>
                                                <td>Teacher</td>
                                                <td>priya.p@example.com</td>
                                                <td>Active</td>
                                                <td><button class="btn btn-sm btn-outline-primary">Details</button></td>
                                            </tr>
                                            <tr>
                                                <td>SIKVSTAFF005</td>
                                                <td>Priya Patel</td>
                                                <td>Teacher</td>
                                                <td>priya.p@example.com</td>
                                                <td>Active</td>
                                                <td><button class="btn btn-sm btn-outline-primary">Details</button></td>
                                            </tr>
                                            <tr>
                                                <td>SIKVSTAFF005</td>
                                                <td>Priya Patel</td>
                                                <td>Teacher</td>
                                                <td>priya.p@example.com</td>
                                                <td>Active</td>
                                                <td><button class="btn btn-sm btn-outline-primary">Details</button></td>
                                            </tr>
                                            <tr>
                                                <td>SIKVSTAFF005</td>
                                                <td>Priya Patel</td>
                                                <td>Teacher</td>
                                                <td>priya.p@example.com</td>
                                                <td>Active</td>
                                                <td><button class="btn btn-sm btn-outline-primary">Details</button></td>
                                            </tr>
                                            <tr>
                                                <td>SIKVSTAFF005</td>
                                                <td>Priya Patel</td>
                                                <td>Teacher</td>
                                                <td>priya.p@example.com</td>
                                                <td>Active</td>
                                                <td><button class="btn btn-sm btn-outline-primary">Details</button></td>
                                            </tr>
                                            <tr>
                                                <td>SIKVSTAFF005</td>
                                                <td>Priya Patel</td>
                                                <td>Teacher</td>
                                                <td>priya.p@example.com</td>
                                                <td>Active</td>
                                                <td><button class="btn btn-sm btn-outline-primary">Details</button></td>
                                            </tr>
                                            <tr>
                                                <td>SIKVSTAFF005</td>
                                                <td>Priya Patel</td>
                                                <td>Teacher</td>
                                                <td>priya.p@example.com</td>
                                                <td>Active</td>
                                                <td><button class="btn btn-sm btn-outline-primary">Details</button></td>
                                            </tr>
                                            <tr>
                                                <td>SIKVSTAFF005</td>
                                                <td>Priya Patel</td>
                                                <td>Teacher</td>
                                                <td>priya.p@example.com</td>
                                                <td>Active</td>
                                                <td><button class="btn btn-sm btn-outline-primary">Details</button></td>
                                            </tr>
                                            <tr>
                                                <td>SIKVSTAFF005</td>
                                                <td>Priya Patel</td>
                                                <td>Teacher</td>
                                                <td>priya.p@example.com</td>
                                                <td>Active</td>
                                                <td><button class="btn btn-sm btn-outline-primary">Details</button></td>
                                            </tr>
                                            <tr>
                                                <td>SIKVSTAFF005</td>
                                                <td>Priya Patel</td>
                                                <td>Teacher</td>
                                                <td>priya.p@example.com</td>
                                                <td>Active</td>
                                                <td><button class="btn btn-sm btn-outline-primary">Details</button></td>
                                            </tr>
                                            <tr>
                                                <td>SIKVSTAFF005</td>
                                                <td>Priya Patel</td>
                                                <td>Teacher</td>
                                                <td>priya.p@example.com</td>
                                                <td>Active</td>
                                                <td><button class="btn btn-sm btn-outline-primary">Details</button></td>
                                            </tr>
                                            <tr>
                                                <td>SIKVSTAFF005</td>
                                                <td>Priya Patel</td>
                                                <td>Teacher</td>
                                                <td>priya.p@example.com</td>
                                                <td>Active</td>
                                                <td><button class="btn btn-sm btn-outline-primary">Details</button></td>
                                            </tr>
                                            <tr>
                                                <td>SIKVSTAFF005</td>
                                                <td>Priya Patel</td>
                                                <td>Teacher</td>
                                                <td>priya.p@example.com</td>
                                                <td>Active</td>
                                                <td><button class="btn btn-sm btn-outline-primary">Details</button></td>
                                            </tr>
                                            <tr>
                                                <td>SIKVSTAFF005</td>
                                                <td>Priya Patel</td>
                                                <td>Teacher</td>
                                                <td>priya.p@example.com</td>
                                                <td>Active</td>
                                                <td><button class="btn btn-sm btn-outline-primary">Details</button></td>
                                            </tr>
                                            <tr>
                                                <td>SIKVSTAFF005</td>
                                                <td>Priya Patel</td>
                                                <td>Teacher</td>
                                                <td>priya.p@example.com</td>
                                                <td>Active</td>
                                                <td><button class="btn btn-sm btn-outline-primary">Details</button></td>
                                            </tr>
                                            <tr>
                                                <td>SIKVSTAFF005</td>
                                                <td>Priya Patel</td>
                                                <td>Teacher</td>
                                                <td>priya.p@example.com</td>
                                                <td>Active</td>
                                                <td><button class="btn btn-sm btn-outline-primary">Details</button></td>
                                            </tr>
                                            <tr>
                                                <td>SIKVSTAFF005</td>
                                                <td>Priya Patel</td>
                                                <td>Teacher</td>
                                                <td>priya.p@example.com</td>
                                                <td>Active</td>
                                                <td><button class="btn btn-sm btn-outline-primary">Details</button></td>
                                            </tr>
                                            <tr>
                                                <td>SIKVSTAFF005</td>
                                                <td>Priya Patel</td>
                                                <td>Teacher</td>
                                                <td>priya.p@example.com</td>
                                                <td>Active</td>
                                                <td><button class="btn btn-sm btn-outline-primary">Details</button></td>
                                            </tr>
                                            <tr>
                                                <td>SIKVSTAFF005</td>
                                                <td>Priya Patel</td>
                                                <td>Teacher</td>
                                                <td>priya.p@example.com</td>
                                                <td>Active</td>
                                                <td><button class="btn btn-sm btn-outline-primary">Details</button></td>
                                            </tr>
                                            <tr>
                                                <td>SIKVSTAFF005</td>
                                                <td>Priya Patel</td>
                                                <td>Teacher</td>
                                                <td>priya.p@example.com</td>
                                                <td>Active</td>
                                                <td><button class="btn btn-sm btn-outline-primary">Details</button></td>
                                            </tr>
                                            <tr>
                                                <td>SIKVSTAFF005</td>
                                                <td>Priya Patel</td>
                                                <td>Teacher</td>
                                                <td>priya.p@example.com</td>
                                                <td>Active</td>
                                                <td><button class="btn btn-sm btn-outline-primary">Details</button></td>
                                            </tr>
                                            <tr>
                                                <td>SIKVSTAFF005</td>
                                                <td>Priya Patel</td>
                                                <td>Teacher</td>
                                                <td>priya.p@example.com</td>
                                                <td>Active</td>
                                                <td><button class="btn btn-sm btn-outline-primary">Details</button></td>
                                            </tr>
                                            <tr>
                                                <td>SIKVSTAFF005</td>
                                                <td>Priya Patel</td>
                                                <td>Teacher</td>
                                                <td>priya.p@example.com</td>
                                                <td>Active</td>
                                                <td><button class="btn btn-sm btn-outline-primary">Details</button></td>
                                            </tr>
                                            <tr>
                                                <td>SIKVSTAFF005</td>
                                                <td>Priya Patel</td>
                                                <td>Teacher</td>
                                                <td>priya.p@example.com</td>
                                                <td>Active</td>
                                                <td><button class="btn btn-sm btn-outline-primary">Details</button></td>
                                            </tr>
                                            <tr>
                                                <td>SIKVSTAFF005</td>
                                                <td>Priya Patel</td>
                                                <td>Teacher</td>
                                                <td>priya.p@example.com</td>
                                                <td>Active</td>
                                                <td><button class="btn btn-sm btn-outline-primary">Details</button></td>
                                            </tr>
                                            <tr>
                                                <td>SIKVSTAFF005</td>
                                                <td>Priya Patel</td>
                                                <td>Teacher</td>
                                                <td>priya.p@example.com</td>
                                                <td>Active</td>
                                                <td><button class="btn btn-sm btn-outline-primary">Details</button></td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" data-coreui-target="#viewUserDataModal" data-coreui-toggle="modal">Back to User Types</button>
                                <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div> -->

                <!-- Nested Modal: Staff Data (Example) -->
                <!-- <div class="modal fade" id="staffDataModal" tabindex="-1" aria-labelledby="staffDataModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staffDataModalLabel">Staff Data Overview</h5>
                                <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>This modal would display comprehensive staff data.</p>
                                <div class="mb-3">
                                    <label for="staffIdInput" class="form-label">Enter Staff ID:</label>
                                    <input type="text" class="form-control" id="staffIdInput" placeholder="e.g., SIKVSTAFF001">
                                </div>
                                <button class="btn btn-primary mt-2">Load Staff Details</button>
                                <div id="staffDetailsContainer" class="mt-3">
                                    {{-- Staff data will be displayed here --}}
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" data-coreui-target="#viewUserDataModal" data-coreui-toggle="modal">Back to User Types</button>
                                <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div> -->

                <!-- Modal for "Edit Specific User" -->
                <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editUserModalLabel">Create Courses </h5>
                                <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                    <p><b style="color:red">NOTE: Course creation during carefully fill data becuase program never edit or delete by system due to security & legal complaince, anything need it contact to ADMIN.</b></p>
                                        <form action="{{ route('employerCoursesCreation') }}" method="POST">
        @csrf
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Select Program</th>
                    <th>Course Name</th>
                    <th>Description</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <!-- Program Dropdown -->
                    <td>
                        <select name="ProgramId" class="form-control" required>
                            <option value="">-- Select Program --</option>
                            @foreach($programs as $program)
                                <option value="{{ $program->id }}">{{ $program->program_name }}</option>
                            @endforeach
                        </select>
                    </td>

                    <!-- Course Name -->
                    <td>
                        <input type="text" name="CourseName" class="form-control" placeholder="Course Name" required>
                    </td>

                    <!-- Description -->
                    <td>
                        <input type="text" name="CourseDescription" class="form-control" placeholder="Course Description">
                    </td>

                    <!-- Status -->
                    <td>
                        <select name="CourseStatus" class="form-control" required>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </td>
                </tr>
            </tbody>
        </table>

                                <!-- <p>NOTE: Please Enter the data of new package. </p>



                               
                                   <form action="{{ url('Admin_create_product_package') }}" method="POST">

                                 <div class="mb-3">
                                    <label for="editUserId" class="form-label">first_name</label>
                                    <input type="text" class="form-control" name="first_name " id="editUserId" placeholder="Enter ID">
                                </div>
                                
                                 @csrf
                                
                                <div class="mb-3">
                                    <label for="editUserId" class="form-label">last_name</label>
                                    <input type="text" class="form-control" name="last_name" id="editUserId" placeholder="Enter ID">
                                </div>
                                 <div class="mb-3">
                                    <label for="editUserId" class="form-label">min_learner_capacity</label>
                                    <input type="text" class="form-control" name="min_learner_capacity" id="editUserId" placeholder="Enter ID">
                                </div>
                                <div class="mb-3">
                                    <label for="editUserId" class="form-label">max_learner_capacity</label>
                                    <input type="text" class="form-control" name="max_learner_capacity" id="editUserId" placeholder="Enter ID">
                                </div>
                                
                                <div class="mb-3">
                                    <label for="editUserId" class="form-label">base_per_learner_rate_urban</label>
                                    <input type="text" class="form-control" name="base_per_learner_rate_urban" id="editUserId" placeholder="Enter ID">
                                </div>
                                 <div class="mb-3">
                                    <label for="editUserId" class="form-label">instructor_capacity_limit </label>
                                    <input type="text" class="form-control" name="instructor_capacity_limit" id="editUserId" placeholder="Enter ID">
                                </div>
                                <div class="mb-3">
                                    <label for="editUserId" class="form-label">storage_limit_mb</label>
                                    <input type="text" class="form-control" name="storage_limit_mb" id="editUserId" placeholder="Enter ID">
                                </div>

                                <div class="mb-3">
                                    <label for="editUserId" class="form-label">features </label>
                                    <input type="text" class="form-control" name="features" id="editUserId" placeholder="Enter ID">
                                </div>
                                 <div class="mb-3">
                                    <label for="editUserId" class="form-label">is_active </label>
                                    <input type="text" class="form-control" name="is_active" id="editUserId" placeholder="Enter ID">
                                </div>
                                <div class="mb-3">
                                    <label for="editUserId" class="form-label">sort_order </label>
                                    <input type="text" class="form-control" name="sort_order" id="editUserId" placeholder="Enter ID">
                                </div> -->

                                <!-- <button class="btn btn-primary mt-2">Load User for Editing</button>
                                <div id="editUserFormContainer" class="mt-3">
                                    {{-- Dynamic form with user data will load here --}}
                                </div> -->
                            </div>
                            @error('CourseName')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>

</form>
                        </div>
                    </div>
                </div>

                <!-- Modal for "Get User by ID/Role" -->
<div class="modal fade" id="getSpecificUserModal" tabindex="-1" aria-labelledby="getSpecificUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-fullscreen-md-down">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="getSpecificUserModalLabel">Get Specific User Data</h5>
                <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <select id="programDropdown" class="form-control">
                    <option value="">-- Select Program --</option>
                    @foreach($programs as $program)
                        <option value="{{ $program->id }}">{{ $program->program_name }}</option>
                    @endforeach
                </select>

                <table class="table mt-3" id="coursesTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Course Name</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="3">Select a program to see courses</td>
                        </tr>
                    </tbody>
                </table>
               <div id="paginationButtons" class="mt-2"></div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
            </div> {{-- End viewContent tab-pane --}}
    </div> {{-- End card-body --}}
</div> {{-- End card --}}

</div>

@endsection

{{-- No @push('scripts') needed here if CoreUI's JS is already loaded globally --}}

@push('scripts')
<script>
let currentPage = 1;
let selectedProgramId = null;

function loadCourses(programId, page = 1) {
    let tbody = $('#coursesTable tbody');
    tbody.empty(); // clear old rows

    $.ajax({
        url: `/Employer/programs/${programId}/courses?page=${page}`, // pass page as query
        type: 'GET',
        success: function(response) {
            let data = response.courses;
            let total = response.total;
            let perPage = response.per_page;

            if (data.length > 0) {
                data.forEach((course, index) => {
                    tbody.append(`
                        <tr>
                            <td>${(page - 1) * perPage + index + 1}</td>
                            <td>${course.course_name}</td>
                            <td>${course.description}</td>
                        </tr>
                    `);
                });
            }

            // Fill remaining rows up to perPage
            for (let i = data.length; i < perPage; i++) {
                tbody.append(`
                    <tr>
                        <td>${(page - 1) * perPage + i + 1}</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                `);
            }

            // Pagination buttons
            $('#paginationButtons').empty();
            let totalPages = Math.ceil(total / perPage);

            if (page > 1) {
                $('#paginationButtons').append(`<button id="prevPage" class="btn btn-sm btn-primary me-1">Previous</button>`);
                $('#prevPage').click(() => loadCourses(programId, page - 1));
            }
            if (page < totalPages) {
                $('#paginationButtons').append(`<button id="nextPage" class="btn btn-sm btn-primary">Next</button>`);
                $('#nextPage').click(() => loadCourses(programId, page + 1));
            }
        },
        error: function() {
            tbody.html('<tr><td colspan="3">Error fetching courses</td></tr>');
        }
    });
}

$(document).on('change', '#programDropdown', function() {
    let programId = $(this).val();
    if (programId) {
        loadCourses(programId, 1); // load first page
    } else {
        $('#coursesTable tbody').html('<tr><td colspan="3">Select a program to see courses</td></tr>');
        $('#paginationButtons').empty();
    }
});
</script>
@endpush
