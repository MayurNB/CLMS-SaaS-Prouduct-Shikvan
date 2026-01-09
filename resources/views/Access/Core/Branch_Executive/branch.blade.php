@extends('layouts.app') {{-- Assumes your main layout file is layouts/app.blade.php --}}

@section('breadcrumb_item_active', 'Branch Management') {{-- Changed for clarity for this page --}}

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
                  <!-- <svg class="icon me-2">
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
                  </svg> Comments<span class="badge badge-sm bg-warning ms-2">42</span></a> -->
                <div class="dropdown-header bg-body-tertiary text-body-secondary fw-semibold my-2">
                  <div class="fw-semibold">Settings</div>
                </div><a class="dropdown-item" href="{{ route('employerProfile') }}">
                  <!-- <svg class="icon me-2">
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
                  </svg> Lock Account</a><a class="dropdown-item" href="#"> -->
                  <!-- <svg class="icon me-2">
                    <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-account-logout') }}"></use>
                  </svg> Logout</a> -->
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
                @php
    $user = Auth::user();
    $userProfile = $user->userProfile ?? null;
    $picture = $userProfile->profile_picture_url ?? null;
@endphp

<div class="avatar avatar-md">

    @if(!empty($picture))
        <img class="avatar-img" src="{{ $picture }}" alt="User Profile Picture">
    @else
        <span style="font-size: 14px; color: #555;">Profile</span>
    @endif

</div>

              </a>
              <div class="dropdown-menu dropdown-menu-end pt-0">
                <div class="dropdown-header bg-body-tertiary text-body-secondary fw-semibold rounded-top mb-2">Account</div><a class="dropdown-item" href="#">
                  <!-- <svg class="icon me-2">
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
                </a> -->
                <!-- <div class="dropdown-header bg-body-tertiary text-body-secondary fw-semibold my-2">
                  <div class="fw-semibold">Settings </div>
                </div><a class="dropdown-item" href="{{ route('employerProfile') }}"> -->
                  <!-- <svg class="icon me-2">
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
                  </svg> Lock Account</a><a class="dropdown-item" href="#"> -->
                  <!-- Hidden logout form -->
<!-- ✅ Logout (Styled Like CoreUI Dropdown Item) -->
<a class="dropdown-item" href="#" 
   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
  <svg class="icon me-2">
    <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-account-logout') }}"></use>
  </svg>
  Logout
</a>

<!-- Hidden Logout Form -->
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
  @csrf

</form>
              </div>
            </li>
          </ul>
        </div>

@endsection




@section('breadcrumb_item_active', 'Dashboard')


@section('quick_access_nav_url')
<a href="{{ Route('branchExecutiveDashboard') }}">Home</a>
@endsection

