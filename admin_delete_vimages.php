<?php
include "connect.php";
$host = "localhost";
$user = "root";
$password = "";
$database = "manpro";

$conn = mysqli_connect($host, $user, $password, $database);
$email = $_SESSION['email'];
$query = "DELETE FROM content WHERE id='".$_GET['id']."'";
$result = mysqli_query($conn, $query);

header('Location: ./admin_files.php');

?>