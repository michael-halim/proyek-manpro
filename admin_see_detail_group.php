<?php
include 'connect.php';
header('Content-type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id_group = $_POST['id'];
    $group_name = $_POST['group_name'];

    $outputHeader = '<div class="row">
                        <div class="col-1"></div>
                        <div class="col-2">
                                <input 
                                    type="submit" 
                                    class="btn btn-primary btn-block" 
                                    data-sp= "' . $id_group . '" 
                                    id="add-renungan" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#add-renungan-modal" 
                                    value="Add Renungan">
                        </div>
                        <div class="col-2 mr-3">
                                <input 
                                    type="submit" 
                                    class="btn btn-info btn-block" 
                                    id="update-renungan-btn"
                                    value="Update Renungan">
                        </div>
                        <div class="col-2">
                                <input 
                                    type="submit" 
                                    class="btn btn-success btn-block" 
                                    id="save-renungan-btn"
                                    value="Save Renungan"
                                    style="cursor: not-allowed;">
                        </div>
                        <div class="col-2">
                                <input 
                                    type="submit" 
                                    class="btn btn-danger btn-block" 
                                    id="delete-renungan-btn"
                                    value="Delete Renungan">
                        </div>
                        <div class="col-2">
                                <input 
                                    type="submit" 
                                    class="btn btn-warning btn-block" 
                                    id="restore-renungan-btn"
                                    value="Restore Renungan">
                        </div>
                        <div class="col-1"></div>
                    </div>';

    $sql = "SELECT u.nama AS nama,
                    u.email AS email
            FROM detail_group AS dg 
            JOIN user AS u 
            ON u.id = dg.id_user
            WHERE u.ketua = 1 AND 
                    dg.id_group = ?
            GROUP BY u.id
            LIMIT 1";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id_group]);

    $dataHeader = $stmt->fetch();

    $outputInfo = '<table class="table table-borderless">
                        <tr><td><b>Nama Ketua</b></td><td>' . $dataHeader['nama'] . '</td></tr>
                        <tr><td><b>Email Ketua</b></td> <td>' . $dataHeader['email'] . '</td></tr>
                    </table>';

    $sql = "SELECT u.nama AS nama, 
                    u.email AS email,
                    a.ayat AS ayat, 
                    a.renungan AS renungan ,
                    DATE_FORMAT(a.createdAt, '%d %M %Y') AS created,
                    a.updatedAt AS updated,
                    a.isActive AS isActive,
                    dg.sudah_baca AS baca,
                    dg.sudah_baca_at AS baca_at,
                    dg.id_alkitab AS id_alkitab
            FROM detail_group AS dg
            JOIN alkitab AS a 
            ON a.id = dg.id_alkitab
            JOIN user AS u 
            ON u.id = dg.id_user
            JOIN group_alkitab AS ga
            WHERE dg.id_group = ? AND 
                    ga.nama = ? AND 
                    ayat != 'Empty'
            ORDER BY created, ketua DESC";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id_group, $group_name]);

    $output = '<table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Ayat</th>
                                        <th>Renungan</th>
                                        <th>Tanggal Dikasih</th>
                                        <th>Status Aktif</th>
                                    </tr>
                                </thead>
                                <tbody>';

    while ($row = $stmt->fetch()) {

        $isActiveStatus = '<i class="fa fa-check" style="color:green;"></i>';
        if (!$row['isActive']) {
            $isActiveStatus = '<i class="fa fa-remove" style="color:red;"></i>';
        }

        $renungan = $row['renungan'];
        if (strlen($renungan) > 50) {
            $renungan = substr($renungan, 0, 50) . '....';
        }

        $output .= '<tr data-id="'. uniqid() .'" data-alkitab="'. $row['id_alkitab'] .'">
                        <td><input class="form-check-input checkbox-renungan" type="checkbox"></td>
                        <td>' . $row['nama'] . '</td>
                        <td>' . $row['email'] . '</td>
                        <td><input class="form-control" type="text" value="'. ucwords($row['ayat']) . '" disabled></td>
                        <td><input class="form-control" type="text" value="' . $renungan . '" disabled></td>
                        <td>' . $row['created'] . '</td>
                        <td>' . $isActiveStatus . '</td>
                    </tr>';
    }
    $output .= '</tbody></table>';
    $notif = '';
    echo json_encode(array('output' => $output, 'outputHeader' => $outputHeader, 'outputInfo' => $outputInfo, 'notif' => $notif));
}