@section('side bar')
<ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
     <li class="nav-title">Overview</li>
        <li class="nav-item"><a class="nav-link" href="{{ Route('branchExecutiveDashboard') }}">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-speedometer') }}"></use>
            </svg> Dashboard<span class="badge badge-sm bg-info ms-auto">NEW</span></a></li>
        <li class="nav-title">PERSONAL</li>
        <li class="nav-item"><a class="nav-link" href="{{ route('branchExecutiveProfile') }}">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-drop') }}"></use>
            </svg> Profile</a></li>
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
        <!-- <li class="nav-title">ACADEMIC MANAGEMENT</li> -->
        <!-- <li class="nav-group"><a class="nav-link nav-group-toggle" href="{{ url('Employer_acm') }}"> -->
            <!-- <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-puzzle') }}"></use>
            </svg>Academic </a> -->
          <ul class="nav-group-items compact">
            <!-- <li class="nav-item"><a class="nav-link" href="{{ Route('employerProgramAndCourses') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Programs & Courses </a></li> -->
            <!-- <li class="nav-item"><a class="nav-link" href="{{ url('Employer_content') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Assign  </a></li> -->
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
        <li class="nav-title">Administration & Compliance</li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="{{ url('Employer_acm') }}">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-puzzle') }}"></use>
            </svg>Administration</a>
          <ul class="nav-group-items compact">
            <li class="nav-item"><a class="nav-link" href="{{ Route('branchExecutiveInstitute') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> My Institute </a></li>
            <li class="nav-item"><a class="nav-link" href="{{ Route('branchExecutiveBranch') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Branches Manages </a></li>
            <!-- <li class="nav-item"><a class="nav-link" href="{{ url('employerLearnerEnrollment') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Enrollment </a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ Route('employerProgramAndCourses') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> pro </a></li> -->
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

        <li class="nav-title">People Management (The Staff & The Learners)</li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="{{ url('Employer_acm') }}">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-puzzle') }}"></use>
            </svg>People Management</a>
          <ul class="nav-group-items compact">
            <li class="nav-item"><a class="nav-link" href="{{ Route('learnerOnboard') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Learner Onboard </a></li>
            <li class="nav-item"><a class="nav-link" href="{{ Route('learnerNewEnrollment') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Learner Enrollment </a></li>
            <li class="nav-item"><a class="nav-link" href="{{ Route('fees.payments.page') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Fees Payment </a></li>
            <li class="nav-item"><a class="nav-link" href="{{ Route('enrollments.enrollmentManage') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Learner Manage </a></li>
            <!-- <li class="nav-item"><a class="nav-link" href="{{ url('employerLearnerEnrollment') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Enrollment </a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ Route('employerProgramAndCourses') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> pro </a></li> -->
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

        <li class="nav-title">Academic & Schedule</li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="{{ url('Employer_acm') }}">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-puzzle') }}"></use>
            </svg>Academic & Schedule</a>
          <ul class="nav-group-items compact">
            <li class="nav-item"><a class="nav-link" href="{{ Route('branchExecutiveProgramAndCourses') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Programs & Courses </a></li>
            <!-- <li class="nav-item"><a class="nav-link" href="{{ Route('branchExecutiveBranch') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Branches Manages </a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('employerLearnerEnrollment') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Enrollment </a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ Route('employerProgramAndCourses') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> pro </a></li> -->
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
                <a class="nav-link active" id="view-tab" data-bs-toggle="tab" data-bs-target="#viewContent" type="button" role="tab" aria-controls="viewContent" aria-selected="true">View User Data</a>
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
                <h5 class="card-title mb-4">User Data Overview</h5>

                <div class="d-flex flex-wrap justify-content-center gap-3 mb-4"> {{-- Flex container for buttons --}}

                    <!-- {{-- Button 1: View User Data (Opens Modal for Type Selection) --}}
                    <button class="btn btn-primary px-4 py-2 rounded-md" data-coreui-toggle="modal" data-coreui-target="#viewUserDataModal">
                        View All Users
                    </button> -->

                    {{-- Button 2: Edit User (Opens Modal for User Selection) --}}
                    <!-- <button class="btn btn-info px-4 py-2 rounded-md" data-coreui-toggle="modal" data-coreui-target="#editUserModal">
                        Add new Branch
                    </button> -->

                      {{-- Button 2: Edit User (Opens Modal for User Selection) --}}
                    <!-- <button class="btn btn-info px-4 py-2 rounded-md" data-coreui-toggle="modal" data-coreui-target="#branchview">
                        View Branch
                    </button> -->

                    @php


@endphp


<div class="card mt-4">
  <div class="card-header">
    
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-striped table-hover table-bordered align-middle">
        <thead class="table-light">
          <tr>
            <th>branch_name</th>
            <th>address_line_1</th>
            <th>state_province</th>
            <th>postal_code</th>
            <th>country</th>
            <th>contact_email</th>
            <th>phone_number</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{ $branch->branch_name }}</td>
            <td>{{ $branch->address_line_1 }}</td>
            <td>{{ $branch->state_province }}</td>
            <td>{{ $branch->postal_code }}</td>
            <td>{{ $branch->country }}</td>
            <td>{{ $branch->contact_email }}</td>
            <td>{{ $branch->phone_number }}</td>
          </tr>
          
        </tbody>
      </table>
    </div>
  </div>
