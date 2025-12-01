@extends('layouts.app') {{-- Assumes your main layout file is layouts/app.blade.php --}}

@section('breadcrumb_item_active', 'Enrollment Manages') {{-- Changed for clarity for this page --}}

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
            <li class="nav-item"><a class="nav-link" href="{{ Route('branchExecutiveLearnerEnrollment') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Learner Enrollment </a></li>
            <li class="nav-item"><a class="nav-link" href="{{ Route('LearnerEnrollmentManage') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Learner Manage </a></li>
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

            <!-- {{-- Button 1: View Package & Pricing (Opens Modal for Type Selection) --}}
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
                    </button> -->




            
                 <div class="container my-4">

    {{-- FILTER FORM (server-side GET) --}}
    <div class="card mb-3">
        <div class="card-body">
            <form method="GET" class="row g-2">
                <div class="col-md-4">
                    <label class="form-label">Program</label>
                    <select name="program" class="form-select">
                        <option value="">All programs</option>
                        @foreach($programOptions as $pid => $pname)
                            <option value="{{ $pid }}" {{ (isset($filter_program) && $filter_program == $pid) ? 'selected' : '' }}>
                                {{ $pname }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Fee Status</label>
                    <select name="fee_status" class="form-select">
                        <option value="">All</option>
                        <option value="complete" {{ (isset($filter_fee_status) && $filter_fee_status == 'complete') ? 'selected' : '' }}>Complete</option>
                        <option value="partial" {{ (isset($filter_fee_status) && $filter_fee_status == 'partial') ? 'selected' : '' }}>Partial</option>
                        <option value="pending" {{ (isset($filter_fee_status) && $filter_fee_status == 'pending') ? 'selected' : '' }}>Pending</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Enrollment Date</label>
                    <input type="date" name="enrollment_date" class="form-control"
                           value="{{ $filter_enrollment_date ?? '' }}">
                </div>

                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100">Filter</button>
                </div>
            </form>
        </div>
    </div>

    {{-- TABLE --}}
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">Learner Enrollment Management</h5>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0 align-middle">
                    <thead class="table-light text-center">
                        <tr>
                            <th style="width:5%">#</th>
                            <th style="width:30%">Learner</th>
                            <th style="width:20%">Program</th>
                            <th style="width:20%">Fees</th>
                            <th style="width:10%">Fee Status</th>
                            <th style="width:15%">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($EnrolledLearnerData as $index => $data)
                        <tr>
                            <td class="text-center">{{ $EnrolledLearnerData->firstItem() + $index }}</td>

                            <td>
                                <strong>{{ $data['LearnerName'] }}</strong><br>
                                <small class="text-muted">{{ $data['LearnerEmail'] }}</small><br>
                                <small class="text-muted">{{ $data['LearnerPhoneNo'] }}</small>
                            </td>

                            <td class="text-center">{{ $data['Program'] }}</td>

                            <td class="text-center">
                                Total: ₹{{ number_format($data['TotalFee'] ?? 0, 2) }}<br>
                                Paid: ₹{{ number_format($data['Paid'] ?? 0, 2) }}<br>
                                <strong>Bal: ₹{{ number_format($data['Balance'] ?? 0, 2) }}</strong>
                            </td>

                            <td class="text-center">
                                @php $fs = $data['FeeStatus'] ?? 'N/A'; @endphp
                                @if($fs === 'complete')
                                    <span class="badge bg-success">Complete</span>
                                @elseif($fs === 'partial')
                                    <span class="badge bg-warning text-dark">Partial</span>
                                @else
                                    <span class="badge bg-secondary">{{ ucfirst($fs) }}</span>
                                @endif
                            </td>

                            <td class="text-end">
                                {{-- Actions dropdown (single button) --}}
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="actionsMenu{{ $index }}" data-coreui-toggle="dropdown" aria-expanded="false">
                                        Actions
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="actionsMenu{{ $index }}">
                                        <li>
                                            <button class="dropdown-item view-btn"
                                                    type="button"
                                                    data-learner='@json($data)'
                                                    data-coreui-toggle="modal"
                                                    data-coreui-target="#ViewModal">
                                                View Details
                                            </button>
                                        </li>

                                        <li>
                                            <button class="dropdown-item fees-btn"
                                                    type="button"
                                                    data-learner='@json($data)'
                                                    data-coreui-toggle="modal"
                                                    data-coreui-target="#FeesModal">
                                                Fees & Payments
                                            </button>
                                        </li>

                                        <li>
                                            <button class="dropdown-item reminder-btn"
                                                    type="button"
                                                    data-learnerid="{{ $data['LearnerID'] ?? '' }}"
                                                    data-learnername="{{ $data['LearnerName'] }}"
                                                    data-coreui-toggle="modal"
                                                    data-coreui-target="#ReminderModal">
                                                Create Reminder
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer bg-white">
            <div class="d-flex justify-content-center">
                {{ $EnrolledLearnerData->links() }}
            </div>
        </div>
    </div>

    {{-- MODALS INLINE (View / Fees / Reminder) --}}

    {{-- VIEW MODAL --}}
    <div class="modal fade" id="ViewModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Learner — Enrollment Details</h5>
                    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div id="viewBody">
                        <h6>Personal</h6>
                        <p><strong>Name:</strong> <span id="view_name"></span></p>
                        <p><strong>Email:</strong> <span id="view_email"></span></p>
                        <p><strong>Phone:</strong> <span id="view_phone"></span></p>

                        <hr>
                        <h6>Enrollment</h6>
                        <p><strong>Program:</strong> <span id="view_program"></span></p>
                        <p><strong>Enrollment Date:</strong> <span id="view_enrollment_date"></span></p>

                        <hr>
                        <h6>Courses</h6>
                        <div id="view_courses">
                            {{-- will be populated by JS --}}
                        </div>

                        <hr>
                        <h6>Discounts</h6>
                        <div id="view_discounts">
                            {{-- will be populated by JS --}}
                        </div>

                        <hr>
                        <h6>This Enrollment want to deactive ?</h6>
                        <div>
                            <form method="POST" action="{{ route('enrollmentDeactive') }}" >
                            @csrf

                         <input type="hidden" name="Enrollment_Id" value="" id="view_Enroll_Deactive_id" required readonly>


                         <button type="submit" class="btn btn-danger w-100">
                        <i class="cil-user-follow me-2">Deactive this Enrollment.</i> 
                      </button>
                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- FEES MODAL --}}
    <div class="modal fade" id="FeesModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Fees & Payments</h5>
                    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div>
                        <p><strong>Name:</strong> <span id="fees_name"></span></p>
                        <p><strong>Total Fee:</strong> ₹<span id="fees_total"></span></p>
                        <p><strong>Paid:</strong> ₹<span id="fees_paid"></span></p>
                        <p><strong>Balance:</strong> ₹<span id="fees_balance"></span></p>
                    </div>

                    <hr>
                    <h6>Fees Payment</h6>
                    <div>
                      <form action="{{ route('EnrollmentFeesPayment') }}" method="POST" class="p-3">
                                @csrf

                               
                                <input type="hidden" name="Enrollment_Id" value="" id="view_Enroll_id" required readonly>
                                <input type="hidden" name="Discount_Id" value="0" required readonly>

                                <label>Fees Pay:</label>
                                <input type="number" name="Fees_Payment" class="form-control" required>

                                <label class="mt-3">Payment Method:</label>
                                <select name="Payment_Methods" class="form-select" required>
                                    <option value="CASH">CASH</option>
                                    <option value="CHEQUE">CHEQUE</option>
                                    <option value="CARD">CARD</option>
                                    <option value="UPI">UPI</option>
                                    <option value="NETBANKING">NETBANKING</option>
                                    <option value="WALLET">WALLET</option>
                                    <option value="OTHERS">OTHERS</option>
                                </select>

                                <label class="mt-3">Transaction ID:</label>
                                <input type="text" name="T_Id" class="form-control">

                                <label class="mt-3">Payment Status:</label>
                                <select name="Payment_Status" class="form-select" required>
                                    <option value="PARTIAL">PARTIAL</option>
                                    <option value="COMPLETE">COMPLETE</option>
                                </select>

                                <button type="submit" class="btn btn-primary px-4 mt-3">
                                    <i class="cil-save me-1"></i> Submit Payment
                                </button>
                            </form>
                    </div>

                    <hr>

                    <h6>Payments</h6>
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Method</th>
                                    <th>Status</th>
                                    <th>Txn ID</th>
                                </tr>
                            </thead>
                            <tbody id="payments_list">
                                {{-- populated by JS --}}
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>
    </div>

    {{-- REMINDER MODAL (form only, no action route changed) --}}
    <div class="modal fade" id="ReminderModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Create Reminder</h5>
                    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="POST" action="#">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="learner_id" id="rem_learner_id" value="">
                        <div class="mb-3">
                            <label class="form-label">Type</label>
                            <select name="reminder_type" class="form-select">
                                <option value="Fees">Fees</option>
                                <option value="Enrollment issue">Enrollment issue</option>
                                <option value="Other issue">Other issue</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input name="reminder_title" class="form-control" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="reminder_description" rows="4" class="form-control"></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Reminder Date</label>
                            <input type="datetime-local" name="reminder_start_date" class="form-control" />
                        </div>

                        <p class="text-muted small">Note: This form is UI-only; no new route was created. Integrate saving logic later.</p>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Reminder (UI only)</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

