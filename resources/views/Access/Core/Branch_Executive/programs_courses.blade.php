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

                <h4>Important: <b>In accordance with institutional policy, programs and courses cannot be modified by this branch. To view full program details, please click "View Program List" and select the "Edit" option (Read-Only). </b></h4>
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

                   

                    <table class="table table-striped table-hover">
                      
                      <!-- <thead>
                    <tr>
                      <th>Program Creation</th>
                       <th>Tags</th>
                      <th>program_prices</th> -->
                    </tr>
                  </thead> 
                  <tbody>
                    <tr>
                      <!-- <td>
                         {{-- Button 1: View Package & Pricing (Opens Modal for Type Selection) --}}
                    <button class="btn btn-primary px-4 py-2 rounded-md" data-coreui-toggle="modal" data-coreui-target="#ViewDataModal">
                        Creation of Program
                    </button>
                      </td>
                       <td>
                         {{-- Button 1: View Package & Pricing (Opens Modal for Type Selection) --}}
                    <button class="btn btn-primary px-4 py-2 rounded-md" data-coreui-toggle="modal" data-coreui-target="#programDetailsModal">
                        View program
                    </button>
                      </td> -->
                       <!-- <td>editUserModal
                       <button class="btn btn-success" data-coreui-toggle="modal" data-coreui-target="#SmallFormModal">
  Update it
</button>
                      </td>
                      <td>
                        <button class="btn btn-success" data-coreui-toggle="modal" data-coreui-target="#SmallFormModal2">
  Update it
</button>
                      </td> -->
                    </tr>
                  </tbody>
                  
                  
                  <!--
                    
                    
                    <thead>
                    <tr>
                       <th>Program Creation</th> 
                      <th>Tags</th>
                      <th>program_prices</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                       <td>
                         {{-- Button 1: View Package & Pricing (Opens Modal for Type Selection) --}}
                    <button class="btn btn-primary px-4 py-2 rounded-md" data-coreui-toggle="modal" data-coreui-target="#ViewDataModal">
                        View Profile
                    </button>
                      </td> 
                       <td>
                       <button class="btn btn-success" data-coreui-toggle="modal" data-coreui-target="#SmallFormModal">
  Update it
</button>
                      </td>
                      <td>
                        <button class="btn btn-success" data-coreui-toggle="modal" data-coreui-target="#SmallFormModal2">
  Update it
</button>
                      </td>
                    </tr>
                  </tbody>
                  <thead>
                    <tr>
                      
                      <th>Discounts Offers</th>
                      <th>Courses </th>
                      <th>More</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                     
                      <td>
                       <button class="btn btn-success" data-coreui-toggle="modal" data-coreui-target="#SmallFormModal3">
  Update it
</button>
                      </td>
                      <td><button class="btn btn-success" data-coreui-toggle="modal" data-coreui-target="#SmallFormModal4">
  Update it
</button>
                  </td>
                  <td>
                    <button class="btn btn-success" data-coreui-toggle="modal" data-coreui-target="#SmallFormModal5">
  Update it
</button>
                  </td>
                    </tr>
                  </tbody>-->
                    
                    
                </table>

                    <!-- {{-- Button 3: Get Specific User Data (Opens Modal for Role/ID Input) --}}
                    <button class="btn btn-secondary px-4 py-2 rounded-md" data-coreui-toggle="modal" data-coreui-target="#getSpecificUserModal">
                        Get User by ID/Role
                    </button> -->

                </div>




                
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
          </div>      </div>
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
                        @foreach ($programs as $program)
                            <option value="{{ $program->id }}">{{ $program->program_name }}</option>
                        @endforeach
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

        <!-- <button type="submit" class="btn btn-success mt-3">Save Changes</button> -->
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




                <!--mode for program view-->
         <div class="modal fade" id="programDetailsModal" tabindex="-1" aria-labelledby="programDetailsLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content shadow-lg border-0 rounded-3">

            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title fw-semibold" id="programDetailsLabel">Program Details</h5>
                <button type="button" class="btn-close btn-close-white" data-coreui-dismiss="modal" aria-label="Close"></button>
            </div>

            


            <div class="modal-body" id="programDetailsBody">
                <p class="text-center text-muted my-4">Loading details...</p>
            </div>

            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- ✅ Toggle Button -->
