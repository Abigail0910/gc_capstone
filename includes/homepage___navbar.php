  <!--=========================START OF NAVBAR=============================-->
  <nav>
      <div class="container nav__container">
          <a href="homepage___index.php">
              <h4>Guidance and Counseling</h4>
          </a>
          <ul class="nav__menu">
              <li><a href="homepage___index.php">Home</a></li>
              <li><a href="homepage___about.php">About</a></li>
              <li><a href="homepage___articles.php">Articles</a></li>
              <!-- <li><a href="contact.html">Contact</a></li> -->

              <li><button class="login-btn"><a href="homepage___login.php" style="text-decoration: none;">Login</a></button></li>
<!-- data-target="#loginform" data-toggle="modal" -->
          </ul>
          <button id="open-menu-btn"><i class="uil uil-bars"></i></button>
          <button id="close-menu-btn"><i class="uil uil-multiply"></i></button>
      </div>

  </nav>

  <!--=========================START OF LOGINFORM=============================-->

  <div class="modal fade" id="loginform" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title" id="exampleModalLabel" style="color:black">Login Form</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>

              

              </div>
              <form action="codeLogin.php" method="POST">

                  <div class="modal-body">

                      <!-- <div class="form-group">
                          <label> Username </label>
                          <input type="text" name="username" class="form-control" placeholder="Enter Username">
                      </div> -->

                      <div class="form-group">
                          <label style="color: black;">Email</label>
                          <input type="email" name="user_email" placeholder="Input Email Address" class="input form-control" style="color:black">
                          <small class="error_email" style="color: red;"></small>

                      </div>

                      <!-- <div class="form-group">
                          <label>Email</label>
                          <input type="email" name="email" class="form-control checking_email" placeholder="Enter Email">
                          <small class="error_email" style="color: red;"></small>
                      </div>
                      <div class="form-group">
                          <label>Password</label>
                          <input type="password"  class="form-control" placeholder="Enter Password">
                      </div> -->

                      <div class="form-group">
                          <label style="color:black;">Password</label>
                          <input type="password" name="user_password" placeholder="Input Password" class="password form-control" style="color: black;">
                          <!-- <i class='bx bx-hide eye-icon'></i> -->
                      </div>
                  </div>
                  <div class="modal-footer">
                     <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button> -->
                      <button type="submit" name="login_btn" class="btn btn-primary" style="background-color: blue; border-radius:30px; cursor:pointer;">Login</button>
                 <br><br>
                  </div>
                     
              </form>
              <!-- <div class="line"></div> -->

              <!-- <div class="media-options">
                  <a href="#" class="field onedrive">
                      <img src="./images/office-365-Online-icon.png" class="onedrive-img">
                      <span>Login with O365 account</span>
                  </a>
              </div><br><br> -->
          </div>
      </div>
  </div>



  <!-- <div id="Login_Container">
        <div class="form_login">
            <div class="close-btn" onclick="closeLogin()"><i class='bx bx-x'></i></div>
            <div class="form-content">
                <div class="loginHeader">Login</div>
                <form action="#" class="LoginForm">
                    <div class="field input-field">
                        <input type="text" placeholder="User ID" class="input">
                    </div>
    
                    <div class="field input-field">
                        <input type="password" placeholder="Password" class="password">
                        <i class='bx bx-hide eye-icon'></i>
                    </div>
    
                    <div class="form-link">
                        <a href="#" class="forgot-pass">Forgot password?</a>
                    </div>
    
                    <div class="field button-field">
                        <button>Login</button>
                    </div>
                </form>
    
            </div>
    
            <div class="line"></div>
    
            <div class="media-options">
                <a href="#" class="field onedrive">
                    <img src="./images/office-365-Online-icon.png" class="onedrive-img">
                    <span>Login with O365 account</span>
                </a>
            </div>
    
        </div>
    </div> -->