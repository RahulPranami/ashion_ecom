<?php $cart = $ecomm->getCart(); ?>
<?php $user = $ecomm->getUser(); ?>

<?php if ($cart->num_rows == 0) : ?>
    <section class="shop-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center align-items-center">
                    <div class="col-md-8">
                        <div class="border border-3 border-info"></div>
                        <div class="card bg-white shadow p-5">
                            <div class="text-center">
                                <h3 class="py-2">Cart is Empty !</h3>
                                <p>Add some items to the cart ...</p>
                                <a href="./shop.php" class="btn btn-outline-info">Back To Shop</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php return; ?>
<?php endif; ?>

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <form class="checkout__form" id="checkoutForm">
            <div class="row">
                <div class="col-lg-8">
                    <h5>Billing detail</h5>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="checkout__form__input">
                                <p>First Name <span>*</span></p>
                                <input type="text" name="fname" value="<?= $user['name'] ?>" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="checkout__form__input">
                                <p>Last Name <span></span></p>
                                <input type="text" name="lname">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="checkout__form__input">
                                <p>Address <span>*</span></p>
                                <input type="text" placeholder="Street Address" name="address" value="<?= $user['address'] ?>" required>
                            </div>
                            <div class="checkout__form__input">
                                <p>Postcode/Zip <span>*</span></p>
                                <input type="text" name="zip" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="checkout__form__input">
                                <p>Phone <span>*</span></p>
                                <input type="text" name="phone" value="<?= $user['contactNumber'] ?>" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="checkout__form__input">
                                <p>Email <span>*</span></p>
                                <input type="text" name="email" value="<?= $user['email'] ?>" required>
                            </div>
                        </div>

                        <input type="hidden" name="total" value="<?= $ecomm->getCartTotal()[0] ?>">
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
                                <?php while ($cartItem = $cart->fetch_assoc()) : ?>
                                    <li><?= $cartItem['product_name'] ?> <span>$ <?= $cartItem['product_price'] ?></span></li>
                                <?php endwhile ?>
                            </ul>
                        </div>
                        <div class="checkout__order__total">
                            <ul>
                                <li>Total <span>$ <?= $ecomm->getCartTotal()[0] ?? 0 ?></span></li>
                            </ul>
                        </div>
                        <div class="checkout__order__widget row">
                            <span class="d-block mr-2">Payment Method :- </span>

                            <!-- <span class="d-block ml-5 text-secondary">Cash on Delivery</span> -->
                            <label for="cod"> Cash on Delivery
                                <input type="checkbox" id="cod" name="paymentMethod" value="COD" checked required>
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <button type="submit" class="checkout-btn btn btn-outline-success">Place order</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- Checkout Section End -->