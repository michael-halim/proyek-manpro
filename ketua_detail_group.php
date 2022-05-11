<?php 
include 'connect.php';
$url = $_SERVER['REQUEST_URI'];
$url_components = parse_url($url);
parse_str($url_components['query'], $params);

$sql = "SELECT dg.*, u.nama AS nama, a.ayat AS ayat 
        FROM detail_group AS dg
        JOIN user AS u
        ON u.id = dg.id_user
        JOIN alkitab AS a
        ON a.id = dg.id_alkitab
        WHERE dg.id_group = ? AND 
                id_alkitab != 0";
$stmt = $pdo->prepare($sql);
$stmt->execute([$params['idg']]);

while($row = $stmt->fetch()){
    echo $row['nama'] . '<br>' . $row['ayat'] . '<br><br>';
}


// Dapetin list event dari suatu group
$sql = "SELECT e.nama AS nama_event, 
                e.createdAt AS tanggal, 
                e.jenis AS jenis, 
                e.tempat AS tempat,
                e.link AS link,
                e.id AS id_event
        FROM detail_event AS de
        JOIN event AS e
        WHERE de.id_group = ? AND e.nama != 'Empty'
        GROUP BY nama_event, tanggal, jenis, tempat, link";

$stmt = $pdo->prepare($sql);
$stmt->execute([$params['idg']]);

while ($row = $stmt->fetch()){
    echo '<a href=ketua_detail_event.php?idg='. $params['idg'] .'&ide='.$row['id_event'] .'>'. $row['nama_event'] . '</a><br>' . 
            $row['tanggal'] . '<br>' . 
            $row['jenis'] . '<br>' . 
            $row['tempat'] . '<br>' . 
            $row['link'] . '<br><br>';

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Group</title>
</head>
<body>
    
</body>
</html>