<?php
include 'connect.php';
header('Content-type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    $sql = "SELECT email, nama, hp, FLOOR(DATEDIFF(NOW(),lahir)/365.25) as umur, ketua,group_member
            FROM user 
            WHERE email = '$email' AND email != 'admin@gmail.com'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $output = '<table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No HP</th>
                        <th>Umur</th>
                        <th>Jabatan</th>
                        <th>Status Group</th>
                    </tr>
                </thead>
                <tbody>';
    while($row = $stmt->fetch()){
        $jabatan = $row['ketua'] ? 'Ketua Group' : 'Member Group';
        $status = $row['group_member'] ? 'Sudah Masuk Dalam Group' : 'Belum Masuk Dalam Group';
        
        $output .= '<tr>
                        <td>'. $row['nama'] .'</td>
                        <td>'. $row['email'] .'</td>
                        <td>'. $row['hp'] .'</td>
                        <td>'. $row['umur'] .'</td>
                        <td>'. $jabatan .'</td>
                        <td>'. $status .'</td>
                    </tr>';
    }
    $output .= '</tbody></table>';
    echo json_encode(array('output' => $output));

}
?>