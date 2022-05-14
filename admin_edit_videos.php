<?php
include 'connect.php';
if (isset($_POST['submit'])) {
  $id = $_GET['id'];

  // Prepared statement
  $sql = "UPDATE content 
            SET original_name = ?, 
                path = ?, 
                isActive = ?, 
                updatedAt = NOW(),
                updatedBy = ?
            WHERE id = ?";

  $stmt = $pdo->prepare($sql);

  $updatedBy = $_SESSION['email'];
  $link1=$_POST['link'];
  $link2=$_POST['link'];

  $stmt->execute(array($link1, $link2, 1, $updatedBy, $id));
  
  if($sql)
  {
    header('Location: admin_files.php');
  }

}
?>
<!-- 
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
    <form method="POST">
      <img src="Capture.png" alt="Upload" width="460" height="345" class="center">
      <p>Edit your link here!</p>
      <input type="text" name="link" value="" class="center" autofocus placeholder="Paste your video link here" onfocus="if(this.value && this.select){this.select()}" style="height:40px">
      <p><p><p>
      <input type='submit' value='Submit' name='submit' style="margin-left:1%" class="button-1"/>
    </form>
  </div>

</body>

</html> -->