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
<?php require_once 'assets/mobileadmintopnav.php'; ?>




    <!-- end navbar -->
    <div class="profile shwnav">
    <h2>Leader List</h2>
    <div class="container bootstrap snippets bootdey">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body p-t-0">
                    <div class="input-group">
                        <input type="text" id="example-input1-group2" name="example-input1-group2" class="form-control" placeholder="Search">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-effect-ripple btn-primary"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="panel">
                <div class="panel-body p-t-10">
                    <div class="media-main">
                        <a class="pull-left" href="#">
                            <img class=" circle responsive-img" src="https://bootdey.com/img/Content/user_1.jpg" alt="">
                        </a>
                        <div class="pull-right btn-group-sm">
                            <a href="#" class="btn btn-success tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Edit">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a href="#" class="btn btn-danger tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Delete">
                                <i class="fa fa-close"></i>
                            </a>
                        </div>
                        <div class="info">
                            <h4>Jonathan Smith</h4>
                            <p class="text-muted">Graphics Designer</p>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
 
                </div>
            </div>
        </div>

        
        <div class="col-sm-6">
            <div class="panel">
                <div class="panel-body p-t-10">
                    <div class="media-main">
                        <a class="pull-left" href="#">
                            <img class="thumb-lg circle bx-s" src="https://bootdey.com/img/Content/user_2.jpg" alt="">
                        </a>
                        <div class="pull-right btn-group-sm">
                            <a href="#" class="btn btn-success tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Edit">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a href="#" class="btn btn-danger tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Delete">
                                <i class="fa fa-close"></i>
                            </a>
                        </div>
                        <div class="info">
                            <h4>Jonathan Smith</h4>
                            <p class="text-muted">Graphics Designer</p>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                </div>
            </div>
        </div>


        <div class="col-sm-6">
            <div class="panel">
                <div class="panel-body p-t-10">
                    <div class="media-main">
                        <a class="pull-left" href="#">
                            <img class="thumb-lg circle bx-s" src="https://bootdey.com/img/Content/user_3.jpg" alt="">
                        </a>
                        <div class="pull-right btn-group-sm">
                            <a href="#" class="btn btn-success tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Edit">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a href="#" class="btn btn-danger tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Delete">
                                <i class="fa fa-close"></i>
                            </a>
                        </div>
                        <div class="info">
                            <h4>Jonathan Smith</h4>
                            <p class="text-muted">Graphics Designer</p>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    
                </div>
            </div>
        </div>


        <div class="col-sm-6">
            <div class="panel">
                <div class="panel-body p-t-10">
                    <div class="media-main">
                        <a class="pull-left" href="#">
                            <img class="thumb-lg circle bx-s" src="https://bootdey.com/img/Content/user_1.jpg" alt="">
                        </a>
                        <div class="pull-right btn-group-sm">
                            <a href="#" class="btn btn-success tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Edit">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a href="#" class="btn btn-danger tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Delete">
                                <i class="fa fa-close"></i>
                            </a>
                        </div>
                        <div class="info">
                            <h4>Jonathan Smith</h4>
                            <p class="text-muted">Graphics Designer</p>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    
                </div>
            </div>
        </div>


        <div class="col-sm-6">
            <div class="panel">
                <div class="panel-body p-t-10">
                    <div class="media-main">
                        <a class="pull-left" href="#">
                            <img class="thumb-lg circle bx-s" src="https://bootdey.com/img/Content/user_2.jpg" alt="">
                        </a>
                        <div class="pull-right btn-group-sm">
                            <a href="#" class="btn btn-success tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Edit">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a href="#" class="btn btn-danger tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Delete">
                                <i class="fa fa-close"></i>
                            </a>
                        </div>
                        <div class="info">
                            <h4>Jonathan Smith</h4>
                            <p class="text-muted">Graphics Designer</p>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    
                </div>
            </div>
        </div>


        <div class="col-sm-6">
            <div class="panel">
                <div class="panel-body p-t-10">
                    <div class="media-main">
                        <a class="pull-left" href="#">
                            <img class="thumb-lg circle bx-s" src="https://bootdey.com/img/Content/user_3.jpg" alt="">
                        </a>
                        <div class="pull-right btn-group-sm">
                            <a href="#" class="btn btn-success tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Edit">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a href="#" class="btn btn-danger tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Delete">
                                <i class="fa fa-close"></i>
                            </a>
                        </div>
                        <div class="info">
                            <h4>Jonathan Smith</h4>
                            <p class="text-muted">Graphics Designer</p>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    
                </div>
            </div>
        </div>
    </div>

</div>


</div>


</div>

    </div>
    <br>



            <!-- <div class="card-footer">
                <div class="d-flex justify-content-around text-dark">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    <i class="fa fa-book" aria-hidden="true"></i>
                    <i class="fa fa-youtube-play" aria-hidden="true"></i>
                    <i class="fa fa-user" aria-hidden="true"></i>
                </div>
                
            </div> -->



            <!-- batas copas -->


			<?php require_once 'assets/mobilebottomnavadmin.php'; ?>








            <!-- baats copas -->
        </div>
    </div>








</body>



</html>