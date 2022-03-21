<?php
include 'connect.php';
header('Content-type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Struktur Database Detail Group
    // id | id_group | id_user | id_alkitab | sudah_baca | sudah_baca_at


    // Struktur Database Group Alkitab
    // id | nama | createdAt | createdBy | updatedAt | updatedBy | isActive | deletedAt | deletedBy

    // Buat Group Alkitab Baru
    $assignedPerson = $_POST['assignedPerson'];
    $checkedPerson = $_POST['checkedPerson'];
    $groupName = $_POST['groupName'];
    $createdBy = $_SESSION['email'];
    $now = date("Y-m-d H:i:s");


    $sql = "INSERT INTO group_alkitab VALUES (DEFAULT,?,?,?,?,?,1,?,?)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$groupName, $now, $createdBy,'','','','']);

    $notif = 'Query Group Alkitab Error';
    if($stmt){
        
        $sql = "SELECT id 
                FROM group_alkitab 
                WHERE createdAt = ? AND createdBy = ?";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([$now, $createdBy]);

        $notif = 'Query ID Group Alkitab Error';

        // Sambungin id group alkitab yang baru dibuat ke dalam detail_group

        if ($stmt) {
            $output = '';

            // Struktur Database Detail Group
            // id | id_group | id_user | id_alkitab | sudah_baca | sudah_baca_at

            // Dapet ID Group Alkitab dari SQL diatas
            $groupId = $stmt->fetch();
            $groupId = $groupId['id'];


            // Dapet ID User
            $checkedPersonId = array();
            foreach($checkedPerson as $person){
                $sql = "SELECT id 
                        FROM user
                        WHERE email = ? LIMIT 1";

                $stmt = $pdo->prepare($sql);
                $stmt->execute([$person]);
                array_push($checkedPersonId, $stmt->fetch()['id']);
            }

            // Dapat ID Ketua Group
            $sql = "SELECT id 
                    FROM user
                    WHERE email = ? LIMIT 1";

            $stmt = $pdo->prepare($sql);
            $stmt->execute([$assignedPerson]);
            $assignedPersonId = $stmt->fetch()['id'];


            // Insert Ketua Group ke Detail Group
            $sql = "INSERT INTO detail_group VALUES (DEFAULT,?,?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$groupId, $assignedPersonId, '', '', '']);


            // Insert Anggota Group ke Detail Group
            foreach($checkedPersonId as $personId){

                $sql = "INSERT INTO detail_group VALUES (DEFAULT,?,?,?,?,?)";
                $stmt = $pdo->prepare($sql);

                // Untuk Memasukkan Anggota Group
                $stmt->execute([$groupId, $personId,'','','']);
            }
        }
        
    }

    echo json_encode(array('output' => $output, 'notif' => $notif));

}