</div>
            <!-- {{-- Button 3: Get Specific User Data (Opens Modal for Role/ID Input) --}}
                    <button class="btn btn-secondary px-4 py-2 rounded-md" data-coreui-toggle="modal" data-coreui-target="#getSpecificUserModal">
                        Get User by ID/Role
                    </button> -->

          </div>

          <p class="text-muted"> NOTE:All content from institute only.</p>




          {{-- Modals for Profile view Actions --}}

          <!-- CoreUI Learner Creation Modal -->
          <div class="modal fade" id="CreateLearnerModal" tabindex="-1" aria-labelledby="createLearnerLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
              <div class="modal-content shadow-sm border-0 rounded-4">

                <div class="modal-header bg-primary text-white">
                  <h5 class="modal-title fw-semibold" id="createLearnerLabel">Create Learner</h5>
                  <button type="button" class="btn-close btn-close-white" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body p-4">
                  @if(session('success'))
                  <div class="alert alert-success">{{ session('success') }}</div>
                  @elseif(session('error'))
                  <div class="alert alert-danger">{{ session('error') }}</div>
                  @endif

                  <form method="POST" action="{{ route('branchExecutive.storeLearner') }}" id="createLearnerForm" novalidate>
                    @csrf

                    <p class="small text-muted mb-3">Please fill in learner details below.</p>

                    <div class="row g-3">
                      <div class="col-md-6">
                        <label class="form-label">First Name *</label>
                        <input type="text" name="first_name" class="form-control" placeholder="Enter First Name" required>
                      </div>

                      <div class="col-md-6">
                        <label class="form-label">Last Name *</label>
                        <input type="text" name="last_name" class="form-control" placeholder="Enter Last Name" required>
                      </div>

                      <div class="col-md-6">
                        <label class="form-label">Gender *</label>
                        <select name="gender" class="form-select" required>
                          <option value="">Select Gender</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                      </div>

                      <div class="col-md-6">
                        <label class="form-label">Email *</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
                      </div>

                      <div class="col-md-6">
                        <label class="form-label">Phone *</label>
                        <input type="text" name="phone" class="form-control" placeholder="Enter Phone Number" required>
                      </div>
                    </div>

                    <div class="mt-4">
                      <button type="submit" class="btn btn-success w-100">
                        <i class="cil-user-follow me-2"></i> Create Learner
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>


          <div class="modal fade" id="EnrollmentModal" tabindex="-1" aria-labelledby="enrollmentModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Program & Course Selection</h5>
                  <button type="button" class="btn-close" data-coreui-dismiss="modal"></button>
                </div>
                <form method="GET" action="{{ route('branchExecutiveLearnerEnrollment') }}">
                  @csrf
                  <p>If selection never show anything then click it refresh button.</p>
<button type="submit" class="btn btn-primary">Refresh</button>
                </form>
                <div class="modal-body">
                  <form method="POST" action="{{ route('enrollments.store') }}">
                    @csrf

                    <!-- Select Learner -->
                    <div class="mb-3">
                      <label for="learnerSelect" class="form-label">Select Learner</label>
                      <select name="learner_id" id="learnerSelect" class="form-select" required>
                        <option value="">-- Select Learner --</option>

                        @if(isset($learners))
                        @foreach($learners as $learner)
                        @if($learner->status == 'initial_entry')



                        <option value="{{ $learner->id }}">
                          {{ $learner->raw_learner_name }}
                        </option>
                        @endif
                        @endforeach
                        @endif
                      </select>

                    </div>

                    <!-- Select Program -->
                    <div class="mb-3">
                      <label for="programSelect" class="form-label">Select Program</label>
                      <select name="program_id" id="programSelect" class="form-select" required>
                        <option value="">-- Select Program --</option>
                        @if(isset($programs) && count($programs) > 0)
                        @foreach($programs as $program)
                        <option value="{{ $program->id }}">{{ $program->program_name }}</option>
                        @endforeach
                        @else
  <option value="">No active programs found</option>
