<?php
include 'connect.php';
header('Content-type: application/json');

// FILE UNTUK MENDAPATKAN SEMUA KITAB DARI DB
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Ambil info dari Ajax
    $id_group = $_GET['id_group'];

    // SQL untuk ambil Maximum dari Pasal Tiap Kitab dan Nama Kitab
    $sql = "SELECT MAX(pasal) AS total_bab, 
                    kitab
            FROM isi_alkitab
            GROUP BY kitab
            ORDER BY id";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    
    if ($stmt) {
        $output = '<option value="" hidden>Kitab</option>';
        while ($row = $stmt->fetch()) {
            $output .= '<option data-max="' . $row['total_bab'] . '" 
                                value="' . $row['kitab'] . '">' .
                ucwords($row['kitab'])  .
                '</option>';
        }
    }

    $notif = '';

    echo json_encode(array('output' => $output, 'notif' => $notif, 'id_group' => $id_group));
}