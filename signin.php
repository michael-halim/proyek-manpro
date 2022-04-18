<?php
    //header('Content-type: application/json');
    include 'connect.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // declare + assign
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        // check data login
        // SELECT * FROM user WHERE email = '$username'
        $sql = "SELECT * FROM user WHERE email = ? LIMIT 1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);

        while($rowData = $stmt->fetch()){
			$hashed_pw = hash('sha512',$password);
            $nama = $rowData["nama"];

			if (hash('sha512', $rowData['salt']. $hashed_pw) === $rowData['password']){
                session_start();
                $_SESSION['email'] = $email;
                $_SESSION['nama'] = $nama;
                
                if($_SESSION['email'] === 'admin@gmail.com'){
                    header("Location: ./admin_home.php");
                }
                else{
                    header("Location: ./home.php");
                }
			}
			else{
				header("Location: ./login.php");
			}
						
		}
    }
?>