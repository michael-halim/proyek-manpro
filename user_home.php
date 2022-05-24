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

    <style>
    .probootstrap-header {
      background-color: cadetblue;
      background-image: url("assets/user/img/gunung.jpg");
      background-position: center center;
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
      background-color: #464646;
      width: 100%;
      height: auto;
    }

    .responsive {
      width: 100%;
      height: auto;
    }
    </style>
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
              <div class="col">
                <iframe class="responsive-iframe" style="margin-right:2px;border-radius:4px;"width="880" height="440" src="https://www.youtube.com/embed/mkh6AWm_LO8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
           
          </div>
        </div>
        
        <div class="col-md-6">
          <div class="probootstrap-footer-widget">
            <h3>Contact</h3>
            <ul class="probootstrap-contact-info">
              <li><i class="icon-location2"></i> <span>Jl . alamat gereja </span></li>
              <li><i class="icon-phone2"></i><span>+081 123 123 123</span></li>
            </ul>
            
          </div>
        </div>
      </div>
    </div>
  </footer>
  </body>
</html>