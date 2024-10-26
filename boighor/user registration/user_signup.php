
<?php
session_start();
include 'config.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $re_password = $_POST['re_password'];
    $phone = $_POST['phone'];

    // Validate re-password
    if ($password !== $re_password) {
        $error = "Passwords do not match";
    } elseif (!preg_match("/^[a-zA-Z0-9_ ]{5,}$/", $username)) {
        $error = "Username must contain at least five characters and only letters, numbers, and underscores.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email address";
    } elseif (strlen($password) < 6) {
        $error = "Password must be at least six characters long";
    } else {
        $conn = mysqli_connect('localhost', 'root', '', 'e_book');
$sql = "SELECT user_id FROM user_deatail WHERE username = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);

if (mysqli_stmt_num_rows($stmt) > 0) {
    $error = "Username is already taken";
} else {
    $sql2 = "SELECT user_id FROM user_deatail WHERE email = ?";
    $stmt2 = mysqli_prepare($conn, $sql2); // Create a new statement
    mysqli_stmt_bind_param($stmt2, 's', $email);
    mysqli_stmt_execute($stmt2);
    mysqli_stmt_store_result($stmt2);

    if (mysqli_stmt_num_rows($stmt2) > 0) {
        $error = "Email address already exists";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                        $sql3 = "INSERT INTO user_deatail (username, email, password,re_password, phone) VALUES (?, ?, ?, ?,?)";
                       $stmt = mysqli_prepare($conn, $sql3);
                       mysqli_stmt_bind_param($stmt, 'sssss', $username, $email, $hashed_password,$re_password, $phone);
        
                        if (mysqli_stmt_execute($stmt)) {
                             header("Location: user_login.php");
                             exit;
                         } else {
                             $error = "Registration failed. Please try again.";
                       }
                    }
                 }
             mysqli_close($conn);
             }
         }
            

?>

   

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Boighor- User Registration</title>
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
/* Global Styles */

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
            background-image: url('/boighor/images/bg/8.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: #fff
        }
body a{
    color:#ccc;
}
/* .container-fluid {
  /* max-width: 1200px;
  margin: 40px auto;
  padding: 20px; */
  /* background-image: url('/assets/img/boighor/bg.jpg');
  background-size: cover;
  background-position: center; */
 
  */
 
/* Spinner Styles */

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

/* Sign Up Styles */

.box {
  background-color: rgba(255, 255, 255, 0.4);
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.box h3 {
  color: #fff;
  margin-bottom: 10px;
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
  background-color: rgba(255, 255, 255, 0.5);
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
  border-radius: 10px;
  cursor: pointer;
}

button[type="submit"]:hover {
  background-color: #c45728;
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

/* Responsive Styles */

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
    <div class="container-fluid position-relative d-flex p-0" style="background:url(/assets/img/boighor/bg.jpg)">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sign Up Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="box p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3 text-box">
                            <a href="\boighor\index.php" class="" style="color:#c45728">
                                <h3 class="text" style="color:#c45728"><i class="fa fa-user-edit me-2" style="color:#c45728"></i>Register </h3>
                            </a>
                            <h3>Sign Up</h3>
                        </div>
                        <?php if (!empty($error)) echo '<div class="alert alert-danger">' . $error . '</div>'; ?>
                        <form action="user_signup.php" method="post">
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" id="floatingText" placeholder="jhondoe"name="username" >
                            <label for="floatingText" >Username</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com"  name="email">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Re-Password" name="re_password">
                            <label for="floatingPassword">Re-Password</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" id="floatingPassword" placeholder="phone" name="phone">
                            <label for="floatingPassword">Phone</label>
                        </div>
                        <!-- <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>-->
                            <a href="">Forgot Password</a>
                        </div>
                        <button type="submit" class="btn btn-danger py-3 w-100 mb-2" style="background-color:#c45728">Sign Up</button>
                        <p class="text-center mb-0" style="color:#fff">Already have an Account? <a href="\boighor\user registration\user_login.php" style="color:#c45728">Sign In</a></p>
                       
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign Up End -->

        
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
