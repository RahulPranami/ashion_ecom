<?php $result = $ecomm->getOrderDetails($_GET['orderid']); ?>

<!-- Shop Cart Section Begin -->
<section class="shop-cart spad">
    <!-- <div class="mx-auto col-lg-11"> -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="h6 table-responsive">
                    <!-- <div class="shop__cart__table h6 table-responsive"> -->
                    <table class="table table-bordered table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Order Id</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Product Image</th>
                                <th scope="col">Product Qunatity</th>
                                <th scope="col">Product Price</th>
                                <th scope="col">Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $result->fetch_assoc()) : ?>
                                <tr>
                                    <td><?= $row['id'] ?></td>
                                    <td><?= $row['order_id'] ?></td>
                                    <td><?= $row['product_name'] ?></td>
                                    <td> <img style="height: 75px;" src="./assets/<?= $row['image'] ?>" class="img-fluid img-thumbnail" alt="Not Found"> </td>
                                    <td><?= $row['product_qty'] ?></td>
                                    <td><?= $row['product_price'] ?></td>
                                    <td><?= $row['subTotal'] ?></td>
                                </tr>
                            <?php endwhile ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- Shop Cart Section End -->