<?php
include 'connect.php';
// if(isset($_SESSION['email'])){
// 	if ($_SESSION['email'] == "admintokopetra@gmail.com") {
// 		header('location: seller_home.php');
// 	}
// 	else {
// 		header('location: home.php');
// 	}
// }
?>

<!DOCTYPE html>
<html>

<head>
    <title>Proyek Manpro</title>

    <?php include('assets/header.php'); ?>
    <link rel="stylesheet" href="css/login_style.css">
</head>

<body>
    <img src="img/tokopetra-text.png" class="vertical-align-center">
    <div class="text-center">
        <button type="button" class="btn btn-outline-primary btn-lg bg-primary text-white" data-bs-toggle="modal" data-bs-target="#myModal">Sign In</button>
        <button type="button" class="btn btn-outline-success btn-lg bg-success text-white" data-bs-toggle="modal" data-bs-target="#myModal2">Sign Up</button>
    </div>

    <!-- SIGN IN -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="vertical-alignment-helper">
            <div class="modal-dialog vertical-align-center">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="card-title text-center mx-4 mt-2">Sign In</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" method="POST">
                        <form class="form-signin">
                            <div class="form-label-group">
                                <label for="inputEmailIn">Email address</label>
                                <input type="email" id="inputEmailIn" class="form-control" placeholder="Email address" required autofocus />
                            </div>

                            <div class="form-label-group">
                                <label for="inputPasswordIn">Password</label>
                                <input type="password" id="inputPasswordIn" class="form-control" placeholder="Password" required />
                            </div>
                            <button id="signin" class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
                            <hr class="my-2">
                            <p class="text-center">Belum punya akun Tokopetra?
                                <a href="signup.html" class="text-*-right" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#myModal2">Daftar</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SIGN UP -->
    <div id="myModal2" class="modal fade" role="dialog">
        <div class="vertical-alignment-helper">
            <div class="modal-dialog vertical-align-center">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="card-title text-center mx-4 mt-2">Sign Up</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-label-group">
                            <label for="inputFirstName">Name</label>
                            <input type="text" id="inputName" class="form-control" placeholder="Name : Michael Halim" required>
                        </div>
                        <div class="form-label-group">
                            <label for="inputDate">Date of Birth</label>
                            <input type="date" id="inputDate" class="form-control" required>
                        </div>
                        <div class="form-label-group">
                            <label for="inputPhone">Phone Number</label>
                            <input type="text" id="inputPhone" class="form-control" placeholder="Phone Number" required>
                        </div>
                        <div class="form-label-group">
                            <label for="inputEmailUp">Email address</label>
                            <input type="email" id="inputEmailUp" class="form-control" placeholder="Email address" required autofocus>
                        </div>
                        <div class="form-label-group">
                            <label for="inputPasswordUp">Password</label>
                            <input type="password" id="inputPasswordUp" class="form-control" placeholder="Password" required>
                        </div>
                        <button type="submit" id="signup" class="btn btn-lg btn-success btn-block text-uppercase">Sign
                            up</button>
                        <hr class="my-2">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $("[id='signin']").click(function() {
            var varemail = $("[id='inputEmailIn']").val();
            var varpassword = $("[id='inputPasswordIn']").val();
            $.ajax({
                url: "signin.php",
                method: "POST",
                data: {
                    email: varemail,
                    password: varpassword
                },
                success: function(result) {
                    if (result.notif) {
                        alert(result.notif);
                    }
                    if (result.location) {
                        window.location.href = result.location;
                    }
                },
                error: function(result) {

                }
            });
        });
        $("[id='signup']").click(function() {
            var varname = $("[id='inputName']").val();
            var vardate = $("[id='inputDate']").val();
            var varphone = $("[id='inputPhone']").val();
            var varemail = $("[id='inputEmailUp']").val();
            var varpassword = $("[id='inputPasswordUp']").val();
            alert(varname);
            $.ajax({
                url: "signup.php",
                method: "POST",
                data: {
                    name: varname,
                    date: vardate,
                    phone: varphone,
                    email: varemail,
                    password: varpassword
                },
                success: function(result) {
                    if (result.notif) {
                        alert(result.notif);
                    }
                    if (result.location) {
                        window.location.href = result.location;
                    }
                },
                error: function(result) {

                }
            });
        });
    </script>
</body>

</html>