<?php
include 'connect.php';
?>
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
    .probootstrap-header {
      background-color: cadetblue;
      background-image: url("assets/user/img/3cross.jpg");
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
      background-image: url("assets/user/img/3cross.jpg");
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
  <header role="banner" class="probootstrap-header img-responsive">
    <!-- <div class="row"> -->
    <?php require_once('user_navbar.php') ?>
    <section class="probootstrap-intro" style="height: 600px;">
      <center>
        <div class="container ">
          
        </div>
      </center>
    </section>
  </header>
  <!-- END: header -->

  <!-- START: section -->
  <section class="probootstrap-section probootstrap-section-extra">
    <div class="container">

      <!-- query  -->
      <?php
      $emailnya = $_SESSION["email"];

      $sql = "SELECT ayat, 
                  renungan,
                  sudah_baca,sudah_baca_at 
            FROM alkitab ,detail_group 
            JOIN user 
            where detail_group.id_user = user.id and 
              detail_group.id_alkitab = alkitab.id and 
              user.email=?";


      $stmt = $pdo->prepare($sql);
      $stmt->execute([$emailnya]);

      while ($row = $stmt->fetch()) {
        $iduser = $row["id_user"];
        $idgroup = $row["id_group"];
        $idalkitab = $row["id_alkitab"];
        $ayat = $row["ayat"];
        $renungan = $row["renungan"];
        $sb = $row["sudah_baca"];
        $sbt = $row["sudah_baca_at"];

        $btnset = "";

        if ($sb == true) {
          $txtt = "Sudah dibaca pada ";
        } else {
          $txtt = "Belum dibaca";
        }

        echo '<div class="card bg-info">
     <div class="card-header bg-primary text-white">
     <h1 class="text-white">' . $renungan . '</h1>
     </div>
     <div class="card-body">
     <i>' . $txtt . '</i>
     <br>';

        if ($sb) {
          echo '<i>' . $sbt  . '</i>';
          $btnset = "disabled";
        }

        echo '<p class="card-text">' . $ayat . '</p>
       <form method="post" action="">
       <input name="user" type="hidden" value=' . $iduser . '></input>
       <input name="group" type="hidden" value=' . $idgroup . '></input>
       <input name="alkitab" type="hidden" value=' . $idalkitab . '></input>
       <a href="#" class="btn btn-primary">Baca Ayat</a>
       <button type="submit" class ="btn btn-success" ' . $btnset . '>Sudah dibaca</button >
       </form>
       </div>
       </div> <br>';
      }

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $puser = $_POST["user"];
        $pgroup = $_POST["group"];
        $palkitab = $_POST["alkitab"];

        if (isset($puser) && isset($pgroup) && isset($palkitab)) {

          $sqlupdate = "UPDATE detail_group
        SET sudah_baca = 1 , sudah_baca_at = now()
        WHERE id_user = ?
        and id_group = ?
        and id_alkitab = ?";

          $stmt = $pdo->prepare($sqlupdate);
          // $stmt->bind_param('sss', );
          $stmt->execute([$puser, $pgroup, $palkitab]);

          if ($stmt == false) {
            $error = "Update failed. Please try again.";
          } else {
            echo "<script type='text/javascript'>" .
              "alert('Berhasil update sudah dibaca.');
            window.location.assign(window.location.href);" .
              "</script>";
            exit;
          }
        }
      }

      ?>
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

    <form class="form-signin">
      <div class="md-form mb-4">
        <i class="fas fa-envelope prefix"> </i> <label for="inputkitab"> Kitab </label>
        <input type="text" id="inputkitab" class="form-control" placeholder="Email address">
      </div>

      <div class="md-form mb-4">
        <i class="fas fa-lock prefix grey-text"> </i> <label for="inputPasswordIn"> Pasal </label>
        <input type="text" id="inputpasal" class="form-control" placeholder="Password">
      </div>

      <div class="md-form mb-4">
        <i class="fas fa-envelope prefix"> </i> <label for="inputEmailIn"> awal </label>
        <input type="text" id="inputawal" class="form-control" placeholder="Email address">
      </div>

      <div class="md-form mb-4">
        <i class="fas fa-lock prefix grey-text"> </i> <label for="inputPasswordIn"> akhir </label>
        <input type="text" id="inputakhir" class="form-control" placeholder="Password">
      </div>

      <div class="md-form mb-4">
        <i class="fas fa-lock prefix grey-text"> </i> <label for="inputPasswordIn"> renungan </label>
        <input type="text" id="inputrenungan" class="form-control" placeholder="Password">
      </div>

      <div class="modal-footer d-flex justify-content-center">
        <button id="signin" class="btn-dark btn-lg btn-block text-uppercase">Get Preview</button>
      </div>

    </form>

    <div class="modal fade" id="preview-renungan-modal" tabindex="-1">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="previewRenunganLabel">Preview Renungan</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-6" id="preview-firman">

                </div>
                <div class="col-6">
                  <div class="row mb-3" id="preview-ayat"></div>
                  <div class="row" id="preview-renungan"></div>

                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-dark" data-bs-target="#add-renungan-modal" data-bs-toggle="modal">Back</button>
            <button type="button" data-group="" id="submit-renungan" class="btn btn-primary">Submit</button>
          </div>
        </div>
      </div>
    </div>

  </footer>
  <!-- END: footer -->
  <script>
    $.ajax({
      url: 'get_preview_renungan.php',
      method: 'POST',
      data: {
        kitab: "Habakuk",
        pasal: 1,
        awal: 2,
        akhir: 10,
        renungan: "renungan",
      },
      success: function(result) {
        // Menampilkan Preview Firman, Ayat, dan Renungan

        $('#preview-firman').html(result.outputFirman);
        $('#preview-ayat').html(result.outputAyat);
        $('#preview-renungan').html(result.outputRenungan);

        // Hide Modal Add Renungan dan tampilkan Preview Renungan

        $('#preview-renungan-modal').modal('show');

      },
      error: function(result) {

      }
    });
  </script>
</body>

</html>