<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>uiCookies:Sublime &mdash; Free Bootstrap Theme, Free Responsive Bootstrap Website Template</title>
    <meta name="description" content="Free Bootstrap Theme by uicookies.com">
    <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
    
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet"> 
    <link rel="stylesheet" href="css/styles-merged.css">
    <link rel="stylesheet" href="css/style.min.css">
    <link rel="stylesheet" href="css/custom.css">


    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">
    <!--[if lt IE 9]>
      <script src="js/vendor/html5shiv.min.js"></script>
      <script src="js/vendor/respond.min.js"></script>
    <![endif]-->
  
    <style>
      .probootstrap-header{
       background-color:cadetblue; 
       background-image: url("img/classroom.png");
       background-position: center center;
       background-repeat: no-repeat;
       background-attachment: fixed;
       background-size: cover;
       background-color: #464646;
       width:100%;
       height:auto;
      }
      .responsive{
        width:100%;
        height:auto;
      }
    </style>
  </head>
  <body>
    


  <!-- START: header -->
  <header role="banner" class="probootstrap-header img-responsive">
    <div class="container-fluid">
      <!-- <div class="row"> -->
        <a href="index.html" class="probootstrap-logo">Baca Alkitab<span>.</span></a>
        <a href="#" class="probootstrap-burger-menu visible-xs" ><i>Menu</i></a>
        <div class="mobile-menu-overlay"></div>

        <nav role="navigation" class="probootstrap-nav hidden-xs">
          <ul class="probootstrap-main-nav">
          <li><a href="home.php">Home</a></li>
            <li><a href="material.php">Materi</a></li>
            <li><a href="grup.php">Grup</a></li>
            <li class="probootstrap-cta"><a href="signup.html">Hi , nama</a></li>
          </ul>
          <div class="extra-text visible-xs">
            <a href="#" class="probootstrap-burger-menu"><i>Menu</i></a>
            <h5>Social</h5>
            <ul class="social-buttons">
              <li><a href="#"><i class="icon-twitter"></i></a></li>
              <li><a href="#"><i class="icon-facebook"></i></a></li>
              <li><a href="#"><i class="icon-instagram2"></i></a></li>
            </ul>
            <p><small>&copy; Copyright 2021. All Rights Reserved.</small></p>
          </div>
        </nav>

        <section class="probootstrap-intro" style="height: 600px;">
         
            <!--<div class="row">
              <img src="img/classroom.png" style="max-width:100%;max-height:100%">
            </div>-->
          
        </section>

      <!-- </div> -->
    </div>
    
    
  </header>
  <!-- END: header -->


  <section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Form Pengumpulan</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12">
					<div class="wrapper">
						<div class="row no-gutters mb-5">
							<div class="col-md-12">
								<div class="contact-wrap w-100 p-md-5 p-4">
									<h3 class="mb-4">Tugas Baca alkitab</h3>
									<div id="form-message-warning" class="mb-4"></div> 
									<form method="POST" id="contactForm" name="contactForm" class="contactForm">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="label" for="name">Full Name</label>
													<input type="text" class="form-control" name="name" id="name" placeholder="Name">
												</div>
											</div>
											<div class="col-md-6"> 
												<div class="form-group">
													<label class="label" for="email">Email Address</label>
													<input type="email" class="form-control" name="email" id="email" placeholder="Email">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label class="label" for="subject">Subject</label>
													<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label class="label" for="#">Upload File disini</label>
													<textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Upload file disini"></textarea>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input type="submit" value="Kumpulkan" class="btn btn-primary">
													<div class="submitting"></div>
												</div>
											</div>
										</div>
									</form>
							</div>
						</div>
			          
						
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
  

  <script src="js/scripts.min.js"></script>
  <script src="js/main.min.js"></script>
  <script src="js/custom.js"></script>
  </body>
</html>