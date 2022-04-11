<?php
include 'connect.php';
header('Content-type: application/json');
date_default_timezone_set("Asia/Bangkok");

// FILE UNTUK RESPONSE DELETE DAN RESTORE RENUNGAN
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Dapetin info dari Ajax
    $id_alkitab = $_POST['id_alkitab'];
    $type = $_POST['type'];

    $deletedAt = date("Y-m-d H:i:s");
    $deletedBy = $_SESSION['email'];

    // Bisa untuk DELETE dan RESTORE, kalau type nya DELETE nti isActive diubah jadi 0 dan sebaliknya
    if ($type === 'DELETE') {
        $isActiveStatus = 0;
    } else if ($type === 'RESTORE') {
        $isActiveStatus = 1;
    }

    $output = '';

    // SQL untuk DELETE / RESTORE dan isi deletedAt dan deletedBy setiap id alkitab yang dipilih
    for ($i = 0; $i < count($id_alkitab); $i++) {
        $sql = "UPDATE alkitab 
                SET isActive = ? , 
                    deletedAt = ? , 
                    deletedBy = ?
                WHERE id = ?";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([$isActiveStatus, $deletedAt, $deletedBy, $id_alkitab[$i]]);
    }

    $notif = '';
    echo json_encode(array('output' => $output, 'notif' => $notif));
}