</div>

                    <!-- {{-- Button 3: Get Specific User Data (Opens Modal for Role/ID Input) --}}
                    <button class="btn btn-secondary px-4 py-2 rounded-md" data-coreui-toggle="modal" data-coreui-target="#getSpecificUserModal">
                        Get User by ID/Role
                    </button> -->

                </div>

                <p class="text-muted">Click a button above to perform a user management action.</p>

                {{-- Modals for User Management Actions --}}

                <!-- Modal for "View All Users" (Primary Entry Point) -->
                <div class="modal fade" id="viewUserDataModal" tabindex="-1" aria-labelledby="viewUserDataModalLabel" aria-hidden="true" >
                    <div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-lg-down"> {{-- Responsive full-screen on small/medium screens --}}
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="viewUserDataModalLabel">View User Data</h5>
                                <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Select Branch and Overview entire branch data</p>
                                <!-- <div class="d-flex flex-column flex-md-row justify-content-center gap-3 mb-4">
                                    <button class="btn btn-outline-primary w-full w-md-auto" data-coreui-toggle="modal" data-coreui-target="#studentDataModal">View Student Data</button>
                                    <button class="btn btn-outline-info w-full w-md-auto" data-coreui-toggle="modal" data-coreui-target="#staffDataModal">View Staff Data</button>
                                    <button class="btn btn-outline-secondary w-full w-md-auto" data-coreui-toggle="modal" data-coreui-target="#combinedUserDataModal">View All User Types</button>
                               
                                </div> -->
                                <div>

                                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                        <option selected>Select Branch..</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>

                                    

                                </div>
                                {{-- Placeholder for combined user data table, if needed --}}
                                <div id="combinedUserTableContainer" class="table-responsive mt-3">
                                    {{-- This is where a table of all users (students, staff, etc.) would be loaded --}}
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Branch Id</th>
                                                <th>Branch Name</th>
                                                <th>Branch Register Date</th>
                                                <th>Branch last update</th>
                                                <th>Status</th>
                                                
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
                                                
                                            </tr>
                                           
                                        </tbody>
                                    </table>
                                </div>
                            
                             <div>
                                <p>Key Performance Indicators (KPIs)</p>
                                <div class="row g-4">
                      <div class="col-12 col-sm-6 col-xl-4 col-xxl-3">
                        <div class="card text-white bg-primary">
                          <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                            <div>
                              <div class="fs-4 fw-semibold">26K <span class="fs-6 fw-normal">(-12.4%
                                  <svg class="icon">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-arrow-bottom"></use>
                                  </svg>)</span></div>
                              <div>Learner Performance</div>
                            </div>
                            <div class="dropdown">
                              <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg class="icon">
                                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                                </svg>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
                            </div>
                          </div>
                          <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                            <canvas class="chart" id="card-chart1" height="105" style="display: block; box-sizing: border-box; height: 70px; width: 254px;" width="381"></canvas>
                          <div class="chartjs-tooltip" style="opacity: 0; left: 224.333px; top: 129.847px;"><table style="margin: 0px;"><thead class="chartjs-tooltip-header"><tr style="border-width: 0px;" class="chartjs-tooltip-header-item"><th style="border-width: 0px;">June</th></tr></thead><tbody class="chartjs-tooltip-body"><tr class="chartjs-tooltip-body-item"><td style="border-width: 0px;"><span style="background: rgb(94, 92, 208); border-color: rgba(255, 255, 255, 0.55); border-width: 2px; margin-right: 10px; height: 10px; width: 10px; display: inline-block;"></span>My First dataset: 55</td></tr></tbody></table></div></div>
                        </div>
                      </div>
                      <!-- /.col-->
                      <div class="col-12 col-sm-6 col-xl-4 col-xxl-3">
                        <div class="card text-white bg-info">
                          <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                            <div>
                              <div class="fs-4 fw-semibold">$6.200 <span class="fs-6 fw-normal">(40.9%
                                  <svg class="icon">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-arrow-top"></use>
                                  </svg>)</span></div>
                              <div>Profit</div>
                            </div>
                            <div class="dropdown">
                              <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg class="icon">
                                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                                </svg>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
                            </div>
                          </div>
                          <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                            <canvas class="chart" id="card-chart2" height="105" style="display: block; box-sizing: border-box; height: 70px; width: 254px;" width="381"></canvas>
                          <div class="chartjs-tooltip" style="opacity: 0; left: 102.333px; top: 132.625px;"><table style="margin: 0px;"><thead class="chartjs-tooltip-header"><tr style="border-width: 0px;" class="chartjs-tooltip-header-item"><th style="border-width: 0px;">March</th></tr></thead><tbody class="chartjs-tooltip-body"><tr class="chartjs-tooltip-body-item"><td style="border-width: 0px;"><span style="background: rgb(61, 153, 245); border-color: rgba(255, 255, 255, 0.55); border-width: 2px; margin-right: 10px; height: 10px; width: 10px; display: inline-block;"></span>My First dataset: 9</td></tr></tbody></table></div></div>
                        </div>
                      </div>
                      <!-- /.col-->
                      <div class="col-12 col-sm-6 col-xl-4 col-xxl-3">
                        <div class="card text-white bg-warning">
                          <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                            <div>
                              <div class="fs-4 fw-semibold">2.49% <span class="fs-6 fw-normal">(84.7%
                                  <svg class="icon">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-arrow-top"></use>
                                  </svg>)</span></div>
                              <div>Employee Performance</div>
                            </div>
                            <div class="dropdown">
                              <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg class="icon">
                                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                                </svg>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
                            </div>
                          </div>
                          <div class="c-chart-wrapper mt-3" style="height:70px;">
                            <canvas class="chart" id="card-chart3" height="105" style="display: block; box-sizing: border-box; height: 70px; width: 286px;" width="429"></canvas>
                          </div>
                        </div>
                      </div>
                      <!-- /.col-->
                      <div class="col-12 col-sm-6 col-xl-4 col-xxl-3">
                        <div class="card text-white bg-danger">
                          <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                            <div>
                              <div class="fs-4 fw-semibold">44K <span class="fs-6 fw-normal">(-23.6%
                                  <svg class="icon">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-arrow-bottom"></use>
                                  </svg>)</span></div>
                              <div>Branch UTZ Performance</div>
                            </div>
                            <div class="dropdown">
                              <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg class="icon">
                                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                                </svg>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
                            </div>
                          </div>
                          <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                            <canvas class="chart" id="card-chart4" height="105" style="display: block; box-sizing: border-box; height: 70px; width: 254px;" width="381"></canvas>
                          <div class="chartjs-tooltip" style="opacity: 0; left: 150.938px; top: 116.5px;"><table style="margin: 0px;"><thead class="chartjs-tooltip-header"><tr style="border-width: 0px;" class="chartjs-tooltip-header-item"><th style="border-width: 0px;">September</th></tr></thead><tbody class="chartjs-tooltip-body"><tr class="chartjs-tooltip-body-item"><td style="border-width: 0px;"><span style="background: rgba(255, 255, 255, 0.2); border-color: rgba(255, 255, 255, 0.55); border-width: 2px; margin-right: 10px; height: 10px; width: 10px; display: inline-block;"></span>My First dataset: 65</td></tr></tbody></table></div></div>
                        </div>
                      </div>
                    </div>

                             </div>
                            </div>
                            <div class="modal-footer">
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
                                <h5 class="modal-title" id="editUserModalLabel">Edit User Data</h5>
                                <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>NOTE: Please Enter the data of new branch and add it.</p>


                               
                                 @php
    $user = Auth::user();
    $userProfile = $user ? $user->userProfile : null;
