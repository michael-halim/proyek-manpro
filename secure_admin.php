<?php
if (!isset($_SESSION['email']) && $_SESSION['email']!='admin@gmail.com'){
  header("Location: login.php");
}
?>