<?php
include "connect.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content=
	"width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="style.css">	
</head>
<body>
<div style="overflow-x:auto;">
<table id="viewuploads">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>File Name</th>
                        <th>View</th>
                        <th>Download</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                <?php
				$stmt = $pdo->prepare('select * from content');
				$stmt->execute();
				$imagelist = $stmt->fetchAll();
                $i = 1;
                foreach($imagelist as $image) 
                {
                    $id=$image['id'];
                        if($image['active'] == 1)
                        {
					?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $image['hash']; ?></td>
                    <td><a href="<?php echo $image['file']; ?>" target="_blank">View</a></td>
                    <td><a href="<?php echo $image['file']; ?>" download>Download</td>
                    <td><a href="delete_process.php<?php echo '?id='.$id; ?>" class="btn btn-danger">Delete</a></td>
                    <td><a href="edit_process.php<?php echo '?id='.$id; ?>" class="btn btn-danger">Edit</a></td>
                <?php 
                }
            } ?>
                </tbody>
            </table>
        </div>
</body>
</html>