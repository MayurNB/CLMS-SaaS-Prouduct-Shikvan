<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>CLMS Billing | MNB Solutions Enterprise</title>

<style>
:root{
  --primary:#0b5ed7;
  --dark:#0f172a;
  --light:#f8fafc;
  --danger:#dc2626;
  --warning:#f59e0b;
  --success:#16a34a;
  --border:#e5e7eb;
}

*{
  box-sizing:border-box;
  margin:0;
  padding:0;
  font-family:Inter,system-ui,sans-serif;
}

body{
  background:linear-gradient(135deg,#f1f5f9,#ffffff);
  color:var(--dark);
  padding:20px;
}

.container{
  max-width:1100px;
  margin:auto;
}

.header{
  display:flex;
  justify-content:space-between;
  align-items:center;
  margin-bottom:20px;
}

.brand{
  font-size:20px;
  font-weight:800;
}

.badge{
  padding:6px 14px;
  border-radius:20px;
  font-size:13px;
  background:#e0f2fe;
  color:#0369a1;
  font-weight:600;
}

.card{
  background:#fff;
  border-radius:18px;
  box-shadow:0 25px 45px rgba(0,0,0,.08);
  padding:26px;
  margin-bottom:20px;
}

.grid{
  display:grid;
  grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
  gap:20px;
}

.stat{
  border:1px solid var(--border);
  border-radius:14px;
  padding:20px;
}

.stat h3{
  font-size:13px;
  color:#64748b;
  margin-bottom:8px;
}

.stat p{
  font-size:24px;
  font-weight:800;
}

.total{
  font-size:34px;
  font-weight:900;
  color:var(--primary);
}

.alert{
  padding:18px;
  border-radius:14px;
  margin-top:18px;
  font-weight:600;
  line-height:1.6;
}

.alert.success{background:#ecfdf5;color:var(--success);}
.alert.danger{background:#fef2f2;color:var(--danger);}
.alert.warning{background:#fffbeb;color:#92400e;}

.info-box{
  margin-top:22px;
  padding:20px;
  border-radius:14px;
  background:#f8fafc;
  border:1px dashed var(--border);
}

.info-box h4{
  font-size:15px;
  margin-bottom:10px;
}

.info-box p{
  font-size:14px;
  color:#475569;
  line-height:1.7;
}

.flow{
  margin-top:15px;
}

.flow li{
  margin-left:18px;
  margin-bottom:8px;
  font-size:14px;
  color:#334155;
}

.footer{
  text-align:center;
  font-size:13px;
  color:#64748b;
  margin-top:30px;
}
</style>
</head>

<body>
<div class="container">

  <div class="header">
    <div class="brand">CLMS Billing Dashboard</div>
    <div class="badge">Enterprise • Verified Billing</div>
  </div>

  <!-- Billing Summary -->
  <div class="card">
    <div class="grid">
      <div class="stat">
        <h3>Total Active Learners</h3>
        <p id="learners">0</p>
      </div>
      <div class="stat">
        <h3>Rate per Learner</h3>
        <p>₹10 / Month</p>
      </div>
      <div class="stat">
        <h3>Estimated Monthly Bill</h3>
        <p class="total">₹<span id="total">0</span></p>
      </div>
    </div>

    <!-- Billing Alert -->
    <div id="billingAlert" class="alert"></div>

    <!-- Important Notice -->
    <div class="info-box">
      <h4>⚠️ Important Billing Notice</h4>
      <p>
        This dashboard is provided for <b>billing visibility and reference only</b>.
        Payments are <b>not accepted directly</b> from this panel.
      </p>

      <p>
        Our company will always share the <b>official billing amount</b> through
        verified communication channels. Clients are requested to
        <b>cross-check the bill</b> shown here with the officially shared invoice
        before proceeding with payment.
      </p>

      <div class="flow">
        <ul>
          <li>Billing cycle starts on <b>27th of every month</b></li>
          <li>Grace period until <b>4th of next month</b></li>
          <li>Payment confirmation is handled <b>manually & securely</b></li>
        </ul>
      </div>
    </div>

    <!-- System Update Message -->
    <div class="alert warning">
      🙏 <b>Payment Dashboard Update</b><br>
      We sincerely apologize for the inconvenience.
      Our team is actively developing a more <b>efficient, secure, and smooth
      enterprise-grade payment dashboard</b>.
      <br><br>
      Until then, this panel will display <b>informational billing instances</b>
      to help you understand usage and expected charges.
    </div>

  </div>

  <div class="footer">
    © 2025 MNB Solutions Enterprise • CLMS Billing System (Preview Instance)
  </div>

</div>

<script>
/* ======================
   CONFIGURATION
====================== */
const ACTIVE_LEARNERS = @json($activeLearners ?? 0); // replace later from backend
const PRICE_PER_LEARNER = 10;

/* ======================
   CALCULATION
====================== */
document.getElementById("learners").innerText = ACTIVE_LEARNERS;
document.getElementById("total").innerText = ACTIVE_LEARNERS * PRICE_PER_LEARNER;

/* ======================
   DATE LOGIC
====================== */
const today = new Date();
const day = today.getDate();
const alertBox = document.getElementById("billingAlert");

if(day === 27){
  alertBox.className = "alert success";
  alertBox.innerHTML =
    "✅ <b>Billing Cycle Started</b><br>" +
    "Today marks the official CLMS billing date. " +
    "The final bill will be shared separately for verification.";
}
else if(day > 27 || day <= 4){
  alertBox.className = "alert danger";
  alertBox.innerHTML =
    "⚠️ <b>Billing Window Active</b><br>" +
    "This is the payment grace period (27th – 4th). " +
    "Please ensure the official invoice is reviewed once received.";
}
else{
  alertBox.className = "alert success";
  alertBox.innerHTML =
    "ℹ️ <b>Billing Information</b><br>" +
    "This is a preview of your upcoming CLMS bill. " +
    "The next billing cycle begins on the 27th.";
}
</script>

</body>
</html>
