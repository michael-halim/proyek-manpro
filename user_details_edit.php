<?php
include "connect.php";
$host = "localhost";
$user = "root";
$password = "";
$database = "manpro";

$conn = mysqli_connect($host, $user, $password, $database);


$idg = $_GET['idg'];
$ide = $_GET['ide'];
$idu = $_GET['idu'];
$email = $_SESSION['email'];
$query = "SELECT user.nama, detail_event.absen, detail_event.alasan, detail_event.id_group, detail_event.id_event, detail_event.id_user\n" . "FROM user\n" . "RIGHT JOIN detail_event ON user.id = detail_event.id_user\n" . "WHERE detail_event.id_user = $idu;";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Proyek Manpro</title>
    <?php include('assets/header.php'); ?>
    <link rel="stylesheet" type="text/css" href="assets/css/admin_sidebar.css">
    <link rel="stylesheet" type="text/css" href="assets/css/admin_home.css">
    <link rel="stylesheet" href="assets/css/admin_files.css">
	<link rel="stylesheet" href="style.css">
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
	<form method="post" action=<?php echo 'user_details_edit_action.php?idg='.$idg . '&ide=' .$ide . '&idu=' .$idu;?>>
	<div id="container">
		<!-- awal buat detail kehadiran -->
		<div id="konten-user" style="margin-top:30px;">
			<h3><i class="fa-solid fa-user-group"></i> Edit Detail Group	</h3>
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
					while($row = mysqli_fetch_array($result)){  
					?>
						<tr>
							<td><?php echo htmlspecialchars($row['nama']); ?></td>
							<td>
							<input type="radio" name="absen" value=
							"<?php echo $row['absen'];?>"
							<?php
							if($row['absen']=='1')
							{?>
							checked="true" 
							<?php } ?>
							>Hadir
                            <input type="radio" name="absen" value=
							"<?php echo $row['absen'];?>"
							<?php
							if($row['absen']=='0')
							{?>
							checked='true' 
							<?php } ?>
							>Absen
							</td>
							<td>
							<input value="<?php echo $row['alasan'];?>" type="text" name="alasan">
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
	<input type='submit' value='Submit' name='submit' class="button-1"/>
					</form>
</body>
</html>