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
                  </svg> Lock Account</a><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-account-logout') }}"></use>
                  </svg> Logout</a>
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
        <li class="nav-item"><a class="nav-link" href="{{ url('#') }}">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-drop') }}"></use>
            </svg> Profile</a></li>
        <li class="nav-title">EMPLOYERS MANAGEMENT</li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-puzzle') }}"></use>
            </svg> Employers Mgt </a>
          <ul class="nav-group-items compact">
            <li class="nav-item"><a class="nav-link" href="{{ url('Admin_packages_pricing') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Employers Info Mgt</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('BatchMgt2') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> New Emps Mgt</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('BatchMgt3') }}" ><span class="nav-icon"><span class="nav-icon-bullet"></span></span> onboard Empls Mgt
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
            <li class="nav-item"><a class="nav-link" href="{{ url('Admin_packages_pricing') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Users Info Mgt</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('BatchMgt2') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Control Access Mgt</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('BatchMgt3') }}" ><span class="nav-icon"><span class="nav-icon-bullet"></span></span> User Deletion Mgt
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
            <li class="nav-item"><a class="nav-link" href="{{ url('Admin_packages_pricing') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Subscriber details </a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('BatchMgt2') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Payment details</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('BatchMgt3') }}" ><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Transaction details
                <svg class="icon icon-sm ms-2">
                  <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-external-link') }}"></use>
                </svg><span class="badge badge-sm bg-danger ms-auto">PRO</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('BatchMgt2') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Pending Payments </a></li>

            </ul>

        </li>
        <li class="nav-title">PRICE & PACKAGE MGT</li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-puzzle') }}"></use>
            </svg> Price Package</a>
          <ul class="nav-group-items compact">
            <li class="nav-item"><a class="nav-link" href="{{ url('Admin_packages_pricing') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Creation Price & Package</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('BatchMgt2') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Update Price & Package </a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('BatchMgt3') }}" ><span class="nav-icon"><span class="nav-icon-bullet"></span></span> View
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
            <li class="nav-item"><a class="nav-link" href="{{ url('Admin_packages_pricing') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> product version</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('BatchMgt2') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> product infos </a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('BatchMgt3') }}" ><span class="nav-icon"><span class="nav-icon-bullet"></span></span> View
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

<div class="card text-center">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs" id="myCoreUITabs" role="tablist">
            <li class="nav-item" role="presentation">
                {{-- 'active' class on the first tab link to make it default --}}
                <a class="nav-link active" id="view-tab" data-bs-toggle="tab" data-bs-target="#viewContent" type="button" role="tab" aria-controls="viewContent" aria-selected="true">Onboard Employer</a>
            </li>
            
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content" id="myCoreUITabContent">
             {{-- View Tab Content --}}
            <div class="tab-pane fade show active" id="viewContent" role="tabpanel" aria-labelledby="view-tab">
                <h5 class="card-title mb-4">Creation of User and Employer Profile</h5>

                <div class="d-flex flex-wrap justify-content-center gap-3 mb-4"> {{-- Flex container for buttons --}}

                    {{-- Button 1: View Package & Pricing (Opens Modal for Type Selection) --}}
                    <button class="btn btn-primary px-4 py-2 rounded-md" data-coreui-toggle="modal" data-coreui-target="#ViewDataModal">
                        Creation User
                    </button>

                    {{-- Button 2: Package creation (Opens Modal for Package creation) --}}
                    <button class="btn btn-info px-4 py-2 rounded-md" data-coreui-toggle="modal" data-coreui-target="#editUserModal">
                        Creation Employer Profile
                    </button>

                     {{-- Button 3: Pricing creation (Opens Modal for Pricing insert) --}}
                    <button class="btn btn-info px-4 py-2 rounded-md" data-coreui-toggle="modal" data-coreui-target="#getSpecificUserModal">
                        Validate Data
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
                                <h5 class="modal-title" id="viewUserDataModalLabel">Creation of User and Employer Profile</h5>
                                <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <p>Creation of User Account</p>
                                <!-- <div class="d-flex flex-column flex-md-row justify-content-center gap-3 mb-4">
                                    <button class="btn btn-outline-primary w-full w-md-auto" data-coreui-toggle="modal" data-coreui-target="#studentDataModal">View Student Data</button>
                                    <button class="btn btn-outline-info w-full w-md-auto" data-coreui-toggle="modal" data-coreui-target="#staffDataModal">View Staff Data</button>
                                    <button class="btn btn-outline-secondary w-full w-md-auto" data-coreui-toggle="modal" data-coreui-target="#combinedUserDataModal">View All User Types</button>
                               
                                </div> -->
                               
                                {{-- Placeholder for combined user data table, if needed --}}
                                <div id="combinedUserTableContainer" class="table-responsive mt-3">
                                    {{-- This is where a table of all users (students, staff, etc.) would be loaded --}}
                                   <form action="{{ route('creationOfemployerAsuser') }}" method="POST" enctype="multipart/form-data">
                                       @csrf
                                    <table class="table table-striped table-hover">
                                        
                                      <thead>
                                            <tr>
                                                <th>Client Name</th>
                                                <th>Client Email </th>
                                                <th>Client UserName</th>
                                                <th>Password</th>
                                                 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- Example Rows (replace with dynamic data from backend) --}}
                                            <tr>

                                            


