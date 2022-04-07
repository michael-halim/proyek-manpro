<?php 
include 'connect.php';
header('Content-type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST'){


    // Update Status Ketua
    if($_POST['type'] == 'UPDATE'){
        $email = $_POST['email'];

        $sql = "UPDATE user 
                SET ketua = (ketua+1) % 2
                WHERE email = '$email'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

    }

    // Read Semua User Kecuali Admin
    // Bila $_POST['type'] = update maka akan mengupdate dan tampilan 
    // akan otomatis terganti karena bawahnya langsung di read

    $sql = "SELECT email, nama, hp, FLOOR(DATEDIFF(NOW(),lahir)/365.25) as umur , ketua, group_member
            FROM user
            WHERE email != 'admin@gmail.com'";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $output =
    '<table id="manage-users" class="table table-bordered">
        <thead>
            <tr>		
                <th><b>No</b></th>
                <th><b>Email</b></th>
                <th><b>Nama</b></th>
                <th><b>No HP</b></th>
                <th><b>Action</b></th>
                <th><b>Detail</b></th>
            </tr>
        </thead>';

    $output .= '<tbody>';
    $count = 0;
    
    $detail_button = '<div class="container">
                        <div class="row">
                            <input type="submit" role="button" class="btn btn-info see-detail" href="#detail" data-bs-toggle="modal" value="See Detail">
                        </div>
                    </div>';
    while($row = $stmt->fetch()){
        
        $button = '<div class="container">
                        <div class="row">
                            <input type="submit" class="btn btn-warning ubah-ketua btn-block" data-email="' . $row['email'] . '" value="Ubah Jadi Member">
                        </div>
                    </div> ';
        if( $row['ketua'] == 0 ){
            $button = '<div class="container">
                            <div class="row">
                                <input type="submit" class="btn btn-success btn-block ubah-ketua" data-email="' . $row['email'] . '" value="Ubah Jadi Ketua">
                            </div>
                        </div>';

        }

        $output .= '<tr>
        <td>'. ++$count .'</td>
        <td>'. $row['email'] .'</td>
        <td>'. $row['nama'] .'</td>
        <td>'. $row['hp'] .'</td>
        <td>'. $button .'</td>
        <td>'. $detail_button .'</td>
        </tr>';
    }
    $output .= '</tbody></table>';

  echo json_encode(array('output' => $output));
}

?>