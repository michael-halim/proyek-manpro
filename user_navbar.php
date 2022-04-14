<?php
include 'connect.php';
if (!isset($_SESSION['email'])) {
	// if ($_SESSION['email'] == "admin@gmail.com") {
	// 	header('location: mobile_admin_home.php');
	// } else {
		header("Location: login.php");
	// }

	// echo $_SESSION['email'];
	// echo date("Y-m-d H:i:s");
	
}
?>


<a href="index.html" class="probootstrap-logo">Baca Alkitab<span>.</span></a>
        
        <a href="#" class="probootstrap-burger-menu visible-xs" ><i>Menu</i></a>
        <div class="mobile-menu-overlay"></div>

        <nav role="navigation" class="probootstrap-nav hidden-xs">
          <ul class="probootstrap-main-nav">
            <li><a href="user_home.php">Home</a></li>
            <li><a href="material.php">Materi</a></li>
            <li><a href="group.php">Grup</a></li>
            <li class="probootstrap-cta"><a href="signup.html">Hi, <?= $_SESSION['nama']; ?></a> </li>
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

 