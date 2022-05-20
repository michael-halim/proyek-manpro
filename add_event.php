<?php
include 'connect.php';
header('Content-type: application/json');
date_default_timezone_set("Asia/Bangkok");

// FILE UNTUK HANDLE ADD EVENT REQUEST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // dapetin semua data dari POST
    $event = $_POST['event'];
    $jenis = $_POST['jenis'];
    $tempat = $_POST['tempat'];
    $link = $_POST['link'];
    $id_group = $_POST['id_group'];
    $isInGroup = $_POST['isInGroup'];

    $now = date("Y-m-d H:i:s");
    $createdBy = $_SESSION['email'];

    // Masukkan data ke table event di DB
    $sql = "INSERT INTO event (id, nama, jenis, tempat, link, createdAt, createdBy, updatedAt, updatedBy, isActive, deletedAt, deletedBy)
            VALUES (DEFAULT, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$event, $jenis, $tempat, $link, $now, $createdBy, NULL, '', 1, NULL, '']);


    // kalau klik submit modal waktu di dalam group
    if($isInGroup){

        // dapetin id event yang baru aja di masukan
        $sql = "SELECT id FROM event 
                WHERE nama = ? AND jenis = ? AND tempat = ? AND link = ? AND createdAt = ? and createdBy = ?";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([ $event, $jenis, $tempat, $link, $now, $createdBy ]);

        $id_event = $stmt->fetch()['id'];


        // dapetin semua id_user untuk masukkan data ke detail_event
        $sql = "SELECT dg.id_user AS id_user
                FROM detail_group AS dg
                JOIN user AS u 
                ON u.id = dg.id_user
                WHERE id_group = ?
                GROUP BY id_user";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([ $id_group ]);


        // Masukkan data ke detail event
        while($row = $stmt->fetch()){
                $sql = "INSERT INTO detail_event (id, id_group, id_user, id_event, absen, alasan, updatedAt, updatedBy)
                        VALUES (DEFAULT,?,?,?,?,?,?,?)";

                $stmtInsert = $pdo->prepare($sql);
                $stmtInsert->execute([$id_group, $row['id_user'], $id_event, 0, '', NULL, '']);
        }
        
        $notif = 'Query Successful';
    }

    $output = '';

    echo json_encode(array('output' => $output, 'notif' => $notif));
}