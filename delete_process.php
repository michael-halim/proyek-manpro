<?php
include "connect.php";

$aktif = 0;
$get_id=$_GET['id'];
$sql = "Update content SET active = $aktif, deletedAt = now() where id = '$get_id'";
$pdo->exec($sql);


header('location:aksi.php');
?>