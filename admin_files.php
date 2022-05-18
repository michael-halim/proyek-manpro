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
	</style>
    <?php include('assets/admin_sidebar.php'); ?>
    <div id="container">
        <h1><i class="fa-solid fa-file"></i> Uploaded Files</h1>
        <br>
        <form method="post">
        	<table id="dtOrderExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
		        <thead class="table-secondary">
		        	<tr>		
		        		<th class="col" scope="col">Original Files</th>
				      	<th class="col" scope="col">Path</th>
				      	<th class="col" scope="col"><i class="fa-solid fa-arrow-down"></i> Submit Date</th>
				      	<th class="col" scope="col"><i class="fa-solid fa-arrow-down"></i> Update Date</th>
				      	<th class="col" scope="col"><i class="fa-solid fa-arrow-down"></i> Status</th>
				      	<th class="col" scope="col" style="text-align: center;">Action</th>
				    </tr>
				</thead>
				<tbody>
					<?php
					$email = $_SESSION['email'];
					$query = "SELECT * FROM content";
					$result = mysqli_query($conn, $query);

					while($row = mysqli_fetch_array($result)){  ?>
						<tr>
							<td><?php echo htmlspecialchars($row['original_name']); ?></td>
					        <td><?php echo htmlspecialchars($row['path']); ?></td>
					        <td><?php echo htmlspecialchars($row['createdAt']); ?></td>
					        <td><?php echo htmlspecialchars($row['updatedAt']); ?></td>
					       	<td style="text-align: center;">
					       		<?php
					       		if($row['isActive'] == "1"){?>
					            	<i class="fa-solid fa-check" style="color: green;"></i>
					            <?php } ?>
					            <?php 
					            if($row['isActive'] == "0") {?>
					            		<i class="fa-solid fa-xmark" style="color: red;"></i>
					            <?php } ?>
					        </td>
				            <td>
				            	<a href="<?php echo 'admin_edit_files.php?id='.$row['id'];  ?>">
						        	<button type="button" class="btn btn-primary">
						            	<i class="fa-solid fa-pen-to-square"></i>
						            </button>
						        </a>
						        <a href="<?php echo 'admin_edit_videos.php?id='.$row['id'];  ?>">
						            <button type="button" class="btn btn-success">
						            	<i class="fa-solid fa-video"></i>
						            </button>
						        </a>
						        <a href="<?php echo 'admin_delete_files.php?id='.$row['id'];  ?>">
									<button type="button" class="btn btn-danger">
										<i class="fa-solid fa-trash-can"></i>
									</button>
								</a>
								<a target="_blank" href="<?php echo $row['path'];  ?>">
									<button type="button" class="btn btn-secondary">
										<i class="fa-solid fa-eye"></i>
									</button>
								</a>
						    </td>
						</tr>
						<?php }?>
					</tbody>
				</table>
			</form>
        </div>
	</body>
</html>