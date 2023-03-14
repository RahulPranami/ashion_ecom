<?php $user = $ecomm->getUser(); ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit User Profile</h1>
        <a href="./profile.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-backspace text-white-50 mr-2"></i> Go Back</a>
    </div>
    <hr>

    <div class="bootstrap snippets bootdey">
        <div class="row">
            <div class="container col-md-12 personal-info">
                <h3 class="text-primary">Personal info</h3>

                <form class="form-horizontal" role="form" method="post" id="update">
                    <input type="hidden" id="id" name="id" value="<?= $user['id'] ?>" />

                    <!-- Name input -->
                    <div class="form-group">
                        <label class="col-lg-3 control-label" for="name">Name:</label>
                        <div class="col-lg-8">
                            <input type="text" id="name" class="form-control" name="name" data-error="#nameErr" onkeyup="document.getElementById('nameErr').textContent=''" value="<?= $user['name'] ?>" />
                        </div>
                        <small id="nameErr" class="text-danger ml-3 errorTxt"></small>
                    </div>

                    <!-- Email input -->
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Email:</label>
                        <div class="col-lg-8">
                            <input type="email" id="email" class="form-control" name="email" data-error="#emailErr" onkeyup="document.getElementById('emailErr').textContent=''" value="<?= $user['email'] ?>" />
                            <!-- <input class="form-control" type="text" value="janesemail@gmail.com"> -->
                        </div>
                        <small id="emailErr" class="text-danger ml-3 errorTxt"></small>
                    </div>

                    <!-- Mobile input -->
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Mobile Number:</label>
                        <div class="col-lg-8">
                            <input type="tel" id="number" name="number" class="form-control" data-error="#mobileErr" onkeyup="document.getElementById('mobileErr').textContent=''" value="<?= $user['contactNumber'] ?>" />
                            <!-- <input class="form-control" type="text" value="bootdey"> -->
                        </div>
                        <small id="mobileErr" class="text-danger ml-3 errorTxt"></small>
                    </div>

                    <!-- Address input -->
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Address:</label>
                        <div class="col-lg-8">
                            <input type="text" id="address" name="address" class="form-control" value="<?= $user['address'] ?>" />
                            <!-- <input class=" form-control" type="text" value=""> -->
                        </div>
                        <small id="addErr" class="text-danger ml-3 errorTxt"></small>
                    </div>

                    <button type="submit" class="btn btn-primary ml-4 mb-4" id="update-btn"> Update Data </button>
                </form>
            </div>
        </div>
    </div>
</div>