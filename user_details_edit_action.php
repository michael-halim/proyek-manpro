<?php
include "connect.php";

if (isset($_POST['submit'])) {
  $sql = "UPDATE detail_event 
  SET absen = ?,
  alasan = ?,
	  updatedAt = NOW(),
	  updatedBy = ?
  WHERE id_group = ? AND id_event = ? AND id_user = ?";

  $stmt = $pdo->prepare($sql);

  $idg = $_GET['idg'];
  $ide = $_GET['ide'];
  $idu = $_GET['idu'];
  $updatedBy = $_SESSION['email'];
  $absen=$_POST['absen'];
  $alasan=$_POST['alasan'];
  $stmt->execute(array($absen, $alasan, $updatedBy, $idg, $ide, $idu));
header('Location: user_details.php');
}
?>

