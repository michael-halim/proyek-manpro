<?php
include 'connect.php';
header('Content-type: application/json');
date_default_timezone_set("Asia/Bangkok");

// FILE UNTUK HANDLE UPDATE RENUNGAN
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil info dari Ajax
    $updatedAyat = $_POST['updatedAyat'];
    $updatedRenungan = $_POST['updatedRenungan'];
    $id_alkitab = $_POST['id_alkitab'];

    $updatedAt = date("Y-m-d H:i:s");
    $updatedBy = $_SESSION['email'];

    // SQL untuk Update ayat dan renungan setiap id alkitab yang unik 
    for ($i = 0; $i < count($id_alkitab); $i++) {
        $sql = "UPDATE alkitab 
                SET ayat = ? , 
                    renungan = ? , 
                    updatedAt = ?, 
                    updatedBy = ?
                WHERE id = ? ";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([$updatedAyat[$i], $updatedRenungan[$i], $updatedAt, $updatedBy, $id_alkitab[$i]]);
    }

    $output = '';
    $notif = '';
    echo json_encode(array('output' => $output, 'notif' => $notif));
}