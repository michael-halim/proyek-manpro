<?php
    include 'connect.php';
    if (isset($_POST['submit'])){
        $created = $_SESSION['email'];
        $link1=$_POST['link'];
        $link2=$_POST['link'];

        $urlnya = "https://www.youtube.com/embed/";

        $query = "INSERT INTO content (original_name , path , isActive, createdAt, createdBy) VALUES (?,?,1,NOW(),?)";
        $pasal = strtok($string, ':');
        $link2 = strtok($link2,'&');
        $link2 = substr($link2, strpos($link2, "=") + 1);
        $link2 = $urlnya.$link2;
        $statement= $pdo->prepare($query);
        $statement->execute(array($link1, $link2, $created));
        if($query)
        {
            header('Location: admin_home.php?stat=1');
        }
    }
?>