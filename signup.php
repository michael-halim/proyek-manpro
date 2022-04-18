<?php
include 'connect.php';
header('Content-type: application/json');
date_default_timezone_set("Asia/Bangkok");

// FILE UNTUK HANDLE REQUEST SIGNUP
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // declare + assign
    $name = $_POST['name'];
    $date = $_POST['date'];
    $phone = $_POST['phone'];

    $email = $_POST['email'];
    $cekemail = '%' . $email . '%';
    $password = hash("sha512", $_POST['password']);

    // check data duplicate
    $sql = "SELECT * FROM user WHERE email LIKE ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$cekemail]);
    $stmt = $stmt->fetch();

    if (!$stmt) {
        // Masukkan Data ke DB
        $salt = hash("sha512", uniqid());
        $hashed_pw = hash('sha512', $salt . $password);
        $now = date("Y-m-d H:i:s");
        $sql = "INSERT INTO user VALUES (DEFAULT,?,?,?,?,?,?,?,?,?,?,?,?,?,DEFAULT)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email, $salt, $hashed_pw, $name, $phone, $date, 0, '', $now, '', '', $now, '']);

        // Struktur Database
        // id | email | salt | password | nama | hp | lahir | ketua | update_ketua | createdAt | updatedProfileAt | updatedProfileBy | last_login | profile_pic_path | group_member

        $_SESSION['email'] = $email;
        echo json_encode(['location' => '/manpro/home.php']);

    } else {
        echo json_encode(['notif' => 'Email yang anda masukkan telah terdaftar!']);
    }
}