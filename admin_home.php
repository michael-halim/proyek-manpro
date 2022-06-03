<?php
include "connect.php";
var_dump($_SESSION['email']);
require_once 'secure_admin.php';
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

    <div class="p-4 my-5">
      <h1>Upload Images</h1>
      <button class="button-1"><a href="admin_upload_file.php">Upload Here</a></button>
      <button class="button-1"><a href="admin_files.php">View Uploads</a></button>
  <p></p>
  <p></p>
  <p></p>
      <h1>Upload Videos</h1>
      <button class="button-1"><a href="admin_upload_videos.php">Upload Here</a></button>


      <button class="button-1"><a href="admin_files.php">View Uploads</a></button>
    </div>
    </section>
  </div>
</body>

</html>