<?php
include('includes/homepage___header.php');
?>

<style>
    a{
        text-decoration: none;
    }
    li{
        list-style: none;
    }
</style>
  <!--=========================START OF NAVBAR=============================-->
  <nav>
      <div class="container nav__container">
          <a href="homepage___index.php">
          <!-- <img src="images/sti_logo.png"/> -->
              <h4>Guidance and Counseling Office</h4>
          </a>
          <ul class="nav__menu">
              <li><a href="homepage___index.php">Home</a></li>
              <li><a href="homepage___about.php">About</a></li>
              <li><a href="homepage___articles.php">Articles</a></li>
              <!-- <li><a href="contact.html">Contact</a></li> -->

              <li><button class="login-btn"><a href="homepage___login.php">Login</a></button></li>
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


<!--=========================START OF HEADERS=============================-->
<header>

    <div class="container header__container">
        <div class="header__left">
            <h1>Grow your skills to advance your career path</h1>
            <p>
            You can gain and improve skills with education and experience. The more advanced you are in performing certain skills, the more likely you are to get or progress in a job.            </p>
            <a href="homepage___articles.php" class="btn btn-primary">Get Started</a>
        </div>

        <div class="header__right">
            <div class="header__right-image">
                <img src="./images/headersample.jpg">
            </div>
        </div>
    </div>

</header>
<!--==========================END OF HEADER===============================-->


<!--=========================START OF SERVICES=============================-->
<section class="categories">
    <div class="container categories__container">
        <div class="categories__left">
            <h1>Guidance and Counseling Office Services</h1>
            <p>
            Guidance Counseling Services is to encourage students' academic, social, emotional and personal development. 
            </p>
            <a href="#" class="btn">Learn More</a>
        </div>

        <div class="categories__right">
            <article class="category">
                <span class="category__icon"><i class="uil uil-book-open"></i></span>
                <h5>Guidance and Counseling</h5>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
            </article>

            <article class="category">
                <span class="category__icon"><i class="uil uil-info-circle"></i></span>
                <h5>Information Service</h5>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
            </article>

            <article class="category">
                <span class="category__icon"><i class="uil uil-user-circle"></i></span>
                <h5>Individual Inventory Service</h5>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
            </article>

            <article class="category">
                <span class="category__icon"><i class="uil uil-user-md"></i></i></span>
                <h5>Career Guidance Service</h5>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
            </article>

            <article class="category">
                <span class="category__icon"><i class="uil uil-user-arrows"></i></span>
                <h5>Counseling Service</h5>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
            </article>

            <article class="category">
                <span class="category__icon"><i class="uil uil-social-distancing"></i></span>
                <h5>Referral Service</h5>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
            </article>
        </div>
    </div>
</section>
<!--=========================END OF SERVICES=============================-->




<!--=========================START OF ARTICLES=============================-->
<section class="articles">
    <h2>Articles</h2>
    <div class="container articles__container">
        <article class="article">
            <div class="article__image">
                <img src="./images/article-1.png">
            </div>
            <div class="article__info">
                <h4>All About Guidance and Counseling</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum totam iusto at dolorum illum, culpa quis.</p>
                <a href="homepage___articles.php" class="btn btn-primary">Read More</a>
            </div>
        </article>

        <article class="article">
            <div class="article__image">
                <img src="./images/article-1.png">
            </div>
            <div class="article__info">
                <h4>Importance of Guidance and Counseling</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum totam iusto at dolorum illum, culpa quis.</p>
                <a href="homepage___articles.php" class="btn btn-primary">Read More</a>
            </div>
        </article>

        <article class="article">
            <div class="article__image">
                <img src="./images/article-1.png">
            </div>
            <div class="article__info">
                <h4>Guidance and Counseling: Dont know where to go?</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum totam iusto at dolorum illum, culpa quis.</p>
                <a href="homepage___articles.php" class="btn btn-primary">Read More</a>
            </div>
        </article>
    </div>
</section>
<!--=========================END OF ARTICLES=============================-->




