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
      <link href="assets/css/admin_login.css" rel="stylesheet" />
   </head>
   <body>

           <!-- Navigation-->
           <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#page-top">Admin Login</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#projects">Projects</a></li>
                        <li class="nav-item"><a class="nav-link" href="#signup">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container py-5 px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
                <div class="d-flex justify-content-center">
                    <div class="text-center">


                        <h1 class="py-4 mb-4 mx-auto my-0 text-uppercase text-light">Admin Control Panel</h1>
                        <h2 class="text-white-50 mx-auto mt-2 mb-5">Lorem ipsum dolor sit amet admine dolo.</h2>


                        <button type="button" class="btn btn-outline-primary btn-lg bg-dark text-white" data-bs-toggle="modal" data-bs-target="#myModal">Sign In</button>
                        <button type="button" class="btn btn-outline-warning btn-lg bg-dark text-white" data-bs-toggle="modal" data-bs-target="#myModal2">Sign Up</button>


                    </div>
                </div>
            </div>
        </header>
        <!-- About-->
        <section class="about-section text-center" id="about">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8">
                        <h2 class="text-white mb-4">Built with Bootstrap 5</h2>
                        <p class="text-white-50">
                        Lorem ipsum dolor sit amet. Rem ullam consequatur ut iusto eligendi non galisum veritatis aut architecto debitis.
                        Et tenetur molestiae rem unde animi in molestiae necessitatibus quo iste dolor.
                        </p>
                    </div>
                </div>
                <img class="img-fluid" src="assets/img/ipad.png" alt="..." />
            </div>
        </section>
        <!-- Projects-->
        <section class="projects-section bg-light" id="projects">
            <div class="container px-4 px-lg-5">
                <!-- Featured Project Row-->
                <div class="row gx-0 mb-4 mb-lg-5 align-items-center">
                    <div class="col-xl-8 col-lg-7"><img class="img-fluid mb-3 mb-lg-0" src="assets/img/bg-masthead.jpg" alt="..." /></div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="featured-text text-center text-lg-left">
                            <h4>Shoreline</h4>
                            <p class="text-black-50 mb-0"> Lorem ipsum dolor sit amet. Rem ullam consequatur ut iusto eligendi non galisum veritatis aut architecto debitis.
                        Et tenetur molestiae rem unde animi in molestiae necessitatibus quo iste dolor.</p>
                        </div>
                    </div>
                </div>
                <!-- Project One Row-->
                <div class="row gx-0 mb-5 mb-lg-0 justify-content-center">
                    <div class="col-lg-6"><img class="img-fluid" src="assets/img/demo-image-01.jpg" alt="..." /></div>
                    <div class="col-lg-6">
                        <div class="bg-black text-center h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-left">
                                    <h4 class="text-white">Misty</h4>
                                    <p class="mb-0 text-white-50">An example of where you can put an image of a project, or anything else, along with a description.</p>
                                    <hr class="d-none d-lg-block mb-0 ms-0" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Project Two Row-->
                <div class="row gx-0 justify-content-center">
                    <div class="col-lg-6"><img class="img-fluid" src="assets/img/demo-image-02.jpg" alt="..." /></div>
                    <div class="col-lg-6 order-lg-first">
                        <div class="bg-black text-center h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-right">
                                    <h4 class="text-white">Mountains</h4>
                                    <p class="mb-0 text-white-50">Another example of a project with its respective description. These sections work well responsively as well, try this theme on a small screen!</p>
                                    <hr class="d-none d-lg-block mb-0 me-0" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Signup-->
        <section class="signup-section" id="signup">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5">
                    <div class="py-4 col-md-10 col-lg-8 mx-auto text-center">
                        <i class="far fa-paper-plane fa-2x mb-2 text-white"></i>
                        <h2 class="text-white mb-5"></h2>
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- * * SB Forms Contact Form * *-->
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- This form is pre-integrated with SB Forms.-->
                        <!-- To make this form functional, sign up at-->
                        <!-- https://startbootstrap.com/solution/contact-forms-->
                        <!-- to get an API token!-->
                        <form class="form-signup" id="contactForm" data-sb-form-api-token="API_TOKEN">
                            <!-- Email address input-->
                            <div class="row input-group-newsletter">
                                <div class="col"><input class="form-control" id="emailAddress" type="email" placeholder="Enter email address..." aria-label="Enter email address..." data-sb-validations="required,email" /></div>
                                <div class="col-auto"><button class="btn btn-primary disabled" id="submitButton" type="submit">Notify Me!</button></div>
                            </div>
                            <div class="invalid-feedback mt-2" data-sb-feedback="emailAddress:required">An email is required.</div>
                            <div class="invalid-feedback mt-2" data-sb-feedback="emailAddress:email">Email is not valid.</div>
                            <!-- Submit success message-->
                            <!---->
                            <!-- This is what your users will see when the form-->
                            <!-- has successfully submitted-->
                            <div class="d-none" id="submitSuccessMessage">
                                <div class="text-center mb-3 mt-2 text-white">
                                    <div class="fw-bolder">Form submission successful!</div>
                                    To activate this form, sign up at
                                    <br />
                                    <a href="#">https://startbootstrap.com/solution/contact-forms</a>
                                </div>
                            </div>
                            <!-- Submit error message-->
                            <!---->
                            <!-- This is what your users will see when there is-->
                            <!-- an error submitting the form-->
                            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3 mt-2">Error sending message!</div></div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact-->
        <section class="py-4 contact-section bg-black">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Address</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="small text-black-50">4923 Market Street, Orlando FL</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-envelope text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Email</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="small text-black-50"><a href="#!">hello@yourdomain.com</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-3 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-mobile-alt text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Phone</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="small text-black-50">+1 (555) 902-8832</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="py-3 social d-flex justify-content-center">
                    <a class="mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                    <a class="mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                    <a class="mx-2" href="#!"><i class="fab fa-github"></i></a>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer bg-black small text-center text-white-50"><div class="container px-4 px-lg-5">Copyright &copy; Your Website 2021</div></footer>










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
                        <button id="signin" class="btn btn-default btn-dark btn-block text-uppercase">Login</button>
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