@endphp
<form action="{{ Route('employerBranchCreate') }}" method="POST" enctype="multipart/form-data">
                                       @csrf 
                                    <table class="table table-striped table-hover">
                                       
                                      <thead>
                                            <tr>
                                                <th>Branch Name</th>
                                                <!-- <th>last_name </th>
                                                <th>date_of_birth</th>
                                                <th>gender </th> -->
                                               
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- Example Rows (replace with dynamic data from backend) --}}
                                            <tr>

                                            


<td>                                    
            <input type="text" class="form-control" id="branchname" name="branch_name" placeholder="Brnach Name">


 
</td>


                                            
                                                 
                                                 
                                                 
                                                    
                                                           
                                                
                                            </tr>

                                             
                                           
                                        </tbody>
                                        <thead>
                                            <tr>
                                                
                                               
                                               
                                               
                                                <th>address_line_1</th>
                                                <!-- <th>address_line_2 </th> -->
                                                <th> city   </th>
                                                <th>state_province</th>
                                                <th>postal_code </th>
                                                <th>country </th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- Example Rows (replace with dynamic data from backend) --}}
                                            <tr>
                                                
                                                 
                                                 
                                                 
                                                 <td>                                               <input type="text" class="form-control" id="branchname" name="address_line_1" placeholder="address_line_1">
 
