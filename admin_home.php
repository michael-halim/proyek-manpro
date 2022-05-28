<?php
if (isset($_GET['stat'])) {
  $stat = $_GET['stat'];
  if ($stat == 1) {
    echo "<script>alert('File Uploaded Successfuly');";
  }
  if ($stat == 2) {
    echo "<script>alert('Link Uploaded Successfuly');";
  }
  echo "window.location.href = 'admin_home.php'";
  echo "</script>";
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Proyek Tekweb</title>
  <?php include('assets/header.php'); ?>
  <link rel="stylesheet" type="text/css" href="assets/css/admin_sidebar.css">
  <link rel="stylesheet" type="text/css" href="assets/css/admin_home.css">
  <link rel="stylesheet" type="text/css" href="assets/css/admin_home_style.css">

  <script>
    $(document).ready(function() {});
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

      <p>
      <p>
      <p>

      <h1>Upload Images</h1>
      <button class="button-1"><a href="admin_upload_file.php">Upload Here</a></button>
      <button class="button-1"><a href="admin_files.php">View Uploads</a></button>
      <p>
      <p>
      <p>
    
    <h1>Upload Videos</h1>
    <button class="button-1"><a href="admin_upload_videos.php">Upload Here</a></button>              
                   
    
    <button class="button-1"><a href="admin_files.php">View Uploads</a></button>
    </div>
    </section>
  </div>
</body>

</html>