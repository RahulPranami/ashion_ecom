<?php $user = $ecomm->getUser(); ?>

<div class="vh-100 d-flex justify-content-center align-items-center">
    <!-- <div class="d-flex justify-content-center align-items-center my-5 py-5"> -->
    <div class="col-10">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">My Profile</h1>
            </div>

            <section style="background-color: #eee;" class="row">
                <div class="container py-5 h-100">
                    <div class="row">
                        <div class="w-75 text-center m-auto">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Name</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?= $user['name'] ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Email</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?= $user['email'] ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Mobile</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?= $user['contactNumber'] ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Address</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?= $user['address'] ?></p>
                                        </div>
                                    </div>
                                    <!-- <hr> -->
                                </div>
                                <!-- <div class="d-flex justify-content-start mx-4 mb-3">
                                    <a href="./editUser.php">
                                        <button type="button" class="btn btn-primary">Edit</button>
                                    </a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>