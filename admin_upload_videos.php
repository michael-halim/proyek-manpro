<?php
    include 'connect.php';
    if (isset($_POST['submit'])){
        $created = $_SESSION['email'];
        $link1=$_POST['judul'];
        $link2=$_POST['link'];
        $query = "INSERT INTO content (original_name , path , isActive, createdAt, createdBy) VALUES (?,?,1,NOW(),?)";
        $statement= $pdo->prepare($query);
        $statement->execute(array($link1, $link2, $created));
        if($query)
        {
            header('Location: admin_home.php?stat=1');
        }
    }
?>