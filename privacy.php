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

  <!-- Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>
  <dialog id="myAccount" style=" margin-right: 7.5%;
width: 141px;
border: 1px;
border-radius: 5%;
margin-top: 85px;">
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
            <h2>Privacy & Policy</h2>
            <ol>
              <li><a href="index.php">Home</a></li>
              <li>Privacy & Policy</li>
            </ol>
          </div>
  
        </div>
      </section><!-- End Breadcrumbs -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2 class="text-center mb-4">Privacy Policy</h2>
                <p>Welcome to Sawari! This Privacy Policy describes how we collect, use, and share your personal
                    information when you use our ride-hailing services. By using our services, you agree to the terms
                    of this policy. Please read it carefully.</p>

                <h4>1. Information We Collect</h4>
                <p>When you sign up for Sawari, we may collect your name, email address, phone number, and location
                    data. We may also collect information about your device, IP address, and usage patterns to improve
                    our services.</p>

                <h4>2. How We Use Your Information</h4>
                <p>We use your information to provide and improve our services, process payments, and communicate with
                    you about your rides. We may also use your data for marketing purposes, but you can opt-out at any
                    time.</p>

                <h4>3. Information Sharing</h4>
                <p>We may share your information with our trusted partners, such as payment processors and service
                    providers, to deliver our services effectively. Your data will not be sold to third parties without
                    your consent.</p>

                <h4>4. Security Measures</h4>
                <p>We take security seriously and use industry-standard measures to protect your data from
                    unauthorized access or disclosure. However, no method of transmission over the internet is 100%
                    secure, so we cannot guarantee absolute security.</p>

                <h4>5. Your Choices</h4>
                <p>You can access, update, or delete your account information in the Sawari app settings. You can also
                    opt-out of marketing communications by adjusting your preferences.</p>

                <h4>6. Changes to this Policy</h4>
                <p>We may update this Privacy Policy from time to time. Any changes will be posted on this page, and we
                    will notify you of significant changes via email or app notifications.</p>

                <p>If you have any questions or concerns about our Privacy Policy, please contact us at
                    privacy@sawari.com.</p>
            </div>
        </div>
    </div>

    <!-- Add a back-to-top button -->
    <div class="fixed-bottom mb-4 me-4">
        <a href="#" class="btn btn-secondary btn-lg back-to-top" role="button"><i
                class="fas fa-arrow-up"></i></a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

    <script>
        // Back to top button script
        document.addEventListener("DOMContentLoaded", function () {
            var backToTopBtn = document.querySelector(".back-to-top");

            window.addEventListener("scroll", function () {
                if (window.pageYOffset > 200) {
                    backToTopBtn.classList.add("show");
                } else {
                    backToTopBtn.classList.remove("show");
                }
            });

            backToTopBtn.addEventListener("click", function () {
                window.scrollTo({
                    top: 0,
                    behavior: "smooth"
                });
            });
        });
    </script>

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