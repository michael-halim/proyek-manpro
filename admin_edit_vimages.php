<?php
include "connect.php";
$host = "localhost";
$user = "root";
$password = "";
$database = "manpro";

$conn = mysqli_connect($host, $user, $password, $database);
?>
<html>
<head>
	<title>Proyek Manpro</title>
    <?php include('assets/header.php'); ?>
    <link rel="stylesheet" type="text/css" href="assets/css/admin_sidebar.css">
    <link rel="stylesheet" type="text/css" href="assets/css/admin_home.css">
    <link rel="stylesheet" href="assets/css/admin_files.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<style>
		body{
			margin-top: 15px;
		}
	</style>
	<div class="row">
    	<?php include('assets/admin_sidebar.php'); ?>
    	<form method='POST' action='admin_edit_files.php' enctype='multipart/form-data'>
	    	<div class="col-md-8">
	            <h1><a href="admin_files.php"><i class="fa-light fa-arrow-left-long"></i></a>Edit Path</h1>
	            <br>
	            <!-- upload images -->
	            <div class="mb-3">
				  	<label for="formFileMultiple" class="form-label"><i class="fa-solid fa-image"></i><b> Upload Images</b></label>
				  	<input class="form-control" type="file" name='files[]' multiple />
				</div>
	        	<button type="submit" class="btn btn-primary" value='Submit' name='submit' />Submit</button>
	        </div>
	    </form>
        <hr>
        <!-- upload videos -->
        <form method='POST' action='admin_edit_videos.php' enctype='multipart/form-data'>
	        <div class="col-md-8">
	        	<div class="mb-3">
		            <label for="formFileMultiple" class="form-label"><i class="fa-solid fa-link"></i><b> Upload Videos</b></label>
		            <input class="form-control" type="text" name="link" value="" autofocus placeholder="Paste your video link here" onfocus="if(this.value && this.select){this.select()}">
	        	</div>
	        	<button type="submit" class="btn btn-primary" value='Submit' name='submit' />Submit</button>
	        </div>
	    </form>
    </div>
</body>
</html>