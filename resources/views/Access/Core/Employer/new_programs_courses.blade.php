@extends('layouts.app') {{-- Assumes your main layout file is layouts/app.blade.php --}}

@section('breadcrumb_item_active', 'Programs and Courses') {{-- Changed for clarity for this page --}}

@section('quick')

 <div class="container-fluid border-bottom px-4">
          <button class="header-toggler" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()" style="margin-inline-start: -14px;">
            <svg class="icon icon-lg">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-menu') }}"></use>
            </svg>
          </button>
          
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
                 
                <div class="dropdown-header bg-body-tertiary text-body-secondary fw-semibold my-2">
                  <div class="fw-semibold">Settings</div>
                </div><a class="dropdown-item" href="{{ route('employerProfile') }}">
                 
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
                 
                <div class="dropdown-header bg-body-tertiary text-body-secondary fw-semibold my-2">
                  <div class="fw-semibold">Settings</div>
                </div><a class="dropdown-item" href="{{ route('employerProfile') }}">
                  
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
        <li class="nav-item"><a class="nav-link" href="{{ Route('employerDashboard') }}">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-speedometer') }}"></use>
            </svg> Dashboard<span class="badge badge-sm bg-info ms-auto">NEW</span></a></li>
        <li class="nav-title">PERSONAL</li>
        <li class="nav-item"><a class="nav-link" href="{{ route('employerProfile') }}">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-drop') }}"></use>
            </svg> Profile</a></li>
        <li class="nav-title">INSTITUTE INFO </li>
        <li class="nav-item"><a class="nav-link" href="{{ route('employerInstituteManage') }}">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-drop') }}"></use>
            </svg> My Institute</a></li>
        
          <ul class="nav-group-items compact">
            
          </ul>
        </li>
        <li class="nav-title">ADMINISTRATION MANAGEMENT</li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="{{ url('Employer_acm') }}">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-puzzle') }}"></use>
            </svg>Quick Action </a>
          <ul class="nav-group-items compact">
            <li class="nav-item"><a class="nav-link" href="{{ Route('employerBranch') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Branches Manages </a></li>
            <li class="nav-item"><a class="nav-link" href="{{ Route('employerBranchWiseLearnerAndFeesTotolInfo') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Branches View </a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ Route('employerProgramAndCourses') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Programs & Courses </a></li>
           
          </ul>
        </li>

         
 @endsection

@section('content')

