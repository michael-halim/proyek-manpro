<?php
include 'connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Untuk Bersihin Input
    function test_input($data){
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
                $statement->execute(array($filename, $target_file, $aktif, $createdBy));
            }
        }
    }

    header('Location: admin_home.php?stat=1');
}