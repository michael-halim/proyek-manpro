<?php
include 'connect.php';
header('Content-type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // dapetin data dari POST yang dikirim ajax
    $id_group = $_POST['id'];
    $group_name = $_POST['group_name'];
    $id_event = $_POST['id_event'];

    // ambil nama, status ketua, tanggal dibuat, jenis, tempat, link utk header
    $sql = "SELECT u.nama AS nama,
                    u.ketua AS ketua,
                    e.createdAt AS tanggal_dibuat, 
                    e.jenis AS jenis, 
                    e.tempat AS tempat, 
                    e.link AS link
            FROM detail_event AS de 
            JOIN event AS e 
            ON e.id = de.id_event
            JOIN user AS u 
            ON u.id = de.id_user
			JOIN group_alkitab AS ga
            ON ga.id = de.id_group
            WHERE u.ketua = 1 AND
                    de.id_group = ? AND
                    ga.nama = ? AND 
                    de.id_event = ?
            LIMIT 1";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id_group, $group_name, $id_event]);

    $dataHeader = $stmt->fetch();

    // HTML utk header diatas DataTable
    $outputHeader = '<table class="table table-borderless">
                        <tr><td><b>Tanggal</b></td><td>' . $dataHeader['tanggal_dibuat'] . '</td></tr>
                        <tr><td><b>Jenis Pertemuan</b></td> <td>' . $dataHeader['jenis'] . '</td></tr>
                        <tr><td><b>Tempat</b></td> <td>' . $dataHeader['tempat'] . '</td></tr>
                        <tr><td><b>Link</b></td> <td>' . $dataHeader['link'] . '</td></tr>
                        <tr><td><b>Ketua Group</b></td> <td>' . $dataHeader['nama'] . '</td></tr>
                    </table>';


    // Ambil semua nama user, alasan, dan absen dari DB yang bukan ketua dan sesuai event
    $sql = "SELECT u.nama AS nama,
                    de.alasan AS alasan,
                    de.absen AS absen
            FROM detail_event AS de 
            JOIN event AS e 
            ON e.id = de.id_event
            JOIN user AS u 
            ON u.id = de.id_user
			JOIN group_alkitab AS ga
            ON ga.id = de.id_group
            WHERE u.ketua = 0 AND
                    de.id_group = ? AND
                    ga.nama = ? AND 
                    de.id_event = ?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id_group, $group_name, $id_event]);

    $output = '<table class="table table-bordered">
                <thead>
                    <tr>
                        <th><b>No</b></th>
                        <th><b>Nama</b></th>
                        <th><b>Absen</b></th>
                        <th><b>Alasan Tidak Hadir</b></th>
                    </tr>
                </thead>
                <tbody>';


    $count = 0;
    while ($row = $stmt->fetch()) {

        //beri icon centang bila masuk dan X bila tidak masuk
        $icon = '<i class="fa fa-check" style="color:green;"></i>';
        if (!$row['absen']) {
            $icon = '<i class="fa fa-remove" style="color:red;"></i>';
        }

        $output .= '<tr>
        <td>' . ++$count . '</td>
        <td>' . $row['nama'] . '</td>
        <td>' . $icon . '</td>
        <td>' . $row['alasan'] . '</td>
        </tr>';
    }

    $output .= '</tbody></table>';
    $notif = '';

    echo json_encode(array('output' => $output, 'outputHeader' => $outputHeader, 'notif' => $notif));
}
