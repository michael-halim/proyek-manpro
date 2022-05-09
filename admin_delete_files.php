<?php
include "connect.php";
$id = $_GET['id'];
$aktif = 0;
$deletedBy = $_SESSION['email'];
$sql = "UPDATE content 
        SET isActive = ?, 
            deletedAt = NOW(),
            deletedBy = ? 
        WHERE id = $id";

$stmt = $pdo->prepare($sql);
$stmt->execute([$aktif, $deletedBy]);
header('Location: admin_files.php');
