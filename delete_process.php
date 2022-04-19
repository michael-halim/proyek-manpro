<?php
include "connect.php";
$id = $_GET['id'];
$aktif = 0;
$sql = "update content set active = $aktif, deletedAt = now() where id = $id";
$pdo -> exec($sql);
header('location:aksi.php')
?>