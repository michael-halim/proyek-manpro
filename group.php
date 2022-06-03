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

    table,
    th,
    td {
      border: 2px solid black;
    }
  </style>
</head>

<body>
  <header role="banner" class="probootstrap-header">
    <div class="container-fluid">
      <!-- <div class="row"> -->
      <?php require_once('user_navbar.php') ?>

      <section class="probootstrap-intro">
        <div style="padding-bottom:40px;">

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
              echo
              "<div style='background-color:#D3C4A5;border-radius:500px;margin-top:10px;opacity:0.8;width:50%;text-align:center;margin-left:25%;'>
                  <a href='ketua_detail_group.php?idg=" . $row['idg'] . "'>
                      <h1 style='padding:5px'>" . $row['nama_group'] . "</h1>
                  </a>
          </div>";
            }
            echo "</div>";
          } else {
            echo '
  <div class="row mb50">
      <div class="col-md-12 section-heading text-center">
        <h2>Anggota</h2>
      </div>
  </div>';
            echo '<div class="asd">';
            echo ' <div >
  <table style="background-color:whitesmoke;width:100%" class="table">
    <tr>
      <th>Nama</th>
      <th>Email</th>
      <th>Hp</th>
      <th>Status</th>
    </tr>';
            //<?php
            $emailnya = $_SESSION["email"];
            $sql = "SELECT DISTINCT nama,email,hp,ketua 
            FROM user 
            JOIN detail_group 
            WHERE user.id=detail_group.id_user 
              and id_group = (
                  SELECT id_group 
                  FROM detail_group 
                  WHERE id_user = 
                    (SELECT id 
                      FROM user 
                      WHERE email = ? 
                      LIMIT 1) 
                    LIMIT 1);";
            //echo $sql;

            // $result = $link -> query($sql);

            $stmt = $pdo->prepare($sql);
            $stmt->execute([$emailnya]);

            while ($row = $stmt->fetch()) {
              $nama = $row["nama"];
              $email = $row["email"];
              $hp = $row["hp"];
              $ketua = $row["ketua"];
              echo "<tr>";
              echo "<th>$nama</th>";
              echo "<th>$email</th>";
              echo "<th>$hp</th>";
              if ($ketua == 1) {
                echo "<th>Ketua</th>";
              }
              if ($ketua == 0) {
                echo "<th>Anggota</th>";
              }
              echo "</tr>";
            }
            echo '</table>';
            echo '</div>';
          }
          ?>
        </div>
      </section>
    </div>
  </header>

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