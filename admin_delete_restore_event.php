<?php
include 'connect.php';
header('Content-type: application/json');
date_default_timezone_set("Asia/Bangkok");

// FILE UNTUK RESPONSE DELETE DAN RESTORE EVENT
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Dapetin info dari Ajax
    $id_event = $_POST['checkedIdEvent'];
    $type = $_POST['type'];

    $deletedAt = date("Y-m-d H:i:s");
    $deletedBy = $_SESSION['email'];

    // Bisa untuk DELETE dan RESTORE, kalau type nya DELETE nti isActive diubah jadi 0 dan sebaliknya
    if ($type === 'DELETE') {
        $isActiveStatus = 0;
    } else if ($type === 'RESTORE') {
        $isActiveStatus = 1;
    }

    // SQL untuk DELETE / RESTORE dan isi deletedAt dan deletedBy
    $sql = "UPDATE event 
            SET isActive = ?,
                deletedAt = ?,
                deletedBy = ?
            WHERE id = ?";

    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$isActiveStatus, $deletedAt, $deletedBy, $id_event]);

    // Beri Notif bila sukses
    $notif = 'Not Successful';
    if ($stmt) {
        $notif = 'Operation Done Successfuly';
    }

    $output = '';

    echo json_encode(array('output' => $output, 'notif' => $notif));
}