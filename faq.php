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
          <li><a href="services.php">Services</a></li>

          <li class="dropdown"><a href="#"><span>Help</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#" class="active">Send Message</a></li>
              <li><a href="#">Emergency Support</a></li>
              <li><a href="faq.php">F.A.Q</a></li>
            </ul>

          <li><a href="blog.html">Blog</a></li>
          <li><a href="contact.php">Contact</a></li>
           <?php
          include "forms/accountCheck.php";
          ?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->


  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>F.A.Q</h2>
        <ol>
          <li><a href="index.php">Home</a></li>
          <li>F.A.Q</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs -->

   <!-- ======= Frequently Asked Questions Section ======= -->
   <section id="faq" class="faq">
    <div class="container">

      <div class="section-title">
        <h2>F.A.Q</h2>
        <p>Frequently Asked Questions</p>
      </div>

      <div class="row faq-item d-flex align-items-stretch">
        <div class="col-lg-5">
          <i class="bx bx-help-circle"></i>
          <h4>How do I book a ride with Sawari?</h4>
        </div>
        <div class="col-lg-7">
          <p>
            To book a ride with Sawari, simply download our user-friendly app from the App Store or Google Play Store. Sign up or log in to your account, enter your pickup location and destination, and select the type of ride you prefer. Then, confirm your booking, and a nearby driver will be assigned to pick you up.
          </p>
        </div>
      </div><!-- End F.A.Q Item-->

      <div class="row faq-item d-flex align-items-stretch">
        <div class="col-lg-5">
          <i class="bx bx-help-circle"></i>
          <h4>What cities or regions does Sawari operate in?</h4>
        </div>
        <div class="col-lg-7">
          <p>
            Sawari currently operates in Chitwan district. We are constantly expanding our service area, so be sure to check our app or website for the latest updates on available locations.
          </p>
        </div>
      </div><!-- End F.A.Q Item-->

      <div class="row faq-item d-flex align-items-stretch">
        <div class="col-lg-5">
          <i class="bx bx-help-circle"></i>
          <h4>Are Sawari drivers vetted for safety?</h4>
        </div>
        <div class="col-lg-7">
          <p>
            Yes, at Sawari, we prioritize the safety of our passengers. All our drivers go through a comprehensive vetting process, including background checks, verification of licenses and identification, and assessments of their driving records. We strive to ensure that only qualified and reliable drivers join our platform.
          </p>
        </div>
      </div><!-- End F.A.Q Item-->

      <div class="row faq-item d-flex align-items-stretch">
        <div class="col-lg-5">
          <i class="bx bx-help-circle"></i>
          <h4>What payment options are accepted on the Sawari platform?</h4>
        </div>
        <div class="col-lg-7">
          <p>
            Sawari accepts various payment options, including E-sewa, Khalti, Ime Pay, Mobile banking and Sawari wallet. You can securely add your preferred payment method to your Sawari account and conveniently pay for your rides through the app.
          </p>
        </div>
      </div><!-- End F.A.Q Item-->

      <div class="row faq-item d-flex align-items-stretch">
        <div class="col-lg-5">
          <i class="bx bx-help-circle"></i>
          <h4>How can I track my ride and know the estimated time of arrival?</h4>
        </div>
        <div class="col-lg-7">
          <p>
            Once you've booked a ride, you can track your driver's location and estimated time of arrival directly within the Sawari app. The app provides real-time updates and a map view to help you stay informed about your ride's progress.
          </p>
        </div>
      </div><!-- End F.A.Q Item-->

      <div class="row faq-item d-flex align-items-stretch">
        <div class="col-lg-5">
          <i class="bx bx-help-circle"></i>
          <h4>What is Sawari's cancellation policy?</h4>
        </div>
        <div class="col-lg-7">
          <p>
            Sawari's cancellation policy allows passengers to cancel a ride without any charges if it's done within a certain timeframe before the driver arrives. However, a cancellation fee may apply if a ride is canceled after the driver has started heading towards the pickup location. The specific cancellation policy details can be found in the Sawari app or website.
          </p>
        </div>
      </div><!-- End F.A.Q Item-->

      <div class="row faq-item d-flex align-items-stretch">
        <div class="col-lg-5">
          <i class="bx bx-help-circle"></i>
          <h4>Are there any additional charges or hidden fees with Sawari?</h4>
        </div>
        <div class="col-lg-7">
          <p>
            No, we believe in transparency. Sawari fares are calculated based on factors like distance and time, and the fare details are provided to you upfront when you book a ride. There are no hidden fees, and any additional charges, such as tolls or surcharges, will be clearly communicated during the booking process.
          </p>
        </div>
      </div><!-- End F.A.Q Item-->

      <div class="row faq-item d-flex align-items-stretch">
        <div class="col-lg-5">
          <i class="bx bx-help-circle"></i>
          <h4>How does Sawari ensure customer satisfaction?</h4>
        </div>
        <div class="col-lg-7">
          <p>
            At Sawari, we strive to provide excellent customer satisfaction. We continually monitor and evaluate our driver's performance, maintain a responsive customer support team, and encourage feedback from our users. We take all necessary measures to address any concerns or issues promptly and ensure a positive experience for our passengers.
          </p>
        </div>
      </div><!-- End F.A.Q Item-->

      <div class="row faq-item d-flex align-items-stretch">
        <div class="col-lg-5">
          <i class="bx bx-help-circle"></i>
          <h4>Can I pre-book a ride with Sawari?</h4>
        </div>
        <div class="col-lg-7">
          <p>
            Currently, Sawari does not offer a pre-booking feature. However, you can book a ride on-demand through the Sawari app whenever you need it.
          </p>
        </div>
      </div><!-- End F.A.Q Item-->

      <div class="row faq-item d-flex align-items-stretch">
        <div class="col-lg-5">
          <i class="bx bx-help-circle"></i>
          <h4>What measures does Sawari take to protect user privacy and data?</h4>
        </div>
        <div class="col-lg-7">
          <p>
            Sawari takes user privacy and data protection seriously. We implement robust security measures and comply with relevant data protection laws to safeguard your personal information. We use encrypted connections, secure servers, and adhere to strict data access controls to ensure the confidentiality and integrity of user data.
          </p>
        </div>
      </div><!-- End F.A.Q Item-->

      <div class="row faq-item d-flex align-items-stretch">
        <div class="col-lg-5">
          <i class="bx bx-help-circle"></i>
          <h4>Are there any discounts or promotional offers available for Sawari rides?</h4>
        </div>
        <div class="col-lg-7">
          <p>
            Sawari occasionally offers discounts and promotional offers to our users. These can include discounted rides, referral programs, or special promotions during holidays or events. Stay updated by regularly checking the Sawari app or website for any ongoing promotions or offers.
          </p>
        </div>
      </div><!-- End F.A.Q Item-->

      <div class="row faq-item d-flex align-items-stretch">
        <div class="col-lg-5">
          <i class="bx bx-help-circle"></i>
          <h4>How can I provide feedback or report an issue with my Sawari ride?</h4>
        </div>
        <div class="col-lg-7">
          <p>
            We welcome your feedback and are committed to improving our services. You can provide feedback or report any issues.
          </p>
        </div>
      </div><!-- End F.A.Q Item-->

    </div>
  </section><!-- End Frequently Asked Questions Section -->

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
              <li><i class="bx bx-chevron-right"></i> <a href="#">Help</a></li>
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