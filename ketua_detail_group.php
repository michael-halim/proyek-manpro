<?php
include 'connect.php';
$url = $_SERVER['REQUEST_URI'];
$url_components = parse_url($url);
parse_str($url_components['query'], $params);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Proyek Manpro</title>
    <?php include('assets/header.php'); ?>
    <link rel="stylesheet" type="text/css" href="assets/css/admin_sidebar.css">
    <link rel="stylesheet" type="text/css" href="assets/css/admin_home.css">
    <link rel="stylesheet" href="assets/css/admin_files.css">
</head>
<body>
	<style>
		#container{
			padding: 20px;
		}
        .row {
  margin-left:-5px;
  margin-right:-5px;
}
  
.column {
  float: left;
  width: 50%;
  padding: 5px;
}

/* Clearfix (clear floats) */
.row::after {
  content: "";
  clear: both;
  display: table;
}
	</style>
	<div id="container">
	
        <div class="row">
                <div class="column">
		<div id="konten-user" style="margin-top:30px;">
			<h3><i class="fa-solid fa-book-bible"></i> Baca Alkitab	</h3>
			
            <table id="dtOrderExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
				<thead class="table-secondary">
					<tr>
						<th class="col" scope="col">Nama</th>
				      	<th class="col" scope="col">Ayat</th>
				    </tr>
				</thead>
				<tbody>
                <?php 


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
    ?>
<td><?php echo $row['nama'];?></td>
<td><?php echo $row['ayat'];?></td>
</tr>
<?php
}
?>
                    
				</tbody>
			</table>
</div>
</div>


			
                <div class="column">
                <div id="konten-user" style="margin-top:30px;">
			<h3><i class="fas fa-microphone"></i> Event	</h3>
            <table id="dtOrderExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
				<thead class="table-secondary">
					<tr>
						<th class="col" scope="col">Nama</th>
				      	<th class="col" scope="col">Tanggal</th>
				    </tr>
				</thead>
				<tbody>
                <?php 


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
while($row = $stmt->fetch()){
    ?>
<td><?php echo '<a href=user_details.php?idg='. $params['idg'] .'&ide='.$row['id_event'] .'>'. $row['nama_event'] . '</a>'?></td>
<td><?php echo $row['tanggal'];?></td>
</tr>
<?php
}
?>
                    
				</tbody>
			</table>
</div>
</div>
</div>
</div>
	</div>
</body>
</html>