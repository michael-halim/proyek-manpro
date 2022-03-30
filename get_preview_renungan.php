<?php
include 'connect.php';
header('Content-type: application/json');
date_default_timezone_set("Asia/Bangkok");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $kitab = $_POST['kitab'];
    $pasal = $_POST['bab'];
    $awal = $_POST['awal'];
    $akhir = $_POST['akhir'];
    $renungan = $_POST['renungan'];

    $sql = "SELECT firman
            FROM isi_alkitab AS ia
            WHERE ia.kitab = ?
            AND ia.pasal = ?
            AND ia.ayat >= ? AND ia.ayat <= ?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$kitab, $pasal, $awal, $akhir]);

    $firman = '';

    while ($row = $stmt->fetch()) {
        $firman .= $row['firman'];
    }

    $outputFirman = '<i class="fas fa-user prefix grey-text"> </i> <label class="form-label">Preview Firman</label>
                    <textarea class="form-control" style="width:100%; height:500px;" type="text" value="' . $firman . '" disabled >' . $firman . '</textarea>';


    $formatAyat = ucwords($kitab) . ' ' . $pasal . ':' . $awal;
    if ($awal != $akhir) {
        $formatAyat .= '-' . $akhir;
    }

    $outputAyat = '<span><i class="fas fa-user prefix grey-text"></i><label class="form-label">Ayat</label>
                    <input type="text" class="form-control" disabled value="' . $formatAyat  . '"></span>';

    $outputRenungan = '<span><i class="fas fa-user prefix grey-text"> </i> <label class="form-label">Renungan</label>
                    <textarea class="form-control" style="width:100%; height:300px;" type="text" value="' . $renungan . '" disabled >' . $renungan . '</textarea></span>';
    
    $notif = '';

    echo json_encode(array('outputFirman' => $outputFirman, 'outputAyat' => $outputAyat, 'outputRenungan' => $outputRenungan, 'notif' => $notif));
}
