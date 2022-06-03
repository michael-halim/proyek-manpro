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
      font-family: 'Roboto', sans-serif;
    }


    .responsive {
      width: 100%;
      height: auto;
    }

    /* table,
    th,
    td {
      border: 2px solid black;
    } */
    table{
  width:100%;
  table-layout: fixed;
}
.tbl-header{
  background-color: rgba(255,255,255,0.9);
 }
.tbl-content{
  /* height:0px; */
  overflow-x:auto;
  margin-top: 0px;
  border: 1px solid rgba(255,255,255,0.9);
}
th{
  padding: 20px 15px;
  text-align: left;
  font-weight: 500;
  font-size: 18px;
  color: #000;
  text-transform: uppercase;
}
td{
  padding: 15px;
  text-align: left;
  vertical-align:middle;
  font-weight: 300;
  font-size: 15px;
  color: #000;
  border-bottom: solid 1px rgba(255,255,255,0.9);
  background: rgba(255,255,255,0.5);
}

::-webkit-scrollbar {
    width: 6px;
} 
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
} 
::-webkit-scrollbar-thumb {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
}
  </style>
</head>

<body>
  <header role="banner" class="probootstrap-header">
    <div class="container-fluid">
      <?php require_once('user_navbar.php') ?>
      <section class="probootstrap-intro">
          <?php
          if ($_SESSION['statusJabatan'] == 'ketua') {
              echo'
              <div class="row mb50">
                    <div class="col-md-12 section-heading text-center" >
                      <h2 style="font-family: Georgia, serif;">Daftar Grup</h2>
                    </div>
                </div>';
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
              echo "<div style='background-color:#D3C4A5;border-radius:500px;margin-top:10px;opacity:0.8;width:50%;text-align:center;margin-left:25%;'>
          <a href='ketua_detail_group.php?idg=" . $row['idg'] . "'><h1 style='padding:10px'>" . $row['nama_group'] . "</h1></a>
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
  echo '<div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>Nama</th>
          <th>Status</th>
        </tr>
      </thead>
    </table>
  </div>';

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
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$emailnya]);

            while ($row = $stmt->fetch()) {
              $nama = $row["nama"];
              $email = $row["email"];
              $hp = $row["hp"];
              $ketua = $row["ketua"];
              echo '<div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
        <tr>';
          echo "<td>$nama</td>";
          if ($ketua == 1) {
            echo '<td>Ketua</td>';
          }
          if ($ketua == 0) {
            echo '<td>Anggota</td>';
          }
          echo '</tr>';
              // echo "<tr>";
              // echo "<th>$nama</th>";
              // echo "<th>$email</th>";
              // echo "<th>$hp</th>";
              // if ($ketua == 1) {
              //   echo "<th>Ketua</th>";
              // }
              // if ($ketua == 0) {
              //   echo "<th>Anggota</th>";
              // }
              // echo "</tr>";
            }
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
          }
          ?>
        </div>
      </section></div></header>
  <?php require_once('user_footer.php'); ?>
</body>

</html>