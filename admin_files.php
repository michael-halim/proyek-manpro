<?php
// include 'connect.php';
// if (!isset($_SESSION['email'])) {
// 	header('location: login.php');
// }
// else if ($_SESSION['email'] != "admintokopetra@gmail.com") {
// 	header('location: home.php');
// }
include "connect.php";

?>

<!DOCTYPE html>
<html>

<head>
    <title>Proyek Tekweb</title>
    <?php include('assets/header.php'); ?>
    <link rel="stylesheet" type="text/css" href="assets/css/admin_sidebar.css">
    <link rel="stylesheet" type="text/css" href="assets/css/admin_home.css">
    <link rel="stylesheet" href="assets/css/admin_files.css">

    <script>
        $(document).ready(function() {
            $.ajax({
                url : 'admin_fetch_files.php', 
                method : 'POST', 
                data : {
                    
                }, 
                success:function(result){
                    $('#upload-table').DataTable().destroy();
                    $('#upload-table').html(result.output);
                    $('#upload-table').DataTable();
                },
                error:function(result){
                    
                }
            });
        });
    </script>
</head>

<body>
    <div class="row">
        <?php include('assets/admin_sidebar.php'); ?>

        <div class="col-md-8">
            <div class="container">
                <h1>Content For Uploaded Files</h1>
                    <table id="upload-table">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</body>
</html>