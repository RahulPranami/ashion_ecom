<?php $result = $ecomm->getOrderDetails($_GET['id']); ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <i class="fas fa-plus-square"></i> -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Order Details</h1>
        <a href="./orders.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-backspace text-white-50 mr-2"></i> Go Back</a>
    </div>
    <hr>

    <!-- Content Row -->
    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-12 mb-4">
            <!-- Users Table Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Order Details</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-sm table-hover">
                        <thead>
                            <tr class="table-primary">
                                <th scope="col">No.</th>
                                <th scope="col">Order Id</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Product Image</th>
                                <th scope="col">Product Qunatity</th>
                                <th scope="col">Product Price</th>
                                <th scope="col">Sub Total</th>
                            </tr>
                        </thead>
                        <tbody id="tBody">
                            <?php while ($row = $result->fetch_assoc()) : ?>
                                <tr>
                                    <td><?= $row['id'] ?></td>
                                    <td><?= $row['order_id'] ?></td>
                                    <td><?= $row['product_name'] ?></td>
                                    <td> <img style="height: 75px;" src="<?= $row['image'] ?>" class="img-fluid img-thumbnail" alt="Not Found"> </td>
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
</div>