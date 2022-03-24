<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "manpro";

$conn = mysqli_connect($host, $user, $password, $database);
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connect.php';
    $dob = $_POST['dob'];
    $hp = $_POST['phone'];
    $email = $_SESSION['email'];

    $query = "UPDATE user SET lahir='".$dob."', hp='".$hp."' WHERE email = '".$email."'";
    $user = mysqli_query($conn, $query);
    header("Location: ./userProfile.php");
} else {
?>
<html>
<head>
	<title>User Profile</title>
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
            $('#profile').addClass('active');
        });
    </script>
</head>
<body>
	<style>
        #title-info{
            padding:30px;
            font-family: courier new;
            font-size: 25px;
            color: #2c2a50;
        }
        body{
            font-family: candara;
        }
	</style>
	<div class="row">
        <?php include('assets/admin_sidebar.php'); ?>
        <div class="col-md-9">
            <div id="container">
                <div style="padding: 30px;margin-top: 100px;">
                    <h1 class="fw-bold mt-3" style="font-size: 100px; text-align: center;">
                        <?php
                            $email = $_SESSION['email'];
                            $query = "SELECT * FROM user WHERE email = '".$email."'";
                            $user = mysqli_query($conn, $query);

                            while($data = mysqli_fetch_array($user)){
                                $profile = $data;
                                break;
                            }
                            echo $profile['nama'];
                        ?>                   
                    </h1>
                    <hr>
                    <div class="mb-3 row">
                        <script>
                            function doEdit(){
                                /*document.getElementById('showDob').style.display = 'none';*/
                                document.getElementById('showPhone').style.display = 'none';
                                document.getElementById('showEdit').style.display = 'none';

                                /*document.getElementById('changeDob').style.display = 'block';*/
                                document.getElementById('changePhone').style.display = 'block';
                                document.getElementById('changeEdit').style.display = 'block';
                            }
                        </script>
                        <form action="" method="post">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Date of Birth</label>
                        <div class="col-sm-10 mb-3">
                            <input class="form-control" type="text" value="<?php echo $profile['lahir']; ?>" aria-label="readonly input example" readonly disabled id="showDob">
                            <input class="form-control" type="text" value="<?php echo $profile['lahir']; ?>" aria-label="readonly input example" name="dob" id="changeDob" style="display:none;">
                        </div>
                        <label for="staticEmail" class="col-sm-2 col-form-label">E-mail</label>
                        <div class="col-sm-10 mb-3">
                            <input type="text" value="<?php echo $profile['email']; ?>" class="form-control" id="staticEmail" readonly disabled>
                        </div>
                        <label for="staticEmail" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10 mb-3">
                            <input type="text" value="<?php echo $profile['hp']; ?>" class="form-control" id="showPhone" readonly disabled>
                            <input type="text" value="<?php echo $profile['hp']; ?>" class="form-control" name="phone" id="changePhone" style="display:none;">
                        </div>
                    </div>
                    <button type="button" id="showEdit" onclick="doEdit();" class="btn"i class="fa fa-edit" style="background-color: #7C99AC;"></i>Edit Profile <i class="fa fa-edit"></i></button>
                    <button type="submit" id="changeEdit" class="btn"i class="fa fa-edit" style="background-color: #7C99AC;display:none;"></i>Submit</i></button>
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