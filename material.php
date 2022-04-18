<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Materi</title>
    <meta name="description" content="Free Bootstrap Theme by uicookies.com">
    <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
    
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet"> 
    <link rel="stylesheet" href="assets/user/css/styles-merged.css">
    <link rel="stylesheet" href="assets/user/css/style.min.css">
    <link rel="stylesheet" href="assets/user/css/custom.css">


  
    <style>
      .probootstrap-header{
       background-color:cadetblue; 
       background-image: url("assets/user/img/classroom.png");
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
       <?php require_once('user_navbar.php') ?>

        <section class="probootstrap-intro" style="height: 600px;">
         
            <!--<div class="row">
              <img src="img/classroom.png" style="max-width:100%;max-height:100%">
            </div>-->
          
        </section>

      <!-- </div> -->
    </div>
    
    
  </header>
  <!-- END: header -->
  
  

  

  <!-- START: section -->
  <section class="probootstrap-section probootstrap-section-extra">
    <center><h1>Materi</h1></center>
    <!-- query  -->
    <?php 
    $emailnya = $_SESSION["email"];
    $sql = "SELECT ayat,renungan,sudah_baca,sudah_baca_at FROM alkitab ,detail_group JOIN user where detail_group.id_user = user.id and detail_group.id_alkitab = alkitab.id and user.email=?";
    //echo $sql;

    // $result = $link -> query($sql);
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$emailnya]);


 
     while ($row = $stmt->fetch())
     {
      $ayat = $row["ayat"];
      $renungan = $row["renungan"];
      $sb = $row["sudah_baca"];
      $sbt = $row["sudah_baca_at"];
  
    // echo "<div class=\"card\">
    // <div class=\"card-body\">";
    //  echo "<br><div class=\" text-white\"><tr><td><br><img src=" .$txt1.$row["gambar"].'"width="300" height="400" class =" img-fluid img-thumbnail" '."<br><br><br>
    //  <h5 class=\"card-title\">".$row["nama_hunian"]."</h5><br>
    //  <p class=\"card-text\">".$row["jenis_hunian"]."<br><br>
    //  Status : ".$row["status_hunian"]."<br><br>Deskripsi<br>
    //  ".$row["deskripsi_hunian"]."<br></p>";
    //  echo "<br><div class=\"card-footer\">  &nbsp 
    //  <a href='users_bayar.php?RoomId=$id' class='btn btn-info'>Konfirmasi</a> &nbsp <a href='users_komplain.php?id=$id' class='btn btn-danger'>Services</a>";
    echo '    <div class="col-md-12">';
     echo"      <div class='anggota' style='background-color:whitesmoke;border-radius:8px;margin-top:10px;'>
     <a href='user_materi.php'>
     <h1 style='padding:10px'>$renungan</h1>
     <h2 style='padding-left:10px'> $ayat</h2></a></div>
     </div>";
  
      
        

     }
     echo "</div>";
    //  echo"<br><br>";


    ?>
    <div class="col-md-12">
      <div class="anggota1" style="background-color:whitesmoke;border-radius:8px;margin-top:10px;">
        <a href="user_materi.php">
        <h1 style="padding:10px">Renungan ayat matius</h1>
        <h2 style="padding-left:10px"> Matius 3:3-9</h2></a></div>
      <div class="anggota2" style="background-color:whitesmoke;border-radius:8px;margin-top:10px;">
        <a href="user_materi.php">
          <h1 style="padding:10px">Laporan Baca</h1>
          <h2 style="padding-left:10px">Baca Renungan harian senin 1 maret - jumat 7 maret</h2></div>
      <div class="anggota3" style="background-color:whitesmoke;border-radius:8px;margin-top:10px;">
            <h1 style="padding:10px">Pengabdian Masyarakat</h1>
            <h2 style="margin-left:10px">Sumbangan ke orang terdekat</h2></div>
      <div class="anggota4" style="background-color:whitesmoke;border-radius:8px;margin-top:10px;">
        <a href="user_materi.php">
        <h1 style="padding:10px">Tugas membaca alkitab</h1>
        <h2 style="padding-left:10px"> Markus 1 : 1-2</h2></a></div>
      <div class="anggota5" style="background-color:whitesmoke;border-radius:8px;margin-top:10px;">
          <h1 style="padding:10px">Tugas membuat Renungan</h1>
          <h2 style="padding-left:10px">Matius 1:1-2</h2></div>
      <div class="anggota6" style="background-color:whitesmoke;border-radius:8px;margin-top:10px;">
            <h1 style="padding:10px">Tugas membaca alkitab</h1>
            <h2 style="margin-left:10px">Matius 1 : 1-2</h2></div>

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
</html>