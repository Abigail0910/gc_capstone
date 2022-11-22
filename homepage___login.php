<?php

session_start();
include('includes/homepage___header.php');
?>



<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-6 col-lg-6 col-md-6">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-12">

                            <div class="p-5" >
                                <div class="col-lg-10 offset-lg-1">
                                    <center><img src="images/sti_logo.png" /></center>
                                </div>
                                <br>
                                <div class="text-center">

                                    <h1 class="h4 text-gray-900 mb-4" style="font-weight:bold">Login</h1>

                                    <!-- <?php
                                    if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
                                        echo '<h2 class="bg-danger text-white">' . $_SESSION['status'] . '</h2>';
                                        unset($_SESSION['status']);
                                    }
                                    ?> -->


                                </div>
                                <form class="user" action="codeLogin.php" method="POST">
                                    <div class="form-group">
                                        <input type="email" name="user_email" class="form-control form-control-user" placeholder="Enter Email Address">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="user_password" class="form-control form-control-user" placeholder="Enter Password">
                                    </div>
                                    <!-- <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck" style="color: black;">Remember
                                                Me</label>
                                        </div>
                                    </div> -->
                                    <button type="submit" name="login_btn" class="btn btn-primary btn-user btn-block" style="background-color: blue;">Login</button>
                                    <a href="homepage___index.php" class="btn btn-primary btn-user btn-block" style="background-color: red;">Cancel</a>

                                    <!-- <hr> -->
                                    <!-- <a href="index.html" class="btn btn-google btn-user btn-block" style="background-color: red;"> Login with O
                                    </a> -->
                                </form>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<?php
include('includes/homepage___scripts.php');
?>