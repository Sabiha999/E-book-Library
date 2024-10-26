<!doctype php>
<php class="no-js" lang="zxx">


<!-- Mirrored from phpdemo.net/boighor/boighor/portfolio.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 03 Sep 2024 19:15:14 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Portfolio | Books Library eCommerce Store</title>
    <meta name="description" content="">
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
    include('include/header.php');
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
    <div class="ht__breadcrumb__area bg-image--6">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__inner text-center">
                        <h2 class="breadcrumb-title">Portfolio</h2>
                        <nav class="breadcrumb-content">
                            <a class="breadcrumb_item" href="index.php">Home</a>
                            <span class="brd-separator">/</span>
                            <span class="breadcrumb_item active">Portfolio</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End breadcrumb area -->
    <!-- Start Portfolio Area -->
    <section class="wn__portfolio__area gallery__masonry__activation bg--white mt--40 pb--100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="gallery__menu">
                        <button data-filter="*" class="is-checked">Filter - All</button>
                        <button data-filter=".cat--1">Company News</button>
                        <button data-filter=".cat--2">Computers</button>
                        <button data-filter=".cat--3">General News</button>
                        <button data-filter=".cat--4">Hipster Content</button>
                        <button data-filter=".cat--5">Just Food</button>
                    </div>
                </div>
            </div>
            <div class="row masonry__wrap">
                <!-- Start Single Portfolio -->
                <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-12 gallery__item cat--1">
                    <div class="portfolio">
                        <div class="thumb">
                            <a href="portfolio-details.php">
                                <img src="images/portfolio/md-img/1.jpg" alt="portfolio images">
                            </a>
                            <div class="search">
                                <a href="images/portfolio/big-2/1.jpg" data-lightbox="grportimg"
                                   data-title="My caption"><i class="zmdi zmdi-search"></i></a>
                            </div>
                            <div class="link">
                                <a href="portfolio-details.php"><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="content">
                            <h6><a href="portfolio-details.php">Coffee & Cookie Time</a></h6>
                            <p>road theme</p>
                        </div>
                    </div>
                </div>
                <!-- End Single Portfolio -->
                <!-- Start Single Portfolio -->
                <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-12 gallery__item cat--2">
                    <div class="portfolio">
                        <div class="thumb">
                            <a href="portfolio-details.php">
                                <img src="images/portfolio/md-img/2.jpg" alt="portfolio images">
                            </a>
                            <div class="search">
                                <a href="images/portfolio/big-2/2.jpg" data-lightbox="grportimg"
                                   data-title="My caption"><i class="zmdi zmdi-search"></i></a>
                            </div>
                            <div class="link">
                                <a href="portfolio-details.php"><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="content">
                            <h6><a href="portfolio-details.php">Coffee & Cookie Time</a></h6>
                            <p>road theme</p>
                        </div>
                    </div>
                </div>
                <!-- End Single Portfolio -->
                <!-- Start Single Portfolio -->
                <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-12 gallery__item cat--3">
                    <div class="portfolio">
                        <div class="thumb">
                            <a href="portfolio-details.php">
                                <img src="images/portfolio/md-img/3.jpg" alt="portfolio images">
                            </a>
                            <div class="search">
                                <a href="images/portfolio/big-2/3.jpg" data-lightbox="grportimg"
                                   data-title="My caption"><i class="zmdi zmdi-search"></i></a>
                            </div>
                            <div class="link">
                                <a href="portfolio-details.php"><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="content">
                            <h6><a href="portfolio-details.php">Coffee & Cookie Time</a></h6>
                            <p>road theme</p>
                        </div>
                    </div>
                </div>
                <!-- End Single Portfolio -->
                <!-- Start Single Portfolio -->
                <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-12 gallery__item cat--4">
                    <div class="portfolio">
                        <div class="thumb">
                            <a href="portfolio-details.php">
                                <img src="images/portfolio/md-img/4.jpg" alt="portfolio images">
                            </a>
                            <div class="search">
                                <a href="images/portfolio/big-2/1.jpg" data-lightbox="grportimg"
                                   data-title="My caption"><i class="zmdi zmdi-search"></i></a>
                            </div>
                            <div class="link">
                                <a href="portfolio-details.php"><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="content">
                            <h6><a href="portfolio-details.php">Coffee & Cookie Time</a></h6>
                            <p>road theme</p>
                        </div>
                    </div>
                </div>
                <!-- End Single Portfolio -->
                <!-- Start Single Portfolio -->
                <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-12 gallery__item cat--5">
                    <div class="portfolio">
                        <div class="thumb">
                            <a href="portfolio-details.php">
                                <img src="images/portfolio/md-img/5.jpg" alt="portfolio images">
                            </a>
                            <div class="search">
                                <a href="images/portfolio/big-2/1.jpg" data-lightbox="grportimg"
                                   data-title="My caption"><i class="zmdi zmdi-search"></i></a>
                            </div>
                            <div class="link">
                                <a href="portfolio-details.php"><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="content">
                            <h6><a href="portfolio-details.php">Coffee & Cookie Time</a></h6>
                            <p>road theme</p>
                        </div>
                    </div>
                </div>
                <!-- End Single Portfolio -->
                <!-- Start Single Portfolio -->
                <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-12 gallery__item cat--2">
                    <div class="portfolio">
                        <div class="thumb">
                            <a href="portfolio-details.php">
                                <img src="images/portfolio/md-img/6.jpg" alt="portfolio images">
                            </a>
                            <div class="search">
                                <a href="images/portfolio/big-2/2.jpg" data-lightbox="grportimg"
                                   data-title="My caption"><i class="zmdi zmdi-search"></i></a>
                            </div>
                            <div class="link">
                                <a href="portfolio-details.php"><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="content">
                            <h6><a href="portfolio-details.php">Coffee & Cookie Time</a></h6>
                            <p>road theme</p>
                        </div>
                    </div>
                </div>
                <!-- End Single Portfolio -->
                <!-- Start Single Portfolio -->
                <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-12 gallery__item cat--3">
                    <div class="portfolio">
                        <div class="thumb">
                            <a href="portfolio-details.php">
                                <img src="images/portfolio/md-img/7.jpg" alt="portfolio images">
                            </a>
                            <div class="search">
                                <a href="images/portfolio/big-2/1.jpg" data-lightbox="grportimg"
                                   data-title="My caption"><i class="zmdi zmdi-search"></i></a>
                            </div>
                            <div class="link">
                                <a href="portfolio-details.php"><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="content">
                            <h6><a href="portfolio-details.php">Coffee & Cookie Time</a></h6>
                            <p>road theme</p>
                        </div>
                    </div>
                </div>
                <!-- End Single Portfolio -->
                <!-- Start Single Portfolio -->
                <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-12 gallery__item cat--4">
                    <div class="portfolio">
                        <div class="thumb">
                            <a href="portfolio-details.php">
                                <img src="images/portfolio/md-img/8.jpg" alt="portfolio images">
                            </a>
                            <div class="search">
                                <a href="images/portfolio/big-2/3.jpg" data-lightbox="grportimg"
                                   data-title="My caption"><i class="zmdi zmdi-search"></i></a>
                            </div>
                            <div class="link">
                                <a href="portfolio-details.php"><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="content">
                            <h6><a href="portfolio-details.php">Coffee & Cookie Time</a></h6>
                            <p>road theme</p>
                        </div>
                    </div>
                </div>
                <!-- End Single Portfolio -->
                <!-- Start Single Portfolio -->
                <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-12 gallery__item cat--5">
                    <div class="portfolio">
                        <div class="thumb">
                            <a href="portfolio-details.php">
                                <img src="images/portfolio/md-img/9.jpg" alt="portfolio images">
                            </a>
                            <div class="search">
                                <a href="images/portfolio/big-2/2.jpg" data-lightbox="grportimg"
                                   data-title="My caption"><i class="zmdi zmdi-search"></i></a>
                            </div>
                            <div class="link">
                                <a href="portfolio-details.php"><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="content">
                            <h6><a href="portfolio-details.php">Coffee & Cookie Time</a></h6>
                            <p>road theme</p>
                        </div>
                    </div>
                </div>
                <!-- End Single Portfolio -->
                <!-- Start Single Portfolio -->
                <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-12 gallery__item cat--2">
                    <div class="portfolio">
                        <div class="thumb">
                            <a href="portfolio-details.php">
                                <img src="images/portfolio/md-img/10.jpg" alt="portfolio images">
                            </a>
                            <div class="search">
                                <a href="images/portfolio/big-2/1.jpg" data-lightbox="grportimg"
                                   data-title="My caption"><i class="zmdi zmdi-search"></i></a>
                            </div>
                            <div class="link">
                                <a href="portfolio-details.php"><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="content">
                            <h6><a href="portfolio-details.php">Coffee & Cookie Time</a></h6>
                            <p>road theme</p>
                        </div>
                    </div>
                </div>
                <!-- End Single Portfolio -->
                <!-- Start Single Portfolio -->
                <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-12 gallery__item cat--3">
                    <div class="portfolio">
                        <div class="thumb">
                            <a href="portfolio-details.php">
                                <img src="images/portfolio/md-img/5.jpg" alt="portfolio images">
                            </a>
                            <div class="search">
                                <a href="images/portfolio/big-2/1.jpg" data-lightbox="grportimg"
                                   data-title="My caption"><i class="zmdi zmdi-search"></i></a>
                            </div>
                            <div class="link">
                                <a href="portfolio-details.php"><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="content">
                            <h6><a href="portfolio-details.php">Coffee & Cookie Time</a></h6>
                            <p>road theme</p>
                        </div>
                    </div>
                </div>
                <!-- End Single Portfolio -->
                <!-- Start Single Portfolio -->
                <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-12 gallery__item cat--4">
                    <div class="portfolio">
                        <div class="thumb">
                            <a href="portfolio-details.php">
                                <img src="images/portfolio/md-img/7.jpg" alt="portfolio images">
                            </a>
                            <div class="search">
                                <a href="images/portfolio/big-2/2.jpg" data-lightbox="grportimg"
                                   data-title="My caption"><i class="zmdi zmdi-search"></i></a>
                            </div>
                            <div class="link">
                                <a href="portfolio-details.php"><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="content">
                            <h6><a href="portfolio-details.php">Coffee & Cookie Time</a></h6>
                            <p>road theme</p>
                        </div>
                    </div>
                </div>
                <!-- End Single Portfolio -->
            </div>
        </div>
    </section>
    <!-- End Portfolio Area -->
    <!-- Footer Area -->
    <footer id="wn__footer" class="footer__area bg__cat--8 brown--color">
        <div class="footer-static-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer__widget footer__menu">
                            <div class="ft__logo">
                                <a href="index.php">
                                    <img src="images/logo/3.png" alt="logo">
                                </a>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority
                                    have suffered duskam alteration variations of passages</p>
                            </div>
                            <div class="footer__content">
                                <ul class="social__net social__net--2 d-flex justify-content-center">
                                    <li><a href="#"><i class="bi bi-facebook"></i></a></li>
                                    <li><a href="#"><i class="bi bi-google"></i></a></li>
                                    <li><a href="#"><i class="bi bi-twitter"></i></a></li>
                                    <li><a href="#"><i class="bi bi-linkedin"></i></a></li>
                                    <li><a href="#"><i class="bi bi-youtube"></i></a></li>
                                </ul>
                                <ul class="mainmenu d-flex justify-content-center">
                                    <li><a href="index.php">Trending</a></li>
                                    <li><a href="index.php">Best Seller</a></li>
                                    <li><a href="index.php">All Product</a></li>
                                    <li><a href="index.php">Wishlist</a></li>
                                    <li><a href="index.php">Blog</a></li>
                                    <li><a href="index.php">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright__wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="copyright">
                            <div class="copy__right__inner text-start">
                                <p>&copy; 2021, Boighor. Made with <i class="fa fa-heart text-danger"></i> by <a
                                        href="http://hasthemes.com/" target="_blank">HasThemes</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="payment text-end">
                            <img src="images/icons/payment.png" alt=""/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
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


<!-- Mirrored from phpdemo.net/boighor/boighor/portfolio.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 03 Sep 2024 19:15:23 GMT -->
</php>