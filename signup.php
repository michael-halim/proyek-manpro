<?php
    header('Content-type: application/json');
    include 'connect.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // declare + assign
        $name = $_POST['name'];
        $date = $_POST['date'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $cekemail = '%'.$email.'%';
        $password = hash("sha512", $_POST['password']);

        // check data duplicate
        $sql = "SELECT * FROM user WHERE email LIKE ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$cekemail]);
        $stmt = $stmt->fetch();
        
        if(!$stmt) {
        // query
            $salt = hash("sha512",uniqid());
            $hashed_pw = hash('sha512', $salt . $password );
            $last_login = date("Y-m-d H:i:s");
            $sql = "INSERT INTO user VALUES (DEFAULT,?,?,?,?,?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$email, $salt, $hashed_pw, $name, $phone, $date,0,$last_login]);

            $_SESSION['email'] = $email;
            echo json_encode(['location'=>'/manpro/home.php']);
        }
        else {
            echo json_encode(['notif'=>'Email yang anda masukkan telah terdaftar!']);
        }
        
    }
?>