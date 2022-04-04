<?php
include 'connect.php';
header('Content-type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $checkedIdEvent = $_POST['checkedIdEvent'];

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
