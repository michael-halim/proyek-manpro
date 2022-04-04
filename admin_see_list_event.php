<?php
include 'connect.php';
header('Content-type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // dapetin data dari POST Ajax
    $id_group = $_POST['id'];
    $group_name = $_POST['group_name'];

    // Buat button 'Add Event'
    $outputHeader = '<div class="row">
                        <div class="col-2">
                                <input 
                                    type="submit" 
                                    class="btn btn-primary btn-block" 
                                    data-sp= "' . $id_group . '" 
                                    id="add-event" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#add-event-modal" 
                                    value="Add Event">
                        </div>
                        <div class="col-2">
                                <input 
                                    type="submit" 
                                    class="btn btn-info btn-block" 
                                    id="update-event-btn"
                                    value="Update Event">
                        </div>
                        <div class="col-2">
                                <input 
                                    type="submit" 
                                    class="btn btn-danger btn-block" 
                                    id="delete-event-btn"
                                    value="Delete Event">
                        </div>
                        <div class="col-2">
                                <input 
                                    type="submit" 
                                    class="btn btn-warning btn-block" 
                                    id="restore-event-btn"
                                    value="Restore Event">
                        </div>
                        <div class="col-2"></div>
                        <div class="col-2"></div>
                    </div>';

    // Buat button 'See Detail Event'
    $detail_button = '<div class="container">
                        <div class="row">
                            <input 
                                type="submit" 
                                role="button" 
                                class="btn btn-info see-detail-event" 
                                href="#dtablesModalDetailEvent"
                                data-sp= "' . $id_group . '"
                                data-group = "' . $group_name . '"
                                data-bs-toggle="modal"
                                value="See Detail Event">
                        </div>
                    </div>';

    // Ambil semua nama, createdAt, dan id_event dari table event yang namanya bukan 'Empty'
    $sql = "SELECT e.nama AS nama, 
                    e.createdAt AS created, 
                    de.id_event AS id_event,
                    e.isActive AS isActive
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
                            <th style="width:10px;">Clear</th>
                            <th>No</th>
                            <th>Nama Event</th>
                            <th>Tanggal Dibuat</th>
                            <th>Status Aktif</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>';

    $radioButton = '<input class="form-check-input" type="radio">';

    $count = 0;
    while ($row = $stmt->fetch()) {
        
        $isActiveStatus = '<i class="fa fa-check" style="color:green;"></i>';
        if (!$row['isActive']) {
            $isActiveStatus = '<i class="fa fa-remove" style="color:red;"></i>';
        }


        $output .= '<tr data-event="' . $row['id_event'] . '">
                        <td style="width:10px;">' . $radioButton . '</td>
                        <td>' . ++$count . '</td>
                        <td>' . $row['nama'] . '</td>
                        <td>' . $row['created'] . '</td>
                        <td>' . $isActiveStatus . '</td>
                        <td>' . $detail_button . '</td>
                    </tr>';
    }
    $output .= '</tbody></table>';
    $notif = '';

    echo json_encode(array('output' => $output, 'outputHeader' => $outputHeader, 'notif' => $notif));
}
