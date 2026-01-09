@extends('layouts.app') {{-- Assumes your main layout file is layouts/app.blade.php --}}

@section('breadcrumb_item_active', 'Fees Payments') {{-- Changed for clarity for this page --}}

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
          <a class="nav-link active" id="view-tab" data-bs-toggle="tab" data-bs-target="#viewContent" type="button" role="tab" aria-controls="viewContent" aria-selected="true">Fees Payment </a>
        </li>
       
      </ul>
    </div>
    <div class="card-body">
      <div class="tab-content" id="myCoreUITabContent">

     

    {{-- ================= ALERT ================= --}}
@if(session('error'))
<div class="alert alert-danger mx-4 mt-3">{{ session('error') }}</div>
@endif

@if(session('success'))
<div class="alert alert-success mx-4 mt-3">{{ session('success') }}</div>
@endif

<style>
:root {
    --primary:#2563eb;
    --border:#e5e7eb;
    --bg:#f8fafc;
    --card:#ffffff;
    --text:#0f172a;
    --muted:#64748b;
}
body { background:var(--bg); }
.ent-wrap { padding:32px; font-family:Inter,system-ui; color:var(--text); }
.ent-card {
    background:var(--card);
    border:1px solid var(--border);
    border-radius:14px;
    box-shadow:0 8px 30px rgba(0,0,0,.04);
}
.ent-header { padding:24px; border-bottom:1px solid var(--border); }
.ent-header h4 { font-weight:800; margin:0; }
.ent-section { padding:24px; }
.ent-title {
    font-size:.75rem;
    font-weight:800;
    color:var(--muted);
    letter-spacing:.08em;
    text-transform:uppercase;
    margin-bottom:14px;
}
.ent-input, .ent-select {
    width:100%;
    padding:12px;
    border:1px solid var(--border);
    border-radius:10px;
}
.ent-btn {
    background:var(--primary);
    color:#fff;
    border:none;
    padding:14px;
    border-radius:10px;
    font-weight:700;
}
.ent-summary {
    border:2px solid var(--primary);
    border-radius:14px;
    padding:22px;
}
.row-line {
    display:flex;
    justify-content:space-between;
    margin-bottom:12px;
}
.total {
    border-top:2px dashed var(--border);
    padding-top:12px;
    font-size:1.2rem;
    font-weight:800;
}
.badge-status {
    background:#dcfce7;
    color:#166534;
    padding:6px 12px;
    border-radius:20px;
    font-size:.75rem;
    font-weight:700;
}
</style>

<div class="ent-wrap">
<div class="ent-card">

{{-- ================= HEADER ================= --}}
<div class="ent-header">
    <h4>Enrollment Fee Payment</h4>
    <p class="text-muted mb-0">Secure · Verified · Audit Ready</p>
</div>

<div class="row ent-section g-0">

{{-- ================= LEFT PANEL ================= --}}
<div class="col-lg-7 pe-lg-4 border-end">

{{-- SEARCH --}}
<div class="ent-title">Search Learner</div>
<form method="GET" action="{{ route('fees.payments.search') }}">
<div class="row g-3 mb-3">
    <div class="col-md-6">
        <input class="ent-input" name="code" placeholder="Learner Code">
    </div>
    <div class="col-md-6">
        <input class="ent-input" name="email" placeholder="Learner Email">
    </div>
</div>
<button class="ent-btn">Search</button>
</form>

{{-- ENROLLMENTS --}}
@if(isset($enrollments) && $enrollments->count())
<hr>
<div class="ent-title">Select Enrollment</div>

@foreach($enrollments as $e)
<a href="{{ route('fees.payments.enrollment', $e->id) }}"
   class="d-block p-3 mb-2 rounded border text-decoration-none bg-light">

    <strong>{{ $e->program->program_name }}</strong><br>
    <small class="text-muted">
        Enrolled On: {{ $e->enrollment_date ?? $e->created_at->format('d M Y') }}
    </small>
</a>
@endforeach
@endif

{{-- PAYMENT FORM --}}
@if(isset($fee))
<hr>
<div class="ent-title">Make Payment</div>

<form method="POST" action="{{ route('fees.payments.store') }}">
@csrf

<input type="hidden" name="enrollment_fee_id" value="{{ $fee->id }}">

<div class="mb-3">
    <label class="fw-bold mb-1">Amount</label>
    <input type="number"
           class="ent-input"
           name="amount"
           min="1"
           max="{{ ($fee->total_fee_charged - $fee->discount_applied) - $fee->paid_amount }}"
           required>
</div>

<div class="mb-3">
    <label class="fw-bold mb-1">Payment Method</label>
    <select class="ent-select" name="payment_method" required>
        <option value="Cash">Cash</option>
        <option value="UPI">UPI</option>
        <option value="Card">Card</option>
        <option value="Bank Transfer">Bank Transfer</option>
    </select>
</div>

<div class="mb-3">
    <label class="fw-bold mb-1">Transaction Reference</label>
    <input class="ent-input" name="trans_id" required>
</div>

<button class="ent-btn w-100">Confirm Payment</button>
</form>
@endif

</div>

{{-- ================= RIGHT PANEL ================= --}}
<div class="col-lg-5 ps-lg-4">

@if(isset($fee))
<div class="ent-summary sticky-top" style="top:20px">

<h6 class="fw-bold mb-3">Fee Summary</h6>

<div class="row-line">
    <span>Total Fee</span>
    <strong>₹{{ number_format($fee->total_fee_charged,2) }}</strong>
</div>



<div class="row-line">
    <span>Paid</span>
    <strong>₹{{ number_format($fee->paid_amount,2) }}</strong>
</div>

@php
$balance = $fee->total_fee_charged  - $fee->paid_amount;
@endphp

<div class="total row-line text-primary">
    <span>Balance</span>
    <span>₹{{ number_format($balance,2) }}</span>
</div>

<span class="badge-status mt-3 d-inline-block">
{{ strtoupper($fee->fee_status) }}
</span>

<hr>

<h6 class="fw-bold">Payment History</h6>

@if(isset($payments) && $payments->count())
@foreach($payments as $p)
<div class="border-bottom py-2 small">
₹{{ number_format($p->amount,2) }} • {{ $p->payment_method }}<br>
<span class="text-muted">
{{ $p->created_at->format('d M Y, h:i A') }}
</span>
</div>
@endforeach
@else
<p class="text-muted small">No payments yet</p>
@endif

</div>
@endif

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