<?php
// include 'connect.php';
// if (!isset($_SESSION['email'])) {
// 	header('location: login.php');
// }
// else if ($_SESSION['email'] != "admintokopetra@gmail.com") {
// 	header('location: home.php');
// }
?>

<!DOCTYPE html>
<html>

<head>
    <title>Proyek Tekweb</title>
    <?php include('assets/header.php'); ?>
    <link rel="stylesheet" type="text/css" href="assets/css/admin_sidebar.css">
    <link rel="stylesheet" type="text/css" href="assets/css/admin_home.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>
        $(document).ready(function() {
        });
    </script>
</head>

<body>
    <div class="row">
        <?php include('assets/admin_sidebar.php'); ?>

        <div class="col-md-8">
            <div class="container">
                <br>
                <h1><i class="fa-solid fa-clipboard"></i>Recap</h1>
            </div>
        </div>
    </div>


</body>

</html>