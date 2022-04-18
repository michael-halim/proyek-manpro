<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<aside class="sidebar position-fixed top-0 left-0 overflow-auto h-100 float-left" id="show-side-navigation1">
  <i class="uil-bars close-aside d-md-none d-lg-none" data-close="show-side-navigation1"></i>
  <div class="sidebar-header d-flex justify-content-center align-items-center px-3 py-4">
   <img
         class="rounded-pill img-fluid"
         width="65"
         src="https://uniim1.shutterfly.com/ng/services/mediarender/THISLIFE/021036514417/media/23148907008/medium/1501685726/enhance"
         alt="">
    <div class="ms-2">
      <h5 class="fs-6 mb-0">
        <div class="dropdown"> <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false"> <strong> John W </strong> </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item" href="#">New project</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
            </ul>
        </div>  
      </h5>
      <p class="mt-1 mb-0">Lorem ipsum dolor sit amet consectetur.</p>
    </div>
  
</div> 
  
  <ul class="categories list-unstyled">
      
  <li class="nav-item">
                <a href="admin_home.php" id="home" class="nav-link text-white">
                    <i class="fa fa-home"></i>
                    <span class="ms-2">Home</span>
                </a>
            </li>
            <li>
                <a href="admin_group.php" id="group" class="nav-link text-white">
                    <i class="fa-solid fa-user-group"></i>
                    <span class="ms-2">Manage Group</span>
                </a>
            </li>
            <li>
                <a href="admin_users.php" id="users" class="nav-link text-white">
                    <i class="fa-solid fa-address-card"></i>
                    <span class="ms-2">Manage Users</span>
                </a>
            </li>
            <li>
                <a href="admin_group_leader.php" id="leader" class="nav-link text-white">
                    <i class="fa-solid fa-users"></i>
                    <span class="ms-2">Manage Group Leader</span>
                </a>
            </li>
            <li>
                <a href="admin_recap.php" id="recap" class="nav-link text-white">
                    <i class="fa-solid fa-clipboard"></i>
                    <span class="ms-2">Recap</span>
                </a>
            </li>

<!--         </ul>
        <hr>
        <div class="dropdown"> <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false"> 
          // tag php ta hapus ? nya  
          <php
                                $email = $_SESSION['email'];
                                $query = "SELECT * FROM user WHERE email = '".$email."'";
                                $user = mysqli_query($conn, $query);

                                while($data = mysqli_fetch_array($user)){
                                    $profile = $data;
                                    break;
                                }

                                $foto = $profile['pic_path'];
                                $nama = $profile['nama'];
                                
                        ?>
            // tag php ta hapus ? nya  
            <img src="<php echo $foto ?>" alt="" width="32" height="32" class="rounded-circle me-2"> <strong>
            <php echo $nama; ?></strong> </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item" href="#">New project</a></li>
                <li><a class="dropdown-item" href="settings.php">Settings</a></li>
                <li><a class="dropdown-item" href="user_profile.php">Profile</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
            </ul>
        </div>
    </div>
</div> -->

</li>
  </ul>
</aside>

<section id="wrapper">
</body>
</html>

