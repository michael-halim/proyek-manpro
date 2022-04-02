<?php
include 'connect.php';
header('Content-type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $MAX_PER_PAGES = 9;
    $PAGES = $_GET['page'];
    $OFFSET = ($PAGES - 1) * $MAX_PER_PAGES;
    
    $sql = "SELECT ga.nama AS nama_group, 
                    dg.id_group as id,
                    u.email AS email, 
                    u.nama AS nama, 
                    u.ketua,
                    ga.isActive
            FROM  detail_group as dg
            JOIN group_alkitab AS ga
            ON ga.id = dg.id_group
            JOIN user u 
            ON u.id = dg.id_user
            WHERE ketua = 1
            GROUP BY dg.id_group
            LIMIT ? OFFSET ?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$MAX_PER_PAGES,$OFFSET]);

    $output = '';
    $notif = '';

    while($row = $stmt->fetch()){
        $id = $row['id'];

        $sqlCount = "SELECT COUNT(*) AS total
                FROM  detail_group AS dg
                JOIN user AS u 
                ON u.id = dg.id_user
                JOIN group_alkitab AS ga
                ON ga.id = dg.id_group
                WHERE u.ketua = 0 AND ga.id = ?
                GROUP BY dg.id_user
                LIMIT 1";

        $stmtCount = $pdo->prepare($sqlCount);
        $stmtCount->execute([$id]);     
        $total = $stmtCount->fetch()['total'];


        $badge = '<span class="badge rounded-pill bg-success float-end">Active</span>';
        if(!$row['isActive']){
            $badge = '<span class="badge rounded-pill bg-danger float-end">Non-Active</span>';
        }

        $output .= '<div class="col-4">
                        <div class="card text-white bg-secondary mb-3 align-center" style="max-width: 18rem;">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-9">
                                        <span>'. $row['nama_group'] .'</span>
                                    </div>
                                    <div class="col-3 text-right">
                                        '. $badge .'
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">'. $row['nama'] .'</h5>
                                <p class="card-text">Total : '. $total . ' Member</p>

                                <div class="row">
                                    <div class="col-12 col-sm-6"><input type="button" class="btn btn-info detail-group" value="Detail Group" data-sp="' . $row['id'] . '" data-group="' . $row['nama_group'] . '"></div>
                                    <div class="col-12 col-sm-6"><input type="button" class="btn btn-light see-list-event" value="Detail Event" data-sp="' . $row['id'] . '" data-group="' . $row['nama_group'] . '"></div>
                                </div>
                            </div>

                        </div>
                    </div>';

    }
    



    echo json_encode(array('output' => $output, 'notif' => $notif));
}
