<?php
include 'connect.php';
header('Content-type: application/json');

// FILE UNTUK RESPONSE PENGAMBILAN DATA SUATU GROUP DARI DB
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    // SQL untuk ambil data group dengan pagination
    $MAX_PER_PAGES = 20;
    $PAGES = $_GET['page'];
    $OFFSET = ($PAGES - 1) * $MAX_PER_PAGES;
    
    $sql = "SELECT ga.nama AS nama_group, 
                    dg.id_group as id,
                    u.email AS email, 
                    u.nama AS nama, 
                    u.ketua,
                    ga.isActive,
                    ga.id AS groupId
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

    // Setiap Group dihitung jumlah membernya
    while($row = $stmt->fetch()){
        $id = $row['id'];

        // SQL untuk hitung member
        $sqlCount = "SELECT COUNT(id_user) AS total
                    FROM (
                        SELECT dg.id_user as id_user
                        FROM  detail_group AS dg
                        JOIN user AS u 
                        ON u.id = dg.id_user
                        JOIN group_alkitab AS ga
                        ON ga.id = dg.id_group
                        WHERE u.ketua = 0 AND 
                                ga.id = ?
                        GROUP BY dg.id_user 
                    ) AS myCount";

        $stmtCount = $pdo->prepare($sqlCount);
        $stmtCount->execute([$id]);     
        $total = $stmtCount->fetch()['total'];
        
        // Badge aktif dan non-aktif dari suatu group
        $badge = '<span style="cursor:pointer;" data-id="' . $row['groupId'] . '" class="badge-group badge rounded-pill bg-success float-end">Active</span>';
        if(!$row['isActive']){
            $badge = '<span style="cursor:pointer;" data-id="' . $row['groupId'] . '" class="badge-group badge rounded-pill bg-danger float-end">Non-Active</span>';
        }

        // Card dari group
        $output .= '<div class="col-4">
                        <div class="card text-white bg-secondary mb-3 align-center" style="max-width: 18rem;">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-8">
                                        <span>
                                            <input 
                                                type="text" 
                                                class="form-control group-name-input" 
                                                value="' . $row['nama_group'] . '" 
                                                disabled
                                                data-id="'. $row['groupId'] .'">
                                        </span>
                                    </div>
                                    <div class="col-4 text-right align-middle">
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
