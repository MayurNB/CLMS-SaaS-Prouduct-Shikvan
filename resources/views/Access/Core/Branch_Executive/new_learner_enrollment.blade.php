@extends('layouts.app') {{-- Assumes your main layout file is layouts/app.blade.php --}}

@section('breadcrumb_item_active', 'Learner Enrollment') {{-- Changed for clarity for this page --}}

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

          <ul class="nav-group-items compact">
            
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
            
          </ul>
        </li>

        <li class="nav-title">Academic & Schedule</li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="{{ url('Employer_acm') }}">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-puzzle') }}"></use>
            </svg>Academic & Schedule</a>
          <ul class="nav-group-items compact">
            <li class="nav-item"><a class="nav-link" href="{{ Route('branchExecutiveProgramAndCourses') }}"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Programs & Courses  </a></li>
           
          </ul>
        </li>
        

  @endsection

  @section('content')

  <div class="card text-center">
    <div class="card-header">
      <ul class="nav nav-tabs card-header-tabs" id="myCoreUITabs" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link active" id="view-tab" data-bs-toggle="tab" data-bs-target="#viewContent" type="button" role="tab" aria-controls="viewContent" aria-selected="true">Learner and Enrollment </a>
        </li>
       
      </ul>
    </div>
    <div class="card-body">
      <div class="tab-content" id="myCoreUITabContent">

     

    {{-- ================= ALERT ================= --}}
@if(session('error'))
<div class="alert alert-danger mb-3 mx-4 mt-3">
    {{ session('error') }}
</div>
@endif

<style>
:root {
    --primary: #2eb85c;
    --border: #e2e8f0;
    --bg: #f8fafc;
    --card: #ffffff;
    --text-main: #1e293b; 
    --text-muted: #64748b;
    --highlight: #f1f5f9;
}

