<?php
include "connect.php";
?>
<!DOCTYPE html>
<html>
<head>
<style>
  a
  {
    text-decoration: none;
    color: black;
  }
#view {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  text-decoration: none;
}

#view td, #view th {
  border: 1px solid #ddd;
  padding: 8px;
  text-decoration: none;
}

#view tr:nth-child(even){background-color: #f2f2f2;text-decoration: none;}

#view tr:hover {background-color: #ddd;text-decoration: none;}

#view th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
  text-decoration: none;
}
</style>
</head>
<body>

<h1>Content Uploaded</h1>
<div style="overflow-x:auto;">
<table id="view">
<thead>
                    <tr>
                        <th>#</th>
                        <th>File Name</th>
                        <th>View</th>
                        <th>Download</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                <?php
				$stmt = $pdo->prepare('select * from content');
				$stmt->execute();
				$imagelist = $stmt->fetchAll();
                $i = 1;
                foreach($imagelist as $image) {
                    if($image['active'] == 1)
                    {
					?>
                <tr>
                    <td><?php echo $image['id']; ?></td>
                    <td><?php echo $image['hash']; ?></td>
                    <td><a href="<?php echo $image['file']; ?>" target="_blank">View</a></td>
                    <td><a href="<?php echo $image['file']; ?>" download>Download</td>
                    <?php
                    echo "<td><a href='edit_process.php?id={$image['id']}'>Edit</a></td>";
                    ?>
                    <?php
                    echo "<td><a href='delete_process.php?id={$image['id']}'>Delete</a></td>";
                    ?>
                </tr>
                <?php } }?>
                </tbody>
</table>
                    </div>
</body>
</html>