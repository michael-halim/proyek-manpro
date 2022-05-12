<?php
include 'connect.php';
if (!isset($_SESSION['email'])) {
	// if ($_SESSION['email'] == "admin@gmail.com") {
	// 	header('location: mobile_admin_home.php');
	// } else {
		header("Location: login.php");
	// }

	// echo $_SESSION['email'];
	// echo date("Y-m-d H:i:s");
	
}
?>
<!DOCTYPE html>
<html>
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




<script src="assets/user/js/scripts.min.js"></script>
  <script src="assets/user/js/main.min.js"></script>
  <script src="assets/user/js/custom.js"></script>
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
<?php
$q = @intval($_GET['q']);
    $emailnya = $_SESSION["email"];
    $sql = "SELECT ayat,renungan,sudah_baca,sudah_baca_at,id_user,id_alkitab,id_group 
              FROM alkitab ,detail_group 
                JOIN user 
                  where detail_group.id_user = user.id 
                  and detail_group.id_alkitab = alkitab.id 
                  and user.email=?";
    //echo $sql;

    // $result = $link -> query($sql);
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$emailnya]);


      
     while ($row = $stmt->fetch())
     {
      $iduser = $row["id_user"];
      $idgroup = $row["id_group"];
      $idalkitab = $row["id_alkitab"];
      $ayat = $row["ayat"];
      $renungan = $row["renungan"];
      $sb = $row["sudah_baca"];
      $sbt = $row["sudah_baca_at"];

      if($sb == true)
      {
        $sb = "Sudah dibaca";
      }
      else{
        $sb = "Belum dibaca";
      }

     echo'<div class="card bg-info">
     <div class="card-header bg-primary text-white">
     <h1 class="text-white">'.$renungan.'</h1>
     </div>
     <div class="card-body">
     <i>'.$iduser.'</i>
     <i>'.$idgroup.'</i>
     <i>'.$idalkitab.'</i>
     <i>'.$sb.'</i>
       <p class="card-text">'.$ayat.'</p>
       <form method="post" action="">
       <input name="user" type="hidden" value='.$iduser.'></input>
       <input name="group" type="hidden" value='.$idgroup.'></input>
       <input name="alkitab" type="hidden" value='.$idalkitab.'></input>
       <a href="#" class="btn btn-primary">Baca Ayat</a>
       <button type="submit" class ="btn btn-success">Sudah dibaca</button>
       </form>
     </div>
   </div> <br>';
  
     }
?>
</body>
</html>