.ent-container { padding: 30px; font-family: 'Inter', system-ui, sans-serif; background-color: var(--bg); color: var(--text-main); }
.ent-card {
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: 12px;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
}
.ent-header {
    padding: 24px;
    border-bottom: 1px solid var(--border);
    background: #fff;
    border-radius: 12px 12px 0 0;
}
.ent-header h4 { margin: 0; font-weight: 800; color: var(--text-main); }
.ent-section { padding: 24px; }
.ent-title {
    font-size: .75rem;
    font-weight: 800;
    text-transform: uppercase;
    color: var(--text-muted);
    margin-bottom: 15px;
    letter-spacing: 0.05em;
}
.ent-input, .ent-select {
    width: 100%;
    padding: 12px;
    border: 1px solid var(--border);
    border-radius: 8px;
    color: var(--text-main);
    background: #fff;
}
.ent-input:disabled { background: #f8fafc; color: #64748b; }
.ent-btn {
    background: var(--primary);
    border: none;
    color: #fff;
    padding: 12px 24px;
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.2s;
    cursor: pointer;
}
.ent-btn:disabled { background: #94a3b8; cursor: not-allowed; }
.ent-summary-box {
    background: #fff;
    border: 1px solid var(--border);
    border-radius: 12px;
    padding: 20px;
}
.ent-row { display: flex; justify-content: space-between; margin-bottom: 12px; font-size: 0.95rem; }
.ent-total {
    border-top: 2px solid var(--primary);
    padding-top: 15px;
    margin-top: 15px;
    font-weight: 800;
    font-size: 1.2rem;
    color: var(--primary);
}
.discount-badge {
    background: #dcfce7;
    color: #166534;
    padding: 6px 12px;
    border-radius: 6px;
    font-size: 0.8rem;
    font-weight: 700;
    display: inline-block;
}
</style>

<div class="ent-container">
    <div class="ent-card">
        <div class="ent-header">
            <h4>Learner Enrollment</h4>
            <p class="text-muted mb-0" style="font-size:.85rem">
                Search → Select Program → Select Courses → Lock Enrollment
            </p>
        </div>

        <div class="row g-0 ent-section">
            {{-- LEFT PANEL --}}
            <div class="col-lg-8 pe-lg-4 border-end">
                
                <div class="ent-title">1. Search Learner</div>
                <form method="POST" action="{{ route('learnerDataSearch') }}">
                    @csrf
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <input class="ent-input" name="learner_code" placeholder="Learner Code" value="{{ old('learner_code') }}">
                        </div>
                        <div class="col-md-6">
                            <input class="ent-input" name="learner_email" placeholder="Email Address" value="{{ old('learner_email') }}">
                        </div>
                    </div>
                    <button type="submit" class="ent-btn mb-4">Find Learner</button>
                </form>

                @if(isset($learners) && $learners->count() > 0)
                    @php $l = $learners->first(); @endphp
                    <div class="ent-title">2. Confirm Learner</div>
                    <div class="ent-summary-box mb-4" style="background: var(--highlight);">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1 fw-bold">{{ $l->raw_learner_name }}</h6>
                                <span class="text-muted small">{{ $l->learner_code }} | {{ $l->raw_email }}</span>
                            </div>
                            <label class="fw-bold text-primary">
                                <input type="checkbox" id="confirmLearner" class="form-check-input me-2"> Use this learner
                            </label>
                        </div>
                    </div>
                @endif

                <div id="programBlock" style="display:none">
                    <div class="ent-title">3. Program & Discount</div>
                    <select id="programSelect" class="ent-select mb-3">
                        <option selected disabled>-- Select Program --</option>
                        @foreach($programs as $p)
                            <option value="{{ $p->id }}">{{ $p->program_name }}</option>
                        @endforeach
                    </select>

                    <div id="discountDisplayArea" class="mb-4" style="display:none">
                        <div class="discount-badge" id="discountBadgeText"></div>
                    </div>

                    <div id="courseBlock" style="display:none">
                        <div class="ent-title">4. Included Courses</div>
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th width="40"></th>
                                        <th>Course Name</th>
                                        <th class="text-end">Fee</th>
                                    </tr>
                                </thead>
                                <tbody id="courseTable"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{-- RIGHT PANEL: SUMMARY --}}
            <div class="col-lg-4 ps-lg-4">
                <div class="sticky-top" style="top: 20px;">
                    <div class="ent-summary-box" style="border: 2px solid var(--primary);">
                        <h6 class="fw-bold mb-4">Enrollment Summary</h6>
                        
                        <div class="ent-row">
                            <span class="text-green">Program Fee</span>
                            <span class="fw-bold">₹<span id="summProgramFee">0.00</span></span>
                        </div>

                        <div class="ent-row">
                            <span class="text-green">Courses Fee</span>
                            <span class="fw-bold">₹<span id="summCourseFee">0.00</span></span>
                        </div>

                        <div class="ent-row pt-2 border-top mt-2">
                            <span class="text-green">Subtotal</span>
                            <span class="fw-bold">₹<span id="subtotal">0.00</span></span>
                        </div>

                        <div class="ent-row text-danger fw-bold">
                            <span>Discount Applied</span>
                            <span>-₹<span id="discount">0.00</span></span>
                        </div>

                        <div class="ent-total ent-row">
                            <span>Total Amount</span>
                            <span>₹<span id="final">0.00</span>+ {{ $extraCommonTotal }}</span>
                            
                        </div>

                        <div class="ent-total ent-row">
                                                      <h7>Institutional Fees: <span>₹{{ $extraCommonTotal }}</span> </h7>

                        </div>

                        <button class="ent-btn w-100 mt-4 py-3" id="lockBtn" disabled>
                            Lock Enrollment
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>













      </div> {{-- End card-body --}}
    </div> {{-- End card --}}

  </div>

  @endsection

  {{-- No @push('scripts') needed here if CoreUI's JS is already loaded globally --}}

  @push('scripts')

  {{-- ================= JAVASCRIPT ================= --}}
{{-- ================= JS ================= --}}
<script>
let programFee = 0;
let discountValue = 0;
let discountType = null;

// Selectors
const confirmLearner = document.getElementById('confirmLearner');
const programBlock  = document.getElementById('programBlock');
const programSelect = document.getElementById('programSelect');
const courseBlock   = document.getElementById('courseBlock');
const courseTable   = document.getElementById('courseTable');
const discountArea  = document.getElementById('discountDisplayArea');
const discountBadge = document.getElementById('discountBadgeText');

// Summary Selectors
const summProgramFee = document.getElementById('summProgramFee');
const summCourseFee  = document.getElementById('summCourseFee');
const subtotalEl = document.getElementById('subtotal');
const discountEl = document.getElementById('discount');
const finalEl    = document.getElementById('final');
const lockBtn    = document.getElementById('lockBtn');

confirmLearner?.addEventListener('change', e => {
    programBlock.style.display = e.target.checked ? 'block' : 'none';
});

function recalc() {
    let courseTotal = 0;
    document.querySelectorAll('.course-check:checked').forEach(cb => {
        courseTotal += parseFloat(cb.dataset.price || 0);
    });

    let subtotal = programFee + courseTotal;
    let discountAmount = 0;

    // Fixed discountType logic based on common database outputs
    if (discountType === '1' || discountType === 'percentage') {
        discountAmount = subtotal * (discountValue / 100);
    } else if (discountType === 'flat') {
        discountAmount = discountValue;
    }

    

    let finalAmt = Math.max(subtotal - discountAmount, 0);
    // Update Summary labels
    summProgramFee.innerText = programFee.toFixed(2);
    summCourseFee.innerText  = courseTotal.toFixed(2);
    subtotalEl.innerText     = subtotal.toFixed(2);
    discountEl.innerText     = discountAmount.toFixed(2);
    finalEl.innerText        = finalAmt.toFixed(2);

    lockBtn.disabled = (programFee <= 0);
}

programSelect?.addEventListener('change', function() {
    fetch("{{ route('ajax.program.data') }}", {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ program_id: this.value })
    })
    .then(r => r.json())
    .then(d => {
        programFee = parseFloat(d.price || 0);
        discountValue = parseFloat(d.discount_value || 0);
        discountType = d.discount_type;

        // Display Discount Info
        if(discountValue > 0) {
            discountArea.style.display = 'block';
            discountBadge.innerText = `Discount: ${d.discount_name} (${discountValue}${discountType === '1' || discountType === 'percent' ? '%' : ' Fixed'})`;
        } else {
            discountArea.style.display = 'none';
        }

        // Build Courses - THE FIX IS HERE (added data-id)
        courseTable.innerHTML = '';
        d.courses.forEach(c => {
            courseTable.innerHTML += `
            <tr>
                <td><input type="checkbox" class="course-check" data-id="${c.id}" data-price="${c.price}" onchange="recalc()"></td>
                <td>${c.course_name}</td>
                <td class="text-end fw-bold">₹${parseFloat(c.price).toFixed(2)}</td>
            </tr>`;
        });

        courseBlock.style.display = 'block';
        recalc();
    });
});

document.getElementById('lockBtn').addEventListener('click', function() {
    const selectedCourses = [];
    document.querySelectorAll('.course-check:checked').forEach(cb => {
        // Now dataset.id will be available
        selectedCourses.push(cb.dataset.id); 
    });

    const payload = {
        learner_id: "{{ isset($learners) ? $learners->first()->id : '' }}",
        program_id: programSelect.value,
        courses: selectedCourses
    };

    if(!payload.learner_id || !payload.program_id) {
        alert("Please select a learner and program first.");
        return;
    }

    if(!confirm("Are you sure you want to lock this enrollment?")) return;

    // Show loading state
    this.disabled = true;
    this.innerText = "Processing...";

    fetch("{{ route('learnerEnrollmentStore') }}", {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(payload)
    })
    .then(r => r.json())
    .then(res => {
        if(res.success) {
            alert("Enrollment Successful!");
            location.reload();
        } else {
            alert("Error: " + res.message);
            this.disabled = false;
            this.innerText = "Lock Enrollment";
        }
    })
    .catch(err => {
        console.error('Error:', err);
        this.disabled = false;
        this.innerText = "Lock Enrollment";
    });
});
</script>




  @endpush