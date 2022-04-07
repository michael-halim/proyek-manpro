<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "manpro";

$conn = mysqli_connect($host, $user, $password, $database);
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connect.php';
	$password=$_POST['currpassword']; 
	$newpassword=$_POST['newpassword'];
	$email = $_SESSION['email'];

 //    $query = "UPDATE user SET password='".$newpassword."' WHERE email = '".$email."'";
 //    $user = mysqli_query($conn, $query);
 //    header("Location: ./settings.php");

 //    $count=mysql_num_rows($user);
	// if($count==1)
	// {
	// $mysql="UPDATE user SET password='$newpassword' WHERE email = '".$email."'";
	// $result2=mysqli_query($mysql);
	// echo "Updated Successfully";

	/*----------------------------------------------HASH------------------------------------------*/

    $sql = "SELECT * FROM user WHERE email=? LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);

    while($rowData = $stmt->fetch())
    {
		$hashed_pw = hash('sha512',$password);

		if (hash('sha512', $rowData['salt']. $hashed_pw) === $rowData['password']){
            // session_start();
            // $_SESSION['email'] = $mail;
            
            // if($_SESSION['email'] === 'admin@gmail.com'){
            //     header("Location: ./admin_home.php");
            // }
            // else{
            //     header("Location: ./home.php");
            // }

			$hashed_pw2 = hash('sha512',$newpassword);
			$hashnew = hash('sha512', $rowData['salt']. $hashed_pw2);
            $query = "UPDATE user SET password='".$hashnew."' WHERE email = '".$email."'";
		    $user = mysqli_query($conn, $query);
		    header("Location: ./logout.php");
		}
		else{
			echo json_encode(['notif'=>'Email atau Password Salah!']);
		}
	}
	
} else {
?>

<!DOCTYPE html>
<html>

<head>
	<title>Settings</title>
	<?php include('assets/header.php'); ?>
	<link rel="stylesheet" type="text/css" href="assets/css/admin_sidebar.css">
	<link rel="stylesheet" type="text/css" href="assets/css/admin_home.css">

	<script src="assets/js/admin_home.js"></script>
	<script src="assets/js/admin_sidebar.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script>
		// $(document).ready(function() {
		// 	$('.nav-link').click(function() {
		// 		$('.nav-link').removeClass('active');
		// 		$(this).addClass('active');
		// 	});
		// });
		$(document).ready(function() {
			$('#settings').addClass('active');
		});
	</script>
</head>
<body>
	<style>
		#title{
			margin-top:25%;
		}
		body{
            font-family: candara;
        }
	</style>
	<div class="row">
		<?php include('assets/admin_sidebar.php'); ?>
		<div class="col-md-9">
			<div class="container">
				<div style="margin-top: 20%;">
					<div class="mb-3 row">
						<?php
                            $email = $_SESSION['email'];
                            $query = "SELECT * FROM user WHERE email = '".$email."'";
                            $user = mysqli_query($conn, $query);

                            while($data = mysqli_fetch_array($user)){
                                $profile = $data;
                                break;
                            }
                            /*echo $profile['nama'];*/
                        ?>     
						<script>
                            function doEdit(){
                                /*document.getElementById('showDob').style.display = 'none';*/
                                document.getElementById('showPhone').style.display = 'none';
                                document.getElementById('showEdit').style.display = 'none';

                                /*document.getElementById('changeDob').style.display = 'block';*/
                                document.getElementById('changeCurr').style.display = 'block';
                                document.getElementById('changePhone').style.display = 'block';
                                document.getElementById('changeEdit').style.display = 'block';
                            }
                        </script>
						<h1>Edit Password</h1>
						<hr>
						<form action="" method="post">
						<label for="staticEmail" class="col-sm-2 col-form-label">Current Password</label>
						<div class="col-sm-10 mb-3">
                            <input type="password" class="form-control" name="currpassword" id="changeCurr">
                        </div>
						<label for="staticEmail" class="col-sm-2 col-form-label">New Password</label>
						<div class="col-sm-10 mb-3">
                            <input type="password" class="form-control" name="newpassword" id="changePhone">
                        </div>

						
					</div>
                        <button type="submit" id="changeEdit" onclick="doEdit();" class="btn"i class="fa fa-edit" style="background-color: #7C99AC;"></i>Confirm</i>
                        </button>
                    </form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

<?php
}

?>