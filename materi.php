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
		<h2>Materi & bacaan</h2>
        <ul class="collapsible">
    <li>
      <div class="collapsible-header"><i class="material-icons">books</i>First</div>
      <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">books</i>Second</div>
      <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">books</i>Third</div>
      <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
    </li>
  </ul>
		<div class="container mb-5">
		<img src="assets/img/cover.png" class="card-img-top rounded-0 shadow-lg mb-5" alt="bootcatch light admin theme">
		</div>
            <!-- <div class="card-header">  -->


            <!-- </div> -->

            <div class="card-body py-5 ">
                <div class="author">
                    <!-- <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTB6At_WsdMZrn_ImShsz-Wm3yjXRdjZ905U8gLF_XJ3MJMbaEE9BIk_Q-2ALVvEOJXcfY&usqp=CAU"
                        class="rounded-circle img-thumbnail shadow" width="150" alt="bootcatch light admin theme"> -->
                    <!-- <div class="author-data ">
                        <h4 class="text-dark mb-3" href="#"></h4>
                        <div class="mt-2 mb-2 w-100 d-flex justify-content-between">
                            <button class="btn btn-primary btn-sm btn-rounded d-flex align-items-center">
                                <i class="material-icons mr-2">person_pin</i>
                                Member
                            </button>
                            <button class="btn btn-warning btn-sm btn-rounded d-flex align-items-center">
                                <i class="material-icons mr-2">message</i>
                                Comunity</button>
                            <button class="btn btn-success btn-sm btn-rounded d-flex align-items-center">
                                <i class="material-icons mr-2">people</i>
                                Group
                            </button>
                        </div>
                    </div> -->
                    <!-- <div class="author-info">
                        <div>
                            <h5>3K</h5>
                            <p>Friends</p>
                        </div>
                        <div>
                            <h5>99</h5>
                            <p>Photos</p>
                        </div>
                        <div>
                            <h5>1k</h5>
                            <p>Followers</p>
                        </div>
                    </div> -->
                    <div class="horizontal-line">
                        <span class="border-bottom w-75"></span>
                    </div>
                    <div class="author-info">
                        <div>
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nostrum exercitationem alias
                                libero mollitia esse, illum odio ex perspiciatis omnis voluptate ducimus, corporis
                                cupiditate nobis corrupti voluptatum fugit at dolor eaque. <a href="#">Show More</a></p>
                        </div>
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
                    </div>
                </div>

                <!-- more contaienr -->
                <div class="container">
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