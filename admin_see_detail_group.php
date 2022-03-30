<?php
include 'connect.php';
header('Content-type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $id_group = $_POST['id'];
    $group_name = $_POST['group_name'];

    $outputHeader= '<input 
                        type="submit" 
                        class="btn btn-primary btn-block" 
                        data-sp= "' . $id_group . '" 
                        id="add-renungan" 
                        data-bs-toggle="modal" 
                        data-bs-target="#add-renungan-modal" 
                        value="Add Renungan">';


    $sql = "SELECT u.nama AS nama, 
                    u.email AS email,
                    a.ayat AS ayat, 
                    a.renungan AS renungan ,
                    a.createdAt AS created,
                    a.updatedAt AS updated,
                    dg.sudah_baca AS baca,
                    dg.sudah_baca_at AS baca_at
            FROM detail_group AS dg
            JOIN alkitab AS a 
            ON a.id = dg.id_alkitab
            JOIN user AS u 
            ON u.id = dg.id_user
            JOIN group_alkitab AS ga
            WHERE dg.id_group = ? AND ga.nama = ?
            ORDER BY created, ketua DESC";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id_group, $group_name]);

     $output = '<table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Ayat</th>
                                        <th>Renungan</th>
                                        <th>Tanggal Dikasih</th>
                                    </tr>
                                </thead>
                                <tbody>';
    $displayKetua = true;
    while($row = $stmt->fetch()){
        if($displayKetua){
            $output .= '<tr>
                        <td class="table-primary">' . $row['nama'] . '</td>
                        <td class="table-primary">' . $row['email'] . '</td>
                        <td class="table-primary">' . $row['ayat'] . '</td>
                        <td class="table-primary">' . $row['renungan'] . '</td>
                        <td class="table-primary">' . $row['created'] . '</td>
                    </tr>';
            $displayKetua = false;
        }
        else{
            $output .= '<tr>
                        <td>' . $row['nama'] . '</td>
                        <td>' . $row['email'] . '</td>
                        <td>' . $row['ayat'] . '</td>
                        <td>' . $row['renungan'] . '</td>
                        <td>' . $row['created'] . '</td>
                    </tr>';
        }
        
    }
    $output .= '</tbody></table>';
    $notif = '';
    echo json_encode(array('output' => $output, 'outputHeader'=> $outputHeader, 'notif' => $notif));
}
