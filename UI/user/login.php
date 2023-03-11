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
                    <h2 class="text-uppercase text-center mb-3">Log in</h2>
                    <div class="card">
                        <div class="card-body py-5 px-md-5">
                            <form method="post" id="login">
                                <!-- Email input -->
                                <div class="form-outline mt-4">
                                    <input type="email" id="email" class="form-control" name="email" data-error="#emailErr" onkeyup="document.getElementById('emailErr').textContent=''" />
                                    <label class="form-label" for="email">Email address</label>
                                </div>
                                <small id="emailErr" class="text-danger errorTxt"></small>

                                <!-- Password input -->
                                <!-- <div class="form-outline mb-4"> -->
                                <div class="form-outline mt-4">
                                    <input type="password" id="password" class="form-control" name="password" data-error="#passErr" onkeyup="document.getElementById('passErr').textContent=''" />
                                    <label class=" form-label" for="password">Password</label>
                                </div>
                                <small id="passErr" class="text-danger errorTxt"></small>
                                <!-- Submit button -->
                                <!-- <input type="submit" value="log in" id="login-btn" class="btn btn-primary btn-block mb-4"> -->
                                <button type="submit" class="btn btn-primary btn-block my-4" id="login-btn"> Log in </button>
                            </form>

                            <p class="text-center text-muted mb-1">Don't Have an account? <a href="./signup.php" class="fw-bold text-body"><u>Register here</u></a></p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Jumbotron -->
</section>
<!-- Section: Design Block -->