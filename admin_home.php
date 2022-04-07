<?php
include 'connect.php';
// if (!isset($_SESSION['email'])) {
// 	header('location: login.php');
// }
// else if ($_SESSION['email'] != "admintokopetra@gmail.com") {
// 	header('location: home.php');
// }
if(isset($_POST['submit'])) {

	// Count total files
	$countfiles = count($_FILES['files']['name']);
	
	// Prepared statement
	$query = "INSERT INTO images (name,image) VALUES(?,?)";

	$statement = $pdo->prepare($query);

	// Loop all files
	for($i = 0; $i < $countfiles; $i++) {

		// File name
		$filename = $_FILES['files']['name'][$i];
	
		// Location
		$target_file = 'final'.$filename;
	
		// file extension
		$file_extension = pathinfo(
			$target_file, PATHINFO_EXTENSION);
			
		$file_extension = strtolower($file_extension);
	
		// Valid image extension
		$valid_extension = array("png","jpeg","jpg","pdf");
	
		if(in_array($file_extension, $valid_extension)) 
		{

			// Upload file
			if(copy($_FILES['files']['tmp_name'][$i],$target_file)) 
			{
				// Execute query
				$statement->execute(array($filename,$target_file));
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
	<script src="assets/js/admin_sidebar.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script>
		// $(document).ready(function() {
		// 	$('.nav-link').click(function() {
		// 		$('.nav-link').removeClass('active');
		// 		$(this).addClass('active');
		// 	});
		// });
		$(document).ready(function() {
			$('#home').addClass('active');
		});
	</script>
</head>

<body>
<div class="row">
		<?php include('assets/admin_sidebar.php'); ?>

		<!-- <div class="col-md-9">
			<h1>Content</h1>
		</div> -->

		<div class="p-4">
    <div class="welcome">
      <div class="content rounded-3 p-3">
        <h1 class="fs-3">Welcome to Dashboard</h1>
        <p class="mb-0">Hello Jone Doe, welcome to your awesome dashboard!</p>
      </div>
    </div>

    <section class="statistics mt-4">
      <div class="row">
        <div class="col-lg-4">
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
        <div class="col-lg-4">
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
        <div class="col-lg-4">
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

    <section class="charts mt-4">
      <div class="row">
        <div class="col-lg-6">
          <div class="chart-container rounded-2 p-3">
            <h3 class="fs-6 mb-3">Chart title number one</h3>
            <canvas id="myChart"></canvas>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="chart-container rounded-2 p-3">
            <h3 class="fs-6 mb-3">Chart title number two</h3>
            <canvas id="myChart2"></canvas>
          </div>
        </div>
      </div>
    </section>

    <section class="admins mt-4">
      <div class="row">
        <div class="col-md-6">
          <div class="box">
            <!-- <h4>Admins:</h4> -->
            <div class="admin d-flex align-items-center rounded-2 p-3 mb-4">
              <div class="img">
                <img class="img-fluid rounded-pill"
                     width="75" height="75"
                     src="https://uniim1.shutterfly.com/ng/services/mediarender/THISLIFE/021036514417/media/23148906966/small/1501685402/enhance"
                     alt="admin">
              </div>
              <div class="ms-3">
                <h3 class="fs-5 mb-1">Joge Lucky</h3>
                <p class="mb-0">Lorem ipsum dolor sit amet consectetur elit.</p>
              </div>
            </div>
            <div class="admin d-flex align-items-center rounded-2 p-3 mb-4">
              <div class="img">
                <img class="img-fluid rounded-pill"
                     width="75" height="75"
                     src="https://uniim1.shutterfly.com/ng/services/mediarender/THISLIFE/021036514417/media/23148907137/small/1501685404/enhance"
                     alt="admin">
              </div>
              <div class="ms-3">
                <h3 class="fs-5 mb-1">Joge Lucky</h3>
                <p class="mb-0">Lorem ipsum dolor sit amet consectetur elit.</p>
              </div>
            </div>
            <div class="admin d-flex align-items-center rounded-2 p-3">
              <div class="img">
                <img class="img-fluid rounded-pill"
                     width="75" height="75"
                     src="https://uniim1.shutterfly.com/ng/services/mediarender/THISLIFE/021036514417/media/23148907019/small/1501685403/enhance"
                     alt="admin">
              </div>
              <div class="ms-3">
                <h3 class="fs-5 mb-1">Joge Lucky</h3>
                <p class="mb-0">Lorem ipsum dolor sit amet consectetur elit.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="box">
            <!-- <h4>Moderators:</h4> -->
            <div class="admin d-flex align-items-center rounded-2 p-3 mb-4">
              <div class="img">
                <img class="img-fluid rounded-pill"
                     width="75" height="75"
                     src="https://uniim1.shutterfly.com/ng/services/mediarender/THISLIFE/021036514417/media/23148907114/small/1501685404/enhance"
                     alt="admin">
              </div>
              <div class="ms-3">
                <h3 class="fs-5 mb-1">Joge Lucky</h3>
                <p class="mb-0">Lorem ipsum dolor sit amet consectetur elit.</p>
              </div>
            </div>
            <div class="admin d-flex align-items-center rounded-2 p-3 mb-4">
              <div class="img">
                <img class="img-fluid rounded-pill"
                     width="75" height="75"
                     src="https://uniim1.shutterfly.com/ng/services/mediarender/THISLIFE/021036514417/media/23148907086/small/1501685404/enhance"
                     alt="admin">
              </div>
              <div class="ms-3">
                <h3 class="fs-5 mb-1">Joge Lucky</h3>
                <p class="mb-0">Lorem ipsum dolor sit amet consectetur elit.</p>
              </div>
            </div>
            <div class="admin d-flex align-items-center rounded-2 p-3">
              <div class="img">
                <img class="img-fluid rounded-pill"
                     width="75" height="75"
                     src="https://uniim1.shutterfly.com/ng/services/mediarender/THISLIFE/021036514417/media/23148907008/medium/1501685726/enhance"
                     alt="admin">
              </div>
              <div class="ms-3">
                <h3 class="fs-5 mb-1">Joge Lucky</h3>
                <p class="mb-0">Lorem ipsum dolor sit amet consectetur elit.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="statis mt-4 text-center">
      <div class="row">
        <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
          <div class="box bg-primary p-3">
            <i class="uil-eye"></i>
            <h3>5,154</h3>
            <p class="lead">Page views</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
          <div class="box bg-danger p-3">
            <i class="uil-user"></i>
            <h3>245</h3>
            <p class="lead">User registered</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
          <div class="box bg-warning p-3">
            <i class="uil-shopping-cart"></i>
            <h3>5,154</h3>
            <p class="lead">Product sales</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="box bg-success p-3">
            <i class="uil-feedback"></i>
            <h3>5,154</h3>
            <p class="lead">Transactions</p>
          </div>
        </div>
      </div>
    </section>

    <section class="charts mt-4">
      <div class="chart-container p-3">
        <h3 class="fs-6 mb-3">Chart title number three</h3>
        <div style="height: 300px">
          <canvas id="chart3" width="100%"></canvas>
        </div>
      </div>
    </section>
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