<div class="d-flex justify-content-between align-items-center mt-4 mb-3">
  <h4 class="fw-bold text-primary mb-0">Programs</h4>
  <button class="btn btn-outline-primary fw-semibold"
          type="button"
          data-coreui-toggle="collapse"
          data-coreui-target="#programTableCollapse"
          aria-expanded="false"
          aria-controls="programTableCollapse">
    <i class="cil-list-rich me-2"></i> View Program List
  </button>
</div>

<!-- ✅ Collapsible Section (Hidden by default) -->
<div class="collapse" id="programTableCollapse">
  <div class="card border-0 shadow-sm rounded-3">
    <div class="card-body">
      
      <!-- Your Existing Program Table -->
      <div class="table-responsive mt-3">
        <table class="table table-striped align-middle table-hover border">
          <thead class="table-primary">
            <tr>
              <th>#</th>
              <th>Program Name</th>
              <th>Description</th>
              <th>Duration (Days)</th>
              <th>Status</th>
              <th>Created On</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($programs as $index => $program)
              <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $program->program_name }}</td>
                <td>{{ $program->description ?? '-' }}</td>
                <td>{{ $program->duration_days ?? 'N/A' }}</td>
                <td>
                  @if ($program->is_active)
                    <span class="badge bg-success">Active</span>
                  @else
                    <span class="badge bg-danger">Inactive</span>
                  @endif
                </td>
                <td>{{ \Carbon\Carbon::parse($program->created_at)->format('d M Y') }}</td>
                <td>
                  <button class="btn btn-sm btn-primary view-program-details"
                          data-id="{{ $program->id }}">
                    <i class="bi bi-eye"></i> View
                  </button>

                  <button class="btn btn-sm btn-warning edit-program-btn"
                          data-id="{{ $program->id }}" 
                          data-coreui-toggle="modal" 
                          data-coreui-target="#programEditModal">
                    <i class="bi bi-pencil"></i> Edit
                  </button>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="7" class="text-center text-muted">No programs found.</td>
              </tr>
            @endforelse
          </tbody>
        </table>

        <div class="mt-3">
          {{ $programs->links('pagination::bootstrap-5') }}
        </div>
      </div>
      <!-- End Table -->
      
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

<script>
let tagIndex = 0;
let priceIndex = 0;
let discountIndex = 0;

// Add Tag
document.getElementById('addTag').addEventListener('click', () => {
    const container = document.getElementById('tagsContainer');
    const card = document.createElement('div');
    card.className = 'card mb-2 p-3 border border-secondary';
    card.innerHTML = `
        <h5>Tag ${tagIndex + 1}</h5>
        <div class="mb-2">
            <label>Name</label>
            <input type="text" name="tags[${tagIndex}][name]" class="form-control" required>
        </div>
        <div class="mb-2">
            <label>Type</label>
            <input type="text" name="tags[${tagIndex}][type]" class="form-control">
        </div>
        <div class="mb-2">
            <label>Description</label>
            <textarea name="tags[${tagIndex}][description]" class="form-control"></textarea>
        </div>
    `;
    container.appendChild(card);
    tagIndex++;
});