</td>

                                                 
 
                                                   <td>                                                 <input type="text" class="form-control" id="branchname" name="city" placeholder="city">
 
</td>

                                                   <td>                                                <input type="text" class="form-control" id="branchname" name="state_province" placeholder="state_province">
 
</td>

                                                        <td>                                                <input type="text" class="form-control" id="branchname" name="postal_code" placeholder="postal_code">

</td>

                                                          <td>                                                 <input type="text" class="form-control" id="branchname" name="country" placeholder="country">

</td>

                                                           
                                                
                                            </tr>

                                             
                                           
                                        </tbody>
                                        <thead>
                                            <tr>
                                                
                                             
                                                <th>Contact Email</th>
                                                <th> Phone Number  </th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- Example Rows (replace with dynamic data from backend) --}}
                                            <tr>
                                                
                                                 
                                                 
                                                 
                                              <td>                                     
                                                 <input type="text" class="form-control" id="branchname" name="contact_email" placeholder="contact_email">

</td>

                                                 <td>                                    <input type="text" class="form-control" id="branchname" name="phone_number" placeholder="phone_number ">
</td>

                                                  

                                                     
                                                       
                                                        
                                                           
                                                               
                                                               
                                                
                                            </tr>

                                             
                                           
                                      </tbody>
                                        
                                      
                                      
                                    </table>

                                                                    <button type="submit" class="btn btn-primary">Save Changes</button>
</form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Modal for "Edit Specific User" -->
                <div class="modal fade" id="branchview" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-fullscreen-md-down">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Edit User Data</h5>
                <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-0">
                <p class="p-3">NOTE: Please Enter the data of new branch and add it.</p>

                <div style="max-height: 300px; overflow-y: auto;" id="branchList">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th>Branch Name</th>
                                <th>Address</th>
                                <th>Contact</th>
                                <th>Status</th>
                                <th>Action </th>
                            </tr>
                        </thead>
                         <tbody id="branchRows">
                            <!-- include'Access.Core.Employer.partials.branch_rows', branches  branches -->
                        </tbody> 
                    </table>
                    

                    <div id="loading" class="text-center py-2" style="display:none;">Loading more...</div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- SMALL MODAL FOR ROW DETAILS -->
