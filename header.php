<?php

session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="node_modules\bootstrap-icons\font\bootstrap-icons.css">
    <script src="node_modules\jquery\jquery-bootstrap.js"></script>
    <script src="assets\js\main.js"></script>
    <link rel="stylesheet" href="node_modules\sweetalert2\dist\sweetalert2.css">
    <script src="node_modules\sweetalert2\dist\sweetalert2.js"></script>
    <link rel="stylesheet" href="node_modules\aos\dist\aos.css">

</head>

<!-- Header -->
<nav class="navbar navbar-expand-lg bg-white" data-aos="fade-down">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
        <img src="assets/music.svg"><b class="ms-3">Music Shop</b>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            
        </ul>
        <form class="d-flex" role="search" action="search.php" method="post">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php 
                include("PHP/database.php");

                if (empty($_SESSION["username"])) {
                    echo '                
                    <li class="nav-item">
                        <a class="nav-link me-3" href="login.php">Login</a>
                    </li>';
                } else {
                    $user_Session = $_SESSION["username"];
                    $check_admin = "SELECT * FROM userdata WHERE username = '$user_Session' AND role = 'admin'";
                    $r_ad = mysqli_query($conn,$check_admin);
                
                    if ($r_ad and $r_ad->num_rows > 0) {
                        echo '                <li class="nav-item">
                        <a class="nav-link me-3" href="admin.php">Admin panel</a>
                    </li>';
                    }
                    echo '                
                <li class="nav-item">
                    <a class="nav-link me-3" href="backet.php">Basket</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-3" href="product.php">Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-3" href="logout.php">Logout</a>
                </li>';
                
                }
                
                ?>
            </ul>
            <input class="form-control me-2" type="search" name = "search" placeholder="Search" aria-label="Search">
            <button class="btn my-custom-button border border-black" type="submit">Search</button>
        </form>
        </div>
    </div>
</nav>

<script src="node_modules\aos\dist\aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    AOS.init();
</script>