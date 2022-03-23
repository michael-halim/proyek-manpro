<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Baca Alkitab &mdash; Free Bootstrap Theme, Free Responsive Bootstrap Website Template</title>
    <meta name="description" content="Free Bootstrap Theme by uicookies.com">
    <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
    
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet"> 
    <link rel="stylesheet" href="css/styles-merged.css">
    <link rel="stylesheet" href="css/style.min.css">
    <link rel="stylesheet" href="css/custom.css">

    <link rel="stylesheet" href="custom.css">
    <!--[if lt IE 9]>
      <script src="js/vendor/html5shiv.min.js"></script>
      <script src="js/vendor/respond.min.js"></script>
    <![endif]-->
    <?php
        //session_start();
        include "connect.php";
          //haruse ini
        //$email = $_SESSION['useremail'];

        $email = "Farrel";
        //$username = $_POST['nama'];
        //$query = "SELECT * FROM users WHERE email='$email";
        //$count=mysqli_num_rows($query);
    ?>
  </head>
  <body>
    


  <!-- START: header -->
  <header role="banner" class="probootstrap-header">
    <div class="container-fluid">
      <!-- <div class="row"> -->
        <a href="index.html" class="probootstrap-logo">Baca Alkitab<span>.</span></a>
        
        <a href="#" class="probootstrap-burger-menu visible-xs" ><i>Menu</i></a>
        <div class="mobile-menu-overlay"></div>

        <nav role="navigation" class="probootstrap-nav hidden-xs">
          <ul class="probootstrap-main-nav">
            <li><a href="index.html">Home</a></li>
            <li><a href="blog.html">Materi</a></li>
            <li><a href="pricing.html">Grup</a></li>
            <li class="probootstrap-cta"><a href="signup.html">Hi;<?php  echo $email;?></a></li>
          </ul>
          <div class="extra-text visible-xs">
            <a href="#" class="probootstrap-burger-menu"><i>Menu</i></a>
            <h5>Social</h5>
            <ul class="social-buttons">
              <li><a href="#"><i class="icon-twitter"></i></a></li>
              <li><a href="#"><i class="icon-facebook"></i></a></li>
              <li><a href="#"><i class="icon-instagram2"></i></a></li>
            </ul>
            <p><small>&copy; Kelompok 11.2021.</small></p>
          </div>
        </nav>

        <section class="probootstrap-intro">
          <div class="container">
            <div class="row">
              <div class="col">
                <iframe class="responsive-iframe" style="margin-right:2px;border-radius:4px;"width="880" height="440" src="https://www.youtube.com/embed/mkh6AWm_LO8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
              <div class="card" style="width: 73rem;background-color:#f3f3f3;border-radius:8px;">
                <div class="card-body">
                    <h5 class="card-title">Deskripri(aturan gereja maybe,nanti diatur lagi)</h5>
                    <h6 class="card-subtitle mb-2 text-muted">tidak boleh afk</h6>
                    <p class="card-text">Donasi</p>
                    <a href="https://saweria.co" class="card-link">donasi klik disini(saweria)</a>
                    <a href="https://sociabuzz.com" class="card-link">donasi klik disini(socialbuzz)</a>
                </div>
              </div>
            </div>
          </div>
        </section>

      <!-- </div> -->
    </div>
    
    
  </header>
  <!-- END: header -->
  
  <!-- START: section -->
  <section class="probootstrap-section">
    <div class="container">
      <a>video lainnya</a>
      <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12 probootstrap-animate">
          <div class="probootstrap-block-image">
            <figure><iframe width="356" height="274" src="https://www.youtube.com/embed/DHFkOIMm7Ms" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></figure>
            <div class="text">
              <span class="date">June 29, 2017</span>
              <h3><a href="#">misa selanjutnya</a></h3>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto provident qui tempore natus quos quibusdam soluta at.</p>
              <p><a href="#" class="link-with-icon">Learn More <i class=" icon-chevron-right"></i></a></p>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12 probootstrap-animate">
          <div class="probootstrap-block-image">
            <figure><iframe width="356" height="274" src="https://www.youtube.com/embed/DHFkOIMm7Ms" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></figure>
            <div class="text">
              <span class="date">June 29, 2017</span>
              <h3><a href="#">Laboriosam Quod Dignissimos</a></h3>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto provident qui tempore natus quos quibusdam soluta at.</p>
              <p><a href="#" class="link-with-icon">Learn More <i class=" icon-chevron-right"></i></a></p>
            </div>
          </div>
        </div>
        <div class="clearfix visible-sm-block"></div>
        <div class="col-md-4 col-sm-6 col-xs-12 probootstrap-animate">
          <div class="probootstrap-block-image">
            <figure><iframe width="356" height="274" src="https://www.youtube.com/embed/DHFkOIMm7Ms" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></figure>
            <div class="text">
              <span class="date">June 29, 2017</span>
              <h3><a href="#">Laboriosam Quod Dignissimos</a></h3>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto provident qui tempore natus quos quibusdam soluta at.</p>
              <p><a href="#" class="link-with-icon">Learn More <i class=" icon-chevron-right"></i></a></p>
            </div>
          </div>
        </div>
        <div class="clearfix visible-md-block"></div>
        <div class="col-md-4 col-sm-6 col-xs-12 probootstrap-animate">
          <div class="probootstrap-block-image">
            <figure><iframe width="356" height="274" src="https://www.youtube.com/embed/DHFkOIMm7Ms" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></figure>
            <div class="text">
              <span class="date">June 29, 2017</span>
              <h3><a href="#">Laboriosam Quod Dignissimos</a></h3>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto provident qui tempore natus quos quibusdam soluta at.</p>
              <p><a href="#" class="link-with-icon">Learn More <i class=" icon-chevron-right"></i></a></p>
            </div>
          </div>
        </div>
        <div class="clearfix visible-sm-block"></div>
        <div class="col-md-4 col-sm-6 col-xs-12 probootstrap-animate">
          <div class="probootstrap-block-image">
            <figure><iframe width="356" height="274" src="https://www.youtube.com/embed/DHFkOIMm7Ms" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></figure>
            <div class="text">
              <span class="date">June 29, 2017</span>
              <h3><a href="#">Laboriosam Quod Dignissimos</a></h3>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto provident qui tempore natus quos quibusdam soluta at.</p>
              <p><a href="#" class="link-with-icon">Learn More <i class=" icon-chevron-right"></i></a></p>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12 probootstrap-animate">
          <div class="probootstrap-block-image">
            <figure><iframe width="356" height="274" src="https://www.youtube.com/embed/DHFkOIMm7Ms" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></figure>
            <div class="text">
              <span class="date">June 29, 2017</span>
              <h3><a href="#">Laboriosam Quod Dignissimos</a></h3>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto provident qui tempore natus quos quibusdam soluta at.</p>
              <p><a href="#" class="link-with-icon">Learn More <i class=" icon-chevron-right"></i></a></p>
            </div>
          </div>
        </div>
        <div class="clearfix visible-sm-block"></div>
      </div>
      
      <div class="row mb50">
        <div class="col-md-12 section-heading text-center">
          <h2>Frequently Ask Question</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <h3>What is sublime?</h3>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
          <h3>Can I use this template?</h3>
          <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
          <h3>What is the license?</h3>
          <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
        </div>
        <div class="col-md-6">
          <h3>Is it free?</h3>
          <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
          <h3>Do you do a custom work?</h3>
          <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
        </div>
      </div>
    </div>
  </section>
  <!-- END: section -->

  
  
  <!-- START: footer -->
  <footer role="contentinfo" class="probootstrap-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="probootstrap-footer-widget">
            <h3>About</h3>
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
            <p><a href="#" class="link-with-icon">Learn More <i class=" icon-chevron-right"></i></a></p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="probootstrap-footer-widget">
            <h3>Blog</h3>
            <ul class="probootstrap-blog-list">
              <li>
                <a href="#">
                  <figure><img src="img/img_2.jpg" alt="Free Bootstrap Template by uicookies.com" class="img-responsive"></figure>
                  <div class="text">
                    <h4>River named Duden flows</h4>
                    <p>A small river named Duden flows by their place</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="#">
                  <figure><img src="img/img_3.jpg" alt="Free Bootstrap Template by uicookies.com" class="img-responsive"></figure>
                  <div class="text">
                    <h4>River named Duden flows</h4>
                    <p>A small river named Duden flows by their place</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="#">
                  <figure><img src="img/img_2.jpg" alt="Free Bootstrap Template by uicookies.com" class="img-responsive"></figure>
                  <div class="text">
                    <h4>River named Duden flows</h4>
                    <p>A small river named Duden flows by their place</p>
                  </div>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-4">
          <div class="probootstrap-footer-widget">
            <h3>Contact</h3>
            <ul class="probootstrap-contact-info">
              <li><i class="icon-location2"></i> <span>198 West 21th Street, Suite 721 New York NY 10016</span></li>
              <li><i class="icon-mail"></i><span>info@domain.com</span></li>
              <li><i class="icon-phone2"></i><span>+123 456 7890</span></li>
            </ul>
            
          </div>
        </div>
      </div>
      <div class="row mt40">
        <div class="col-md-12 text-center">
          <ul class="probootstrap-footer-social">
            <li><a href=""><i class="icon-twitter"></i></a></li>
            <li><a href=""><i class="icon-facebook"></i></a></li>
            <li><a href=""><i class="icon-instagram2"></i></a></li>
          </ul>
          <p>
            <small>&copy; 2017 <a href="https://uicookies.com/" target="_blank">uiCookies:Sublime</a>. All Rights Reserved. <br> Designed &amp; Developed by <a href="https://uicookies.com/" target="_blank">uicookies.com</a> Demo Images: Unsplash</small>
          </p>
          
        </div>
      </div>
    </div>
  </footer>
  <!-- END: footer -->



  <script src="js/scripts.min.js"></script>
  <script src="js/main.min.js"></script>
  <script src="js/custom.js"></script>

  </body>
</html>