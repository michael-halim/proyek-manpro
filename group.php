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
  <style>
    .probootstrap-header {
      background-color: cadetblue;
      background-image: url("assets/user/img/cross2.png");
      background-position: center center;
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
      background-color: #464646;
      width: 100%;
      height: auto;
    }

    body {
      background-color: cadetblue;
      background-image: url("assets/user/img/cross2.png");
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
  <header role="banner" class="probootstrap-header">
    <div class="container-fluid">
      <!-- <div class="row"> -->
      <?php require_once('user_navbar.php') ?>
    </div>
  </header>

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
              <a href='ketua_detail_group.php?idg=" . $row['idg'] . "'><h1 style='padding:10px'>" . $row['nama_group'] . "</h1></a>
              </div>";
      }
      echo "</div>";
    }
    ?>

    <div class="row mb50">
      <div class="col-md-12 section-heading text-center">
        <h2>Anggota</h2>
      </div>

    </div>
    <div class="row">
      <div class="col-md-3">
        <?php
        $emailnya = $_SESSION["email"];
        $sql = "SELECT DISTINCT nama,email,hp 
                FROM user 
                JOIN detail_group 
                WHERE user.id = detail_group.id_user 
                AND id_group = 
                    (SELECT id_group 
                    FROM detail_group 
                    WHERE id_user = (
                            SELECT id 
                            FROM user 
                            WHERE email = ? 
                            LIMIT 1) 
                    LIMIT 1);";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([$emailnya]);

        while ($row = $stmt->fetch()) {
          $nama = $row["nama"];
          $email = $row["email"];
          $hp = $row["hp"];

          echo '<div class="col-md-12">';
          echo "<div class='anggota' style='background-color:whitesmoke;border-radius:8px;margin-top:10px;'>

          <a href='user_materi.php'>
          <h1 style='padding:10px'>$nama</h1>
          <h2 style='padding-left:10px'> $email</h2></a></div>
          <h3 style='padding-left:10px'> $hp</h3></a></div>
          </div>";
        }
        echo "</div>";
        ?>
      </div>

    </div>

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
  </div>
</body>

</html>