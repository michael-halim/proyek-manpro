<?php
include 'connect.php';
header('Content-type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $id_group = $_POST['id'];
    $group_name = $_POST['group_name'];
    $output = '';
    $notif = '';
    $sql = "SELECT u.nama AS nama, 
                    u.email AS email,
                    a.ayat AS ayat, 
                    a.renungan AS renungan ,
                    a.createdAt AS created,
                    a.updatedAt AS updated,
                    dg.sudah_baca AS baca,
                    dg.sudah_baca_at AS baca_at
            FROM detail_group AS dg
            JOIN alkitab AS a 
            ON a.id = dg.id_alkitab
            JOIN user AS u 
            ON u.id = dg.id_user
            JOIN group_alkitab AS ga
            WHERE dg.id_group = ? AND ga.nama = ?
            ORDER BY created DESC";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id_group, $group_name]);

    

    echo json_encode(array('output' => $output, 'notif' => $notif));
}
