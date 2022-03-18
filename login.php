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
      <title>Proyek Manpro 11</title>
      <?php include('assets/header.php'); ?>
      <link href="assets/css/admin_login.css" rel="stylesheet" />
   </head>
   <body>

<div class="container ">
<div class="text-center">


    <h1 class="py-4 mb-4 text-uppercase text-white-50">Renungan dan Pasal Alkitab</h1>
    <h2 class="text-white-50  mb-5">Lorem ipsum dolor sit amet admine dolo.</h2>


    <button type="button" class="btn  btn-lg btn-secondary text-white" data-bs-toggle="modal" data-bs-target="#myModal">Sign In</button>
    <button type="button" class="btn btn-lg bg-dark text-white" data-bs-toggle="modal" data-bs-target="#myModal2">Sign Up</button>


</div>

</div>




      <!-- SIGN IN -->
      <div id="myModal" class="modal fade" role="dialog">
      <div class="vertical-alignment-helper">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header text-center">
                  <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body mx-3" method="POST">
                  <form class="form-signin">
                     <div class="md-form mb-4">
                        <i class="fas fa-envelope prefix grey-text"> </i> <label for="inputEmailIn">  Email Address </label>
                        <input type="email" id="inputEmailIn" class="form-control validate" placeholder="Email address" required>
                     </div>
                     <div class="md-form mb-4">
                        <i class="fas fa-lock prefix grey-text">  </i> <label for="inputPasswordIn"> Password </label>
                        <input type="password" id="inputPasswordIn" class="form-control validate" placeholder="Password" required>
                     </div>
                     <div class="modal-footer d-flex justify-content-center">
                        <button id="signin" class="btn-dark btn-lg btn-block text-uppercase">Login</button>
                     </div>
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
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Sign up</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body mx-3">

                <div class="md-form mb-4">
                <i class="fas fa-user prefix grey-text"> </i> <label for="inputPhone">Name</label>
                <input type="text" id="inputName" class="form-control" placeholder="Name: Budi" required>
                </div>

                <div class="md-form mb-4">
                <i class="fas fa-calendar-alt prefix grey-text"> </i> <label for="inputPhone">Date of Birth</label>
                <input type="date" id="inputDate" class="form-control"  required>
                </div>

                <div class="md-form mb-4">
                <i class="fas fa-phone prefix grey-text"> </i> <label for="inputPhone">Phone Number</label>
                <input type="text" id="inputPhone" class="form-control" placeholder="Phone Number" required>
                </div>

                <div class="md-form mb-4">
                <i class="fas fa-envelope prefix grey-text"> </i> <label for="inputPhone">Email</label>
                <input type="email" id="inputEmailUp" class="form-control" placeholder="Email" required>
                </div>

                <div class="md-form mb-4">
                <i class="fas fa-lock prefix grey-text"> </i> <label for="inputPhone">Password</label>
                <input type="password" id="inputPasswordUp" class="form-control" placeholder="Password" required>
                </div>


            <div class="modal-footer d-flex justify-content-center">
                <button type ="submit" id="signup" class="btn btn-dark">Sign up</button>
        </div>
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