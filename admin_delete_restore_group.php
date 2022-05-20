<?php
include 'connect.php';
header('Content-type: application/json');
date_default_timezone_set("Asia/Bangkok");

// FILE UNTUK RESPONSE DELETE DAN RESTORE GROUP
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Dapetin info dari Ajax
    $id_group = $_POST['id'];
    $newStatus = $_POST['newStatus'];


    $deletedAt = date("Y-m-d H:i:s");
    $deletedBy = $_SESSION['email'];

    // SQL untuk DELETE / RESTORE dan isi deletedAt dan deletedBy
    $sql = "UPDATE group_alkitab 
            SET isActive = ? , 
                deletedAt = ?, 
                deletedBy = ?
            WHERE id = ? ";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$newStatus, $deletedAt, $deletedBy, $id_group]);

    $output = '';
    // Beri Notif bila sukses
    $notif = 'Query Not Successful';
    if ($stmt) {
        $notif = 'Query Successful';
    }
    echo json_encode(array('output' => $output, 'notif' => $notif));
}
