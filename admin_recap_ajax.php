<?php 
include 'connect.php';
$output = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    // View Event
    if($_POST['for'] == 'viewEvent' && $_POST['idGroup'] != '') {
        $idGroup = $_POST['idGroup'];

        $sql = "SELECT * FROM detail_event de JOIN event e ON e.id=de.id_event WHERE de.id_group = ? AND e.nama   !='Empty' GROUP BY de.id_event";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$idGroup]);
        $count = 1;
        $outputView = '<div class="accordion accordion-flush" id="accordionView">';
        
        while ($row = $stmt->fetch()) {
            $outputView .= '<div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse'.$row['id'].'" aria-expanded="false" aria-controls="flush-collapse'.$row['id'].'">
                        '.$row['nama'].'
                    </button>
                </h2>
                <div id="flush-collapse'.$row['id'].'" class="accordion-collapse collapse" aria-labelledby="flush-heading'.$row['id'].'" data-bs-parent="#accordionView">
                    <div class="accordion-body">
                        <b>Jenis</b>: '.$row['jenis'].'<br>
                        <b>Tempat</b>: '.$row['tempat'].'<br>
                        <b>Link</b>: '.$row['link'].'
                    </div>
                </div>
            </div>';
        }

        $outputView .= '</div>';
        $output = "success~~".$outputView;
    }

    // VIEW ANGGOTA
    else if($_POST['for'] == 'viewAnggota' && $_POST['idGroup'] != '') {
        $idGroup = $_POST['idGroup'];

        $sql = "SELECT * FROM detail_group d JOIN user u ON d.id_user = u.id WHERE id_group = ? GROUP BY id_user";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$idGroup]);
        $outputView = '<div class="accordion accordion-flush" id="accordionView">';
        
        while($row = $stmt->fetch()){
            if($row['ketua'] == 1){
            $outputView .= '<div class="accordion-item">
                <h4 class="accordion-header" id="flush-headingOne">
                <b> Ketua: '.$row['nama'].'</b>
                </h4>
                </div>';
            }
        }

        $sql = "SELECT * FROM detail_group d JOIN user u ON d.id_user = u.id WHERE id_group = ? GROUP BY id_user";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$idGroup]);

        while ($row = $stmt->fetch()) {
            if($row['ketua']!=1){
            $outputView .= '<div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse'.$row['id'].'-" aria-expanded="false" aria-controls="flush-collapse'.$row['id'].'-">
                        '.$row['nama'].'
                    </button>
                </h2>';
            
                $outputView .='<div id="flush-collapse'.$row['id'].'-" class="accordion-collapse collapse" aria-labelledby="flush-heading'.$row['id'].'-" data-bs-parent="#accordionView">
                        <div class="accordion-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Ayat</th>
                                    <th>Renungan</th>
                                </tr>
                            </thead>
                        <tbody>
                        ';
            $sql2 = "SELECT * FROM detail_group d JOIN alkitab a ON d.id_alkitab = a.id WHERE id_user = ? AND id_alkitab != 0";
            $stmt2 = $pdo->prepare($sql2);
            $stmt2->execute([$row['id_user']]);
            $count = 1;

            if ($stmt2->rowCount() > 0) {
                    while ($row2 = $stmt2->fetch()) {
                        $outputView .= '<tr>
                                            <td>' . $count++ . '</td>
                                            <td>' . $row2['ayat'] . '</td>
                                            <td>' . $row2['renungan'] . '</td>
                                        </tr>';
                        $count++;
                    }
            }
            else {
                    $outputView .= '<tr style="text-align: center;"><td colspan="3">Belum baca</td></tr>';
            }

            $outputView .= '</tbody></table></div></div></div>';
            }
        }

        $outputView .= '</div>';
        $output = "success~~".$outputView;
    }

    else {
        $output = "error";
    }

    echo $output;
}
else {
    $output = "error";
}

?>