<td>                                    <input type="text" class="form-control" name="name" id="editUserId" placeholder= "">
</td>


                                                
                                                 <td>                                    <input type="email" class="form-control" name="email" id="editUserId" placeholder="">
</td>
                                                 <td>                                    <input type="text" class="form-control" name="username" id="editUserId" placeholder="">
</td>
                                                 <td>                                    <input type="text" class="form-control" name="password" id="editUserId" placeholder="">
</td>
                                                 
                                                 
                                                 
                                                    
                                                           
                                                
                                            </tr>

                                             
                                           
                                        </tbody>
                                        
                                        
                                        
                                        
                                    {{-- Hidden field to track who created this employer --}}
        <input type="hidden" name="onboarded_by_user_id" value="{{ Auth::id() }}">  
                                      
                                    </table>
                                </div>
                            
                             <div>
                                <p>NOTE: Client Data Accurate filling in system. </p>
                               
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
                                <h5 class="modal-title" id="editUserModalLabel">Creation of Employer Profile</h5>
                                <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p> NOTE: Employer Profile Data Fill Correctly. </p>

                                                                    <table class="table table-striped table-hover">
    <tbody>
        <tr>
            <td>
                <form id="search-form">
                    @csrf
                    <div class="mb-3">
                        <label for="search-email" class="form-label">Search by Email</label>
                        <input type="email" class="form-control" id="search-email" placeholder="Enter user's email" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </td>
        </tr>
    </tbody>
    
    <tbody id="user-info" style="display: none;">
        <tr>
             <!-- <td>
                <p><strong>Userid:</strong> <span id="user-id"></span></p>
            </td> -->
            
            <td>
                <p><strong>Name:</strong> <span id="user-name"></span></p>
            </td>
            <td>
                <p><strong>Email:</strong> <span id="user-email"></span></p>
            </td>
            <td>
                <p><strong>Username:</strong> <span id="user-username"></span></p>
            </td>
           
            


           
            
        </tr>

    </tbody>
                

    <tbody id="no-user-found" style="display: none;">
        <tr>
            <td>
                <div class="mt-4 alert alert-warning">
                    No user found with that email address.
                </div>
            </td>
        </tr>
    </tbody>
</table>

@php
    $user = Auth::user();
    $userProfile = $user ? $user->userProfile : null;
