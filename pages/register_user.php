<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ticket Raiser - Register </title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <link href="../assets/css/login.css" rel="stylesheet">


</head>

<body class="bg-gradient-primary">

    <div class="login-container">
        <h2><i class="bi bi-robot me-2"></i>Register Here!</h2>
        <p class="text-muted mb-4">Sign in to your intelligent workspace</p>
        <form action="redirect.php" method="post">
            <div class="mb-3">
                <label for="email" class="form-label"><i class="fa fa-envelope me-2"></i>Name</label>
                <input type="text" name="uname" class="form-control" id="name" placeholder="John Dev" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label"><i class="fa fa-envelope me-2"></i>Email</label>
                <input type="email" name="uemail" class="form-control" id="email" placeholder="xyz@gmail.com" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label"><i class="fa fa-lock me-2"></i>Password</label>
                <input type="password" name="upass" class="form-control" id="password" placeholder="••••••••" required>
            </div>
            <button type="submit" name="Registerbtn" value="Submit" class="btn btn-login w-100 mt-3">Register <i class="fa fa-arrow-right ms-2"></i></button>
            <div class="d-flex justify-content-between mt-3">
                <a href="../home/login.php" class="small text-decoration-none text-muted">Log In</a>
            </div>
        </form>
    </div>

    <div class="right-panel" id="floatZone"></div>

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