<?php $result = $ecomm->getCategories(); ?>

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Categories</h1>
        <a href="./addCategory.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus-square text-white-50 mr-2"></i>Add a Category</a>
    </div>
    <hr>

    <!-- Content Row -->
    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-12 mb-4">
            <!-- Users Table Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Category Details</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-sm table-hover">
                        <thead>
                            <tr class="table-primary">
                                <th scope="col">No.</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Action</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="tBody">
                            <?php while ($row = $result->fetch_assoc()) : ?>
                                <tr>
                                    <td><?= $row['id'] ?></td>
                                    <td><?= $row['name'] ?></td>
                                    <td><a href="./editCategory.php?id=<?= $row['id']; ?>"> <button class="btn btn-sm btn-outline-success">Edit</button> </a> </td>
                                    <!-- <td><button name="btnDel" class="btn btn-sm btn-outline-danger" onclick="deleteData('<?= $row['id'] ?>')">Delete</button></td> -->
                                    <td><button class="btn btn-sm btn-outline-danger delete-cat-btn" id="<?= $row['id'] ?>">Delete</button></td>
                                </tr>
                            <?php endwhile ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>