<div class="card text-center">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs" id="myCoreUITabs" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="view-tab" data-bs-toggle="tab" data-bs-target="#viewContent" type="button" role="tab" aria-controls="viewContent" aria-selected="true">Programs & Courses</a>
            </li>
           
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content" id="myCoreUITabContent">
           {{-- View Tab Content --}}
            <div class="tab-pane fade show active" id="viewContent" role="tabpanel" aria-labelledby="view-tab">
                <h5 class="card-title mb-4">Operations </h5>

                <div class="d-flex flex-wrap justify-content-center gap-3 mb-4"> {{-- Flex container for buttons --}}

                   

                   

                    <table class="table table-striped table-hover">
                      
                      <thead>
                    <tr>
                      <th>Program Creation</th>
                      <!-- <th>Tags</th>
                      <th>program_prices</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                         {{-- Button 1: View Package & Pricing (Opens Modal for Type Selection) --}}
                    <button class="btn btn-primary px-4 py-2 rounded-md" data-coreui-toggle="modal" data-coreui-target="#ViewDataModal">
                        Creation of Program
                    </button>
                      </td>
                      
                    </tr>
                  </tbody>
                  
                  
                  
                    
                    
                </table>

                    

                </div>

                <p class="text-muted">NOTE: Click View Program List.</p>



                
                {{-- Modals for Profile view Actions --}}

              <div class="container-fluid py-4">

    <!-- Page Title -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Program Management</h2>
            <p class="text-muted mb-0">
                Define programs, pricing structures, discounts, and course modules.
            </p>
        </div>
    </div>

    <!-- Information Banner -->
    <div class="alert alert-light border rounded-3 shadow-sm mb-4">
        <div class="d-flex">
            <div class="me-3 fs-4">ℹ️</div>
            <div>
                <strong>Important:</strong>
                Program fees are versioned at enrollment time.
                Future price changes will not affect existing learners.
            </div>
        </div>
    </div>

    <!-- Main Container -->
    <div class="card border-0 shadow-lg rounded-4">

        <!-- Header -->
        <div class="card-header bg-body border-bottom py-4 rounded-top-4">
            <h4 class="fw-semibold mb-1">Create New Program</h4>
            <small class="text-muted">
                Fill in the details carefully to maintain pricing and enrollment consistency.
            </small>
        </div>

        <!-- Body -->
        <div class="card-body p-4">

            <form action="{{ route('employerProgramCreation') }}"
                  method="POST"
                  enctype="multipart/form-data"
                  class="needs-validation"
                  novalidate>
                @csrf

                <div class="accordion accordion-flush" id="programFormAccordion">

                    <!-- Core Details -->
                    <div class="accordion-item mb-3 border rounded-3 shadow-sm">
                        <h2 class="accordion-header" id="headingProgram">
                            <button class="accordion-button fw-semibold"
                                    type="button"
                                    data-coreui-toggle="collapse"
                                    data-coreui-target="#collapseProgram"
                                    aria-expanded="true">
                                Program Core Details
                            </button>
                        </h2>

                        <div id="collapseProgram" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                                <div class="row g-4">

                                    <div class="col-md-8">
                                        <label class="form-label fw-medium">
                                            Program Name <span class="text-danger">*</span>
                                        </label>
                                        <input type="text"
                                               id="program_name"
                                               name="program_name"
                                               class="form-control"
                                               placeholder="Example: 5th Standard Academic Program"
                                               required>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label fw-medium">
                                            Duration (Days)
                                        </label>
                                        <input type="number"
                                               id="duration_days"
                                               name="duration_days"
                                               class="form-control"
                                               placeholder="180">
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label fw-medium">
                                            Program Description
                                        </label>
                                        <textarea id="description"
                                                  name="description"
                                                  class="form-control"
                                                  rows="3"
                                                  placeholder="Short overview of objectives and structure"></textarea>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label fw-medium">
                                            Program Status
                                        </label>
                                        <select id="is_active"
                                                name="is_active"
                                                class="form-select">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive / Draft</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tags -->
                    <div class="accordion-item mb-3 border rounded-3 shadow-sm">
                        <h2 class="accordion-header" id="headingTag">
                            <button class="accordion-button collapsed fw-semibold"
                                    type="button"
                                    data-coreui-toggle="collapse"
                                    data-coreui-target="#collapseTag">
                                Tags & Keywords
                            </button>
                        </h2>

                        <div id="collapseTag" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <p class="text-muted small mb-3">
                                    Tags improve search, reporting, and program discovery.
                                </p>
                                <div id="tagsContainer"></div>
                                <button type="button"
                                        id="addTag"
                                        class="btn btn-outline-secondary btn-sm mt-2">
                                    + Add Tag
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Pricing -->
                    <div class="accordion-item mb-3 border rounded-3 shadow-sm">
                        <h2 class="accordion-header" id="headingPrice">
                            <button class="accordion-button collapsed fw-semibold"
                                    type="button"
                                    data-coreui-toggle="collapse"
                                    data-coreui-target="#collapsePrice">
                                Pricing Configuration
                            </button>
                        </h2>

                        <div id="collapsePrice" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <div id="pricesContainer"></div>
                                <button type="button"
                                        id="addPrice"
                                        class="btn btn-outline-success btn-sm mt-3">
                                    + Add Pricing Option
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Discounts -->
                    <div class="accordion-item mb-3 border rounded-3 shadow-sm">
                        <h2 class="accordion-header" id="headingDiscount">
                            <button class="accordion-button collapsed fw-semibold"
                                    type="button"
                                    data-coreui-toggle="collapse"
                                    data-coreui-target="#collapseDiscount">
                                Discounts & Offers
                            </button>
                        </h2>

                        <div id="collapseDiscount" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <div id="discountsContainer"></div>
                                <button type="button"
                                        id="addDiscount"
                                        class="btn btn-outline-warning btn-sm mt-3">
                                    + Add Discount Rule
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Courses -->
                    <div class="accordion-item mb-3 border rounded-3 shadow-sm">
                        <h2 class="accordion-header" id="headingCourse">
                            <button class="accordion-button collapsed fw-semibold"
                                    type="button"
                                    data-coreui-toggle="collapse"
                                    data-coreui-target="#collapseCourse">
                                Course Modules
                            </button>
                        </h2>

                        <div id="collapseCourse" class="accordion-collapse collapse">
                            <div class="accordion-body">

                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-medium">
                                            Number of Courses
                                        </label>
                                        <input type="number"
                                               id="courseCount"
                                               class="form-control"
                                               min="1">
                                    </div>

                                    <div class="col-md-6 d-flex align-items-end">
                                        <button type="button"
                                                id="generateCourses"
                                                class="btn btn-primary w-100">
                                            Generate Course Fields
                                        </button>
                                    </div>
                                </div>

                                <div id="coursesContainer"></div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Footer Notice -->
                <div class="alert alert-light border rounded-3 mt-4">
                    Learners will not have access to this program until it is explicitly assigned.
                </div>

                <!-- Submit -->
                <div class="d-flex justify-content-end mt-4">
                    <button type="submit"
                            class="btn btn-success btn-lg px-5 fw-semibold">
                        Save Program
                    </button>
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

        <button type="submit" class="btn btn-success mt-3">Save Changes</button>
    </form>
</template>
                                  <!-- entire update program related data -->

               

                

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
                                       


                            </div>
                           
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
            url: `/employer/programs/${programId}/details`,
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

            fetch(`/employer/programs/${programId}`, {
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
