<!-- Section: Design Block -->
<section class="container">
    <!-- Jumbotron -->
    <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
        <div class="container">
            <div class="row gx-lg-5 align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <h1 class="my-5 display-3 fw-bold ls-tight">
                        The best offer <br />
                        <span class="text-primary">for your business</span>
                    </h1>
                    <p style="color: hsl(217, 10%, 50.8%)">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Eveniet, itaque accusantium odio, soluta, corrupti aliquam
                        quibusdam tempora at cupiditate quis eum maiores libero
                        veritatis? Dicta facilis sint aliquid ipsum atque?
                    </p>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0">
                    <h2 class="text-uppercase text-center mb-3">Create an account</h2>
                    <div class="card">
                        <div class="card-body py-5 px-md-5">
                            <form method="post" id="signup">

                                <!-- Name input -->
                                <div class="form-outline mb-4">
                                    <input type="text" id="name" class="form-control" name="name" data-error="#nameErr" onkeyup="document.getElementById('nameErr').textContent=''" />
                                    <label class="form-label" for="name">Name</label>
                                </div>
                                <small id="nameErr" class="text-danger text-left errorTxt"></small>

                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <input type="email" id="email" class="form-control" name="email" data-error="#emailErr" onkeyup="document.getElementById('emailErr').textContent=''" />
                                    <label class="form-label" for="email">Email address</label>
                                </div>
                                <small id="emailErr" class="text-danger text-left errorTxt"></small>

                                <!-- Mobile input -->
                                <div class="form-outline mb-4">
                                    <input type="tel" id="number" name="number" class="form-control" data-error="#mobileErr" onkeyup="document.getElementById('mobileErr').textContent=''" />
                                    <label class="form-label" for="number">Mobile Number</label>
                                </div>
                                <small id="mobileErr" class="text-danger text-left errorTxt"></small>

                                <!-- Address input -->
                                <div class="form-outline mb-4">
                                    <input type="text" id="address" name="address" class="form-control" />
                                    <label class="form-label" for="address">Address</label>
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <input type="password" id="password" class="form-control" name="password" data-error="#passErr" onkeyup="document.getElementById('passErr').textContent=''" />
                                    <label class="form-label" for="password">Password</label>
                                </div>
                                <small id="passErr" class="text-danger text-left errorTxt"></small>

                                <!-- Confirm Password input -->
                                <div class="form-outline mb-4">
                                    <input type="password" id="cpassword" class="form-control" name="cpassword" data-error="#cpassErr" onkeyup="document.getElementById('cpassErr').textContent=''" />
                                    <label class="form-label" for="cpassword">Repeat your Password</label>
                                </div>
                                <small id="cpassErr" class="text-danger text-left errorTxt"></small>

                                <!-- Submit button -->
                                <!-- <input type="submit" value="sign up" class="btn btn-primary btn-block mb-4"> -->
                                <button type="submit" class="btn btn-primary btn-block mb-4" id="signup-btn"> Sign Up </button>
                            </form>

                            <p class="text-center text-muted mb-1">Have already an account? <a href="./login.php" class="fw-bold text-body"><u>Login here</u></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Jumbotron -->
</section>
<!-- Section: Design Block -->