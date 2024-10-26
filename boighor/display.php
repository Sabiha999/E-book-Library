<?php
include 'include/header.php';
?>
<!doctype html>
<htm class="no-js" lang="zxx">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
    <!-- Favicons -->
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="images/icon.png">

    <!-- Google font (font-family: 'Roboto', sans-serif; Poppins ; Satisfy) -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,600,600i,700,700i,800"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/plugins.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- Cusom css -->
    <link rel="stylesheet" href="css/custom.css">

    <!-- Modernizer js -->
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
  <style>
      
  body {
            font-family: Open Sans, sans-serif;
            font-size: 16px;
            line-height: 1.5;
            background-image: url('/boighor/images/bg/14.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            justify-content: center;
            align-items: center;
            color: #fff
        }


body a{
    color:#ccc;
}
 .row{
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;
  text-align: center;
  
  
} 
/* #spinner {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
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
 */
/* Sign Up Styles */

.box {
  background-color: rgba(255, 255, 255, 0.3);
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  margin: 30px;
  padding: 20px;
}

.box p {
 font-size: 20px;
 font-family: Open Sans, sans-serif;
}

 

/* Glass Effect */

/* .glass {
  background-color: rgba(206, 120, 82, 0.5);
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.glass:hover {
  background-color: rgba(206, 120, 82, 0.7);
} */

/* Responsive Styles */

@media (max-width: 768px) {
  .container-fluid {
    padding: 10px;
  }
  .box {
    padding: 10px;
  }
  
}
  </style>
</head>
<body>
<!-- <div class="container-fluid position-relative d-flex p-0"> -->
        <!-- Spinner Start -->
        <!-- <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        Spinner End -->


        <!-- Sign In Start -->
         <hr>

        <div class="container-fluid">
            <div class="row" >
                <div  class="col-12 col-sm-12 col-md-6 col-lg-6 ">
                  <div class="box">
                   <p>
                   Welcome to E-book Library!!!
                   Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae nostrum exercitationem, impedit cupiditate culpa laboriosam eius, explicabo, repellat nam facere earum illum. Facere, deserunt nesciunt minima repellendus cumque quibusdam placeat dolor? Vero rem minima distinctio mollitia. Corporis esse iusto voluptatum voluptate recusandae laborum impedit eum tempora consequatur accusantium voluptas doloremque laudantium, doloribus ratione minima voluptatem, animi vero molestias deleniti corrupti ab! Assumenda perspiciatis ratione porro libero rem?
                   </p>
                  </div>
                   
                </div>

                <div class="col-12 col-sm-12 col-md-6 col-lg-6 " >
                   <div class="box">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laudantium molestias laborum repellat iusto similique inventore modi praesentium maxime! Architecto velit ratione eum ea ab cumque. Fuga mollitia exercitationem nisi vero voluptas blanditiis asperiores eius, excepturi doloremque eligendi tempora commodi maxime at quod quos temporibus enim. Libero numquam iste voluptates incidunt.</p>
                   </div>
                </div>
            </div>
        </div> 
        <!-- Sign In End
    </div>

</body>
</html>