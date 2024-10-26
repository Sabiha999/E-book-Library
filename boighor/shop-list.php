<!doctype php>
<php class="no-js" lang="zxx">


<!-- Mirrored from phpdemo.net/boighor/boighor/shop-list.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 03 Sep 2024 19:15:01 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Shops | BOOKIFY</title>    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
</head>

<body>
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade
    your browser</a> to improve your experience and security.</p>
<![endif]-->

<!-- Main wrapper -->
<div class="wrapper" id="wrapper">

   <?php
   include('include/header.php')
   ?>
    <!-- Start Search Popup -->
    <div class="box-search-content search_active block-bg close__top">
        <form id="search_mini_form" class="minisearch" action="#">
            <div class="field__search">
                <input type="text" placeholder="Search entire store here...">
                <div class="action">
                    <a href="#"><i class="zmdi zmdi-search"></i></a>
                </div>
            </div>
        </form>
        <div class="close__wrap">
            <span>close</span>
        </div>
    </div>
    <!-- End Search Popup -->
    <!-- Start breadcrumb area -->
    <div class="ht__breadcrumb__area bg-image--5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__inner text-center">
                        <h2 class="breadcrumb-title">Shop</h2>
                        <nav class="breadcrumb-content">
                            <a class="breadcrumb_item" href="index.php">Home</a>
                            <span class="brd-separator">/</span>
                            <span class="breadcrumb_item active">Shop</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End breadcrumb area -->
    <!-- Start Shop Page -->
    <div class="page-shop-sidebar left--sidebar bg--white section-padding--lg">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-12 order-2 order-lg-1 md-mt-40 sm-mt-40">
                    <div class="shop__sidebar">
                        <aside class="widget__categories products--cat">
                            <h3 class="widget__title">Product Categories</h3>
                            <ul>
                                <li><a href="#">Biography <span>(3)</span></a></li>
                                <li><a href="#">Business <span>(4)</span></a></li>
                                <li><a href="#">Cookbooks <span>(6)</span></a></li>
                                <li><a href="#">Health & Fitness <span>(7)</span></a></li>
                                <li><a href="#">History <span>(8)</span></a></li>
                                <li><a href="#">Mystery <span>(9)</span></a></li>
                                <li><a href="#">Inspiration <span>(13)</span></a></li>
                                <li><a href="#">Romance <span>(20)</span></a></li>
                                <li><a href="#">Fiction/Fantasy <span>(22)</span></a></li>
                                <li><a href="#">Self-Improvement <span>(13)</span></a></li>
                                <li><a href="#">Humor Books <span>(17)</span></a></li>
                                <li><a href="#">Harry Potter <span>(20)</span></a></li>
                                <li><a href="#">Land of Stories <span>(34)</span></a></li>
                                <li><a href="#">Kids' Music <span>(60)</span></a></li>
                                <li><a href="#">Toys & Games <span>(3)</span></a></li>
                                <li><a href="#">hoodies <span>(3)</span></a></li>
                            </ul>
                        </aside>
                        <aside class="widget__categories pro--range">
                            <h3 class="widget__title">Filter by price</h3>
                            <div class="content-shopby">
                                <div class="price_filter s-filter clear">
                                    <form action="#" method="GET">
                                        <div id="slider-range"></div>
                                        <div class="slider__range--output">
                                            <div class="price__output--wrap">
                                                <div class="price--output">
                                                    <span>Price :</span><input type="text" id="amount" readonly="">
                                                </div>
                                                <div class="price--filter">
                                                    <a href="#">Filter</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </aside>
                        <aside class="widget__categories products--tag">
                            <h3 class="widget__title">Product Tags</h3>
                            <ul>
                                <li><a href="#">Biography</a></li>
                                <li><a href="#">Business</a></li>
                                <li><a href="#">Cookbooks</a></li>
                                <li><a href="#">Health & Fitness</a></li>
                                <li><a href="#">History</a></li>
                                <li><a href="#">Mystery</a></li>
                                <li><a href="#">Inspiration</a></li>
                                <li><a href="#">Religion</a></li>
                                <li><a href="#">Fiction</a></li>
                                <li><a href="#">Fantasy</a></li>
                                <li><a href="#">Music</a></li>
                                <li><a href="#">Toys</a></li>
                                <li><a href="#">Hoodies</a></li>
                            </ul>
                        </aside>
                        <aside class="widget__categories sidebar--banner">
                            <img src="images/others/banner_left.jpg" alt="banner images">
                            <div class="text">
                                <h2>new products</h2>
                                <h6>save up to <br> <strong>40%</strong>off</h6>
                            </div>
                        </aside>
                    </div>
                </div>
                <div class="col-lg-9 col-12 order-1 order-lg-2">
                    <div class="row">
                        <div class="col-lg-12">
                            <div
                                    class="shop__list__wrapper d-flex flex-wrap flex-md-nowrap justify-content-between">
                                <div class="shop__list nav justify-content-center" role="tablist">
                                    <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-grid" role="tab"><i
                                            class="fa fa-th"></i></a>
                                    <a class="nav-item nav-link active" data-bs-toggle="tab" href="#nav-list"
                                       role="tab"><i class="fa fa-list"></i></a>
                                </div>
                                <p>Showing 1–12 of 40 results</p>
                                <div class="orderby__wrapper">
                                    <span>Sort By</span>
                                    <select class="shot__byselect">
                                        <option>Default sorting</option>
                                        <option>HeadPhone</option>
                                        <option>Furniture</option>
                                        <option>Jewellery</option>
                                        <option>Handmade</option>
                                        <option>Kids</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab__container tab-content">
                       
                        <div class="shop-grid tab-pane fade show active" id="nav-list" role="tabpanel">
                            <div class="list__view__wrapper">
                            <?php
