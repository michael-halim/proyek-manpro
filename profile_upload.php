<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // ambil data file
    $namaFile = $_FILES['berkas']['name'];
    $namaSementara = $_FILES['berkas']['tmp_name'];

    // tentukan lokasi file akan dipindahkan
    $dirUpload = "image/";

    // pindahkan file
    $terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);

    if ($terupload) {
        $url = $dirUpload.$namaFile;
        include 'connect.php';

        $host = "localhost";
        $user = "root";
        $password = "";
        $database = "manpro";

        $conn = mysqli_connect($host, $user, $password, $database);
        session_start();
        $email = $_SESSION['email'];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            include 'connect.php';
            $query = "UPDATE user SET foto='".$url."' WHERE email = '".$email."'";
            $user = mysqli_query($conn, $query);
            header("Location: ./userProfile.php");
        }
    } else {
        echo "Upload Gagal!";
    }

}
header('Location: userProfile.php');
?>