<!--=========================START OF FAQS=============================-->
<section class="faqs">
    <h2>Frequently Asked Questions</h2>
    <div class="container faqs__container">

        <article class="faq">
            <div class="faq__icon"><i class="uil uil-plus"></i></div>
            <div class="question__answer">
                <h4>What is Guidance and Counseling ?</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo dicta fuga eos id eum, maiores vel facere voluptatibus quas dignissimos est ipsa excepturi aspernatur officiis deleniti sequi voluptatem odit voluptas.</p>
            </div>
        </article>

        <article class="faq">
            <div class="faq__icon"><i class="uil uil-plus"></i></div>
            <div class="question__answer">
                <h4>What is Guidance and Counseling ?</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo dicta fuga eos id eum, maiores vel facere voluptatibus quas dignissimos est ipsa excepturi aspernatur officiis deleniti sequi voluptatem odit voluptas.</p>
            </div>
        </article>

        <article class="faq">
            <div class="faq__icon"><i class="uil uil-plus"></i></div>
            <div class="question__answer">
                <h4>What is Guidance and Counseling ?</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo dicta fuga eos id eum, maiores vel facere voluptatibus quas dignissimos est ipsa excepturi aspernatur officiis deleniti sequi voluptatem odit voluptas.</p>
            </div>
        </article>

        <article class="faq">
            <div class="faq__icon"><i class="uil uil-plus"></i></div>
            <div class="question__answer">
                <h4>What is Guidance and Counseling ?</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo dicta fuga eos id eum, maiores vel facere voluptatibus quas dignissimos est ipsa excepturi aspernatur officiis deleniti sequi voluptatem odit voluptas.</p>
            </div>
        </article>

    </div>
</section>
<!--=========================END OF FAQS=============================-->




<!--=========================START OF TESTIMONIALS=============================-->
<!-- <section class="container testimonials__container mySwiper">
    <h2>Students Testimonials</h2>
    <div class="swiper-wrapper">
        <article class="testimonial swiper-slide">
            <div class="avatar">
                <img src="./images/profiles/avatar1.jpg">
            </div>
            <div class="testimonial__info">
                <h5>Marian Rivera</h5>
                <small>Senior High School Student</small>
            </div>
            <div class="testimonial__body">
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusantium voluptatibus quod ratione consequuntur molestiae aliquam eveniet laudantium veritatis doloribus, corporis consectetur. Aut illum obcaecati possimus quod ab hic totam tenetur!</p>
            </div>
        </article>

        <article class="testimonial swiper-slide">
            <div class="avatar">
                <img src="./images/profiles/avatar2.jpg">
            </div>
            <div class="testimonial__info">
                <h5>Kathryn Bernardo</h5>
                <small>Information Technology Student</small>
            </div>
            <div class="testimonial__body">
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusantium voluptatibus quod ratione consequuntur molestiae aliquam eveniet laudantium veritatis doloribus, corporis consectetur. Aut illum obcaecati possimus quod ab hic totam tenetur!</p>
            </div>
        </article>

        <article class="testimonial swiper-slide">
            <div class="avatar">
                <img src="./images/profiles/avatar3.jpg">
            </div>
            <div class="testimonial__info">
                <h5>Daniel Padilla</h5>
                <small>Senior High School Student</small>
            </div>
            <div class="testimonial__body">
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusantium voluptatibus quod ratione consequuntur molestiae aliquam eveniet laudantium veritatis doloribus, corporis consectetur. Aut illum obcaecati possimus quod ab hic totam tenetur!</p>
            </div>
        </article>

        <article class="testimonial swiper-slide">
            <div class="avatar">
                <img src="./images/profiles/avatar4.jpg">
            </div>
            <div class="testimonial__info">
                <h5>Barbie Forteza</h5>
                <small>Tourism Student</small>
            </div>
            <div class="testimonial__body">
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusantium voluptatibus quod ratione consequuntur molestiae aliquam eveniet laudantium veritatis doloribus, corporis consectetur. Aut illum obcaecati possimus quod ab hic totam tenetur!</p>
            </div>
        </article>

        <article class="testimonial swiper-slide">
            <div class="avatar">
                <img src="./images/profiles/avatar5.jpg">
            </div>
            <div class="testimonial__info">
                <h5>Kim Chiu</h5>
                <small>Business Student</small>
            </div>
            <div class="testimonial__body">
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusantium voluptatibus quod ratione consequuntur molestiae aliquam eveniet laudantium veritatis doloribus, corporis consectetur. Aut illum obcaecati possimus quod ab hic totam tenetur!</p>
            </div>
        </article>
    </div>
    <div class="swiper-pagination"></div>
</section> -->
<!--=========================END OF TESTIMONIALS=============================-->


<?php include('includes/homepage___footer.php'); ?>

<?php include('includes/homepage___scripts.php'); ?>