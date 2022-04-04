<?php
include 'connect.php';
header('Content-type: application/json');
date_default_timezone_set("Asia/Bangkok");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id_alkitab = $_POST['id_alkitab'];
    $type = $_POST['type'];


    if ($type === 'DELETE') {
        $isActiveStatus = 0;
    } else if ($type === 'RESTORE') {
        $isActiveStatus = 1;
    }
    
    $output = '';


    $deletedAt = date("Y-m-d H:i:s");
    $deletedBy = $_SESSION['email'];


    for ($i = 0; $i < count($id_alkitab); $i++) {
        $sql = "UPDATE alkitab SET isActive = ? , 
                                    deletedAt = ? , 
                                    deletedBy = ?
                WHERE id = ?";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([$isActiveStatus, $deletedAt, $deletedBy, $id_alkitab[$i]]);
    }


    $notif = '';
    echo json_encode(array('output' => $output, 'notif' => $notif));
}
