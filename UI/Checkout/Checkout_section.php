<?php

$cart = [];
$total = 0;
if (isset($_SESSION['cart'])) {

    // echo '<pre>';

    // print_r($_SESSION['cart']);
    // // $product = $ecomm->getProductDetails();
    // print_r($product);
    // echo '</pre>';

    // die();
    foreach ($_SESSION['cart'] as $key => $value) {

        // echo $key;
        $product = $ecomm->getProductDetails($key);

        // $cart[$key]['id'] = $product['id'];
        $cart[$key]['name'] = $product['name'];
        $cart[$key]['price'] = $product['price'];
        $cart[$key]['qty'] = $value['qty'];

        $cart[$key]['subTotal'] = $product['price'] * $value['qty'];
    }
}

?>
<?php foreach ($cart as $key => $value) $total += $value['price'] * $value['qty']; ?>

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <!-- <div class="row">
            <div class="col-lg-12">
                <h6 class="coupon__link"><span class="icon_tag_alt"></span> <a href="#">Have a coupon?</a> Click
                    here to enter your code.</h6>
            </div>
        </div> -->
        <form class="checkout__form" id="checkoutForm">
            <div class="row">
                <div class="col-lg-8">
                    <h5>Billing detail</h5>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="checkout__form__input">
                                <p>First Name <span>*</span></p>
                                <input type="text" name="fname">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="checkout__form__input">
                                <p>Last Name <span>*</span></p>
                                <input type="text" name="lname">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="checkout__form__input">
                                <p>Address <span>*</span></p>
                                <input type="text" placeholder="Street Address" name="address">
                            </div>
                            <div class="checkout__form__input">
                                <p>Postcode/Zip <span>*</span></p>
                                <input type="text" name="zip">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="checkout__form__input">
                                <p>Phone <span>*</span></p>
                                <input type="text" name="phone">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="checkout__form__input">
                                <p>Email <span>*</span></p>
                                <input type="text" name="email">
                            </div>
                        </div>

                        <input type="hidden" name="products" value="<?php print_r($cart) ?>">
                        <input type="hidden" name="total" value="<?= $total ?>">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="checkout__order">
                        <h5>Your order</h5>
                        <div class="checkout__order__product">
                            <ul>
                                <li>
                                    <span class="top__text">Product</span>
                                    <span class="top__text__right">Total</span>
                                </li>
                                <?php foreach ($cart as $key => $value) : ?>
                                    <li><?= $value['name'] ?> <span>$ <?= $value['price'] ?></span></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                        <div class="checkout__order__total">
                            <?php
                            // foreach ($cart as $key => $value) :
                            // $subTotal = $value['price'] * $value['qty'];
                            // $total += $subTotal;
                            // $total += $value['price'] * $value['qty'];
                            // endforeach 
                            ?>
                            <ul>
                                <!-- <li>Subtotal <span>$ 750.0</span></li> -->
                                <li>Total <span>$ <?= $total ?></span></li>
                            </ul>
                        </div>
                        <div class="checkout__order__widget">
                            <span class="d-block">Payment Method :- </span>

                            <span class="d-block ml-5 text-secondary">Cash on Delivery</span>
                            <!-- <label for="cod"> Cash on Delivery -->
                            <!-- <input type="checkbox" id="cod"> -->
                            <!-- <span class="checkmark"></span> -->
                            <!-- </label> -->
                        </div>
                        <button type="submit" class="checkout-btn btn btn-outline-success">Place order</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- Checkout Section End -->