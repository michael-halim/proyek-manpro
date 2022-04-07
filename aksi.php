<?php
include "connect.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content=
	"width=device-width, initial-scale=1.0">	
</head>

<body>
<table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>File Name</th>
                        <th>View</th>
                        <th>Download</th>
                    </tr>
                </thead>
                <tbody>
                <?php
				$stmt = $pdo->prepare('select * from images');
				$stmt->execute();
				$imagelist = $stmt->fetchAll();
                $i = 1;
                foreach($imagelist as $image) {
					?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $image['name']; ?></td>
                    <td><a href="final<?php echo $image['name']; ?>" target="_blank">View</a></td>
                    <td><a href="final<?php echo $image['name']; ?>" download>Download</td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
</body>

</html>