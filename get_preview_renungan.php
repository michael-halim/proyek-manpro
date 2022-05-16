<?php
include 'connect.php';
header('Content-type: application/json');
date_default_timezone_set("Asia/Bangkok");

// FILE UNTUK HANDLE REQUEST PREVIEW RENUNGAN
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil info dari Ajax
    $kitab = $_POST['kitab'];
    $pasal = $_POST['pasal'];
    $awal = $_POST['awal'];
    $akhir = $_POST['akhir'];
    $renungan = $_POST['renungan'];

    // SQL Untuk Ambil Firman Sesuai Request
    $sql = "SELECT firman
            FROM isi_alkitab AS ia
            WHERE ia.kitab = ?
            AND ia.pasal = ?
            AND ia.ayat >= ? AND ia.ayat <= ?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$kitab, $pasal, $awal, $akhir]);

    // Ambil Firman dan Tampilkan dalam Input Disabled
    $firman = '';
    while ($row = $stmt->fetch()) {
        $firman .= $row['firman'];
    }

    $outputFirman = '<i class="fas fa-user prefix grey-text"> </i> <label class="form-label">Preview Firman</label>
                    <textarea class="form-control" style=" max-width: 565px; height:500px;" type="text" value="' . $firman . '" disabled >' . $firman . '</textarea>';


    // Ambil Ayat dan Di Format
    $formatAyat = ucwords($kitab) . ' ' . $pasal . ':' . $awal;
    if ($awal != $akhir) {
        $formatAyat .= '-' . $akhir;
    }

    // Tampilkan Ayat dan Renungan Dalam Input Disabled
    $outputAyat = '<span><i class="fas fa-user prefix grey-text"> </i> <label class="form-label"> Ayat</label>
                    <input id="content-ayat" type="text" class="form-control"  style=" max-width: 565px;" disabled value="' . $formatAyat  . '"></span>';

    $outputRenungan = '<span><i class="fas fa-user prefix grey-text"> </i> <label class="form-label"> Renungan</label>
                    <textarea id="content-renungan" class="form-control" height:300px;" style=" max-width: 565px;" type="text" value="' . $renungan . '" disabled >' . $renungan . '</textarea></span>';

    $notif = '';

    echo json_encode(array(
        'outputFirman' => $outputFirman,
        'outputAyat' => $outputAyat,
        'outputRenungan' => $outputRenungan,
        'notif' => $notif
    ));
}
