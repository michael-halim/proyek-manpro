<?php
    header('Content-type: application/json');
    include 'connect.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // declare + assign
        $email = $_POST['email'];
        $password = $_POST['password'];

        // check data login
        // SELECT * FROM user WHERE email = '$username'
        $sql = "SELECT * FROM user WHERE email=? LIMIT 1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);
        
        while($rowData = $stmt->fetch()){
			$hashed_pw = hash('sha512',$password);

			if (hash('sha512', $rowData['salt']. $hashed_pw) === $rowData['password']){
                $_SESSION['email'] = $email;
                
                if($_SESSION['email'] === 'admin@gmail.com'){
                    echo json_encode(['location' => '/manpro/admin_home.php']);
                }
                else{
                    echo json_encode(['location'=>'/manpro/home.php']);
                }
			}
			else{
				echo json_encode(['notif'=>'Email atau Password Salah!']);
			}
						
		}













        // jika yang login adalah admin
        // if ($stmt) {
        //     if ($stmt['id'] == 0) {
        //         $_SESSION['email'] = $email;
        //         echo json_encode(['location'=>'/tokopetra/seller_home.php']);
        //     }
        //     else if ($stmt['id'] >= 1) {
        //         $_SESSION['email'] = $email;
        //         echo json_encode(['location'=>'/tokopetra/home.php']);
        //     }
        // }
        // else {
        //     // check email
        //     $sql = "SELECT * FROM user WHERE email=?";
        //     $stmt = $pdo->prepare($sql);
        //     $stmt->execute([$email]);
        //     $stmt = $stmt->rowCount();
        //     if($stmt) {
        //         echo json_encode(['notif'=>'Password Salah!']);
        //     }
        //     else {
        //         echo json_encode(['notif'=>'Email yang anda masukkan tidak terdaftar!']);
        //     }
        // }
    }
?>