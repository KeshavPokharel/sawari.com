<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sawari: The Next Generation Ride Hailing Platform</title>

    <!-- Favicons -->
    <link href="assets/img/icon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>
    <dialog id="myAccount" style=" margin-right: 7.5%;
width: 141px;
border: 1px;
border-radius: 5%;
margin-top: 85px;">
        <?php include "forms/accountCheck.php"; ?>
        <button class="btn btn-danger" onclick="myAccount.close()">close</button>
    </dialog>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center">

            <h1 class="logo me-auto"><a href="index.php">Sawari</a></h1>
            <!-- Image logo 
        <a href="index.php" class="logo me-auto"><img src="assets/img/sawari.png" alt="" class="img-fluid"></a> -->

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="index.php" class="active">Home</a></li>
                    <li><a href="about.php">About us</a></li>
                    <li><a href="book.php">Book a Ride</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <?php if (isset($_COOKIE['auth_token'])) {
                        echo '<li><a class="getstarted" style=" cursor:pointer;" onclick="myAccount.showModal()">My Account</a></li>';
                    } else {
                        echo '<li><a href="register.php" class="getstarted" style=" cursor:pointer;">Login/Register</a></li>';
                    } ?>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->
    <section id="about" class="about">
        <div class="text-center text-lg-start mt-2 pt-2 login-cont">
            <p class="small fw-bold mt-2 pt-1 mb-0">Are you a
                rider? <a href="riderReg.php" class="link-danger">Rider Registration</a></p>
        </div>
            

</body>