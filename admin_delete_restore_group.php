<?php
include 'connect.php';
header('Content-type: application/json');
date_default_timezone_set("Asia/Bangkok");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_group = $_POST['id'];
    $newStatus = $_POST['newStatus'];


    $deletedAt = date("Y-m-d H:i:s");
    $deletedBy = $_SESSION['email'];


    $sql = "UPDATE group_alkitab SET isActive = ? , 
                                    deletedAt = ?, 
                                    deletedBy = ?
            WHERE id = ? ";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$newStatus, $deletedAt, $deletedBy, $id_group]);


    $output = '';
    $notif = 'Query Not Successful';
    if ($stmt) {
        $notif = 'Query Successful';
    }
    echo json_encode(array('output' => $output, 'notif' => $notif));
}
