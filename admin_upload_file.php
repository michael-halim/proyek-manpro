<?php
include 'connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Untuk Bersihin Input
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Count total files
    $countfiles = count($_FILES['files']['name']);

    // Prepared statement
    $query = "INSERT INTO content (original_name , path , isActive, createdAt, createdBy) 
                VALUES(?, ?, 1, NOW(), ?)";

    $statement = $pdo->prepare($query);

    $createdBy = $_SESSION['email'];

    // Loop all files
    for ($i = 0; $i < $countfiles; $i++) {

        // File name
        $filename = test_input($_FILES['files']['name'][$i]);

        // file extension and lower extension name
        $file_extension = strtolower(pathinfo(
            $filename,
            PATHINFO_EXTENSION
        ));

        // Valid image extension
        $valid_extension = array("png", "jpeg", "jpg", "mp4");

        if (in_array($file_extension, $valid_extension)) {

            // File Location Destination
            $target_file = 'uploaded_files/' . hash("sha256", $filename) . '.' . $file_extension;

            // Upload file
            if (copy($_FILES['files']['tmp_name'][$i], $target_file)) {
                // Execute query
                $statement->execute(array($filename, $target_file, $createdBy));
            }
        }
    }

    header('Location: admin_home.php?stat=1');
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


    @import url('https://fonts.googleapis.com/css?family=Playfair+Display|Roboto');


    #drop-area {
      background:#f6f9ff;
      border: 4px dashed lightblue;
      border-radius: 30px;
      width: 50%;
      font-family: sans-serif;
      margin: 5% auto;
      padding: 0%;
    }

    #drop-area.highlight {
      border-color: purple;
    }

    p {
      margin-top: 0;
      text-align: center;
      font-size: 2em;
      font-family: 'Playfair Display', serif;
    }

    .button {
      display: inline-block;
      padding: 10px;
      margin: 0 22%;
      background: pink;
      cursor: pointer;
      border-radius: 5px;
      border: 1px solid pink;
      font-family: 'Roboto', serif;
    }

    .button:hover {
      background: aquamarine;
      color: #aaa;
      font-weight: bold;
    }

    #fileElem {
      display: none;
    }

    .center {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 50%;
    }

  </style>
</head>
<body>
  <div id="drop-area">
    <form method='post' action='' enctype='multipart/form-data'>
      <img src="Capture.png" alt="Upload" width="460" height="345" class="center">
      <p>Edit your image here!</p>
      <input type='file' name='files[]' multiple style="margin-left:39%"/>
      <p><p><p>
      <input type='submit' value='Submit' name='submit' class="button-1"/>
    </form>
  </div>
</body>
</html>