<div class="modal fade" id="branchDetailModal" tabindex="-1" aria-labelledby="branchDetailLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="branchDetailLabel">Branch Details</h5>
                <button type="button" class="btn-close" data-coreui-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <!-- <p><strong>Branch Id:</strong><span id="detailBranchId"></span></p> -->
                <!-- <p><strong>Branch Name:</strong> <span id="detailBranchName"></span></p> -->
                <!-- <p><strong>Address:</strong> <span id="detailAddress"></span></p>
                <p><strong>Contact:</strong> <span id="detailContact"></span></p>
                <p><strong>Status:</strong> <span id="detailStatus"></span></p> -->

                <form action="{{ Route('employerBranchUpdate') }}" method="POST" enctype="multipart/form-data">
                                       @csrf 
                                    <table class="table table-striped table-hover">
                                       
                                      <thead>
                                            <tr>
                                                <th>Branch Name</th>
                                                <th>Branch Status </th>
                                                <!-- <th>last_name </th>
                                                <th>date_of_birth</th>
                                                <th>gender </th> -->
                                               
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- Example Rows (replace with dynamic data from backend) --}}
                                            <tr>

                                            


<td>                                    
<input type="hidden" id="detailBranchId" name="branch_id" readonly>

<input type="text" class="form-control"  id="detailBranchName" name="branch_name" placeholder="branch name">

 
</td>
<td>
     <select class="form-control" id="detailStatus" name="is_active">
        <option value="1">Active</option>
        <option value="0">Inactive</option>
      </select>
</td>


                                            
                                                 
                                                 
                                                 
                                                    
                                                           
                                                
                                            </tr>

                                             
                                           
                                        </tbody>
                                        <thead>
                                            <tr>
                                                
                                               
                                               
                                               
                                                <th>address_line_1</th>
                                                <!-- <th>address_line_2 </th> -->
                                                <th> city   </th>
                                                <th>state_province</th>
                                                
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- Example Rows (replace with dynamic data from backend) --}}
                                            <tr>
                                                
                                                 
                                                 
                                                 
                                                 <td>                                               <input type="text" class="form-control" id="detailAddressLine1" name="address_line_1" placeholder="address_line_1">
 
</td>

                                                 
 
                                                   <td>                                                 <input type="text" class="form-control" id="detailcity" name="city" placeholder="city">
 
</td>

                                                   <td>                                                <input type="text" class="form-control" id="detailstate_province" name="state_province" placeholder="state_province">
 
</td>

                                                        

                                                           
                                                
                                            </tr>

                                             
                                           
                                        </tbody>
                                        <thead>
                                            <tr>
                                                
                                               
                                               
                                               
                                                
                                                <th>postal_code </th>
                                                <th>country </th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- Example Rows (replace with dynamic data from backend) --}}
                                            <tr>
                                                
                                                 
                                                 
                                                 
                                                 

                                                 
 
                                                   

                                                   

                                                        <td>                                                <input type="text" class="form-control" id="detailpostal_code" name="postal_code" placeholder="postal_code">

</td>

                                                          <td>                                                 <input type="text" class="form-control" id="detailcountry" name="country" placeholder="country">

</td>

                                                           
                                                
                                            </tr>

                                             
                                           
                                        </tbody>
                                        <thead>
                                            <tr>
                                                
                                             
                                                <th>Contact Email</th>
                                                <th> Phone Number  </th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- Example Rows (replace with dynamic data from backend) --}}
                                            <tr>
                                                
                                                 
                                                 
                                                 
                                              <td>                                     
                                                 <input type="text" class="form-control" id="detailEmail" name="contact_email" placeholder="contact_email">

</td>

                                                 <td>                                    <input type="text" class="form-control" id="detailPhone" name="phone_number" placeholder="phone_number ">
</td>

                                                  

                                                     
                                                       
                                                        
                                                           
                                                               
                                                               
                                                
                                            </tr>

                                             
                                           
                                      </tbody>
                                        
                                      
                                      
                                    </table>

                                                                    <button type="submit" class="btn btn-primary">Save Changes</button>
