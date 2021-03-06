<?php
include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Baca Alkitab &mdash;</title>
  <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet">
  <link rel="stylesheet" href="assets/user/css/styles-merged.css">
  <link rel="stylesheet" href="assets/user/css/style.min.css">
  <link rel="stylesheet" href="assets/user/css/custom.css">
  <link rel="stylesheet" href="assets/user/css/responsivevideo.css">

  <style>
    .probootstrap-header {
      background-color: cadetblue;
      background-image: url("assets/user/img/gunung.jpg");
      background-position: center center;
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
      background-color: #464646;
      width: 100%;
      height: auto;
    }
  </style>
</head>

<body>
  <header role="banner" class="probootstrap-header">
    <div class="container-fluid">
      <?php require_once('user_navbar.php'); ?>
      <section class="probootstrap-intro">
        <div class="container">
          <div class="row">
            <div id="carouselvideo" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner " role="listbox">
                <?php

                $sql = "SELECT original_name , path , isActive
          FROM content
            WHERE isActive = True";

                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                echo '<div class="item active">';
                while ($row = $stmt->fetch()) {
                  $judul = $row["original_name"];
                  $path = $row["path"];

                  echo ' <iframe width="780" height="450" src="' . $path . '" frameborder="0" allowfullscreen></iframe>';
                  echo '<p>' . $judul . '</p>   </div>';
                  echo '<div class="item ">';
                }
                echo ' <iframe width="780" height="450" src="' . $path . '" frameborder="0" allowfullscreen></iframe>';
                echo '<p>' . $judul . '</p>   </div>';
                ?>
                <br>
                <br>
              </div>
              <ol class="carousel-indicators ">
                <li href="#carouselvideo" data-slide="prev" class="btn btn-info "></li>
                <li href="#carouselvideo" data-slide="next" class="btn btn-info "></li>
              </ol>

            </div>
          </div>

        </div>
    </div>
    </div>
    </section></div></header>
  <?php require_once('user_footer.php'); ?>
</body>

</html>