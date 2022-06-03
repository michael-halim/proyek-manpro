<?php
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
<script src="assets/user/js/scripts.min.js"></script>
<script src="assets/user/js/main.min.js"></script>
<script src="assets/user/js/custom.js"></script>
<a href="user_home.php" class="probootstrap-logo"><img src="assets/user/img/pray_icon.png" style="width:15%;margin-bottom:5px;"><span></span></a>

<a href="#" class="probootstrap-burger-menu visible-xs"><i>Menu</i></a>
<div class="mobile-menu-overlay"></div>

<nav role="navigation" class="probootstrap-nav hidden-xs">
  <ul class="probootstrap-main-nav">
    <li><a href="user_home.php">Home</a></li>
    <?php 

    $sql = "SELECT id from user WHERE email='".$_SESSION['email']."' and ketua='1'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $cekKetua = $stmt->fetch();
    if ($cekKetua) {
      echo '<li><a href="material.php">Materi</a></li>';
    }
    ?>
    <li><a href="group.php">Grup</a></li>
    <li><a href="logout.php">Logout</a></li>
    <li class="probootstrap-cta"><a href="#">Hi, <?= $_SESSION['nama']; ?></a> </li>
  </ul>
</nav>