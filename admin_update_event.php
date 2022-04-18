<?php
include 'connect.php';
header('Content-type: application/json');
date_default_timezone_set("Asia/Bangkok");

// FILE UNTUK HANDLE UPDATE EVENT
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil info dari Ajax
    $id_event = $_POST['id'];
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $tempat = $_POST['tempat'];
    $link = $_POST['link'];

    $updatedAt = date("Y-m-d H:i:s");
    $updatedBy = $_SESSION['email'];

    // SQL untuk Update Event
    $sql = "UPDATE event 
            SET nama = ?, 
                jenis = ?, 
                tempat = ?, 
                link = ?,
                updatedAt = ?,
                updatedBy = ?
            WHERE id = ?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nama, $jenis, $tempat, $link, $updatedAt, $updatedBy, $id_event]);

    $notif = '';
    if ($stmt) {
        $notif = 'Updated Successfuly';
    }

    $output = '';

    echo json_encode(array('output' => $output, 'notif' => $notif));
}