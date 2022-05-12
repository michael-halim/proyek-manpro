<!DOCTYPE html>
<html>
<head>
<style>
table {
  width: 100%;
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid black;
  padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>
<?php require_once('user_navbar.php') ?>
<?php
$q = intval($_GET['q']);
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