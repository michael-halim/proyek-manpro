<?php 
include "connect.php";
var_dump($_SESSION['statusJabatan']);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Baca Alkitab &mdash;</title>
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
        <?php require_once('user_navbar.php'); ?>
        <section class="probootstrap-intro">
<div class="container">
 <div class="row">
<div id="carouselvideo" class="carousel slide" data-ride="carousel">
<div class="carousel-inner" role="listbox">
<?php 

$sql = "SELECT original_name , path , isActive
          FROM content
            WHERE isActive = True";

$stmt = $pdo->prepare($sql);
$stmt->execute();
echo '<div class="item active">';
 while ($row = $stmt->fetch())
 {
  $judul = $row["original_name"];
  $path = $row["path"];

   echo' <iframe width="780" height="450" src="'.$path.'" frameborder="0" allowfullscreen></iframe>';
      echo '<p>'.$judul.'</p>   </div>';
      echo '<div class="item ">';

 }        
 echo' <iframe width="780" height="450" src="'.$path.'" frameborder="0" allowfullscreen></iframe>';
 echo '<p>'.$judul.'</p>   </div>';
?>
</div>
  <ol class="carousel-indicators ">
    <li  href="#carouselvideo" data-slide="prev" class="btn btn-info "></li>
    <li  href="#carouselvideo" data-slide="next" class="btn btn-info "></li>
  </ol>

</div>
    </div>

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
  </body>
</html>