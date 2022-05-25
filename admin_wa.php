<?php
if (isset($_GET['stat'])) {
  $stat = $_GET['stat'];
  if ($stat == 1) {
    echo "<script>alert('File Uploaded Successfuly');";
  }
  $hp_wa="";
  $pesan = "";
  echo "window.location.href = 'admin_home.php'";
  echo "</script>";
}
?>
<!DOCTYPE html>
<html>
<?php
include 'connect.php';

?>
<head>
  <title>Proyek Tekweb</title>
  <?php include('assets/header.php'); ?>
  <link rel="stylesheet" type="text/css" href="assets/css/admin_sidebar.css">
  <link rel="stylesheet" type="text/css" href="assets/css/admin_home.css">
  <link rel="stylesheet" type="text/css" href="assets/css/admin_home_style.css">

  <script>
    $(document).ready(function() {});
  </script>
</head>

<body>
  <div class="row">
    <?php include('assets/admin_sidebar.php'); ?>

    <div class="asd">
      <div >
    <?php
    if (isset($_GET['add'])){
        if(isset($_GET['gethp']) && isset($_GET['getpesan'] )){
            $hp_wa=$_GET['gethp'];
            foreach ($hp_wa as $hp_wa){
                $wa = $hp_wa;
                echo "<br>";
                $pesan = $_GET['getpesan'];
                //api wa
            $token = "AsRQ4zyAJqPKjc3bk1eFzC4FbnP44yv5L5tcshLDvYKDqJMLNj";
            //$phone = "085290309236"; //untuk group pakai groupid contoh: 62812xxxxxx-xxxxx
            $phone = $wa; //untuk group pakai groupid contoh: 62812xxxxxx-xxxxx
            $message = $pesan;
            $messageid= "2EFD576575BF1741C3530xxxxxxxxx"; //optional

            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://app.ruangwa.id/api/send_express',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'token='.$token.'&number='.$phone.'&message='.$message.'&messageid='.$messageid,
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            echo $response;
            }
        }
    }
    ?>

    <form method="get" action="admin_wa.php">
        <div class="form-group">
            <label for="exampleInputEmail1">Pesan</label>
            <textarea name="getpesan" class="form-control" id="exampleFormControlTextarea1" rows="6" style="width:auto;" placeholder="masukan pesan"></textarea>
        </div>
        
        <button type="submit" name="add" class="btn btn-primary">Send</button>

        <table style="background-color:whitesmoke;width:100%" class="table">
          <tr>
            <th>Check</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Hp</th>
           
          </tr>
        
        <?php
       
        $sql = "SELECT DISTINCT nama,email,hp,ketua 
                FROM user 
                JOIN detail_group 
                WHERE user.id=detail_group.id_user ;";
        //echo $sql;

        // $result = $link -> query($sql);

        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        while ($row = $stmt->fetch()) {
          $nama = $row["nama"];
          $email = $row["email"];
          $hp = $row["hp"];
          $ketua = $row["ketua"];
          echo"<tr>";
                echo"<th><input type='checkbox' name='gethp[]' value=$hp></th>";
                echo"<th>$nama</th>";
                echo"<th>$email</th>";
                echo"<th>$hp</th>";
          echo"</tr>";  
        }
        ?>
        </table>
      </div>
    </form>
</body>

</html>