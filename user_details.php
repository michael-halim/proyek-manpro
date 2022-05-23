<?php
include "connect.php";
$host = "localhost";
$user = "root";
$password = "";
$database = "manpro";

$conn = mysqli_connect($host, $user, $password, $database);
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
		.accordion{
			width: 400px;
		}
		.accordion-button{
			height: 40px;
		}
		.accordion-body {
			margin-top:-10px;
		}
		.accordion-button:not(.collapsed){
			color:black;
		}
		.form-control{
			font-size: 15px;
		}
		.form-label{
			margin-top: 8px;
			margin-bottom: 0px;
		}
	</style>
	<div id="container">
		<!-- awal buat box detail event -->
		<div class="accordion" id="accordionPanelsStayOpenExample">
			<div class="accordion-item">
				<h2 class="accordion-header" id="panelsStayOpen-headingOne">
					<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
						<h6 style="text-align: center; margin-top: 10px;"><i class="fa-solid fa-circle-info"></i> Detail Event</h6>	
      				</button>
    			</h2>
      			<div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
      				<div class="accordion-body">
      					<?php
      					$email = $_SESSION['email'];
                            $query = "SELECT * FROM event";
                            $user = mysqli_query($conn, $query);

                            while($data = mysqli_fetch_array($user)){
                                $profile = $data;
                                break;
                            }
                            ?>
                            <form>
                            <fieldset disabled>
		                        <div class="sm-3">
								    <label for="exampleInputEmail1" class="form-label">Nama Kegiatan</label>
								    <input type="event" class="form-control" id="disabledTextInput" value="<?php echo $profile['nama']; ?>">
								</div>
								<div class="sm-3">
								    <label for="exampleInputEmail1" class="form-label">Jenis Kegiatan</label>
								    <input type="event" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $profile['jenis']; ?>">
								</div>
		  						<div class="sm-3">
								    <label for="exampleInputEmail1" class="form-label">Tempat/Lokasi Kegiatan</label>
								    <input type="event" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $profile['tempat']; ?>">
								</div>
								<div class="sm-3">
								    <label for="exampleInputEmail1" class="form-label">Link Kegiatan</label>
								    <input type="event" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $profile['link']; ?>">
								</div>
							</fieldset>
						</form>
       				</div>
    			</div>
			</div>
		</div>
		<!-- awal buat detail kehadiran -->
		<div id="konten-user" style="margin-top:30px;">
			<h3><i class="fa-solid fa-user-group"></i> Detail Group	</h3>
			<table id="dtOrderExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
				<thead class="table-secondary">
					<tr>
						<th class="col" scope="col">Nama</th>
				      	<th class="col" scope="col">Status Kehadiran</th>
				      	<th class="col" scope="col">Keterangan</th>
				    </tr>
				</thead>
				<tbody>
					<?php
					$email = $_SESSION['email'];
					$query = "SELECT user.nama, detail_event.absen, detail_event.alasan\n" . "FROM user\n" . "RIGHT JOIN detail_event ON user.id = detail_event.id_user;";
					$result = mysqli_query($conn, $query);

					while($row = mysqli_fetch_array($result)){  ?>
						<tr>
							<td><?php echo htmlspecialchars($row['nama']); ?></td>
							<td>
								<?php if($row['absen'] == "1"){ ?>
					            	Hadir</i>
					            <?php } ?>
					            <?php if($row['absen'] == "0") { ?>
					            	Tidak hadir
					            <?php } ?>
							</td>
							<td>
								<?php if($row['alasan'] == ""){ ?>
					            	Tidak ada keterangan 
					            <?php } ?>
					            <?php if($row['alasan']) { ?>
					            	<?php echo htmlspecialchars($row['alasan']); ?>
					            <?php } ?>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>