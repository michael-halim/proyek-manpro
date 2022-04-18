<?php
include 'connect.php';
header('Content-type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    $sql = "SELECT email, 
                    nama, 
                    hp, 
                    FLOOR(DATEDIFF(NOW(),lahir)/365.25) as umur, 
                    ketua,
                    group_member
            FROM user 
            WHERE email = ? AND email != 'admin@gmail.com'";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);

    $data = $stmt->fetch();


    // Kalau dia Ketua tidak usah menampilkan apakah dia group member atau bukan
    $status = '';
    if ($data['ketua'] === 0) {
        $status = $data['group_member'] ? 'Sudah Masuk Dalam Group' : 'Belum Masuk Dalam Group';
        $status = '<tr><td><b>Status Group</b></td> <td>' . $status . '</td></tr>';
    }

    $jabatan = $data['ketua'] ? 'Ketua Group' : 'Member Group';
    $output = '<table class="table table-borderless">
                        <tr><td><b>Nama</b></td><td>' . $data['nama'] . '</td></tr>
                        <tr><td><b>Email</b></td> <td>' . $data['email'] . '</td></tr>
                        <tr><td><b>No HP</b></td> <td>' . $data['hp'] . '</td></tr>
                        <tr><td><b>Umur</b></td> <td>' . $data['umur'] . '</td></tr>
                        <tr><td><b>Jabatan</b></td> <td>' . $jabatan . '</td></tr>
                        ' . $status . '
                </table>';
    echo json_encode(array('output' => $output));
}