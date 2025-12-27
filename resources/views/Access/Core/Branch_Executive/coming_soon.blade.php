<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Coming Soon | CLMS</title>

<style>
body{
  margin:0;
  font-family:system-ui,-apple-system,Segoe UI,Roboto,Arial,sans-serif;
  background:#f8fafc;
  color:#0f172a;
}

.container{
  min-height:100vh;
  display:flex;
  align-items:center;
  justify-content:center;
  padding:20px;
}

.card{
  max-width:600px;
  width:100%;
  background:#ffffff;
  border:1px solid #e5e7eb;
  border-radius:12px;
  padding:32px;
  text-align:center;
}

h1{
  font-size:24px;
  margin-bottom:16px;
}

p{
  font-size:14px;
  line-height:1.7;
  color:#475569;
  margin-bottom:12px;
}

.note{
  margin-top:16px;
  font-size:13px;
  color:#64748b;
}

.button{
  display:inline-block;
  margin-top:22px;
  padding:10px 20px;
  background:#2563eb;
  color:#ffffff;
  text-decoration:none;
  border-radius:6px;
  font-size:14px;
}

.button:hover{
  opacity:0.9;
}

.footer{
  margin-top:24px;
  font-size:12px;
  color:#94a3b8;
}
</style>
</head>

<body>

<div class="container">
  <div class="card">

    <h1>Coming Soon</h1>

    <p>
      This feature is currently under development.
      We are working to deliver it in a stable and efficient manner.
    </p>

    <p>
      Feature availability is planned based on system priority
      and overall platform performance.
    </p>

    <p>
      Thank you for your patience and continued trust in our platform.
    </p>

    <a href="{{ route('branchExecutiveDashboard') }}" class="button">
      Back to Dashboard
    </a>

    <div class="footer">
      © 2025 MNB Solutions Enterprise
    </div>

  </div>
</div>

</body>
</html>