include 'dashboard/config.php'; // Include the database connection file

// Fetch shops from the database
$sql = "SELECT shop_name, image_path,email,contact_number, description FROM shops"; // Adjust the query to fetch required fields
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Output data for each row
    while ($row = $result->fetch_assoc()) {
        $shopName = htmlspecialchars($row['shop_name']);
        $contact = htmlspecialchars($row['contact_number'] ?? '');
        $email = htmlspecialchars($row['email'] ?? '');
        $image = htmlspecialchars($row['image_path'] ?? ''); // Default to an empty string if null
        $description = htmlspecialchars($row['description'] ?? '');

        ?>
          <!-- Start Single Product -->
          <div class="list__view">
                                    <div class="thumb">
                                        <a class="first__img"><img src="<?php echo 'images/books/' . $image; ?>" ></a>
                                      
                                    </div>
                                    <div class="content">
                                        <h2><?php echo $shopName; ?></a></h2>
                                        <ul class="rating d-flex">
                                            <li class="on"><i class="fa fa-star-o"></i></li>
                                            <li class="on"><i class="fa fa-star-o"></i></li>
                                            <li class="on"><i class="fa fa-star-o"></i></li>
                                            <li class="on"><i class="fa fa-star-o"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                        </ul>
                                        <ul class="price__box">
                                            <li>Gmail: <?php echo $email; ?></li>
                                        </ul>
                                        <p><?php echo $description; ?></p>
                                        <ul class="cart__action d-flex">
                                            <li class="cart"><a href="cart.php">Contact : <?php echo $contact; ?></a></li>
                                           
                                        </ul>

                                    </div>
                                </div>
                                <br>
                                <br>
                                <!-- End Single Product -->
        <?php
    }
} else {
    echo "0 results";
}

$conn->close();
?>

                             
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Shop Page -->
    <!-- Footer Area -->
   <?php include ('include/footer.php') ?>
    <!-- //Footer Area -->
 
</div>
<!-- //Main wrapper -->

<!-- JS Files -->
<script src="js/vendor/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/active.js"></script>

</body>


<!-- Mirrored from phpdemo.net/boighor/boighor/shop-list.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 03 Sep 2024 19:15:01 GMT -->
</php>