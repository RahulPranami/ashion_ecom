<?php $result = $ecomm->getUsers(); ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Users</h1>
    </div>
    <hr>

    <!-- Content Row -->
    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-12 mb-4">
            <!-- Users Table Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Users Details</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-sm table-hover">
                        <thead>
                            <tr class="table-primary">
                                <th scope="col">No.</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Contact Number</th>
                                <th scope="col">Address</th>
                                <th scope="col">Action</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="tBody">
                            <?php while ($row = $result->fetch_assoc()) : ?>
                                <tr>
                                    <td><?= $row['id'] ?></td>
                                    <td><?= $row['name'] ?></td>
                                    <td><?= $row['email'] ?></td>
                                    <td><?= $row['contactNumber'] ?></td>
                                    <td><?= $row['address'] ?></td>
                                    <td><button class="btn btn-sm btn-outline-success" onclick="editData('<?= $row['id'] ?>')">Edit</button></td>
                                    <td><button name="btnDel" class="btn btn-sm btn-outline-danger" onclick="deleteData('<?= $row['id'] ?>')">Delete</button></td>
                                </tr>
                            <?php endwhile ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>