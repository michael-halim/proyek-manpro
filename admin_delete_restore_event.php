<?php
include 'connect.php';
header('Content-type: application/json');
date_default_timezone_set("Asia/Bangkok");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id_event = $_POST['checkedIdEvent'];
    $type = $_POST['type'];

    $deletedAt = date("Y-m-d H:i:s");
    $deletedBy = $_SESSION['email'];


    if ($type === 'DELETE') {
        $isActiveStatus = 0;
    } else if ($type === 'RESTORE') {
        $isActiveStatus = 1;
    }

    $sql = "UPDATE event 
            SET isActive = ?,
                deletedAt = ?,
                deletedBy = ?
            WHERE id = ?";


    $stmt = $pdo->prepare($sql);
    $stmt->execute([$isActiveStatus, $deletedAt, $deletedBy, $id_event]);

    $notif = '';
    if ($stmt) {
        $notif = 'Operation Done Successfuly';
    }

    $output = '';

    echo json_encode(array('output' => $output, 'notif' => $notif));
}
