<?php session_start(); 
// session_unset(); // Clear session cart data
?>

<!-- Header -->
 <style>
    header{
        background-color:#ffffff;
    }


    .custom-alert {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
}

.custom-alert-content {
    background-color: white;
    padding: 20px;
    border-radius: 5px;
    text-align: center;
}
#close-alert {
    background-color: #ce5872; /* Button background color */
    color: white; /* Text color */
    border: none; /* Remove default border */
    border-radius: 5px; /* Rounded corners */
    padding: 10px 20px; /* Padding around the text */
    cursor: pointer; /* Pointer cursor on hover */
    font-size: 16px; /* Font size */
    transition: background-color 0.3s; /* Smooth background color change */
}

#close-alert:hover {
    background-color: #b44d5e; /* Darker shade on hover */
}

 </style>
<header id="wn__header" class="header__area header__absolute sticky__header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-6 col-lg-2">
                    <div class="logo">
                        <a href="index.php">
                            <img src="images/logo/logo.png" alt="logo images">
                        </a>
                    </div>
                </div>
                <div class="col-lg-8 d-none d-lg-block">
                    <nav class="mainmenu__nav">
                        <ul class="meninmenu d-flex justify-content-start">
                            <li class="drop with--one--item"><a href="index.php">Home</a>
                               
                            </li>
                            <li class="drop"><a href="shop-grid.php">Books</a>
                               
                            </li>

                            <li class="drop"><a href="shop-list.php">Shop</a>
                              
                            </li>
                            </li>

<li class="drop"><a href="competition.php">Competition</a>
  
</li>
                          
                            <li class="drop"><a href="#">Pages</a>
                                <div class="megamenu dropdown">
                                    <ul class="item item01">
                                        <li><a href="about.php">About Page</a></li>
                                                                          
                                        </li>                                      
                                                                  
                                        <li><a href="faq.php">Faq Page</a></li>
                                        <!-- <li><a href="team.php">Team Page</a></li> -->
                                    </ul>
                                </div>
                            </li>
                            <li class="drop"><a href="blog.php">Blog</a>                             
                            </li>
                            <li><a href="contact.php">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-6 col-6 col-lg-2">
                    <ul class="header__sidebar__right d-flex justify-content-end align-items-center">
                        <li class="shop_search"><a class="search__active" href="#"></a></li>
                        <li class="wishlist"><a href="#" onclick="showCustomAlert()"></a></li>

<div id="custom-alert" class="custom-alert" style="display: none;">
    <div class="custom-alert-content">
        <span id="alert-message">No book in wishlist.</span>
        <button id="close-alert" onclick="closeAlert()">Close</button>
    </div>
</div>



<script>
    function showCustomAlert() {
    // Show the custom alert
    document.getElementById('custom-alert').style.display = 'flex';
}

function closeAlert() {
    // Hide the custom alert
    document.getElementById('custom-alert').style.display = 'none';
}

</script>

                        <li class="shopcart"><a class="cartbox_active" href="#"><span
                                class="product_qun">3</span></a>
                            <!-- Start Shopping Cart -->
                            <div class="block-minicart minicart__active">
                                <div class="minicart-content-wrapper">
                                    <div class="micart__close">
                                        <span>close</span>
                                    </div>

                                    <!---cart subtotal-->


                                    <!-- <div class="items-total d-flex justify-content-between">
                                        <span>3 items</span>
                                        <span>Cart Subtotal</span>
                                    </div> -->
                                    <!-- <div class="total_amount text-end">
                                        <span>$66.00</span>
                                    </div>
                                    <div class="mini_action checkout">
                                        <a class="checkout__btn" href="cart.php">Go to Checkout</a>
                                    </div> -->

                                    <div id="cart">
    <h2>Cart</h2>
    <ul>
        <?php
        if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
            foreach ($_SESSION['cart'] as $item) {
                // Check if the image key exists in the item
                $image = isset($item['image']) ? $item['image'] : 'default-image.jpg'; // Use a default image if 'image' key is missing

                echo "<li>
                        <img  class='m-2' src='images/books/{$image}' alt='{$item['title']}' style='width: 50px; height: 50px;'>
                        <strong>{$item['title']}</strong>
                        ({$item['quantity']} x {$item['price']})
                      </li>";
            }
        } else {
            echo "<li>Your cart is empty</li>";
        }
        ?>
    </ul>
</div>

<!-- Cart Icon -->
<a href="#" id="cart-icon">Cart</a>

<!-- jQuery script to toggle cart modal -->
<script>
  $('#cart-icon').click(function() {
    $('#cart-modal').toggle();
  });
</script>

<!-- Alternative JS toggle if jQuery doesn't work -->
<script>
    document.getElementById('cart-icon').addEventListener('click', function() {
        const cartModal = document.getElementById('cart-modal');
        cartModal.style.display = cartModal.style.display === 'block' ? 'none' : 'block';
    });
</script>


