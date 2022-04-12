<?php
include 'connect.php';
// if(isset($_SESSION['email']))
// {
// 	if ($_SESSION['email'] == "admin@gmail.com") {
// 		header('location: admin_home.php');
// 	}
// 	else {
// 		header('location: home.php');
// 	}
// }
?>

<!DOCTYPE html>
<html>
   <head>
       
      <title>Proyek Manpro 11</title>
      <?php include('assets/header.php'); ?>
      <link href="assets/css/admin_login.css" rel="stylesheet" />

   </head>
   <body>

   <div class="comming-soon" style="background:url('assets/img/bgi.jpg');">
      <div class="first-header d-flex justify-content-center">
        <h1 class="display-4 text-white-50 text-center">Renungan Harian dan Pasal Alkitab</h1>
        <!--  -->
      </div>
      <div class="second-header text-center">
        <h2>Renungan Harian Pasal Alkitab</h2>
        <p>Kelompok 11 Manpro v1.0</p>

        <div class="d-flex justify-content-center mb-1">
          <button type="button" class="btn btn-primary btn-block w-75" href="http://petra.id/manpro11">Get Started</button>
        </div>

        <div class="d-flex justify-content-center mb-1">

          <button type="button" class="btn btn-secondary btn-block w-75 text-white" data-bs-toggle="modal" data-bs-target="#myModal">Sign In</button>
          
        </div>

        <div class="d-flex justify-content-center">
          <button type="button" class="btn bg-dark btn-block w-75 text-white" data-bs-toggle="modal" data-bs-target="#myModal2">Sign Up</button>
        </div>

      </div>
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
            alert(vardate);
            alert(varemail);
            alert(varphone);
            alert(varpassword);
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