</form>
            </div>
        </div>
    </div>
</div>

                <!-- Modal for "Get User by ID/Role" -->
                <!-- <div class="modal fade" id="getSpecificUserModal" tabindex="-1" aria-labelledby="getSpecificUserModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="getSpecificUserModalLabel">Get Specific User Data</h5>
                                <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Enter the user's role and ID to fetch specific data:</p>
                                <div class="mb-3">
                                    <label for="specificUserRole" class="form-label">User Role:</label>
                                    <select class="form-select" id="specificUserRole">
                                        <option value="">Select Role</option>
                                        <option value="student">Student</option>
                                        <option value="staff">Staff</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="specificUserId" class="form-label">User ID:</label>
                                    <input type="text" class="form-control" id="specificUserId" placeholder="Enter ID">
                                </div>
                                <button class="btn btn-primary mt-2">Fetch User Data</button>
                                <div id="specificUserDataContainer" class="mt-3">
                                    {{-- Fetched user data will be displayed here --}}
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div> -->

            </div> {{-- End viewContent tab-pane --}}

            <!-- {{-- Create User Tab Content --}}
            <div class="tab-pane fade" id="createContent" role="tabpanel" aria-labelledby="create-tab">
                <h5 class="card-title">Create New User</h5>
                <p>Form to create a new user goes here.</p>
                {{-- Example form placeholder --}}
                <form>
                    <div class="mb-3">
                        <label for="newUserName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="newUserName" placeholder="Enter user's name">
                    </div>
                    <div class="mb-3">
                        <label for="newUserEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="newUserEmail" placeholder="Enter user's email">
                    </div>
                    <div class="mb-3">
                        <label for="newUserRole" class="form-label">Role</label>
                        <select class="form-select" id="newUserRole">
                            <option value="">Select Role</option>
                            <option value="student">Student</option>
                            <option value="staff">Staff</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Create User</button>
                </form>
            </div>

            {{-- Edit User Tab Content (Different from Edit Modal) --}}
            <div class="tab-pane fade" id="editContent" role="tabpanel" aria-labelledby="edit-tab">
                <h5 class="card-title">Manage Existing Users</h5>
                <p>This section could list users in a table with inline edit options, or provide a search to pick a user for editing directly on this page (alternative to modal).</p>
                {{-- Example: Search form --}}
                <div class="mb-3">
                    <label for="searchEditUser" class="form-label">Search User to Edit:</label>
                    <input type="text" class="form-control" id="searchEditUser" placeholder="Enter name or ID">
                </div>
                <button class="btn btn-primary">Search</button>
                <div class="mt-3">
                    {{-- Search results/table for editing --}}
                </div>
            </div>

            {{-- Search User Tab Content --}}
            <div class="tab-pane fade" id="searchContent" role="tabpanel" aria-labelledby="search-tab">
                <h5 class="card-title">Find Users</h5>
                <p>Search functionality for users.</p>
                <form>
                    <div class="mb-3">
                        <label for="searchQuery" class="form-label">Search Query</label>
                        <input type="text" class="form-control" id="searchQuery" placeholder="Enter name, email, or ID">
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
                <div class="mt-3">
                    {{-- Search results will appear here --}}
                </div>
            </div>

            {{-- Delete User Tab Content --}}
            <div class="tab-pane fade" id="deleteContent" role="tabpanel" aria-labelledby="delete-tab">
                <h5 class="card-title">Delete User</h5>
                <p>Carefully select a user to delete.</p>
                <form>
                    <div class="mb-3">
                        <label for="deleteUserId" class="form-label">User ID to Delete</label>
                        <input type="text" class="form-control" id="deleteUserId" placeholder="Enter user ID">
                    </div>
                    <button type="submit" class="btn btn-danger">Delete User</button>
                </form>
            </div> -->

        </div> {{-- End tab-content --}}
    </div> {{-- End card-body --}}
</div> {{-- End card --}}

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