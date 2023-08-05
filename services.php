<!DOCTYPE html>
<html lang="en">
<head>
  <dialog id="myAccount" style=" margin-right: 7.5%;
  width: 141px;
  border: 1px;
  border-radius: 5%;
  margin-top: 85px;">
  <?php  include "forms/accountCheck.php"; ?>
    <button class="btn btn-danger" onclick="myAccount.close()">close</button>
  </dialog>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sawari - Services</title>

  <!-- Favicons -->
  <link href="assets/img/icon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.php">Sawari</a></h1>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.php" class="active">Home</a></li>
          <li><a href="rides.php">My Rides</a></li>
          <li><a href="book.php">Book a Ride</a></li>
                    <!-- dropdown -->
                    <li class="dropdown"><a href="#"><span>More</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                <li><a href="about.php">About us</a></li>
                <li><a href="services.php">Services</a></li>
                </ul>
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

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Services</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Services</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

  
    <style>
        .card {
            transition: transform 0.2s;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            cursor: pointer;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: bold;
            margin-top: 1rem;
        }

        .card-text {
            font-size: 1rem;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="car.jpg" class="card-img-top" alt="Car Service">
                    <div class="card-body">
                        <h5 class="card-title">Car Service</h5>
                        <p class="card-text">Travel in comfort and style with Sawari's Car Services. Book a ride in our fleet of reliable and well-maintained cars. Our trained drivers ensure a safe and pleasant journey, while real-time tracking allows you to monitor your ride's progress. With transparent fare estimates and cashless payments, Sawari Car Services offers a convenient and trustworthy solution for all your transportation needs.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="bike.jpg" class="card-img-top" alt="Bike Service">
                    <div class="card-body">
                        <h5 class="card-title">Bike Service</h5>
                        <p class="card-text">Enjoy quick and convenient rides with Sawari's bike services. Book a bike with ease, navigate through traffic effortlessly, and reach your destination swiftly. Our trained bike riders prioritize safety and provide a fast and economical travel option for short distances, making your city commute a breeze.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="tuktuk.jpg" class="card-img-top" alt="Tuktuk Service">
                    <div class="card-body">
                        <h5 class="card-title">Tuktuk Service</h5>
                        <p class="card-text">Experience the charm of traditional transport with Sawari's Tuktuk services. Hop on our colorful three-wheeled vehicles and explore the city with a touch of local flavor. Tuktuks are perfect for navigating busy streets and narrow alleys, offering a unique and enjoyable ride experience while you soak in the sights and sounds of your surroundings.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <br>
  <br>
</body>


  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>Sawari</h3>
              <p>
                Tandi, Chitwan <br>
                Ratnanagar 44200, Nepal<br><br>
                <strong>Phone:</strong> +977 9860342677<br>
                <strong>Email:</strong> info@sawari.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="whatsapp"><i class="bx bxl-whatsapp"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="about.php">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="faq.php">F.A.Q</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="terms.php">Terms & Conditions</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="privacy.php">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Download App</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">User App</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Driver App</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Get In Touch</h4>
            <p>Don't Miss Any Updates & Get Notified Of Sawari Mobile App</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright 2023 <strong><span>Sawari</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>
</main>
</body>

</html>