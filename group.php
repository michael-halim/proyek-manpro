<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet">
  <link rel="stylesheet" href="assets/user/css/styles-merged.css">
  <link rel="stylesheet" href="assets/user/css/style.min.css">
  <link rel="stylesheet" href="assets/user/css/custom.css">
</head>

<body>
  <!-- START: header -->
  <header role="banner" class="probootstrap-header">
    <div class="container-fluid">
      <!-- <div class="row"> -->
      <?php require_once('user_navbar.php') ?>

      <section class="probootstrap-intro">
        <div class="container">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <h1 class="probootstrap-animate">Grup XXXX</h1>
              <div class="probootstrap-subtitle probootstrap-animate">
                <h2>deskripsi grup asdadas blablablab <a href="https://uicookies.com/" target="_blank">uicookies.com</a></h2>
              </div>
              <p class="watch-intro probootstrap-animate"><a href="https://vimeo.com/45830194" class="popup-vimeo">aturan grup klik disini<i class="icon-play2"></i></a></p>
            </div>
          </div>
        </div>
      </section>

      <!-- </div> -->
    </div>


  </header>
  <!-- END: header -->

  <!-- START: section -->

  <div class="container">


    <?php
    if ($_SESSION['statusJabatan'] == 'ketua') {
      $sql = "SELECT u.nama AS nama_user, 
                    ga.nama AS nama_group,
                    ga.id AS idg
              FROM user AS u 
              JOIN detail_group AS dg
              ON dg.id_user = u.id
              JOIN group_alkitab AS ga
              ON ga.id = dg.id_group
              WHERE u.email = ?";
      $stmt = $pdo->prepare($sql);
      $stmt->execute([$_SESSION['email']]);

      echo '<div class="col-md-12">';
      while ($row = $stmt->fetch()) {
        echo "<div style='background-color:whitesmoke;border-radius:8px;margin-top:10px;'>
              <a href='ketua_detail_group.php?idg=".$row['idg']."'><h1 style='padding:10px'>" . $row['nama_group'] . "</h1></a>
              </div>";
      }
      echo "</div>";
      
    }
    ?>
    <!-- END row -->

    <div class="row mb50">
      <div class="col-md-12 section-heading text-center">
        <h2>Anggota</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3">

        <?php
        $emailnya = $_SESSION["email"];
        $sql = "SELECT DISTINCT nama,email,hp from user join detail_group where user.id=detail_group.id_user and id_group = (select id_group from detail_group where id_user = (select id from user where email = ? LIMIT 1) LIMIT 1);";
        //echo $sql;

        // $result = $link -> query($sql);

        $stmt = $pdo->prepare($sql);
        $stmt->execute([$emailnya]);



        while ($row = $stmt->fetch()) {
          $nama = $row["nama"];
          $email = $row["email"];
          $hp = $row["hp"];

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
          echo "      <div class='anggota' style='background-color:whitesmoke;border-radius:8px;margin-top:10px;'>
     <a href='user_materi.php'>
     <h1 style='padding:10px'>$nama</h1>
     <h2 style='padding-left:10px'> $email</h2></a></div>
     <h3 style='padding-left:10px'> $hp</h3></a></div>
     </div>";
        }
        echo "</div>";
        //  echo"<br><br>";


        ?>



        <div class="anggota1" style="background-color:whitesmoke;border-radius:8px;margin-top:10px;">
          <h1>ASDASD</h1>
          <h2>deskripsi</h2>
        </div>

        <div class="anggota2" style="background-color:whitesmoke;border-radius:8px;margin-top:10px;">
          <h1>ASDASD</h1>
          <h2>deskripsi</h2>
        </div>
        <div class="anggota3" style="background-color:whitesmoke;border-radius:8px;margin-top:10px;">
          <h1>ASDASD</h1>
          <h2>deskripsi</h2>
        </div>

      </div>
      <div class="col-md-3">
        <div class="anggotakiri1" style="background-color:whitesmoke;border-radius:8px;margin-top:10px;">
          <h1 style="margin-left:10px">ASDASD</h1>
          <h2 style="margin-left:10px">deskripsi</h2>
        </div>
        <div class="anggotakiri2" style="background-color:whitesmoke;border-radius:8px;margin-top:10px;">
          <h1 style="margin-left:10px">ASDASD</h1>
          <h2 style="margin-left:10px">deskripsi</h2>
        </div>
        <div class="anggotakiri3" style="background-color:whitesmoke;border-radius:8px;margin-top:10px;">
          <h1 style="margin-left:10px">ASDASD</h1>
          <h2 style="margin-left:10px">deskripsi</h2>
        </div>
      </div>
      <div class="col-md-3">
        <div class="anggotakiri1" style="background-color:whitesmoke;border-radius:8px;margin-top:10px;">
          <h1 style="margin-left:10px">ASDASD</h1>
          <h2 style="margin-left:10px">deskripsi</h2>
        </div>
        <div class="anggotakiri2" style="background-color:whitesmoke;border-radius:8px;margin-top:10px;">
          <h1 style="margin-left:10px">ASDASD</h1>
          <h2 style="margin-left:10px">deskripsi</h2>
        </div>
        <div class="anggotakiri3" style="background-color:whitesmoke;border-radius:8px;margin-top:10px;">
          <h1 style="margin-left:10px">ASDASD</h1>
          <h2 style="margin-left:10px">deskripsi</h2>
        </div>
      </div>
      <div class="col-md-3">
        <div class="anggotakiri1" style="background-color:whitesmoke;border-radius:8px;margin-top:10px;">
          <h1 style="margin-left:10px">ASDASD</h1>
          <h2 style="margin-left:10px">deskripsi</h2>
        </div>
        <div class="anggotakiri2" style="background-color:whitesmoke;border-radius:8px;margin-top:10px;">
          <h1 style="margin-left:10px">ASDASD</h1>
          <h2 style="margin-left:10px">deskripsi</h2>
        </div>
        <div class="anggotakiri3" style="background-color:whitesmoke;border-radius:8px;margin-top:10px;">
          <h1 style="margin-left:10px">ASDASD</h1>
          <h2 style="margin-left:10px">deskripsi</h2>
        </div>
      </div>
    </div>
  </div>

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