@endphp

                               
                                   <form action="{{ route('creationOfemployerAsprofile') }}" method="POST">

                                 <div class="mb-3">
                                    <label for="editUserId" class="form-label">Company/Institute Name </label>
                                    <input type="text" class="form-control" name="company_name" id="editUserId" placeholder="Enter Company/Institute Name">
                                    <input type="hidden" class="form-control" name="user_id" id="user-id">
                                    <input type="hidden" class="form-control" name="onboarded_by_user_id" id="editUserId" value="{{ Auth::id() }}">
                                    

                                </div>
                                
                                 @csrf
                                
                                <!-- <div class="mb-3">
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
                                <h5 class="modal-title" id="getSpecificUserModalLabel">Confirm Employer Onboard Data</h5>
                                <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Verify and Confirm Employer Data.</p>
                                <table class="table table-striped table-hover">
    <tbody>
        <tr>
            <td>
                <form id="search-form1">
                    @csrf
                    <div class="mb-3">
                        <label for="search-email1" class="form-label">Search by Email</label>
                        <input type="email" class="form-control" id="search-email1" placeholder="Enter user's email" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </td>
        </tr>
    </tbody>
    
    <tbody id="user-info1" style="display: none;">
        <tr>
             <!-- <td>
                <p><strong>Userid:</strong> <span id="user-id"></span></p>
            </td> -->
            
            <td>
                <p><strong>Name:</strong> <span id="user-name"></span></p>
            </td>
            <td>
                <p><strong>Email:</strong> <span id="user-email"></span></p>
            </td>
            <td>
                <p><strong>Username:</strong> <span id="user-username"></span></p>
            </td>
            <td>
                <p><strong>Company Name:</strong> <span id="company-name1"></span></p>
            </td>
           
            


           
            
        </tr>

    </tbody>

<tbody>
    <tr>
        <td>
            
        </td>
    </tr>
</tbody>

                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div> {{-- End viewContent tab-pane --}}

            

            
        </div>
      
    </div>
</div>

@endsection

{{-- No @push('scripts') needed here if CoreUI's JS is already loaded globally --}}



@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Function to handle the AJAX search
        function performSearch(formId, emailInputId, infoId, notFoundId, ajaxUrl, extraDataCallback) {
            const email = $(emailInputId).val();
            const token = $('input[name="_token"]').val();

            $(infoId).hide();
            $(notFoundId).hide();

            $.ajax({
                url: ajaxUrl,
                type: 'POST',
                data: {
                    _token: token,
                    email: email
                },
                success: function(response) {
                    console.log('AJAX Response:', response); // For debugging
                    if (response.user) {
                        // Populate user data
                        $(`${infoId} #user-name`).text(response.user.name);
                        $(`${infoId} #user-email`).text(response.user.email);
                        $(`${infoId} #user-username`).text(response.user.username);
                        
                        // Call a custom callback function for any specific data handling
                        if (extraDataCallback) {
                            extraDataCallback(response, infoId);
                        }
                        
                        $(infoId).show();
                    } else {
                        $(notFoundId).show();
                    }
                },
                error: function(xhr) {
                    $(notFoundId).show();
                    console.error('AJAX Error:', xhr.status, xhr.statusText);
                }
            });
        }

        // Attach event listener for the first form
        $('#search-form').on('submit', function(e) {
            e.preventDefault();
            performSearch('#search-form', '#search-email', '#user-info', '#no-user-found', '/search-user-by-email');
        });

        // Attach event listener for the second form
        $('#search-form1').on('submit', function(e) {
            e.preventDefault();
            // Pass a callback to handle company data
            performSearch('#search-form1', '#search-email1', '#user-info1', '#no-user-found1', '/search-user-by-email-for-confirm-data', function(response, infoId) {
                if (response.employerprofile) {
                    $(`${infoId} #company-name1`).text(response.employerprofile.company_name);
                } else {
                    $(`${infoId} #company-name1`).text('N/A');
                }
                // Also handle the user id
                $(`${infoId} #user-id1`).val(response.user.id);
            });
        });

    });
</script>
@endpush