<?php
include 'connect.php';
header('Content-type: application/json');
date_default_timezone_set("Asia/Bangkok");

// FILE UNTUK HANDLE ADD EVENT REQUEST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql = 'SELECT * FROM content';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $imagelist = $stmt->fetchAll();
    $i = 1;
    $output = '<thead>
                    <tr>
                        <th>id</th>
                        <th>Original File Name</th>
                        <th>Path</th>
                        <th>View</th>
                        <th>Download</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>';

    foreach ($imagelist as $image) {

        $isActiveStatus = '<div class="text-center"><i class="fa fa-check" style="color:green;"></i></div>';
        if (!$image['isActive']) {
            $isActiveStatus = '<div class="text-center"><i class="fa fa-remove" style="color:red;"></i></div>';
        }

        $output .= '<tr>
                <td>' . $image['id'] . '</td>
                <td>' . $image['original_name'] . '</td>
                <td>' . $image['path'] . '</td>
                <td><a href="' . $image['path'] . '" target="_blank">View</a></td>
                <td><a href="' .  $image['path'] . '" download>Download</td>
                <td><a href=admin_edit_files.php?id=' . $image['id'] . '>Edit</a></td>"
                <td><a href=admin_delete_files.php?id=' . $image['id'] . '>Delete</a></td>
                <td>' . $isActiveStatus . '</td>
            </tr>';
    }
    $output .= '</tbody>';
    $notif = '';

    echo json_encode(array('output' => $output, 'notif' => $notif));
}
