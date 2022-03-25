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
        $_SESSION['useremail']=$email;
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
    }
?>