<?php
include 'connect.php';
if(isset($_POST['submit'])) {

	// Count total files
	$countfiles = count($_FILES['files']['name']);
	
	// Prepared statement
	$query = "INSERT INTO content (name,file,hash,active) VALUES(?,?,?,?)";

	$statement = $pdo->prepare($query);

	// Loop all files
	for($i = 0; $i < $countfiles; $i++) {

		// File name
		$filename = $_FILES['files']['name'][$i];
	
		// Location
		$target_file = 'final'.$filename;
	
    $hasil_hash = hash("sha256", $target_file);
    $aktif = 1;
		// file extension
		$file_extension = pathinfo(
			$target_file, PATHINFO_EXTENSION);
			
		$file_extension = strtolower($file_extension);
	
		// Valid image extension
		$valid_extension = array("png","jpeg","jpg","mp4");
	
		if(in_array($file_extension, $valid_extension)) 
		{

			// Upload file
			if(copy($_FILES['files']['tmp_name'][$i],$target_file)) 
			{
				// Execute query
				$statement->execute(array($filename,$target_file,$hasil_hash,$aktif));
			}
		}
	}
	
	echo "File upload successfully";
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Proyek Tekweb</title>
	<?php include('assets/header.php'); ?>
	<link rel="stylesheet" type="text/css" href="assets/css/admin_sidebar.css">
	<link rel="stylesheet" type="text/css" href="assets/css/admin_home.css">
  <link rel="stylesheet" type="text/css" href="style.css">

	<script src="assets/js/admin_home.js"></script>
	<!-- <script src="assets/js/admin_sidebar.js"></script> -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script>

		$(document).ready(function() {
			$('#home').addClass('active');
		});
	</script>
</head>

<body>
	<div class="row">
		<?php include('assets/admin_sidebar.php'); ?>

		<div class="p-4">
    <div class="welcome">
      <div class="content rounded-3 p-3">
        <h1 class="fs-3">Welcome to Dashboard</h1>
        <p class="mb-0">Hello Jone Doe, welcome to your awesome dashboard!</p>
      </div>
    </div>

    <section class="statistics mt-4">
      <div class="row">
        <div class="col-lg-3">
          <div class="box d-flex rounded-2 align-items-center mb-4 mb-lg-0 p-3">
            <i class="uil-envelope-shield fs-2 text-center bg-primary rounded-circle"></i>
            <div class="ms-3">
              <div class="d-flex align-items-center">
                <h3 class="mb-0">1,245</h3> <span class="d-block ms-2">Emails</span>
              </div>
              <p class="fs-normal mb-0">Lorem ipsum dolor sit amet</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="box d-flex rounded-2 align-items-center mb-4 mb-lg-0 p-3">
            <i class="uil-file fs-2 text-center bg-danger rounded-circle"></i>
            <div class="ms-3">
              <div class="d-flex align-items-center">
                <h3 class="mb-0">34</h3> <span class="d-block ms-2">Projects</span>
              </div>
              <p class="fs-normal mb-0">Lorem ipsum dolor sit amet</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="box d-flex rounded-2 align-items-center p-3">
            <i class="uil-users-alt fs-2 text-center bg-success rounded-circle"></i>
            <div class="ms-3">
              <div class="d-flex align-items-center">
                <h3 class="mb-0">5,245</h3> <span class="d-block ms-2">Users</span>
              </div>
              <p class="fs-normal mb-0">Lorem ipsum dolor sit amet</p>
            </div>
          </div>
        </div>
      </div>
    </section>

   
<p><p><p>

    <h1>Upload Images</h1>

<form method='post' action=''
  enctype='multipart/form-data'>
  <input type='file' name='files[]' multiple />
  <p><p>
  <input type='submit' class="button-1" value='Submit' name='submit' />
</form>

<button class="button-1"><a href="aksi.php">View Uploads</a></button>
  </div>
</section>
	</div>
</body>

</html>