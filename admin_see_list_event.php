<?php
include 'connect.php';
header('Content-type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // dapetin data dari POST Ajax
    $id_group = $_POST['id'];
    $group_name = $_POST['group_name'];
    
    // Buat button 'Add Event'
    $outputHeader = '<input 
                        type="submit" 
                        class="btn btn-primary btn-block" 
                        data-sp= "' . $id_group . '" 
                        id="add-event" 
                        data-bs-toggle="modal" 
                        data-bs-target="#add-event-modal" 
                        value="Add Event">';
    
    
    // Buat button 'See Detail Event'
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

    // Ambil semua nama, createdAt, dan id_event dari table event yang namanya bukan 'Empty'
    $sql = "SELECT e.nama AS nama, 
                    e.createdAt AS created, 
                    de.id_event AS id_event
            FROM detail_event AS de 
            JOIN event AS e
            JOIN group_alkitab AS ga
            ON e.id = de.id_event
            WHERE de.id_group = ? AND ga.nama = ?
            GROUP BY created
            HAVING nama != 'Empty'";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id_group, $group_name]);


    // HTML untuk DataTable
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
                    
    $count = 0;
    while ($row = $stmt->fetch()) {
            $output .= '<tr data-event="'. $row['id_event'] .'">
                        <td>' . ++$count . '</td>
                        <td>' . $row['nama'] . '</td>
                        <td>' . $row['created'] . '</td>
                        <td>' . $detail_button . '</td>
                    </tr>';
    }
    $output .= '</tbody></table>';
    $notif = '';

    echo json_encode(array('output' => $output, 'outputHeader' => $outputHeader, 'notif' => $notif));
}
