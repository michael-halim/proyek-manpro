<?php
include 'connect.php';
if (isset($_SESSION['email'])) {
	// if ($_SESSION['email'] == "admintokopetra@gmail.com") {
	// 	header('location: seller_home.php');
	// } else {
	// 	header('location: home.php');
	// }
	echo $_SESSION['email'];
	echo date("Y-m-d H:i:s");
	
}
?>

<!doctype html>
<html lang="en">

<head>
	<title>Proyek Manpro</title>

	<!-- <?php include('assets/header.php'); ?>
	<script src="js/all_home_func.js"></script>
	<link rel="stylesheet" type="text/css" href="css/home_style.css"> -->
</head>

<body>
	<?php
	// admin sha512
	// c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec
	// $getDataSQL = "SELECT * FROM user";
	//     $stmtData = $pdo->prepare($getDataSQL);
	//     $stmtData->execute();

	//     while($rowData = $stmtData->fetch()){
	// 		echo hash('sha512', $rowData['email']);

	//     }
	// echo '<br>';
	// $salt = hash("sha512", uniqid());
	// echo $salt;
	// var_dump($salt);


	// echo '<br><br><br>';
	// $hashed = hash('sha512',$salt . 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec');
	// echo $hashed;


	// Sistem Login

	$username = 'admin@gmail.com';
	$password = 'admin';

	$sql = "SELECT * FROM user WHERE email = '$username'";
	// var_dump($sql);

	$stmtData = $pdo->prepare($sql);
	$stmtData->execute();

	while ($rowData = $stmtData->fetch()) {
		$hashed_pw = hash('sha512', $password);

		if (hash('sha512', $rowData['salt'] . $hashed_pw) === $rowData['password']) {
			echo 'Logged in';
		} else {
			echo 'Password Salah';
		}
	}
	?>


	<script>

	</script>
</body>

</html>