<?php include "includes/header.php" ?>
<?php include "includes/db.php" ?>
<!-- Navigation -->

<div style="background-image: url('images/mtn_hero_02.png');  background-size: cover; background-repeat:no-repeat" id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row d-flex flex-column min-vh-100 justify-content-center align-items-center">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header text-center">
                                <img style="max-width: 80%;" src="images/heritage_logo_02.png" alt="">
                                <!-- <h3 class="text-center font-weight-light my-4">Login</h3> -->
                            </div>
                            <div class="card-body">
                                <form action="includes/login.php" method="post">
                                    <div class="form-floating mb-3">
                                        <input name="username" class="form-control" id="inputEmail" type="text" placeholder="Enter Username" />
                                        <label for="inputEmail">Username</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input name="password" class="form-control" id="inputPassword" type="password" placeholder="Password" />
                                        <label for="inputPassword">Password</label>
                                    </div>
                                    <!-- <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                            </div> -->
                                    <div class="text-center mt-4 mb-0">
                                        <!-- <a class="small" href="password.html">Forgot Password?</a> -->
                                        <button class="btn btn-success" name="login" type="submit">Login</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center py-3">
                                <div class="small">
                                    <p>Copyright &copy; Seth Broder 2024</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>