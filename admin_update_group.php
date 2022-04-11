<?php
include 'connect.php';
header('Content-type: application/json');
date_default_timezone_set("Asia/Bangkok");

// FILE UNTUK HANDLE UPDATE GROUP   
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil info dari Ajax
    $id_group = $_POST['id'];
    $updatedName = $_POST['updatedName'];

    $updatedAt = date("Y-m-d H:i:s");
    $updatedBy = $_SESSION['email'];

    // SQL untuk update group
    $sql = "UPDATE group_alkitab 
            SET nama = ? , 
                updatedAt = ?, 
                updatedBy = ?
            WHERE id = ? ";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([ $updatedName, $updatedAt, $updatedBy, $id_group ]);

    $output = '';
    $notif = 'Query Not Successful';
    if($stmt){
        $notif = 'Query Successful';
    }
    echo json_encode(array('output' => $output, 'notif' => $notif));
}