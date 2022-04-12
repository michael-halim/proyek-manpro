<!DOCTYPE html>
<html lang="en">
<<<<<<< Updated upstream

<head>
	<title>Proyek Manpro</title>

	<!-- <?php include('assets/header.php'); ?>
	<script src="js/all_home_func.js"></script>
	<link rel="stylesheet" type="text/css" href="css/home_style.css"> -->
</head>

<body>
	<?php
	// admin sha512
	// c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec
	// $getDataSQL = "SELECT * FROM user";
	//     $stmtData = $pdo->prepare($getDataSQL);
	//     $stmtData->execute();

	//     while($rowData = $stmtData->fetch()){
	// 		echo hash('sha512', $rowData['email']);

	//     }
	// echo '<br>';
	// $salt = hash("sha512", uniqid());
	// echo $salt;
	// var_dump($salt);


	// echo '<br><br><br>';
	// $hashed = hash('sha512',$salt . 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec');
	// echo $hashed;


	// Sistem Login

	$username = 'admin@gmail.com';
	$password = 'admin';

	$sql = "SELECT * FROM user WHERE email = '$username'";
	// var_dump($sql);

	$stmtData = $pdo->prepare($sql);
	$stmtData->execute();

	while ($rowData = $stmtData->fetch()) {
		$hashed_pw = hash('sha512', $password);

		if (hash('sha512', $rowData['salt'] . $hashed_pw) === $rowData['password']) {
			echo 'Logged in';
		} else {
			echo 'Password Salah';
		}
	}
	?>


	<script>

	</script>
</body>

=======
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Baca Alkitab</title>
    
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet"> 
    <link rel="stylesheet" href="assets/user/css/styles-merged.css">
    <link rel="stylesheet" href="assets/user/css/style.min.css">
    <link rel="stylesheet" href="assets/user/css/custom.css">

    <link rel="stylesheet" href="assets/user/css/responsivevideo.css">
    
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
            <li><a href="home.php">Home</a></li>
            <li><a href="material.php">Materi</a></li>
            <li><a href="group.php">Grup</a></li>
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
            <p><small>&copy; Kelompok 11.2021.</small></p>
          </div>
        </nav>

        <section class="probootstrap-intro">
          <div class="container">
            <div class="row">
              <div class="col">
                <iframe class="responsive-iframe" style="margin-right:2px;border-radius:4px;"width="880" height="440" src="https://www.youtube.com/embed/mkh6AWm_LO8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
              <div class="col2">
                <div class="card" style="width: 100%;background-color:#f3f3f3;border-radius:8px;">
                  <div class="card-body">
                      <h5 class="card-title">Aturan Misa Gereja</h5>
                      <h6 class="card-subtitle mb-2 text-muted">1. tidak boleh afk</h6>
                      <h6 class="card-subtitle mb-2 text-muted">2. tidak diperbolehkan main hp saat misa</h6>
                      <h6 class="card-subtitle mb-2 text-muted">3.tidak diperbolehkan makan dan tidur selama misa</h6>
                      <a href="#" class="card-link">Info lebih lanjut, klik disini</a>
                  </div>
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
            <figure>
              <div class="col">
                <iframe class="responsive-iframe" style="margin-right:2px;border-radius:4px;"width="880" height="440" src="https://www.youtube.com/embed/mkh6AWm_LO8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
            </figure>
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
            <figure>
              <div class="col">
                <iframe class="responsive-iframe" style="margin-right:2px;border-radius:4px;"width="880" height="440" src="https://www.youtube.com/embed/mkh6AWm_LO8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
            </figure>
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
            <figure>
              <div class="col">
                <iframe class="responsive-iframe" style="margin-right:2px;border-radius:4px;"width="880" height="440" src="https://www.youtube.com/embed/mkh6AWm_LO8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
            </figure>
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
            <figure>
              <div class="col">
                <iframe class="responsive-iframe" style="margin-right:2px;border-radius:4px;"width="880" height="440" src="https://www.youtube.com/embed/mkh6AWm_LO8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
            </figure>
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
            <figure>
              <div class="col">
                <iframe class="responsive-iframe" style="margin-right:2px;border-radius:4px;"width="880" height="440" src="https://www.youtube.com/embed/mkh6AWm_LO8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
            </figure>
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
            <figure>
              <div class="col">
                <iframe class="responsive-iframe" style="margin-right:2px;border-radius:4px;"width="880" height="440" src="https://www.youtube.com/embed/mkh6AWm_LO8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
            </figure>
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
  </section>
  <!-- END: section -->

  
  
  <!-- START: footer -->
  <footer role="contentinfo" class="probootstrap-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="probootstrap-footer-widget">
            <h3>Tentang Kita</h3>
            <p>Aplikasi Baca Alkitab ini adalah aplikasi yang dibentuk oleh para mahasiswa Universitas Kristen Petra Surabaya yang berjumlahkan 6 orang</p>
            <p><a href="#" class="link-with-icon">Learn More <i class=" icon-chevron-right"></i></a></p>
          </div>
        </div>
        
        <div class="col-md-6">
          <div class="probootstrap-footer-widget">
            <h3>Contact</h3>
            <ul class="probootstrap-contact-info">
              <li><i class="icon-location2"></i> <span>Jl . alamat gereja </span></li>
              <li><i class="icon-mail"></i><span>namagereja@domain.com</span></li>
              <li><i class="icon-phone2"></i><span>+081 123 123 123</span></li>
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
            <small>&copy; 2021 <a href="https://uicookies.com/" target="_blank">Kelompok11 Manpro</a>. All Rights Reserved. <br> Design Template by uicookies.com with some modification from our team &amp; Developed by <a href="https://uicookies.com/" target="_blank">Kelompok 11 Manpro</a></small>
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
>>>>>>> Stashed changes
</html>