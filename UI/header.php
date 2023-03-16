<?php $cURL = explode('.', basename($_SERVER['REQUEST_URI']))[0] ?>

<!-- Header Section Begin -->
<header class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-2 col-lg-1">
                <div class="header__logo">
                    <a href="./index.php"><img src="img/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-xl-5 col-lg-6">
                <nav class="header__menu">
                    <ul>
                        <li class="<?= ($cURL == "index" || $cURL == "login" || $cURL == "signup") ? 'active' : ''; ?>"><a href="./index.php">Home</a></li>
                        <!-- <li><a href="#">Women’s</a></li> -->
                        <!-- <li><a href="#">Men’s</a></li> -->
                        <li class="<?= ($cURL == "orders") ? 'active' : ''; ?>"><a href="./orders.php">Orders</a></li>
                        <li class="<?= ($cURL == "shop" || $cURL == "product-details") ? 'active' : ''; ?>"><a href="./shop.php">Shop</a></li>
                        <li class="<?= ($cURL == "shop-cart" || $cURL == "checkout" || $cURL == "thankyou") ? 'active' : ''; ?>"><a href="#">Pages</a>
                            <ul class="dropdown">
                                <!-- <li><a href="./product-details.php">Product Details</a></li> -->
                                <li><a href="./shop-cart.php">Shop Cart</a></li>
                                <li><a href="./checkout.php">Checkout</a></li>
                                <li><a href="./blog-details.php">Blog Details</a></li>
                                <li><a href="./orders.php">My Orders</a></li>
                            </ul>
                        </li>
                        <li class="<?= ($cURL == "blog-details" || $cURL == "blog") ? 'active' : ''; ?>"><a href="./blog.php">Blog</a></li>
                        <li class="<?= ($cURL == "contact") ? 'active' : ''; ?>"><a href="./contact.php">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-5">
                <div class="header__right">
                    <!-- <div class="header__right__auth">
                        <a href="./login.php">Login</a>
                        <a href="./signup.php">Register</a>
                    </div> -->

                    <div class="header__right__auth">
                        <?php $ecomm->getRole(); ?>
                    </div>

                    <ul class="header__right__widget">
                        <li><span class="icon_search search-switch"></span></li>
                        <li><a href="#"><span class="icon_heart_alt"></span>
                                <div class="tip">2</div>
                            </a></li>
                        <li><a href="./shop-cart.php"><span class="icon_bag_alt"></span>
                                <!-- <div class="tip">2</div> -->
                                <div class="tip" id="cart_qty"><?= $ecomm->totalProduct() ?? 0 ?></div>
                            </a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="canvas__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header Section End -->