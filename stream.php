<?php
include 'connect.php';
if (isset($_SESSION['email'])) {
	// if ($_SESSION['email'] == "admintokopetra@gmail.com") {
	// 	header('location: seller_home.php');
	// } else {
	// 	header('location: home.php');
	// }

	// echo $_SESSION['email'];
	// echo date("Y-m-d H:i:s");
	
}
?>

<!doctype html>
<html lang="en">

<?php require_once 'assets/mobilehead.php' ?>

<!-- <head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Proyek Manpro</title> -->

	<?php //include('assets/header.php'); ?>
	<!-- <script src="js/all_home_func.js"></script> -->
	<!-- <link rel="stylesheet" type="text/css" href="css/home_style.css"> -->
	<!-- <link rel="stylesheet" type="text/css" href="assets/css/uhome.css"> -->
<!-- </head> -->
<link rel="stylesheet" type="text/css" href="assets/css/ustream.css">
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
			//echo 'Logged in';
		} else {
			//echo 'Password Salah';
		}
	}
	?>


 <!-- Sidebar -->

    <!-- Sidebar -->




    <!-- navbar -->
<?php require_once 'assets/mobiletopnav.php'; ?>




    <!-- end navbar -->
    <div class="profile">
        <div class="card rounded-0">

            <div class="card-header"> 
            <div class="author-info">
                        <div>
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nostrum exercitationem alias
                                libero mollitia esse, illum odio ex perspiciatis omnis voluptate ducimus, corporis
                                cupiditate nobis corrupti voluptatum fugit at dolor eaque. <a href="#">Show More</a></p>
                        </div>
                    </div>
            <!-- <img src="assets/img/cover.png" class="card-img-top rounded-0 shadow-lg " alt="bootcatch light admin theme"> -->

            </div>

            <div class="card-body p-3">

                    <div class="horizontal-line">
                        <span class="border-bottom w-75"></span>
                    </div>

                    <div class="containerforvid"> 
  <iframe class="responsive-iframe" src="https://www.youtube.com/embed/DHFkOIMm7Ms"></iframe>
</div>


                    <div class="photos border shadow-sm">
                        <div class="d-flex justify-content-end">
                            <a href="#">View All</a>
                        </div>
                        <div class="row justify-content-center">
                            <img src="img/pic1.jpg">
                            <img src="img/pic2.jpg">
                            <img src="img/pic3.jpg">
                            <img src="img/pic4.jpg">
                            <img src="img/pic5.jpg">
                            <img src="img/pic6.jpg">
                            <img src="img/pic7.jpg">
                            <img src="img/pic1.jpg">
                            <img src="img/pic2.jpg">
                        </div>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nostrum exercitationem alias
                                libero
                                mollitia esse,
                                illum odio ex perspiciatis omnis voluptate ducimus, corporis cupiditate nobis corrupti
                                voluptatum
                                fugit at
                                dolor eaque.
                            </p>

                    </div>

                <!-- more contaienr -->
                <div class="container mb-5">
                    <div class="card">
                        <div class="card-body">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nostrum exercitationem alias
                                libero
                                mollitia esse,
                                illum odio ex perspiciatis omnis voluptate ducimus, corporis cupiditate nobis corrupti
                                voluptatum
                                fugit at
                                dolor eaque.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- more container -->


            </div>



            <!-- <div class="card-footer">
                <div class="d-flex justify-content-around text-dark">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    <i class="fa fa-book" aria-hidden="true"></i>
                    <i class="fa fa-youtube-play" aria-hidden="true"></i>
                    <i class="fa fa-user" aria-hidden="true"></i>
                </div>
                
            </div> -->



            <!-- batas copas -->


			<?php require_once 'assets/mobilebottomnav.php'; ?>








            <!-- baats copas -->
        </div>
    </div>








</body>



</html>