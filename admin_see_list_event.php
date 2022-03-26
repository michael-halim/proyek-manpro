<?php
include 'connect.php';
header('Content-type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id_group = $_POST['id'];
    $group_name = $_POST['group_name'];
    $sql = "SELECT e.nama AS nama, 
                    e.createdAt AS created
            FROM detail_event AS de 
            JOIN event AS e
            JOIN group_alkitab AS ga
            ON e.id = de.id_event
            WHERE de.id_group = ? AND ga.nama = ?
            GROUP BY de.id_group;";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id_group, $group_name]);

    $output = '<table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Event</th>
                                        <th>Tanggal Dibuat</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>';

    $detail_button = '<div class="container">
                        <div class="row">
                            <input 
                                type="submit" 
                                role="button" 
                                class="btn btn-info see-detail-event" 
                                href="#dtablesModalDetailEvent"
                                data-sp= "'. $id_group .'"
                                data-group = "'. $group_name .'"
                                data-bs-toggle="modal"
                                value="See Detail Event">
                        </div>
                    </div>';

    $count = 0;
    while ($row = $stmt->fetch()) {
            $output .= '<tr>
                        <td>' . ++$count . '</td>
                        <td>' . $row['nama'] . '</td>
                        <td>' . $row['created'] . '</td>
                        <td>' . $detail_button . '</td>
                    </tr>';
    }
    $output .= '</tbody></table>';
    $notif = '';

    echo json_encode(array('output' => $output, 'notif' => $notif));
}