// Add Price
document.getElementById('addPrice').addEventListener('click', () => {
    const container = document.getElementById('pricesContainer');
    const card = document.createElement('div');
    card.className = 'card mb-2 p-3 border border-secondary';
    card.innerHTML = `
        <h5>Price ${priceIndex + 1}</h5>
        <div class="mb-2">
            <label>Price Type</label>
            <input type="text" name="prices[${priceIndex}][price_type]" class="form-control" required>
        </div>
        <div class="mb-2">
            <label>Base Price</label>
            <input type="number" step="0.01" name="prices[${priceIndex}][base_price]" class="form-control">
        </div>
        <div class="mb-2">
            <label>Internal Notes</label>
            <textarea name="prices[${priceIndex}][internal_notes]" class="form-control"></textarea>
        </div>
        <div class="mb-2">
            <label>Status</label>
            <select name="prices[${priceIndex}][is_active]" class="form-select">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>
    `;
    container.appendChild(card);
    priceIndex++;
});

// Add Discount
document.getElementById('addDiscount').addEventListener('click', () => {
    const container = document.getElementById('discountsContainer');
    const card = document.createElement('div');
    card.className = 'card mb-2 p-3 border border-secondary';
    card.innerHTML = `
        <h5>Discount ${discountIndex + 1}</h5>
        <div class="mb-2">
            <label>Name</label>
            <input type="text" name="discounts[${discountIndex}][name]" class="form-control">
        </div>
        <div class="mb-2">
            <label>Description (Public)</label>
            <textarea name="discounts[${discountIndex}][description_public]" class="form-control"></textarea>
        </div>
        <div class="mb-2">
            <label>Description (Internal)</label>
            <textarea name="discounts[${discountIndex}][description_internal]" class="form-control"></textarea>
        </div>
        <div class="mb-2">
            <label>Type</label>
            <input type="text" name="discounts[${discountIndex}][type]" class="form-control">
        </div>
        <div class="mb-2">
            <label>Value</label>
            <input type="number" step="0.01" name="discounts[${discountIndex}][value]" class="form-control">
        </div>
        <div class="mb-2">
            <label>Start Date</label>
            <input type="date" name="discounts[${discountIndex}][start_date]" class="form-control">
        </div>
        <div class="mb-2">
            <label>End Date</label>
            <input type="date" name="discounts[${discountIndex}][end_date]" class="form-control">
        </div>
        <div class="mb-2">
            <label>Status</label>
            <select name="discounts[${discountIndex}][is_active]" class="form-select">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>
    `;
    container.appendChild(card);
    discountIndex++;
});

// Courses (existing dynamic generation)
document.getElementById('generateCourses').addEventListener('click', function() {
    const container = document.getElementById('coursesContainer');
    const count = parseInt(document.getElementById('courseCount').value);
    container.innerHTML = '';
    if (!count || count <= 0) return;

    for (let i = 0; i < count; i++) {
        const card = document.createElement('div');
        card.className = 'card mb-2 p-3 border border-secondary';
        card.innerHTML = `
            <h5>Course ${i + 1}</h5>
            <div class="mb-2">
                <label>Course Name</label>
                <input type="text" name="courses[${i}][course_name]" class="form-control" required>
            </div>
            <div class="mb-2">
                <label>Description</label>
                <textarea name="courses[${i}][description]" class="form-control"></textarea>
            </div>
            <div class="mb-2">
                <label>Thumbnail URL</label>
                <input type="text" name="courses[${i}][thumbnail_url]" class="form-control">
            </div>
            <div class="mb-2">
                <label>Price</label>
                <input type="number" step="0.01" name="courses[${i}][price]" class="form-control">
            </div>
            <div class="mb-2">
                <label>Published</label>
                <select name="courses[${i}][is_published]" class="form-select">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>
        `;
        container.appendChild(card);
    }
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

        switch(section) {
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

            fetch(`/branch-executive/branch/programs/${programId}`, {
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
    document.addEventListener('DOMContentLoaded', function () {
        // Define URL templates to avoid "Missing Parameter" error on page load
        const programDetailsUrlTemplate = "{{ route('employer.program.details.ajax.branch', ['programId' => ':programId']) }}";
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
