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
		body{
			margin-top: 15px;
		}
	</style>
	<div class="row">
    		<?php include('assets/admin_sidebar.php'); ?>
        
        <div class="col-md-8">
                <h1><i class="fa-solid fa-floppy-disk"></i> Uploaded Files History</h1>
                <br>
                <form method="post">
	                <table class="table">
		                <thead class="table-secondary">
						    <tr>
						      	<th class="col" scope="col">Original Files</th>
						      	<th class="col" scope="col">Path</th>
						      	<th class="col" scope="col"><i class="fa-solid fa-arrow-down"></i> Submit Date</th>
						      	<th class="col" scope="col"><i class="fa-solid fa-arrow-down"></i> Update Date</th>
						      	<th class="col" scope="col">Action</th>
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
					            		<td>
							            	<a href="<?php echo 'admin_edit_vimages.php?id='.$row['id'];  ?>">
							            		<button type="button" class="btn btn-success">
							            			<i class="fa-solid fa-pen-to-square"></i>
							            		</button>
							            	</a>
							            	<a href="<?php echo 'admin_delete_vimages.php?id='.$row['id'];  ?>">
												<button type="button" class="btn btn-danger">
													<i class="fa-solid fa-trash-can"></i>
												</button>
											</a>
											<!-- biar pas pecet icon isa open ndek new tab  -->
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
    	</div>
	</body>
</html>