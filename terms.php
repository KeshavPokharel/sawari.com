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
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="style/styles.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
<style>
  
</style>
</head>

<body>
<dialog id="myAccount">
 <?php  include "forms\accountCheck.php"; ?>
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
        echo  '<li><a class="getstarted" style=" cursor:pointer;" onclick="myAccount.showModal()">My Account</a></li>';
          } else{
            echo  '<li><a href="register.php" class="getstarted" style=" cursor:pointer;">Login/Register</a></li>';
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
            <h2>Terms & Conditions</h2>
            <ol>
              <li><a href="index.php">Home</a></li>
              <li>Terms & Conditions</li>
            </ol>
          </div>
  
        </div>
      </section><!-- End Breadcrumbs -->

  <!-- ======= Start Terms and Condition ======= -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <p>Welcome to Sawari! By using our ride-hailing services, you agree to comply with the following terms
                    and conditions. Please read them carefully before using the Sawari platform.</p>

                <h4>1. Eligibility</h4>
                <p>You must be at least 18 years old to use Sawari's services. By using our platform, you confirm that
                    you are of legal age.</p>

                <h4>2. Account Registration</h4>
                <p>When creating an account, you agree to provide accurate and up-to-date information. You are solely
                    responsible for maintaining the confidentiality of your account and password.</p>

                <h4>3. Service Usage</h4>
                <p>You agree to use Sawari's services for personal transportation needs only. Any commercial use of the
                    platform is strictly prohibited.</p>

                <h4>4. User Conduct</h4>
                <p>You are responsible for your behavior while using the Sawari platform. You must not engage in any
                    fraudulent, abusive, or illegal activities.</p>

                <h4>5. Payments and Fees</h4>
                <p>You agree to pay for the rides you book through the Sawari app. Prices may vary based on factors such
                    as distance, time, and demand.</p>

                <h4>6. Cancellation Policy</h4>
                <p>You may cancel a ride, but cancellation fees may apply in certain situations. Please review our
                    cancellation policy for more details.</p>

                <h4>7. Intellectual Property</h4>
                <p>All content and materials on the Sawari platform are owned or licensed by us and are protected by
                    intellectual property laws. You must not use, copy, or distribute our content without permission.</p>

                <h4>8. Modifications to the Platform</h4>
                <p>We reserve the right to modify, suspend, or discontinue any part of the Sawari platform without
                    notice or liability.</p>

                <h4>9. Termination</h4>
                <p>We may terminate your access to the Sawari platform if you violate our terms and conditions or for
                    any other reason at our discretion.</p>

                <p>If you have any questions or concerns about our Terms and Conditions, please contact us at
                    support@sawari.com.</p>
            </div>
        </div>
    </div>
<!-- ======= End Terms and Condition ======= -->

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