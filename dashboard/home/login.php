<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <title>Ticket Raise - Admin</title>
  <link rel="icon" type="image/png" href="./../assets/images/logo/favicon.svg">

  <!-- Your original stylesheet links remain unchanged -->
  <link rel="stylesheet" href="./../assets/css/app.css">
  <script src="./../assets/js/store.js"></script>

  <!-- Add Bootstrap & Icons (for design only) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="./../assets/css/custom.css">

  <style>
    body {
      background: linear-gradient(135deg, #4e73df, #224abe);
      height: 100vh;
      overflow: hidden;
    }
  </style>

</head>

<body class="font-inter skin-default">

  <!-- Floating Background Objects -->
  <div class="float-zone" id="floatZone"></div>

  <!-- NEW Bootstrap-Based Login Card -->
  <div class="login-box">

    <h2><i class="bi bi-person-circle me-2"></i>Sign In</h2>
    <p class="text-muted text-center">Access your dashboard</p>

    <!-- Original PHP Action (unchanged) -->
    <form action="./checklogin.php" method="POST">

      <div class="mb-3">
        <label class="form-label"><i class="fa fa-envelope me-2"></i>Email</label>
        <input type="email" name="a_email" class="form-control" placeholder="Enter Email" required>
      </div>

      <div class="mb-3">
        <label class="form-label"><i class="fa fa-lock me-2"></i>Password</label>
        <input type="password" name="a_pass" class="form-control" placeholder="••••••••" required>
      </div>

      <button class="btn btn-primary w-100 mt-3" name="login_btn">
        Login <i class="fa fa-arrow-right ms-2"></i>
      </button>

    </form>

  </div>

  <!-- Your original scripts (unchanged) -->
  <script src="./../assets/js/jquery-3.6.0.min.js"></script>
  <script src="./../assets/js/rt-plugins.js"></script>
  <script src="./../assets/js/app.js"></script>

  <script>
    const floatZone = document.getElementById("floatZone");
    for (let i = 0; i < 15; i++) {
        const el = document.createElement("div");
        el.className = "float-obj";
        el.style.left = Math.random() * 100 + "%";
        el.style.top = Math.random() * 100 + "%";
        el.style.width = el.style.height = 10 + Math.random() * 25 + "px";
        el.style.animationDuration = 8 + Math.random() * 10 + "s";
        floatZone.appendChild(el);
    }
  </script>

</body>
</html>