@endif
                      </select>
                    </div>

                    <!-- Courses Section -->
                    <div class="mb-3" id="courseListContainer">
                      <p>Select a program to see available courses.</p>
                    </div>

                    <!-- Submit -->
                    <button type="submit" class="btn btn-primary">Enroll Learner</button>
                  </form>
                </div>
              </div>
            </div>
          </div>


          <div class="modal fade" id="viewOverviewModal" tabindex="-1" aria-labelledby="viewOverviewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- OUTER FORM: LOAD OVERVIEW -->
            <form action="{{ route('ViewOverviewOfFeesBeforePayment') }}" method="POST" enctype="multipart/form-data" class="p-3">
                @csrf
            
                <div class="modal-header">
                    <h5 class="modal-title">View Fees Overview Before Payment</h5>
                    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <!-- Learner + Discount Selector -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Select Learner</label>
                            <select name="learner_id" class="form-select" required>
                                <option value="">-- Select Learner --</option>
                                 @if(isset($learners))
                                @foreach($learners as $learner)
                                    @if($learner->status == 'initial_entry')
                                        <option value="{{ $learner->id }}">{{ $learner->raw_learner_name }}</option>
                                    @endif
                                @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Select Discount</label>
                            <select class="form-select" name="discount_id">
                                <option value="0">-- Select Discount --</option>
                                @if(isset($discounts_offers))
                                @foreach($discounts_offers as $dis)
                                    @if($dis->is_active == 1)
                                        <option value="{{ $dis->id }}">{{ $dis->name }}</option>
                                    @endif
                                @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                    <!-- OUTER FORM END HERE WHEN DATA AVAILABLE -->
                    @if(isset($learnerAllDetails))
                        </form> <!-- Close Outer Form — VERY IMPORTANT -->

                        <!-- OVERVIEW SECTION -->
                        <div class="border rounded p-3 bg-black mt-3"
                             style="max-height: 250px; overflow-y: auto; scrollbar-width: thin; scrollbar-color: #0d6efd #1a1a1a;">

                            <style>
                                div[style*='overflow-y: auto']::-webkit-scrollbar { width: 6px; }
                                div[style*='overflow-y: auto']::-webkit-scrollbar-track { background: #1a1a1a; border-radius: 10px; }
                                div[style*='overflow-y: auto']::-webkit-scrollbar-thumb { background-color: #0d6efd; border-radius: 10px; }
                                div[style*='overflow-y: auto']::-webkit-scrollbar-thumb:hover { background-color: #0b5ed7; }
                            </style>

                            <h6 class="fw-bold text-primary mb-2">Learner Details:</h6>
                            <p><strong>Learner Name:</strong> {{ $learnerAllDetails['learnerData']->raw_learner_name }}</p>
                            <p><strong>Email:</strong> {{ $learnerAllDetails['learnerData']->raw_email }}</p>
                            <p><strong>Phone:</strong> {{ $learnerAllDetails['learnerData']->raw_phone }}</p>
                            <p><strong>Learner Code:</strong> {{ $learnerAllDetails['learnerData']->learner_code }}</p>

                            <h6 class="fw-bold text-primary mb-2">Program Details:</h6>
                            <p><strong>Name:</strong> {{ $learnerAllDetails['ProgramData']->program_name }}</p>
                            <p><strong>Description:</strong> {{ $learnerAllDetails['ProgramData']->description }}</p>

                            <h6 class="fw-bold text-primary mb-2">Program Price:</h6>
                            <p>
                                <span class="badge bg-primary">
                                    ₹{{ $learnerAllDetails['programPriceData']->base_price }}
                                </span>
                            </p>

                            <!-- Enrolled Courses -->
                            <div class="border rounded p-3 bg-black mt-3">
                                <h5 class="text-primary fw-bold mb-3">Enrolled Courses with Price:</h5>
                                @if($learnerAllDetails['enrolledCoursesData']->isEmpty())
                                    <p class="text-muted">No courses enrolled yet.</p>
                                @else
                                    <ul class="list-group">
                                        @foreach($learnerAllDetails['enrolledCoursesData'] as $course)
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <span>{{ $course->course_name }}</span>
                                                <span class="badge bg-primary">₹{{ number_format($course->price, 2) }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>

                            <h6 class="fw-bold text-primary mb-2">Enrollment Details:</h6>
                            <p><strong>Enroll Date:</strong> {{ $learnerAllDetails['enrollment']->enrollment_date }}</p>
                            <p><strong>Total Fees:</strong> {{ $learnerAllDetails['fees']->total_fee_charged }}</p>

                            <h6 class="fw-bold text-primary mb-2">Discount Applied:</h6>
                            <p><strong>Name:</strong> {{ $learnerAllDetails['discount']->name ?? 'None' }}</p>
                            <p><strong>Description:</strong> {{ $learnerAllDetails['discount']->description_public ?? '---' }}</p>
                            <p><strong>Value:</strong> {{ $learnerAllDetails['discount']->value ?? '0' }}%</p>

                            <h6 class="fw-bold text-primary mb-2">Final Fees:</h6>
                            <p><strong>Payable:</strong> Rs. {{ $learnerAllDetails['finalEnrollmentPrice'] }}</p>
                            <p><strong>Saved:</strong> Rs. {{ $learnerAllDetails['discountAfterPrice'] }}</p>

                            <!-- INNER FORM: PAYMENT -->
                            <h6 class="fw-bold text-primary mb-2 mt-4">Pay Enrollment Fees:</h6>

                            <form action="{{ route('EnrollmentFeesPayment') }}" method="POST" class="p-3">
                                @csrf

                                <input type="hidden" name="Enrollment_Id" value="{{ $learnerAllDetails['enrollment']->id }}">
                                <input type="hidden" name="Discount_Id" value="{{ $learnerAllDetails['discount']->id ?? 0 }}">


                                <label>Fees Pay:</label>
                                <input type="number" name="Fees_Payment" class="form-control" required>

                                <label class="mt-3">Payment Method:</label>
                                <select name="Payment_Methods" class="form-select" required>
                                    <option value="CASH">CASH</option>
                                    <option value="CHEQUE">CHEQUE</option>
                                    <option value="CARD">CARD</option>
                                    <option value="UPI">UPI</option>
                                    <option value="NETBANKING">NETBANKING</option>
                                    <option value="WALLET">WALLET</option>
                                    <option value="OTHERS">OTHERS</option>
                                </select>

                                <label class="mt-3">Transaction ID:</label>
                                <input type="text" name="T_Id" class="form-control">

                                <label class="mt-3">Payment Status:</label>
                                <select name="Payment_Status" class="form-select" required>
                                    <option value="PARTIAL">PARTIAL</option>
                                    <option value="COMPLETE">COMPLETE</option>
                                </select>

                                <button type="submit" class="btn btn-primary px-4 mt-3">
                                    <i class="cil-save me-1"></i> Submit Payment
                                </button>
                            </form>

                        </div>
                    @endif

                </div>

                <!-- ONLY SHOW OUTER FORM SUBMIT IF OVERVIEW NOT LOADED -->
                @if(!isset($learnerAllDetails))
                    <div class="modal-footer border-top pt-3">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="cil-save me-1"></i> Load Overview
                        </button>
                    </div>
                @endif

            </form> <!-- OUTER FORM END -->

        </div>
    </div>
</div>






          <!-- Modal for "View All Users" (Primary Entry Point) -->
          <div class="modal fade" id="ViewDataModal" tabindex="-1" aria-labelledby="viewUserDataModalLabel" aria-hidden="true">
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
                    {{-- @php
    $user = Auth::user();
    userProfile = $user ? $user->userProfile : null;
@endphp --}}


                    <div class="card shadow-lg border-0 rounded-4">
                      <div class="card-header bg-gradient-primary text-white p-4 rounded-top-4">
                        <div class="d-flex flex-column">
                          <h4 class="fw-bold mb-1">Create New Program</h4>
                          <p class="mb-0 small opacity-75">Provide complete details to define your educational program.</p>
                        </div>
                      </div>

                      <div class="card-body p-4 bg-light">
                        <form action="{{ route('employerProgramCreation') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                          @csrf

                          <div class="accordion accordion-flush" id="programFormAccordion">

                            <!-- Program Core Details -->
                            <div class="accordion-item mb-3 rounded-3 border-0 shadow-sm">
                              <h2 class="accordion-header" id="headingProgram">
                                <button class="accordion-button bg-white fw-semibold text-primary" type="button"
                                  data-coreui-toggle="collapse" data-coreui-target="#collapseProgram" aria-expanded="true"
                                  aria-controls="collapseProgram">
                                  📝 Program Core Details
                                </button>
                              </h2>
                              <div id="collapseProgram" class="accordion-collapse collapse show" aria-labelledby="headingProgram" data-coreui-parent="#programFormAccordion">
                                <div class="accordion-body bg-white rounded-bottom-3">
                                  <div class="row g-3">
                                    <div class="col-md-8">
                                      <label for="program_name" class="form-label fw-medium">Program Name <span class="text-danger">*</span></label>
                                      <input type="text" class="form-control shadow-sm" id="program_name" name="program_name"
                                        placeholder="E.g., Full-Stack Web Development Bootcamp" required>
                                    </div>
                                    <div class="col-md-4">
                                      <label for="duration_days" class="form-label fw-medium">Duration (Days)</label>
                                      <input type="number" class="form-control shadow-sm" id="duration_days" name="duration_days" placeholder="E.g., 90">
                                    </div>
                                    <div class="col-12">
                                      <label for="description" class="form-label fw-medium">Description</label>
                                      <textarea class="form-control shadow-sm" id="description" name="description" rows="3"
                                        placeholder="Brief overview of the program, what it covers, and its goals."></textarea>
                                    </div>
                                    <div class="col-md-4">
                                      <label for="is_active" class="form-label fw-medium">Status</label>
                                      <select name="is_active" id="is_active" class="form-select shadow-sm">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive / Draft</option>
                                      </select>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <!-- Tag Details -->
                            <div class="accordion-item mb-3 rounded-3 border-0 shadow-sm">
                              <h2 class="accordion-header" id="headingTag">
                                <button class="accordion-button collapsed bg-white fw-semibold text-info" type="button"
                                  data-coreui-toggle="collapse" data-coreui-target="#collapseTag" aria-expanded="false"
                                  aria-controls="collapseTag">
                                  🏷️ Tag Details (Keywords)
                                </button>
                              </h2>
                              <div id="collapseTag" class="accordion-collapse collapse" aria-labelledby="headingTag" data-coreui-parent="#programFormAccordion">
                                <div class="accordion-body bg-white rounded-bottom-3">
                                  <p class="text-muted small mb-2">Add relevant tags to help users discover this program easily.</p>
                                  <div id="tagsContainer"></div>
                                  <button type="button" class="btn btn-outline-info btn-sm mt-3 shadow-sm" id="addTag">
                                    <i class="cil-plus me-1"></i> Add Tag Field
                                  </button>
                                </div>
                              </div>
                            </div>

                            <!-- Pricing Details -->
                            <div class="accordion-item mb-3 rounded-3 border-0 shadow-sm">
                              <h2 class="accordion-header" id="headingPrice">
                                <button class="accordion-button collapsed bg-white fw-semibold text-success" type="button"
                                  data-coreui-toggle="collapse" data-coreui-target="#collapsePrice" aria-expanded="false"
                                  aria-controls="collapsePrice">
                                  💰 Pricing Details
                                </button>
                              </h2>
                              <div id="collapsePrice" class="accordion-collapse collapse" aria-labelledby="headingPrice" data-coreui-parent="#programFormAccordion">
                                <div class="accordion-body bg-white rounded-bottom-3">
                                  <p class="text-muted small mb-2">Add different pricing or payment options for this program.</p>
                                  <div id="pricesContainer"></div>
                                  <button type="button" class="btn btn-outline-success btn-sm mt-3 shadow-sm" id="addPrice">
                                    <i class="cil-plus me-1"></i> Add Price Option
                                  </button>
                                </div>
                              </div>
                            </div>

                            <!-- Discount Details -->
                            <div class="accordion-item mb-3 rounded-3 border-0 shadow-sm">
                              <h2 class="accordion-header" id="headingDiscount">
                                <button class="accordion-button collapsed bg-white fw-semibold text-warning" type="button"
                                  data-coreui-toggle="collapse" data-coreui-target="#collapseDiscount" aria-expanded="false"
                                  aria-controls="collapseDiscount">
                                  🎁 Discount / Offer Details
                                </button>
                              </h2>
                              <div id="collapseDiscount" class="accordion-collapse collapse" aria-labelledby="headingDiscount" data-coreui-parent="#programFormAccordion">
                                <div class="accordion-body bg-white rounded-bottom-3">
                                  <p class="text-muted small mb-2">List available discounts, coupons, or offers.</p>
                                  <div id="discountsContainer"></div>
                                  <button type="button" class="btn btn-outline-warning btn-sm mt-3 shadow-sm" id="addDiscount">
                                    <i class="cil-plus me-1"></i> Add Discount
                                  </button>
                                </div>
                              </div>
                            </div>

                            <!-- Course Modules -->
                            <div class="accordion-item mb-3 rounded-3 border-0 shadow-sm">
                              <h2 class="accordion-header" id="headingCourse">
                                <button class="accordion-button collapsed bg-white fw-semibold text-danger" type="button"
                                  data-coreui-toggle="collapse" data-coreui-target="#collapseCourse" aria-expanded="false"
                                  aria-controls="collapseCourse">
                                  📚 Course Modules
                                </button>
                              </h2>
                              <div id="collapseCourse" class="accordion-collapse collapse" aria-labelledby="headingCourse" data-coreui-parent="#programFormAccordion">
                                <div class="accordion-body bg-white rounded-bottom-3">
                                  <p class="text-muted small mb-2">Specify the course modules that make up this program.</p>

                                  <div class="row g-3 mb-3 p-3 border rounded-3 bg-light">
                                    <div class="col-md-6">
                                      <label for="courseCount" class="form-label fw-medium">Number of Courses</label>
                                      <input type="number" id="courseCount" class="form-control shadow-sm" placeholder="E.g., 5" min="1">
                                    </div>
                                    <div class="col-md-6 d-flex align-items-end">
                                      <button type="button" class="btn btn-info w-100 shadow-sm" id="generateCourses">
                                        <i class="cil-spreadsheet me-1"></i> Generate Fields
                                      </button>
                                    </div>
                                  </div>

                                  <div id="coursesContainer"></div>
                                </div>
                              </div>
                            </div>

                          </div>

                          <button type="submit" class="btn btn-success btn-lg w-100 mt-4 shadow-sm fw-bold">
                            <i class="cil-check-alt me-2"></i> Submit & Create Program
                          </button>
                        </form>
                      </div>
                    </div>



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



          <!-- 1. Update Name -->
          <div class="modal fade" id="SmallFormModal" tabindex="-1" aria-labelledby="SmallFormLabel1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="SmallFormLabel1">Enter Details</h5>
                  <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="{{ Route('updateEmployerprofile') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>Select Program</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th>
                            <select class="form-control" id="detailStatus" name="is_active">
                              <option value="1">Active</option>
                              <option value="0">Inactive</option>
                            </select>
                          </th>
                        </tr>
                      </tbody>
                      <thead>
                        <tr>
                          <th>Program Name</th>
                          <th>Program Description</th>
                          <th>is_active</th>

                        </tr>
                      </thead>
                      <tbody>
                        <td>Nameof</td>
                        <td>PDO</td>
                        <td>IA</td>
                      </tbody>
                      <thead>
                        <tr>
                          <th>Tag Name</th>
                          <th>Type </th>
                          <th>Description</th>

                        </tr>
                      </thead>
                      <tbody>
                        <td>Nameof</td>
                        <td>PDO</td>
                        <td>IA</td>
                      </tbody>
                      <thead>
                        <tr>
                          <th>
                            NOTE: Tags related
                          </th>
                          <th>
                            data not show
                          </th>
                          <th>
                            then make new one.
                          </th>
                        </tr>
                      </thead>

                      <tbody>
                        <tr>
                          <td>
                            <div class="mb-3">
                              <label for="firstName1" class="form-label">Name</label>
                              <input type="text" class="form-control" id="firstName1" name="first_name" placeholder="Name">
                            </div>
                          </td>
                          <td>
                            <div class="mb-3">
                              <label for="lastName1" class="form-label">Type</label>
                              <input type="text" class="form-control" id="lastName1" name="last_name" placeholder="Type">
                            </div>
                          </td>
                          <td>
                            <div class="mb-3">
                              <label for="lastName1" class="form-label">Description</label>
                              <input type="text" class="form-control" id="lastName1" name="last_name" placeholder="Description">
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
                </form>
              </div>
            </div>
          </div>

          <!-- 2. Update DOB & Gender -->
          <div class="modal fade" id="SmallFormModal2" tabindex="-1" aria-labelledby="SmallFormLabel2" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="SmallFormLabel2">Enter Details</h5>
                  <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="{{ Route('updateEmployerprofile') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                      <label for="dob2" class="form-label">Price Type</label>
                      <input type="date" class="form-control" id="dob2" name="date_of_birth" placeholder="Date of Birth">
                    </div>
                    <div class="mb-3">
                      <label for="gender2" class="form-label">Base Price </label>
                      <input type="text" class="form-control" id="gender2" name="gender" placeholder="Gender">
                    </div>
                    <div class="mb-3">
                      <label for="gender2" class="form-label">Internal Notes </label>
                      <input type="text" class="form-control" id="gender2" name="gender" placeholder="Gender">
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
                </form>
              </div>
            </div>
          </div>

          <!-- 3. Update Address -->
          <div class="modal fade" id="SmallFormModal3" tabindex="-1" aria-labelledby="SmallFormLabel3" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="SmallFormLabel3">Enter Details</h5>
                  <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="{{ Route('updateEmployerprofile') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                      <label for="address1_3" class="form-label">Name </label>
                      <input type="text" class="form-control" id="address1_3" name="address_line_1" placeholder="Address line 1">
                    </div>
                    <div class="mb-3">
                      <label for="address2_3" class="form-label">description_public </label>
                      <input type="text" class="form-control" id="address2_3" name="address_line_2" placeholder="Address line 2">
                    </div>
                    <div class="mb-3">
                      <label for="city3" class="form-label">description_internal</label>
                      <input type="text" class="form-control" id="city3" name="city" placeholder="City">
                    </div>
                    <div class="mb-3">
                      <label for="state3" class="form-label"> type </label>
                      <input type="text" class="form-control" id="state3" name="state_province" placeholder="State Province">
                    </div>
                    <div class="mb-3">
                      <label for="postal3" class="form-label">value</label>
                      <input type="text" class="form-control" id="postal3" name="postal_code" placeholder="Postal Code">
                    </div>
                    <div class="mb-3">
                      <label for="country3" class="form-label">start_date</label>
                      <input type="text" class="form-control" id="country3" name="country" placeholder="Country">
                    </div>
                    <div class="mb-3">
                      <label for="country3" class="form-label">end_date</label>
                      <input type="text" class="form-control" id="country3" name="country" placeholder="Country">
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
                </form>
              </div>
            </div>
          </div>

          <!-- 4. Update Profile Image -->
          <div class="modal fade" id="SmallFormModal4" tabindex="-1" aria-labelledby="SmallFormLabel4" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="SmallFormLabel4">Enter Details</h5>
                  <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="{{ Route('updateEmployerprofile') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                      <label for="address1_3" class="form-label">course_name </label>
                      <input type="text" class="form-control" id="address1_3" name="address_line_1" placeholder="Address line 1">
                    </div>
                    <div class="mb-3">
                      <label for="address2_3" class="form-label">description_public </label>
                      <input type="text" class="form-control" id="address2_3" name="address_line_2" placeholder="Address line 2">
                    </div>
                    <div class="mb-3">
                      <label for="city3" class="form-label">description_internal</label>
                      <input type="text" class="form-control" id="city3" name="city" placeholder="City">
                    </div>
                    <div class="mb-3">
                      <label for="state3" class="form-label"> type </label>
                      <input type="text" class="form-control" id="state3" name="state_province" placeholder="State Province">
                    </div>
                    <div class="mb-3">
                      <label for="postal3" class="form-label">value</label>
                      <input type="text" class="form-control" id="postal3" name="postal_code" placeholder="Postal Code">
                    </div>
                    <div class="mb-3">
                      <label for="country3" class="form-label">start_date</label>
                      <input type="text" class="form-control" id="country3" name="country" placeholder="Country">
                    </div>
                    <div class="mb-3">
                      <label for="country3" class="form-label">end_date</label>
                      <input type="text" class="form-control" id="country3" name="country" placeholder="Country">
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
                </form>
              </div>
            </div>
          </div>

          <!-- 5. Update Bio & Preferred Language -->
          <div class="modal fade" id="SmallFormModal5" tabindex="-1" aria-labelledby="SmallFormLabel5" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="SmallFormLabel5">Enter Details</h5>
                  <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="{{ Route('updateEmployerprofile') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                      <label for="bio5" class="form-label">Bio</label>
                      <input type="text" class="form-control" id="bio5" name="bio" placeholder="Bio">
                    </div>
                    <div class="mb-3">
                      <label for="language5" class="form-label">Preferred Language</label>
                      <input type="text" class="form-control" id="language5" name="preferred_language" placeholder="Preferred Language">
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
                </form>
              </div>
            </div>
          </div>



          <!-- update model of entire program related data -->
          <div class="modal fade" id="programEditModal" tabindex="-1" aria-labelledby="programEditLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-scrollable modal-dialog-centered">
              <div class="modal-content shadow-lg border-0 rounded-3">

                <div class="modal-header bg-warning text-white">
                  <h5 class="modal-title fw-semibold" id="programEditLabel">Edit Program: <span id="programNameDisplay">...</span></h5>
                  <button type="button" class="btn-close btn-close-white" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                  <div class="mb-4">
                    <label for="editProgramSelect" class="form-label fw-bold">Select Program to Edit</label>
                    <select id="editProgramSelect" class="form-select" style="width: 100%;">
                      <option value="">-- Select a Program --</option>
                      @if(isset($programs))
                      @foreach ($programs as $program)
                      <option value="{{ $program->id }}">{{ $program->program_name }}</option>
                      @endforeach
                      @endif
                    </select>
                  </div>

                  <hr>

                  <div id="editFormContainer">
                    <p class="text-center text-muted my-4">Select a program to begin editing.</p>
                  </div>
                </div>

                <div class="modal-footer bg-light">
                  <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>

          <template id="programEditFormTemplate">
            <form id="programEditForm" action="" method="POST" enctype="multipart/form-data">
              @csrf
              @method('POST') <input type="hidden" name="program_id" id="edit_program_id">

              <div class="accordion" id="programEditFormAccordion">

                <div class="accordion-item">
                  <h2 class="accordion-header" id="editHeadingProgram">
                    <button class="accordion-button" type="button" data-coreui-toggle="collapse" data-coreui-target="#editCollapseProgram" aria-expanded="true" aria-controls="editCollapseProgram">
                      Program Details
                    </button>
                  </h2>
                  <div id="editCollapseProgram" class="accordion-collapse collapse show" aria-labelledby="editHeadingProgram" data-coreui-parent="#programEditFormAccordion">
                    <div class="accordion-body">
                      <div class="mb-3">
                        <label class="form-label">Program Name</label>
                        <input type="text" class="form-control" name="program_name" id="edit_program_name" placeholder="Program Name" required>
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="edit_description" placeholder="Program Description"></textarea>
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Duration Days</label>
                        <input type="number" class="form-control" name="duration_days" id="edit_duration_days" placeholder="Duration Days">
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="is_active" id="edit_is_active" class="form-select">
                          <option value="1">Active</option>
                          <option value="0">Inactive</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header" id="editHeadingTag">
                    <button class="accordion-button collapsed" type="button" data-coreui-toggle="collapse" data-coreui-target="#editCollapseTag" aria-expanded="false" aria-controls="editCollapseTag">
                      Tag Details
                    </button>
                  </h2>
                  <div id="editCollapseTag" class="accordion-collapse collapse" aria-labelledby="editHeadingTag" data-coreui-parent="#programEditFormAccordion">
                    <div class="accordion-body">
                      <div id="editTagsContainer"></div>
                      <button type="button" class="btn btn-primary mb-3" id="editAddTag">Add Tag</button>
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header" id="editHeadingPrice">
                    <button class="accordion-button collapsed" type="button" data-coreui-toggle="collapse" data-coreui-target="#editCollapsePrice" aria-expanded="false" aria-controls="editCollapsePrice">
                      Pricing Details
                    </button>
                  </h2>
                  <div id="editCollapsePrice" class="accordion-collapse collapse" aria-labelledby="editHeadingPrice" data-coreui-parent="#programEditFormAccordion">
                    <div class="accordion-body">
                      <div id="editPricesContainer"></div>
                      <button type="button" class="btn btn-primary mb-3" id="editAddPrice">Add Price</button>
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header" id="editHeadingDiscount">
                    <button class="accordion-button collapsed" type="button" data-coreui-toggle="collapse" data-coreui-target="#editCollapseDiscount" aria-expanded="false" aria-controls="editCollapseDiscount">
                      Discount / Offer Details
                    </button>
                  </h2>
                  <div id="editCollapseDiscount" class="accordion-collapse collapse" aria-labelledby="editHeadingDiscount" data-coreui-parent="#programEditFormAccordion">
                    <div class="accordion-body">
                      <div id="editDiscountsContainer"></div>
                      <button type="button" class="btn btn-primary mb-3" id="editAddDiscount">Add Discount</button>
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header" id="editHeadingCourse">
                    <button class="accordion-button collapsed" type="button" data-coreui-toggle="collapse" data-coreui-target="#editCollapseCourse" aria-expanded="false" aria-controls="editCollapseCourse">
                      Course Details
                    </button>
                  </h2>
                  <div id="editCollapseCourse" class="accordion-collapse collapse" aria-labelledby="editHeadingCourse" data-coreui-parent="#programEditFormAccordion">
                    <div class="accordion-body">
                      <div id="editCoursesContainer"></div>
                      <button type="button" class="btn btn-primary mb-3" id="editAddCourse">Add Course</button>
                    </div>
                  </div>
                </div>

              </div>

              <button type="submit" class="btn btn-success mt-3">Save Changes</button>
            </form>
          </template>
          <!-- entire update program related data -->

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
                <!-- @error('CourseName')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>

                <!-- </form> -->
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
                     @if(isset($programs))
                    @foreach($programs as $program)
                    <option value="{{ $program->id }}">{{ $program->program_name }}</option>
                    @endforeach
                    @endif
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
  {{-- Minimal JS to inject data into modals (required) --}}
<script>
document.addEventListener('DOMContentLoaded', function () {

    function clearElement(el) {
        while (el.firstChild) el.removeChild(el.firstChild);
    }

    // --- VIEW: populate all details, including Courses & Discounts ---
    document.querySelectorAll('.view-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            const data = JSON.parse(this.getAttribute('data-learner') || '{}');

         

            
            document.getElementById('view_name').innerText = data.LearnerName || '';
            document.getElementById('view_email').innerText = data.LearnerEmail || '';
            document.getElementById('view_phone').innerText = data.LearnerPhoneNo || '';
            document.getElementById('view_program').innerText = data.Program || '';
            document.getElementById('view_enrollment_date').innerText = data.EnrollmentDate || '';

           

            // Courses
            const coursesNode = document.getElementById('view_courses');
            clearElement(coursesNode);
            if (Array.isArray(data.Courses) && data.Courses.length) {
                data.Courses.forEach(c => {
                    const div = document.createElement('div');
                    div.className = 'mb-1';
                    // SAFE CONVERSION: Number(c.CoursePrice||0).toFixed(2)
                    div.innerHTML = `<strong>${c.CourseName}</strong> <span class="text-muted">(${c.CourseStatus})</span> - ₹${Number(c.CoursePrice||0).toFixed(2)}`;
                    coursesNode.appendChild(div);
                });
            } else {
                coursesNode.innerHTML = '<div class="text-muted">No courses enrolled.</div>';
            }

            // Discounts
            const discNode = document.getElementById('view_discounts');
            clearElement(discNode);
            if (Array.isArray(data.Discounts) && data.Discounts.length) {
                data.Discounts.forEach(d => {
                    const div = document.createElement('div');
                    div.className = 'mb-1';
                    // SAFE CONVERSION: Number(d.discount_amount||0).toFixed(2)
                    div.innerHTML = `<strong>${d.offer_name || 'Discount'}</strong> - ₹${Number(d.discount_amount||0).toFixed(2)} <small class="text-muted">(${d.applied_date})</small>`;
                    discNode.appendChild(div);
                });
            } else {
                discNode.innerHTML = '<div class="text-muted">No discounts applied.</div>';
            }
                     document.getElementById('view_Enroll_Deactive_id').value = data.EnrollmentID || '';

        });

          
    });

    // --- FEES: populate fees and payments ---
    document.querySelectorAll('.fees-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            const data = JSON.parse(this.getAttribute('data-learner') || '{}');
            console.log(data);

             
           
            document.getElementById('fees_name').innerText = data.LearnerName || '';
            
            // 🛑 FIX APPLIED HERE: Ensure conversion to Number before toFixed()
            const totalFee = Number(data.TotalFee || 0);
            document.getElementById('fees_total').innerText = totalFee.toFixed(2);

            const paidAmount = Number(data.Paid || 0);
            document.getElementById('fees_paid').innerText = paidAmount.toFixed(2);
            
            const balanceAmount = Number(data.Balance || 0);
            document.getElementById('fees_balance').innerText = balanceAmount.toFixed(2);
            // -----------------------------------------------------------

            // payments list: we have Payments array in data if controller provided it
            const paymentsBody = document.getElementById('payments_list');
            
            while (paymentsBody.firstChild) paymentsBody.removeChild(paymentsBody.firstChild);

            if (Array.isArray(data.Payments) && data.Payments.length) {
                data.Payments.forEach(p => {

                
                    
                    const tr = document.createElement('tr');
                    tr.innerHTML = `
                        <td>${p.paid_at || ''}</td>
                        <td>₹${Number(p.amount||0).toFixed(2)}</td>
                        <td>${p.method || ''}</td>
                        <td>${p.status || ''}</td>
                        <td>${p.transaction_id || ''}</td>
                    `;
                    
                    paymentsBody.appendChild(tr);
                });
            } else {
                const tr = document.createElement('tr');
                tr.innerHTML = `<td colspan="5" class="text-muted">No payments found.</td>`;
                paymentsBody.appendChild(tr);
            }

            // SET THE INPUT VALUES HERE

        document.getElementById('view_Enroll_id').value = data.EnrollmentID || '';
        document.getElementById('view_Fees_id').value = data.EnrollmentFeesId || '';
        });
        
    });





    // --- REMINDER: set learner id & name in form ---
    document.querySelectorAll('.reminder-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            const lid = this.getAttribute('data-learnerid') || '';
            const name = this.getAttribute('data-learnername') || '';
            document.getElementById('rem_learner_id').value = lid;
            // optionally show name somewhere (we kept not showing here)
        });
    });

});
</script>





  <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
  <script>
    $(document).ready(function() {

      // View Program Details
      $(document).on('click', '.viewProgramBtn', function() {
        const programId = $(this).data('id');
        $('#programDetailsModal').modal('show');
        $('#programDetailsBody').html('<p class="text-center text-muted">Loading...</p>');

        $.ajax({
          url: `/Branch_Executive/programs/${programId}/details`,
          method: 'GET',
          success: function(response) {
            if (!response.success) {
              $('#programDetailsBody').html('<p class="text-danger">Failed to load program details.</p>');
              return;
            }

            const p = response.program;
            const createAddButton = (section) => `<button class="btn btn-sm btn-outline-success addSectionBtn" data-section="${section}" data-program-id="${p.id}">Add</button>`;

            let html = `
                    <h5 class="mb-3">${p.program_name}</h5>
                    <table class="table table-bordered">
                        <tr><th>Description</th><td>${p.description ?? 'N/A'}</td></tr>
                        <tr><th>Duration</th><td>${p.duration_days ?? 'N/A'} days</td></tr>
                        <tr><th>Status</th><td>${p.is_active ? 'Active' : 'Inactive'}</td></tr>
                    </table>

                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <h6>Courses</h6>${createAddButton('courses')}
                    </div>
                    <table class="table table-striped table-bordered">
                        <thead class="table-light"><tr><th>#</th><th>Course Name</th><th>Description</th></tr></thead>
                        <tbody>
                            ${p.courses.length ? p.courses.map((c,i) => `<tr><td>${i+1}</td><td>${c.course_name}</td><td>${c.description ?? ''}</td></tr>`).join('') :
                            `<tr><td colspan="3" class="text-center text-muted">No courses available</td></tr>`}
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <h6>Prices</h6>${createAddButton('prices')}
                    </div>
                    <table class="table table-striped table-bordered">
                        <thead class="table-light"><tr><th>#</th><th>Price Type</th><th>Amount</th></tr></thead>
                        <tbody>
                            ${p.prices.length ? p.prices.map((pr,i) => `<tr><td>${i+1}</td><td>${pr.price_type}</td><td>₹${pr.base_price}</td></tr>`).join('') :
                            `<tr><td colspan="3" class="text-center text-muted">No prices available</td></tr>`}
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <h6>Discounts</h6>${createAddButton('discounts')}
                    </div>
                    <table class="table table-striped table-bordered">
                        <thead class="table-light"><tr><th>#</th><th>Name</th><th>Value</th></tr></thead>
                        <tbody>
                            ${p.discounts.length ? p.discounts.map((d,i) => `<tr><td>${i+1}</td><td>${d.name}</td><td>${d.value}${d.type==0?'%':'₹'}</td></tr>`).join('') :
                            `<tr><td colspan="3" class="text-center text-muted">No discounts available</td></tr>`}
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <h6>Tags</h6>${createAddButton('tags')}
                    </div>
                    <table class="table table-striped table-bordered">
                        <thead class="table-light"><tr><th>#</th><th>Tag Name</th></tr></thead>
                        <tbody>
                            ${p.tags.length ? p.tags.map((t,i) => `<tr><td>${i+1}</td><td>${t.name}</td></tr>`).join('') :
                            `<tr><td colspan="2" class="text-center text-muted">No tags available</td></tr>`}
                        </tbody>
                    </table>
                `;

            $('#programDetailsBody').html(html);
          },
          error: function() {
            $('#programDetailsBody').html('<p class="text-danger">Server error while loading program details.</p>');
          }
        });
      });

      // Open Add Section Modal
      $(document).on('click', '.addSectionBtn', function() {
        const section = $(this).data('section');
        const programId = $(this).data('program-id');

        let title = 'Add ' + section.charAt(0).toUpperCase() + section.slice(1);
        let formHtml = '';

        switch (section) {
          case 'courses':
            formHtml = `
                    <form id="addCourseForm">
                        <input type="hidden" name="program_id" value="${programId}">
                        <div class="mb-3"><label>Course Name</label><input type="text" class="form-control" name="course_name" required></div>
                        <div class="mb-3"><label>Description</label><textarea class="form-control" name="description"></textarea></div>
                        <div class="mb-3"><label>Published</label><select class="form-control" name="is_published">
                            <option value="1">Yes</option><option value="0">No</option>
                        </select></div>
                        <button type="submit" class="btn btn-success">Add Course</button>
                    </form>
                `;
            break;
          case 'prices':
            formHtml = `
                    <form id="addPriceForm">
                        <input type="hidden" name="program_id" value="${programId}">
                        <div class="mb-3"><label>Price Type</label><input type="text" class="form-control" name="price_type" required></div>
                        <div class="mb-3"><label>Amount</label><input type="number" class="form-control" name="base_price" required></div>
                        <button type="submit" class="btn btn-success">Add Price</button>
                    </form>
                `;
            break;
          case 'discounts':
            formHtml = `
                    <form id="addDiscountForm">
                        <input type="hidden" name="program_id" value="${programId}">
                        <div class="mb-3"><label>Discount Name</label><input type="text" class="form-control" name="name" required></div>
                        <div class="mb-3"><label>Value</label><input type="number" class="form-control" name="value" required></div>
                        <div class="mb-3"><label>Type</label><select class="form-control" name="type"><option value="0">%</option><option value="1">₹</option></select></div>
                        <button type="submit" class="btn btn-success">Add Discount</button>
                    </form>
                `;
            break;
          case 'tags':
            formHtml = `
                    <form id="addTagForm">
                        <input type="hidden" name="program_id" value="${programId}">
                        <div class="mb-3"><label>Tag Name</label><input type="text" class="form-control" name="name" required></div>
                        <button type="submit" class="btn btn-success">Add Tag</button>
                    </form>
                `;
            break;
        }

        $('#addSectionTitle').text(title);
        $('#addSectionBody').html(formHtml);
        $('#addSectionModal').modal('show');
      });

    });
  </script>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const programDetailBody = document.getElementById('programDetailsBody');
      const modalElement = document.getElementById('programDetailsModal');
      const programModal = new coreui.Modal(modalElement);

      document.querySelectorAll('.view-program-details').forEach(button => {
        button.addEventListener('click', () => {
          const programId = button.getAttribute('data-id');
          programDetailBody.innerHTML = `<p class="text-center text-muted my-4">Loading details...</p>`;

          // ✅ Show modal manually
          programModal.show();

          fetch(`/Branch_Executive/programs/${programId}`, {
              headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
              }
            })
            .then(res => {
              if (!res.ok) throw new Error('Network error');
              return res.json();
            })
            .then(data => {
              if (!data.success) throw new Error(data.message || 'Program not found');

              const p = data.program;

              programDetailBody.innerHTML = `
                    <div class="container">
                        <table class="table table-bordered mt-3">
                            <tr><th>Program Name</th><td>${p.program_name}</td></tr>
                            <tr><th>Description</th><td>${p.description || '-'}</td></tr>
                            <tr><th>Duration (Days)</th><td>${p.duration_days || 'N/A'}</td></tr>
                            <tr><th>Status</th><td>${p.is_active ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Inactive</span>'}</td></tr>
                            <tr><th>Created At</th><td>${new Date(p.created_at).toLocaleString()}</td></tr>
                            <tr><th>Updated At</th><td>${new Date(p.updated_at).toLocaleString()}</td></tr>
                        </table>
                    </div>
                `;
            })
            .catch(err => {
              programDetailBody.innerHTML = `<p class="text-center text-danger my-4">${err.message}</p>`;
            });
        });
      });
    });
  </script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Define URL templates to avoid "Missing Parameter" error on page load
      const programDetailsUrlTemplate = "{{ route('employer.program.details.ajax', ['programId' => ':programId']) }}";
      const programUpdateUrlTemplate = "{{ route('employerProgramUpdate', ['programId' => ':programId']) }}";

      // Global index trackers for adding new dynamic fields (Start high to avoid ID conflicts)
      let tagIndex = 1000;
      let priceIndex = 1000;
      let discountIndex = 1000;
      let courseIndex = 1000;

      // --- 1. Program Selection Change Handler ---
      $('#editProgramSelect').on('change', function() {
        const programId = $(this).val();
        const $formContainer = $('#editFormContainer');

        // 1. Reset display
        $('#programNameDisplay').text('...');

        if (!programId) {
          // Return to initial message if no program is selected
          $formContainer.html('<p class="text-center text-muted my-4">Select a program to begin editing.</p>');
          return;
        }

        // 2. Show loading indicator
        $formContainer.html('<p class="text-center text-info my-4">Fetching program data...</p>');

        // AJAX call to fetch program details
        $.ajax({
          // Use the template to generate the correct URL
          url: programDetailsUrlTemplate.replace(':programId', programId),
          method: 'GET',
          success: function(response) {
            if (response.success) {
              const program = response.program;

              // ✅ FIX: CLEAR the loading message & INJECT the fresh form HTML from the template
              const formTemplate = document.getElementById('programEditFormTemplate').innerHTML;
              $formContainer.html(formTemplate);

              // Set the form action dynamically on the *newly injected* form
              const updateRoute = programUpdateUrlTemplate.replace(':programId', programId);
              $('#programEditForm').attr('action', updateRoute);

              // Populate Main Program Fields
              $('#programNameDisplay').text(program.program_name);
              $('#edit_program_id').val(programId); // Hidden ID field
              $('#edit_program_name').val(program.program_name);
              $('#edit_description').val(program.description);
              $('#edit_duration_days').val(program.duration_days);
              $('#edit_is_active').val(program.is_active ? '1' : '0');

              // Clear and Populate Dynamic Containers
              populateDynamicFields(program.tags, '#editTagsContainer', 'tag');
              populateDynamicFields(program.prices, '#editPricesContainer', 'price');
              populateDynamicFields(program.discounts, '#editDiscountsContainer', 'discount');
              populateDynamicFields(program.courses, '#editCoursesContainer', 'course');

              // Re-attach add button listeners for the newly injected HTML
              initializeAddButtonListeners();

            } else {
              // Handle 200 response with success: false
              $formContainer.html('<p class="text-center text-danger my-4">Error: ' + (response.message || 'No program data returned.') + '</p>');
            }
          },
          error: function(xhr) {
            // Handle non-200 responses (4xx, 5xx)
            $formContainer.html('<p class="text-center text-danger my-4">An error occurred while fetching program details. Check console/network for status.</p>');
          }
        });
      });

      // --- 2. Dynamic Field Population Helper (UNCHANGED) ---
      function populateDynamicFields(dataArray, containerSelector, type) {
        const $container = $(containerSelector);
        $container.empty();
        let html = '';

        dataArray.forEach((item, index) => {
          const itemIndex = index; // Use simple index for loaded items

          if (type === 'tag') {
            html += `
                        <div class="input-group mb-2 dynamic-field-${type}">
                            <input type="hidden" name="tags[${itemIndex}][id]" value="${item.id}">
                            <input type="text" class="form-control" name="tags[${itemIndex}][name]" value="${item.name}" placeholder="Tag Name" required>
                            <button type="button" class="btn btn-outline-danger remove-field">X</button>
                        </div>
                    `;
          } else if (type === 'price') {
            html += `
                        <div class="card p-3 mb-3 dynamic-field-${type}">
                            <input type="hidden" name="prices[${itemIndex}][id]" value="${item.id}">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label class="form-label">Type</label>
                                    <input type="text" class="form-control" name="prices[${itemIndex}][price_type]" value="${item.price_type || ''}" placeholder="e.g. Full Payment" required>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Base Price</label>
                                    <input type="number" step="0.01" class="form-control" name="prices[${itemIndex}][base_price]" value="${item.base_price || 0}" required>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Status</label>
                                    <select name="prices[${itemIndex}][is_active]" class="form-select">
                                        <option value="1" ${item.is_active == 1 ? 'selected' : ''}>Active</option>
                                        <option value="0" ${item.is_active == 0 ? 'selected' : ''}>Inactive</option>
                                    </select>
                                </div>
                                <div class="col-md-2 d-flex align-items-end">
                                    <button type="button" class="btn btn-danger w-100 remove-field">Remove</button>
                                </div>
                            </div>
                        </div>
                    `;
          } else if (type === 'discount') {
            html += `
                        <div class="card p-3 mb-3 dynamic-field-${type}">
                            <input type="hidden" name="discounts[${itemIndex}][id]" value="${item.id}">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="discounts[${itemIndex}][name]" value="${item.name || ''}" required>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Value</label>
                                    <input type="number" step="0.01" class="form-control" name="discounts[${itemIndex}][value]" value="${item.value || 0}" required>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Type</label>
                                    <select name="discounts[${itemIndex}][type]" class="form-select">
                                        <option value="0" ${item.type == 0 ? 'selected' : ''}>Fixed Amount</option>
                                        <option value="1" ${item.type == 1 ? 'selected' : ''}>Percentage (%)</option>
                                    </select>
                                </div>
                                <div class="col-md-2 d-flex align-items-end">
                                    <button type="button" class="btn btn-danger w-100 remove-field">Remove</button>
                                </div>
                            </div>
                        </div>
                    `;
          } else if (type === 'course') {
            html += `
                        <div class="card p-3 mb-3 dynamic-field-${type}">
                            <input type="hidden" name="courses[${itemIndex}][id]" value="${item.id}">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Course Name</label>
                                    <input type="text" class="form-control" name="courses[${itemIndex}][course_name]" value="${item.course_name || ''}" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Published</label>
                                    <select name="courses[${itemIndex}][is_published]" class="form-select">
                                        <option value="1" ${item.is_published == 1 ? 'selected' : ''}>Published</option>
                                        <option value="0" ${item.is_published == 0 ? 'selected' : ''}>Draft</option>
                                    </select>
                                </div>
                                <div class="col-md-2 d-flex align-items-end">
                                    <button type="button" class="btn btn-danger w-100 remove-field">Remove</button>
                                </div>
                            </div>
                            <div class="mt-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" name="courses[${itemIndex}][description]" rows="2">${item.description || ''}</textarea>
                            </div>
                        </div>
                    `;
          }
        });

        $container.append(html);
      }

      // --- 3. Dynamic Field Add/Remove Handlers (UNCHANGED) ---
      function initializeAddButtonListeners() {
        // Remove previous listeners using .off() before re-attaching

        // Add Tag
        $('#editAddTag').off('click').on('click', function() {
          const html = `
                    <div class="input-group mb-2 dynamic-field-tag">
                        <input type="text" class="form-control" name="tags[${tagIndex}][name]" placeholder="New Tag Name" required>
                        <button type="button" class="btn btn-outline-danger remove-field">X</button>
                    </div>
                `;
          $('#editTagsContainer').append(html);
          tagIndex++;
        });

        // Add Price
        $('#editAddPrice').off('click').on('click', function() {
          const html = `
                    <div class="card p-3 mb-3 dynamic-field-price">
                        <input type="hidden" name="prices[${priceIndex}][id]" value="">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label">Type</label>
                                <input type="text" class="form-control" name="prices[${priceIndex}][price_type]" placeholder="e.g. Full Payment" required>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Base Price</label>
                                <input type="number" step="0.01" class="form-control" name="prices[${priceIndex}][base_price]" value="0" required>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Status</label>
                                <select name="prices[${priceIndex}][is_active]" class="form-select">
                                    <option value="1" selected>Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            <div class="col-md-2 d-flex align-items-end">
                                <button type="button" class="btn btn-danger w-100 remove-field">Remove</button>
                            </div>
                        </div>
                    </div>
                `;
          $('#editPricesContainer').append(html);
          priceIndex++;
        });

        // Add Discount
        $('#editAddDiscount').off('click').on('click', function() {
          const html = `
                    <div class="card p-3 mb-3 dynamic-field-discount">
                        <input type="hidden" name="discounts[${discountIndex}][id]" value="">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="discounts[${discountIndex}][name]" required>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Value</label>
                                <input type="number" step="0.01" class="form-control" name="discounts[${discountIndex}][value]" value="0" required>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Type</label>
                                <select name="discounts[${discountIndex}][type]" class="form-select">
                                    <option value="0">Fixed Amount</option>
                                    <option value="1">Percentage (%)</option>
                                </select>
                            </div>
                            <div class="col-md-2 d-flex align-items-end">
                                <button type="button" class="btn btn-danger w-100 remove-field">Remove</button>
                            </div>
                        </div>
                    </div>
                `;
          $('#editDiscountsContainer').append(html);
          discountIndex++;
        });

        // Add Course
        $('#editAddCourse').off('click').on('click', function() {
          const html = `
                    <div class="card p-3 mb-3 dynamic-field-course">
                        <input type="hidden" name="courses[${courseIndex}][id]" value="">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Course Name</label>
                                <input type="text" class="form-control" name="courses[${courseIndex}][course_name]" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Published</label>
                                <select name="courses[${courseIndex}][is_published]" class="form-select">
                                    <option value="1" selected>Published</option>
                                    <option value="0">Draft</option>
                                </select>
                            </div>
                            <div class="col-md-2 d-flex align-items-end">
                                <button type="button" class="btn btn-danger w-100 remove-field">Remove</button>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="courses[${courseIndex}][description]" rows="2"></textarea>
                        </div>
                    </div>
                `;
          $('#editCoursesContainer').append(html);
          courseIndex++;
        });
      }

      // Initial call to set up the form container listeners for ADD buttons
      initializeAddButtonListeners();


      // Use event delegation for removing fields (works for all types)
      $('#programEditModal').on('click', '.remove-field', function() {
        // Find the closest parent div that represents a dynamic field and remove it
        $(this).closest('.dynamic-field-tag, .dynamic-field-price, .dynamic-field-discount, .dynamic-field-course').remove();
      });

      // --- 4. AJAX Form Submission for Update (Modified to use delegation for dynamic form) ---
      // We attach the listener to a static parent (#programEditModal) and target the dynamic form (#programEditForm)
      $('#programEditModal').on('submit', '#programEditForm', function(e) {
        e.preventDefault();

        const form = document.getElementById('programEditForm');
        const actionUrl = form.getAttribute('action');
        const formData = new FormData(form);

        $.ajax({
          url: actionUrl,
          method: 'POST',
          data: formData,
          processData: false, // required for FormData
          contentType: false, // required for FormData
          success: function(response) {
            if (response.success) {
              alert('✅ ' + response.message);

              // Close modal if open
              const modalElement = document.getElementById('programEditModal');
              const modal = coreui.Modal.getInstance(modalElement);
              if (modal) {
                modal.hide();
              }

              // Reload to reflect updates
              window.location.reload();
            } else {
              alert('⚠️ Update failed: ' + response.message);
            }
          },
          error: function(xhr) {
            console.error('❌ AJAX Error:', xhr);

            const errors = xhr.responseJSON ? xhr.responseJSON.errors : null;
            let errorMsg = '⚠️ Validation Errors:\n';
            if (errors) {
              for (const key in errors) {
                errorMsg += `- ${key}: ${errors[key].join(', ')}\n`;
              }
            } else {
              errorMsg = 'An unexpected error occurred during update.\n' + xhr.responseText;
            }
            alert(errorMsg);
          }
        });
      });
    });
  </script>




  @endpush