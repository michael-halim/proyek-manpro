<?php
include 'connect.php';
header('Content-type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $sql = "SELECT email, nama, hp, FLOOR(DATEDIFF(NOW(),lahir)/365.25) as umur
            FROM user
            WHERE ketua = 0 AND group_member = 0 AND email != 'admin@gmail.com'";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $output =
    '<thead>
        <tr>		
            <th><b>No</b></th>
            <th><b>Email</b></th>
            <th><b>Nama</b></th>
            <th><b>No HP</b></th>
            <th><b>Umur</b></th>
            <th><b>Invite to Group</b></th>
	    </tr>
	</thead>';

    $output .= '<tbody>';
    $count = 0;
    while ($row = $stmt->fetch()) {
        $checklist = '<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">';
        
        $output .= '<tr>
        <td>' . ++$count . '</td>
        <td>' . $row['email'] . '</td>
        <td>' . $row['nama'] . '</td>
        <td>' . $row['hp'] . '</td>
        <td>' . $row['umur'] . '</td>
        <td>' . $checklist . '</td>
        </tr>';
    }
    $output .= '</tbody>';

    echo json_encode(array('output' => $output));

}
?>