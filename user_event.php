<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <title>Detail Event</title>
<?php require_once 'user_navbar.php' ?>

</head>

<body>

<header role="banner" class="probootstrap-header img-responsive">
    <?php //require_once('user_navbar.php') ?>
    <section class="probootstrap-intro" style="height: 600px;">
      <center>
<h1>Event</h1>
      </center>
    </section>
  </header>
  <section class="probootstrap-section probootstrap-section-extra">
    <div class="container">
    <?php
    require_once 'connect.php';
$emailnya = $_SESSION["email"];
$sql = "SELECT user.id as uid ,event.id as eid,event.nama,jenis,tempat,link,absen,alasan,event.updatedAt,event.updatedBy
FROM event,detail_event
  JOIN user 
    where detail_event.id_user = user.id
    and event.id = detail_event.id_event
    and user.email=?";

$stmt = $pdo->prepare($sql);
$stmt->execute([$emailnya]);

while ($row = $stmt->fetch()) {
$uid = $row["uid"];
$eid = $row["eid"];
  $namaevent = $row["nama"];
  $jenis = $row["jenis"];
  $tempat = $row["tempat"];
  $elink = $row["link"];
  $uat = $row["absen"];
  $alasan = $row["alasan"];
  $sb = $row["updatedAt"];
  $sbt = $row["updatedBy"];

  $btnset = "";

  if ($uat == true) {
    $txtt = "Berhalangan hadir ke acara ";
    $aksinya = "bacakembali";
    $btnset = "Tandai Hadir";
    $btcolor = "btn-success";
  } else {
    $txtt = "Dapat hadir di acara";
    $aksinya = "tandai";
    $btnset = "Berhalangan";
    $btcolor = "btn-warning";
  }
  echo '<div class="card bg-info">
  <div class="card-header bg-primary text-white">
  <h1 class="text-white text-center">' . $namaevent . '</h1>
  </div>
  <div class="card-body">
  <div class="container">
  <label>Status: </label> <br>
  <i>' . $txtt . '</i>
  <br>
  <label>Acara: </label> <br>
  <i>'.$jenis.'</i>
  <br>
  <label>Lokasi: </label> <br>
  <i>' . $tempat . '</i>
  <br>
  <a href = "'.$elink.' "><i>' . $elink . '</i></a>
  <br>
  <label>Alasan: </label> <br>';

   if ($uat == true) {
     echo '<p>' . $alasan  . '</p>';
   }


   echo '
    <form method="post" action="">
    <input name="user" type="hidden" value=' . $uid . '></input>
    <input name="event" type="hidden" value=' . $eid . '></input>';
    if($uat != true)
    {
        echo '<textarea name="alasan" type="text" rows="4" style="width:40%;" value=' . $alasan . ' style="width:100%"></textarea><br> <br>';
    }
    else{
        echo
        '<input name="alasan" type="hidden" value=' . $alasan . '></input required>';
    }
    echo
    '<button type="submit" name = "aksi" value = "' . $aksinya . '" class ="btn ' . $btcolor . '" >' . $btnset . '</button >
    </form> 

    </div>
    </div> <br></div><br>';
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $aksi = $_POST["aksi"];

    $puser = $_POST["user"];
    $pgroup = $_POST["event"];
    $palasan = $_POST["alasan"];


    if ($aksi == "tandai") {
      if (isset($puser) && isset($pgroup) && isset($palasan)) {
        $sqlupdate = "UPDATE detail_event
      SET absen = 1 ,updatedAt = now() , alasan = ?
      WHERE id_user = ?
      and id_event = ?";
        $stmt = $pdo->prepare($sqlupdate);
        // $stmt->bind_param('sss', );
        $stmt->execute([$palasan,$puser, $pgroup]);
        if ($stmt == false) {
          $error = "Update failed. Please try again.";
        } else {
          echo "<script type='text/javascript'>" .
            "alert('Berhasil update berhalangan pada event.');
          window.location.assign(window.location.href);" .
            "</script>";
          exit;
        }
      }
    } elseif ($aksi == "bacakembali") {
      if (isset($puser) && isset($pgroup) && isset($palasan)) {
        $sqlupdate = "UPDATE detail_event
        SET absen = 0 ,updatedAt = '', alasan = ''
        WHERE id_user = ?
        and id_event = ?";
        $stmt = $pdo->prepare($sqlupdate);
        $stmt->execute([$puser, $pgroup]);
        if ($stmt == false) {
          $error = "Update failed. Please try again.";
        } else {
          echo "<script type='text/javascript'>" .
            "alert('Berhasil update event.');
          window.location.assign(window.location.href);" .
            "</script>";
          exit;
        }
      }
    } 
  }




?>
</div>
    </div>

  </section>

  <?php require_once('user_footer.php'); ?>
</body>

</html>