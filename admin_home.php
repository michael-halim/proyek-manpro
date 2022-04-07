<?php
// include 'connect.php';
// if (!isset($_SESSION['email'])) {
// 	header('location: login.php');
// }
// else if ($_SESSION['email'] != "admintokopetra@gmail.com") {
// 	header('location: home.php');
// }
?>

<!DOCTYPE html>
<html>

<head>
	<title>Proyek Tekweb</title>
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
			$('#home').addClass('active');
		});
	</script>
</head>

<body>
	<div class="row">
		<?php include('assets/admin_sidebar.php'); ?>

		<div class="col-md-9">
			<h1>Content</h1>
		</div>
	</div>


</body>

</html>