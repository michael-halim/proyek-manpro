<?php
include 'connect.php';
header('Content-type: application/json');
date_default_timezone_set("Asia/Bangkok");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    
    // Masukkan data ke table event di DB
    $sql = "INSERT INTO alkitab (id, ayat, renungan, createdAt, createdBy, updatedAt, updatedBy, isActive, deletedAt, deletedBy)
            VALUES (DEFAULT, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$event, $jenis, $tempat, $link, $now, $createdBy, NULL, '', 1, NULL, '']);



    $output = '';

    echo json_encode(array('output' => $output, 'notif' => $notif));
}
