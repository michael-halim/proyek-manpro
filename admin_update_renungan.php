<?php
include 'connect.php';
header('Content-type: application/json');
date_default_timezone_set("Asia/Bangkok");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $updatedAyat = $_POST['updatedAyat'];
    $updatedRenungan = $_POST['updatedRenungan'];
    $id_alkitab = $_POST['id_alkitab'];
    $output = '';

            
    $updatedAt = date("Y-m-d H:i:s");
    $updatedBy = $_SESSION['email'];


    for($i = 0; $i < count($id_alkitab) ; $i++){
        $sql = "UPDATE alkitab SET ayat = ? , 
                                    renungan = ? , 
                                    updatedAt = ?, 
                                    updatedBy = ?
                WHERE id = ? ";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([$updatedAyat[$i], $updatedRenungan[$i], $updatedAt, $updatedBy, $id_alkitab[$i] ]);
    }
    

    $notif = '';
    echo json_encode(array('output' => $output, 'notif' => $notif));
}
