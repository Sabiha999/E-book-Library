﻿<!doctype php>
<php class="no-js" lang="zxx">


<!-- Mirrored from phpdemo.net/boighor/boighor/checkout.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 03 Sep 2024 19:15:07 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Checkout | Books Library eCommerce Store</title>
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
    <div class="ht__breadcrumb__area bg-image--4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__inner text-center">
                        <h2 class="breadcrumb-title">Checkout</h2>
                        <nav class="breadcrumb-content">
                            <a class="breadcrumb_item" href="index.php">Home</a>
                            <span class="brd-separator">/</span>
                            <span class="breadcrumb_item active">Checkout</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End breadcrumb area -->
    <!-- Start Checkout Area -->
    <section class="wn__checkout__area section-padding--lg bg__white">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="wn_checkout_wrap">
                        <div class="checkout_info">
                            <span>Returning customer ?</span>
                            <a class="showlogin" href="#">Click here to login</a>
                        </div>
                        <div class="checkout_login">
                            <form class="wn__checkout__form" action="#">
                                <p>If you have shopped with us before, please enter your details in the boxes below.
                                    If you are a new customer please proceed to the Billing & Shipping section.</p>

                                <div class="input__box">
                                    <label>Username or email <span>*</span></label>
                                    <input type="text">
                                </div>

                                <div class="input__box">
                                    <label>password <span>*</span></label>
                                    <input type="password">
                                </div>
                                <div class="form__btn">
                                    <button>Login</button>
                                    <label class="label-for-checkbox">
                                        <input id="rememberme" name="rememberme" value="forever" type="checkbox">
                                        <span>Remember me</span>
                                    </label>
                                    <a href="#">Lost your password?</a>
                                </div>
                            </form>
                        </div>
                        <div class="checkout_info">
                            <span>Have a coupon? </span>
                            <a class="showcoupon" href="#">Click here to enter your code</a>
                        </div>
                        <div class="checkout_coupon">
                            <form action="#">
                                <div class="form__coupon">
                                    <input type="text" placeholder="Coupon code">
                                    <button>Apply coupon</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="customer_details">
                        <h3>Billing details</h3>
                        <div class="customar__field">
                            <div class="margin_between">
                                <div class="input_box space_between">
                                    <label>First name <span>*</span></label>
                                    <input type="text">
                                </div>
                                <div class="input_box space_between">
                                    <label>last name <span>*</span></label>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="input_box">
                                <label>Company name <span>*</span></label>
                                <input type="text">
                            </div>
                            <div class="input_box">
                                <label>Country<span>*</span></label>
                                <select class="select__option">
                                    <option>Select a country…</option>
                                    <option>Afghanistan</option>
                                    <option>American Samoa</option>
                                    <option>Anguilla</option>
                                    <option>American Samoa</option>
                                    <option>Antarctica</option>
                                    <option>Antigua and Barbuda</option>
                                </select>
                            </div>
                            <div class="input_box">
                                <label>Address <span>*</span></label>
                                <input type="text" placeholder="Street address">
                            </div>
                            <div class="input_box">
                                <input type="text" placeholder="Apartment, suite, unit etc. (optional)">
                            </div>
                            <div class="input_box">
                                <label>District<span>*</span></label>
                                <select class="select__option">
                                    <option>Select a country…</option>
                                    <option>Afghanistan</option>
                                    <option>American Samoa</option>
                                    <option>Anguilla</option>
                                    <option>American Samoa</option>
                                    <option>Antarctica</option>
                                    <option>Antigua and Barbuda</option>
                                </select>
                            </div>
                            <div class="input_box">
                                <label>Postcode / ZIP <span>*</span></label>
                                <input type="text">
                            </div>
                            <div class="margin_between">
                                <div class="input_box space_between">
                                    <label>Phone <span>*</span></label>
                                    <input type="text">
                                </div>

                                <div class="input_box space_between">
                                    <label>Email address <span>*</span></label>
                                    <input type="email">
                                </div>
                            </div>
                        </div>
                        <div class="create__account">
                            <div class="wn__accountbox">
                                <input class="input-checkbox" name="createaccount" value="1" type="checkbox">
                                <span>Create an account ?</span>
                            </div>
                            <div class="account__field">
                                <form action="#">
                                    <label>Account password <span>*</span></label>
                                    <input type="text" placeholder="password">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="customer_details mt--20">
                        <div class="differt__address">
                            <input name="ship_to_different_address" value="1" type="checkbox">
                            <span>Ship to a different address ?</span>
                        </div>
                        <div class="customar__field differt__form mt--40">
                            <div class="margin_between">
                                <div class="input_box space_between">
                                    <label>First name <span>*</span></label>
                                    <input type="text">
                                </div>
                                <div class="input_box space_between">
                                    <label>last name <span>*</span></label>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="input_box">
                                <label>Company name <span>*</span></label>
                                <input type="text">
                            </div>
                            <div class="input_box">
                                <label>Country<span>*</span></label>
                                <select class="select__option">
                                    <option>Select a country…</option>
                                    <option>Afghanistan</option>
                                    <option>American Samoa</option>
                                    <option>Anguilla</option>
                                    <option>American Samoa</option>
                                    <option>Antarctica</option>
                                    <option>Antigua and Barbuda</option>
                                </select>
                            </div>
                            <div class="input_box">
                                <label>Address <span>*</span></label>
                                <input type="text" placeholder="Street address">
                            </div>
                            <div class="input_box">
                                <input type="text" placeholder="Apartment, suite, unit etc. (optional)">
                            </div>
                            <div class="input_box">
                                <label>District<span>*</span></label>
                                <select class="select__option">
                                    <option>Select a country…</option>
                                    <option>Afghanistan</option>
                                    <option>American Samoa</option>
                                    <option>Anguilla</option>
                                    <option>American Samoa</option>
                                    <option>Antarctica</option>
                                    <option>Antigua and Barbuda</option>
                                </select>
                            </div>
                            <div class="input_box">
                                <label>Postcode / ZIP <span>*</span></label>
                                <input type="text">
                            </div>
                            <div class="margin_between">
                                <div class="input_box space_between">
                                    <label>Phone <span>*</span></label>
                                    <input type="text">
                                </div>
                                <div class="input_box space_between">
                                    <label>Email address <span>*</span></label>
                                    <input type="email">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12 md-mt-40 sm-mt-40">
                    <div class="wn__order__box">
                        <h3 class="order__title">Your order</h3>
                        <ul class="order__total">
                            <li>Product</li>
                            <li>Total</li>
                        </ul>
                        <ul class="order_product">
                            <li>Buscipit at magna × 1<span>$48.00</span></li>
                            <li>Buscipit at magna × 1<span>$48.00</span></li>
                            <li>Buscipit at magna × 1<span>$48.00</span></li>
                            <li>Buscipit at magna × 1<span>$48.00</span></li>
                        </ul>
                        <ul class="shipping__method">
                            <li>Cart Subtotal <span>$48.00</span></li>
                            <li>Shipping
                                <ul>
                                    <li>
                                        <input name="shipping_method[0]" data-index="0" value="legacy_flat_rate"
                                               checked="checked" type="radio">
                                        <label>Flat Rate: $48.00</label>
                                    </li>
                                    <li>
                                        <input name="shipping_method[0]" data-index="0" value="legacy_flat_rate"
                                               checked="checked" type="radio">
                                        <label>Flat Rate: $48.00</label>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="total__amount">
                            <li>Order Total <span>$223.00</span></li>
                        </ul>
                    </div>
                    <div id="accordion" class="checkout_accordion mt--30" role="tablist">
                        <div class="payment">
                            <div class="che__header" role="tab" id="headingOne">
                                <a class="checkout__title" data-bs-toggle="collapse" href="#collapseOne"
                                   aria-expanded="true" aria-controls="collapseOne">
                                    <span>Direct Bank Transfer</span>
                                </a>
                            </div>
                            <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne"
                                 data-bs-parent="#accordion">
                                <div class="payment-body">Make your payment directly into our bank account. Please
                                    use your Order ID as the payment reference. Your order won’t be shipped until
                                    the funds have cleared in our account.
                                </div>
                            </div>
                        </div>
                        <div class="payment">
                            <div class="che__header" role="tab" id="headingTwo">
                                <a class="collapsed checkout__title" data-bs-toggle="collapse" href="#collapseTwo"
                                   aria-expanded="false" aria-controls="collapseTwo">
                                    <span>Cheque Payment</span>
                                </a>
                            </div>
                            <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo"
                                 data-bs-parent="#accordion">
                                <div class="payment-body">Please send your cheque to Store Name, Store Street, Store
                                    Town, Store State / County, Store Postcode.
                                </div>
                            </div>
                        </div>
                        <div class="payment">
                            <div class="che__header" role="tab" id="headingThree">
                                <a class="collapsed checkout__title" data-bs-toggle="collapse" href="#collapseThree"
                                   aria-expanded="false" aria-controls="collapseThree">
                                    <span>Cash on Delivery</span>
                                </a>
                            </div>
                            <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree"
                                 data-bs-parent="#accordion">
                                <div class="payment-body">Pay with cash upon delivery.</div>
                            </div>
                        </div>
                        <div class="payment">
                            <div class="che__header" role="tab" id="headingFour">
                                <a class="collapsed checkout__title" data-bs-toggle="collapse" href="#collapseFour"
                                   aria-expanded="false" aria-controls="collapseFour">
                                    <span>PayPal <img src="images/icons/payment.png" alt="payment images"> </span>
                                </a>
                            </div>
                            <div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingFour"
                                 data-bs-parent="#accordion">
                                <div class="payment-body">Pay with cash upon delivery.</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- End Checkout Area -->
    <?php
    include('include/footer.php');
    ?>
    

</div>
<!-- //Main wrapper -->

<!-- JS Files -->
<script src="js/vendor/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/active.js"></script>

</body>


<!-- Mirrored from phpdemo.net/boighor/boighor/checkout.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 03 Sep 2024 19:15:07 GMT -->
</php>