<?php
include 'connect.php';
header('Content-type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $id_group = $_POST['id'];
    $group_name = $_POST['group_name'];
    $sql = "SELECT u.nama AS nama, 
                    u.email AS email,
                    a.ayat AS ayat, 
                    a.renungan AS renungan ,
                    a.createdAt AS created,
                    a.updatedAt AS updated,
                    dg.sudah_baca AS baca,
                    dg.sudah_baca_at AS baca_at,
                    a.tanggal_dikasih AS tanggal_dikasih
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
                        <td style="background: #d1e7dd;">' . $row['nama'] . '</td>
                        <td style="background: #d1e7dd;">' . $row['email'] . '</td>
                        <td style="background: #d1e7dd;">' . $row['ayat'] . '</td>
                        <td style="background: #d1e7dd;">' . $row['renungan'] . '</td>
                        <td style="background: #d1e7dd;">' . $row['tanggal_dikasih'] . '</td>
                    </tr>';
            $displayKetua = false;
        }
        else{
            $output .= '<tr>
                        <td>' . $row['nama'] . '</td>
                        <td>' . $row['email'] . '</td>
                        <td>' . $row['ayat'] . '</td>
                        <td>' . $row['renungan'] . '</td>
                        <td>' . $row['tanggal_dikasih'] . '</td>
                    </tr>';
        }
        
    }
    $output .= '</tbody>
                </table>';
    $notif = '';

    echo json_encode(array('output' => $output, 'notif' => $notif));
}
