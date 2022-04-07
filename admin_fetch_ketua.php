<?php 
include 'connect.php';
header('Content-type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST'){



    $sql = "SELECT email, nama, hp, FLOOR(DATEDIFF(NOW(),lahir)/365.25) as umur , ketua, group_member
            FROM user
            WHERE ketua = 1 AND email != 'admin@gmail.com' ";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $output =
    '<thead>
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
                            <input type="submit" class="btn btn-primary assign-group btn-block" data-email="' . $row['email'] . '" value="Assign Group">
                        </div>
                    </div> ';

        $output .= '<tr>
        <td>'. ++$count .'</td>
        <td>'. $row['email'] .'</td>
        <td>'. $row['nama'] .'</td>
        <td>'. $row['hp'] .'</td>
        <td>'. $button .'</td>
        <td>'. $detail_button .'</td>
        </tr>';
    }
    $output .= '</tbody>';

  echo json_encode(array('output' => $output));
}
