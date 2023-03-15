<?php $cart = $ecomm->getCart(); ?>

<!-- Shop Cart Section Begin -->
<section class="shop-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shop__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($cartItem = $cart->fetch_assoc()) : ?>
                                <tr>
                                    <td class="cart__product__item">
                                        <img src="./assets/images/<?= basename($cartItem['product_image']) ?>" alt="" class="img-thumbnail" style="height: 150px;">
                                        <div class="cart__product__item__title">
                                            <h6><?= $cartItem['product_name'] ?></h6>
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__price">$ <?= $cartItem['product_price'] ?></td>
                                    <td class="cart__quantity">
                                        <div class="pro-qty" id="<?= $cartItem['product_id'] ?>">
                                            <input type="text" value="<?= $cartItem['qty'] ?>">
                                        </div>
                                    </td>
                                    <td class="cart__total">$ <span> <?= $cartItem['subTotal'] ?> </span> </td>
                                    <td class="cart__close"><span class="icon_close" value="<?= $cartItem['product_id'] ?>"></span></td>
                                </tr>
                            <?php endwhile ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-between align-items-center">
            <!-- <div class="col-lg-4 col-md-4 col-sm-4"> -->
            <div>
                <a href=" ./shop.php" class="btn btn-outline-secondary">
                    < < Continue Shopping </a>
            </div>
            <!-- <div class=""> -->
            <div class="col-lg-3 col-md-2 col-sm-2 text-center">
                <div class="py-2 border border-warning border-rounded d-flex justify-content-around bg-light">
                    <h5 class=""> Total :- </h5>
                    <span class="text-secondary">$ <?= $ecomm->getCartTotal()[0] ?></span>
                </div>
            </div>
            <div class="">
                <!-- <div class="col-lg-4 col-md-4 col-sm-4"> -->
                <!-- <div class="cart__btn update__btn">
                    <a href="#"><span class="icon_loading"></span> Update cart</a>
                </div> -->
                <!-- <div class=""> -->
                <a href="./checkout.php" class="btn btn-outline-danger">Proceed to checkout > ></a>
                <!-- </div> -->
            </div>
        </div>
        <div class="row">
            <!-- <div class="col-lg-6">
                <div class="discount__content">
                    <h6>Discount codes</h6>
                    <form action="#">
                        <input type="text" placeholder="Enter your coupon code">
                        <button type="submit" class="site-btn">Apply</button>
                    </form>
                </div>
            </div> -->
            <!-- <div class="col-lg-4">
                <div class="cart__total__procced">
                    <h6>Cart total</h6>

                    <?php foreach ($cart as $key => $value) :
                        $subTotal = $value['price'] * $value['qty'];
                        $total += $subTotal;
                    endforeach ?>
                    <ul>
                        <li>Total <span>$ <?= $total ?></span></li>
                    </ul>
                    <a href="./checkout.php" class="btn primary-btn">Proceed to checkout</a>
                </div>
            </div> -->
        </div>
    </div>
</section>
<!-- Shop Cart Section End -->