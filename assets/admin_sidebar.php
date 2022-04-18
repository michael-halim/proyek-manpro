<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "manpro";

$conn = mysqli_connect($host, $user, $password, $database);
?>
<style>
    body{
            font-family: candara;
        }
</style>

<div class="col-md-3">
    <div class="d-flex flex-column vh-100 flex-shrink-0 p-3 text-white bg-dark"> <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none"> <svg class="bi me-2" width="40" height="32"> </svg> <span class="fs-4">BBBootstrap</span> </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
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
        </ul>
        <hr>
        <div class="dropdown"> <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false"> 
            <?php
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
            <img src="<?php echo $foto ?>" alt="" width="32" height="32" class="rounded-circle me-2"> <strong>
            <?php echo $nama; ?></strong> </a>
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
</div>