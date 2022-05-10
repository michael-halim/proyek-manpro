<?php
    include 'connect.php';
    // $created = $_SESSION['email'];
    $link1=$_POST['link'];
    $link2=$_POST['link'];
    $query = "INSERT INTO content (original_name , path , isActive, createdAt, createdBy) VALUES (?,?,1,NOW(),NULL)";
    $statement= $pdo->prepare($query);
    $statement->execute(array($link1, $link2));
    if($query)
    {
        header('Location: admin_home.php?stat=1');
    }

?>