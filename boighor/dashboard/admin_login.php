<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];



        if ($conn) {
            $sql = "SELECT  username FROM admin WHERE username = ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            mysqli_stmt_bind_result($stmt, $username);

            if (mysqli_stmt_fetch($stmt)) {
                if ($password === "loginadmin") {
                    $_SESSION['user_id'] = $id;
                    $_SESSION['username'] = $username;

                    header("location:\boighor\dashboard\dashboard.php");
                    exit;
                } else {
                    $error = "Invalid password.";
                }
            } else {
                $error = "No user found with that username.";
            }
            mysqli_stmt_close($stmt);
        } else {
            $error = "Database connection failed.";
        }
        mysqli_close($conn);
    } 
    

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Boighor- Admin</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
               * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;

        }

        body {
            margin: 0;
            padding: 0;
            font-family: Open Sans, sans-serif;
            font-size: 16px;
            line-height: 1.5;
            background-image: url('/boighor/images/bg/5.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: #fff
        }

        .container {
            background-color: rgba(255, 255, 255, 0.4);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            font-family: Open Sans, sans-serif;
            font-size: 16px;
            line-height: 1.5;
            width: 40vw;
        }

        .container h1 {
            margin-bottom: 20px;
            font-weight:500;
        }
 
        .form-floating {
  margin-bottom: 20px;
}

 .form-control {
  padding: 10px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  background-color: rgba(255, 255, 255, 0.4);
}

.form-control:focus {
  border-color: #ce7852;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}


label {
  font-size: 16px;
  color: #333;
  margin-bottom: 10px;
} 

button[type="submit"] {
  color: #fff;
  padding: 10px 20px;
  border: none;
  font-size: 900;
  border-radius: 10px;
  cursor: pointer;
  background-color: #c45728;

}
button[type="submit"] {
background-color: #c45728 !important;
}

#spinner {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5) !important;
  z-index: 1000;
  display: none;
}

#spinner.show {
  display: block;
}

.spinner-border {
  width: 3rem;
  height: 3rem;
  border: 3px solid #ce7852;
  border-top: 3px solid #fff;
  border-radius: 50%;
  animation: spin 1s linear infinite;
}

@keyframes spin {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

.alert {
    padding: 10px;
  border-radius: 10px;
  background-color: #ce7852;
  color: #fff;
  margin-bottom: 20px;
}

.alert-danger {
  background-color: #c45728;
} 

/* Glass Effect */

.glass {
  background-color: rgba(206, 120, 82, 0.5);
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.glass:hover {
  background-color: rgba(206, 120, 82, 0.7);
}
@media (max-width: 768px) {
  .container-fluid {
    padding: 10px;
  }
  .box {
    padding: 10px;
  }
  .form-floating {
    margin-bottom: 10px;
  }
  button[type="submit"] {
    padding: 5px 10px;
  }
}
    </style>
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sign In Start -->
        <div class="container">
        <div class="login-form">
            <h1 class="text" style="color:#c45728;font-weight:700"><i class="fa fa-user-edit me-2"></i> Admin </h1>

            <h2>Login</h2>
            <?php if (!empty($error)) echo '<div class="alert alert-danger">' . $error . '</div>'; ?>

            <form action="admin_login.php" method="post">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required>
                    <label for="username">Username or Email</label>

                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                    <label for="password">Password</label>
                </div>
                <button type="submit" class="btn btn-danger w-100 py-3">Login</button>
                <!-- <p class="signup-text">Don't have an account? <a href="#">Sign Up</a></p> -->
            </form>
        </div>
    </div>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>