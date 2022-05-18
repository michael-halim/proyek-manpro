<?php
include 'connect.php';
$url = $_SERVER['REQUEST_URI'];
$url_components = parse_url($url);
parse_str($url_components['query'], $params);

$sql = "SELECT de.absen AS absen, 
                de.alasan AS alasan , 
                u.nama AS nama
        FROM detail_event AS de
        JOIN user AS u 
        ON u.id = de.id_user
        WHERE de.id_group = ? AND de.id_event = ?";

$stmt = $pdo->prepare($sql);
$stmt->execute([$params['idg'], $params['ide']]);

while($row = $stmt->fetch()){
    echo $row['nama'] . '<br><br>' .$row['absen'] . '<br>' . $row['alasan'] . '<br>' ;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Event</title>
</head>

<body>

</body>

</html>