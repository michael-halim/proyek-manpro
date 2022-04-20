<?php
include 'connect.php';
if (isset($_POST['submit'])) {
  $id = $_GET['id'];
  // Count total files
  $countfiles = count($_FILES['files']['name']);

  // Prepared statement
  $query = "update content set name = ?, file = ?, hash = ?, active = ?, updatedAt = now() where id = $id";

  $statement = $pdo->prepare($query);

  // Loop all files
  for ($i = 0; $i < $countfiles; $i++) {

    // File name
    $filename = $_FILES['files']['name'][$i];

    // Location
    $target_file = 'final' . $filename;

    $hasil_hash = hash("sha256", $target_file);
    $aktif = 1;
    // file extension
    $file_extension = pathinfo(
      $target_file,
      PATHINFO_EXTENSION
    );

    $file_extension = strtolower($file_extension);

    // Valid image extension
    $valid_extension = array("png", "jpeg", "jpg", "mp4");

    if (in_array($file_extension, $valid_extension)) {

      // Upload file
      if (copy($_FILES['files']['tmp_name'][$i], $target_file)) {
        // Execute query
        $statement->execute(array($filename, $target_file, $hasil_hash, $aktif));
      }
    }
  }

  echo "File upload successfully";
  header('location:aksi.php');
}
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
    }


    .modal {
      display: none;
      position: fixed;
      z-index: 1;
      padding-top: 100px;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgb(0, 0, 0);
      background-color: rgba(0, 0, 0, 0.4);
    }


    .modal-content {
      background-color: #fefefe;
      margin: auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
    }


    .close {
      color: #aaaaaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: #000;
      text-decoration: none;
      cursor: pointer;
    }
  </style>
</head>

<body>

  <h2>Edit Content</h2>


  <button id="myBtn">Edit here</button>


  <div id="myModal" class="modal">


    <div class="modal-content">
      <span class="close">&times;</span>
      <form method='post' action='' enctype='multipart/form-data'>
        <input type='file' name='files[]' multiple />
        <p>
        <p>
          <input type='submit' class="button-1" value='Submit' name='submit' />
      </form>
    </div>

  </div>

  <script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
      modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
  </script>

</body>

</html>