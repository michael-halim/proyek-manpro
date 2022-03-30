<?php
include 'connect.php';
header('Content-type: application/json');
date_default_timezone_set("Asia/Bangkok");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // dapetin data dari POST Ajax
    $ayat = $_POST['ayat'];
    $renungan = $_POST['renungan'];
    $createdAt = date("Y-m-d H:i:s");
    $createdBy = $_SESSION['email'];
    $id_group = $_POST['id_group'];

    // Masukkan data ke table alkitab di DB
    $sql = "INSERT INTO alkitab (id, ayat, renungan, createdAt, createdBy, updatedAt, updatedBy, isActive, deletedAt, deletedBy)
            VALUES (DEFAULT, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$ayat, $renungan, $createdAt, $createdBy, NULL, '', 1, NULL, '']);

    $notif = 'Unsuccessful';
    if ($stmt) {
        // dapetin id alkitab yang baru aja di masukkan
        $sql = "SELECT id FROM alkitab 
                WHERE ayat = ? AND renungan = ? AND createdAt = ? AND createdBy = ?";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([$ayat, $renungan, $createdAt, $createdBy]);

        $id_alkitab = $stmt->fetch()['id'];

        // dapetin semua user dengan id_group yang sama
        $sql = "SELECT dg.id_user AS id_user
                FROM detail_group AS dg
                JOIN user AS u 
                ON u.id = dg.id_user
                WHERE id_group = ? AND  
                        u.ketua = 0
                GROUP BY id_user";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id_group]);


        // Masukkan data ke detail event
        while ($row = $stmt->fetch()) {
            $sql = "INSERT INTO detail_group (id, id_group, id_user, id_alkitab, sudah_baca, sudah_baca_at)
                        VALUES (DEFAULT, ?, ?, ?, ?, ?)";

            $stmtInsert = $pdo->prepare($sql);
            $stmtInsert->execute([$id_group, $row['id_user'], $id_alkitab, 0, '']);
        }

        $notif = 'Successful';
    }

    $output = '';

    echo json_encode(array('output' => $output, 'notif' => $notif));
}
