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
  </style>
</head>

<body>
  <header role="banner" class="probootstrap-header img-responsive">
    <?php require_once('user_navbar.php') ?>
    <section class="probootstrap-intro" style="height: 600px;">
      <center>
<h1>Materi Bacaan</h1>
      </center>
    </section>
  </header>
  <section class="probootstrap-section probootstrap-section-extra">
    <div class="container">
      <?php
      $emailnya = $_SESSION["email"];
      $sql = "SELECT ayat,renungan,sudah_baca,sudah_baca_at,id_user,id_alkitab,id_group 
              FROM alkitab ,detail_group 
                JOIN user 
                  where detail_group.id_user = user.id 
                  and detail_group.id_alkitab = alkitab.id 
                  and user.email=?";

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
          $aksinya = "bacakembali";
          $btnset = "Tandai belum dibaca";
          $btcolor = "btn-warning";
        } else {
          $txtt = "Belum dibaca";
          $aksinya = "tandai";
          $btnset = "Sudah dibaca";
          $btcolor = "btn-success";
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
         }
   
         $skitab = strtok($ayat, ' ');
         $spasal = substr($ayat, strpos($ayat, " ") + 1);
         $spasal = strtok($spasal, ':');
         $sawal = substr($ayat, strpos($ayat, ":") + 1);
         $sawal = strtok($sawal, '-');
         $sakhir = substr($ayat, strpos($ayat, "-") + 1);
   
   
         echo '<p class="card-text">' . $ayat . '</p>
          <form method="post" action="">
          <input name="user" type="hidden" value=' . $iduser . '></input>
          <input name="group" type="hidden" value=' . $idgroup . '></input>
          <input name="alkitab" type="hidden" value=' . $idalkitab . '></input>
          <input name="kitab" type="hidden" value=' . $skitab . '></input>
          <input name="pasal" type="hidden" value=' . $spasal . '></input>
          <input name="awal" type="hidden" value=' . $sawal . '></input>
          <input name="akhir" type="hidden" value=' . $sakhir . '></input>
          <input name="renungan" type="hidden" value=' . $renungan . '></input>
          <button type="submit" name = "aksi" value = "baca" class ="btn btn-primary">Baca Ayat</button >
          <button type="submit" name = "aksi" value = "' . $aksinya . '" class ="btn ' . $btcolor . '" >' . $btnset . '</button >
          </form> 
   
          </div>
          </div> <br>';
      }



      if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $aksi = $_POST["aksi"];

        $puser = $_POST["user"];
        $pgroup = $_POST["group"];
        $palkitab = $_POST["alkitab"];
        $pkitab = $_POST["kitab"];
        $ppasal = $_POST["pasal"];
        $pawal = $_POST["awal"];
        $pakhir = $_POST["akhir"];
        $prenungan = '';
        $prenungan = $_POST["renungan"];

        if ($aksi == "tandai") {
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
        } elseif ($aksi == "bacakembali") {
          if (isset($puser) && isset($pgroup) && isset($palkitab)) {
            $sqlupdate = "UPDATE detail_group
          SET sudah_baca = 0 , sudah_baca_at = NULL
          WHERE id_user = ?
          and id_group = ?
          and id_alkitab = ?";
            $stmt = $pdo->prepare($sqlupdate);
            $stmt->execute([$puser, $pgroup, $palkitab]);
            if ($stmt == false) {
              $error = "Update failed. Please try again.";
            } else {
              echo "<script type='text/javascript'>" .
                "alert('Berhasil update mengulang bacaan.');
              window.location.assign(window.location.href);" .
                "</script>";
              exit;
            }
          }
        } elseif ($aksi == "baca") {
          if (isset($pkitab) && isset($ppasal) && isset($pawal) && isset($pakhir) && isset($prenungan)) {
            echo "  <script>
        $.ajax({
                                url: 'get_preview_renungan.php',
                                method: 'POST',
                                data: {
                                    kitab: '" . $pkitab . "',
                                    pasal: " . $ppasal . ",
                                    awal: " . $pawal . ",
                                    akhir: " . $pakhir . ",
                                    renungan: '" . $prenungan . "',
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
            </script>";
          }
        }
      }
      ?>
    </div>

  </section>

  <div class="modal fade" id="preview-renungan-modal" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="previewRenunganLabel">Preview Renungan</h5>
        </div>
        <div class="modal-body">
          <div class="container">
            <div class="row">
              <div class="col-md-6" id="preview-firman">
              </div>
              <div class="col-md-4 ">
                <div class="row mb-5" id="preview-ayat" style=" max-width: 250px;"></div>
                <div class="row" id="preview-renungan" style=" max-width: 250px;"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-dark" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <?php require_once('user_footer.php'); ?>
</body>
</html>