<!---important work--->
                                    <!-- <div class="single__items">
                                        <div class="miniproduct">


                                            <div class="item01 d-flex">
                                                <div class="thumb">
                                                    <a href="product-details.php"><img
                                                            src="images/product/sm-img/1.jpg"
                                                            alt="product images"></a>
                                                </div>
                                                <div class="content">
                                                    <h6><a href="product-details.php">Voyage Yoga Bag</a></h6>
                                                    <span class="price">$30.00</span>
                                                    <div class="product_price d-flex justify-content-between">
                                                        <span class="qun">Qty: 01</span>
                                                        <ul class="d-flex justify-content-end">
                                                            <li><a href="#"><i class="zmdi zmdi-settings"></i></a>
                                                            </li>
                                                            <li><a href="#"><i class="zmdi zmdi-delete"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="item01 d-flex mt--20">
                                                <div class="thumb">
                                                    <a href="product-details.php"><img
                                                            src="images/product/sm-img/3.jpg"
                                                            alt="product images"></a>
                                                </div>
                                                <div class="content">
                                                    <h6><a href="product-details.php">Impulse Duffle</a></h6>
                                                    <span class="price">$40.00</span>
                                                    <div class="product_price d-flex justify-content-between">
                                                        <span class="qun">Qty: 03</span>
                                                        <ul class="d-flex justify-content-end">
                                                            <li><a href="#"><i class="zmdi zmdi-settings"></i></a>
                                                            </li>
                                                            <li><a href="#"><i class="zmdi zmdi-delete"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>


                                            </div>


                                            <div class="item01 d-flex mt--20">
                                                <div class="thumb">
                                                    <a href="product-details.php"><img
                                                            src="images/product/sm-img/2.jpg"
                                                            alt="product images"></a>
                                                </div>
                                                <div class="content">
                                                    <h6><a href="product-details.php">Compete Track Tote</a></h6>
                                                    <span class="price">$40.00</span>
                                                    <div class="product_price d-flex justify-content-between">
                                                        <span class="qun">Qty: 03</span>
                                                        <ul class="d-flex justify-content-end">
                                                            <li><a href="#"><i class="zmdi zmdi-settings"></i></a>
                                                            </li>
                                                            <li><a href="#"><i class="zmdi zmdi-delete"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div> -->



                                    <!-- <div class="mini_action cart">
                                        <a class="cart__btn" href="cart.php">View and edit cart</a>
                                    </div> -->
                                </div>
                            </div>
                            <!-- End Shopping Cart -->
                        </li>
                        <li class="setting__bar__icon"><a class="setting__active" href="#"></a>
                            <div class="searchbar__content setting__block">
                                <div class="content-inner">
                                    <div class="switcher-currency">
                                        <strong class="label switcher-label">
                                            <span>Currency</span>
                                        </strong>
                                        <div class="switcher-options">
                                            <div class="switcher-currency-trigger">
                                                <span class="currency-trigger">USD - US Dollar</span>
                                                <ul class="switcher-dropdown">
                                                    <li>GBP - British Pound Sterling</li>
                                                    <li>EUR - Euro</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="switcher-currency">
                                        <strong class="label switcher-label">
                                            <span>Language</span>
                                        </strong>
                                        <div class="switcher-options">
                                            <div class="switcher-currency-trigger">
                                                <span class="currency-trigger">English01</span>
                                                <ul class="switcher-dropdown">
                                                    <li>English02</li>
                                                    <li>English03</li>
                                                    <li>English04</li>
                                                    <li>English05</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="switcher-currency">
                                        <strong class="label switcher-label">
                                         <a href="dashboard/user_login.php">   <span>Login</span></a><br>
                                         <a href="dashboard/user_signup.php">    <span>Signup</span></a><br>
                                         <a href="dashboard/user_logout.php">    <span>Logout</span></a><br>
                                         <a href="dashboard/admin_login.php">   <span>Login Admin</span></a><br>


                                        </strong>
                                       
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Start Mobile Menu -->
            <div class="row d-none">
                <div class="col-lg-12 d-none">
                    <nav class="mobilemenu__nav">
                        <ul class="meninmenu">
                            <li><a href="index.php">Home</a>                         
                            </li>
                            <li><a href="#">Pages</a>
                                <ul>
                                    <li><a href="about.php">About Page</a></li>
                                    <li><a href="portfolio.php">Portfolio</a>                                      
                                    </li>
                                    <li><a href="my-account.php">My Account</a></li>
                                    <li><a href="cart.php">Cart Page</a></li>
                                    <li><a href="checkout.php">Checkout Page</a></li>                                  
                                    <li><a href="faq.php">Faq Page</a></li>
                                    <li><a href="team.php">Team Page</a></li>
                                </ul>
                            </li>
                            <li><a href="shop-grid.php">Shop</a>                            
                            </li>
                            <li><a href="blog.php">Blog</a>                               
                            </li>
                            <li><a href="contact.php">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- End Mobile Menu -->
            <div class="mobile-menu d-block d-lg-none">
            </div>
            <!-- Mobile Menu -->
        </div>
    </header>
    <!-- //Header -->