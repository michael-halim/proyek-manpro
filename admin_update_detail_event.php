<?php
include 'connect.php';
header('Content-type: application/json');
date_default_timezone_set("Asia/Bangkok");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil info dari Ajax
    $absen = $_POST['absen'];
    $alasan = $_POST['alasan'];
    $id_detail_event = $_POST['checkedIdDetailEvent'];

    $updatedAt = date("Y-m-d H:i:s");
    $updatedBy = $_SESSION['email'];

    // Update Detail Event sesuai yang dicentang
    for ($i = 0; $i < count($id_detail_event); $i++) {
        $sql = "UPDATE detail_event 
                SET absen = ?, 
                    alasan = ?, 
                    updatedAt = ? , 
                    updatedBy = ? 
                WHERE id = ?";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([$absen[$i], $alasan[$i], $updatedAt, $updatedBy, $id_detail_event[$i]]);
    }

    $notif = 'Query Successful';
    $output = '';

    echo json_encode(array('output' => $output, 'notif' => $notif));
}