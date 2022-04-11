<?php
include 'connect.php';
header('Content-type: application/json');

// FILE UNTUK POPULATE ISI FORM UNTUK UPDATE
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil info dari Ajax
    $checkedIdEvent = $_POST['checkedIdEvent'];

    // SQL untuk ambil id event, nama event, jenis event, tempat event, dan link event
    $sql = "SELECT e.id AS id_event,
                    e.nama AS nama,
                    e.jenis AS jenis,
                    e.tempat AS tempat,
                    e.link AS link
            FROM event AS e
            WHERE id = ? 
            LIMIT 1";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$checkedIdEvent]);
    $data = $stmt->fetch();

    $notif = '';
    $output = '';

    echo json_encode(array(
        'output' => $output, 'notif' => $notif,
        'id_event' => $data['id_event'],
        'nama' => $data['nama'],
        'jenis' => $data['jenis'],
        'tempat' => $data['tempat'],
        'link' => $data['link']
    ));
}