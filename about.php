<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sawari - About us</title>

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

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>About</h2>
        <ol>
          <li><a href="index.php">Home</a></li>
          <li>About</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs -->

  <!-- ======= About Section ======= -->
  <section id="about" class="about">
    <div class="container">

      <div class="row content">
        <div class="col-lg-6">
          <h2>- SAWARI -</h2>
          <h3>THE NEXT GENERATION RIDE HAILING PLATFORM.</h3>
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0">
          <p>
            Sawari is a ride-hailing platform that connects passengers with safe and reliable drivers. Our mission is to
            provide affordable and accessible transportation to everyone, while also creating job opportunities for
            drivers in the communities we serve.

            With Sawari, passengers can easily book rides through our user-friendly app, track their driver's location
            in real-time, and pay securely with multiple payment options. Our drivers are carefully vetted and trained
            to provide a comfortable and safe ride experience for our passengers.

            We're committed to providing exceptional customer service and continuously improving our platform to better
            serve our users. Founded in [2023], Sawari is headquartered in [Ratnanagar, Tandi] and currently operates in
            [Chitwan District].

            At Sawari, we're passionate about creating a more connected and efficient transportation system. We believe
            that everyone deserves access to safe and reliable transportation, and we're proud to be making a positive
            impact in the communities we serve.
          </p>
          <ul>
            <li><i class="ri-check-double-line"></i> Sawari is dedicated to providing job opportunities for drivers in
              the communities we serve, helping to support local economies and improve the livelihoods of our partners.
            </li>
            <li><i class="ri-check-double-line"></i> Our platform is designed with user privacy and security in mind,
              and we are committed to keeping our user's data safe and secure.</li>
            <li><i class="ri-check-double-line"></i> Sawari is constantly striving to improve our services and innovate
              within the transportation industry, with a focus on sustainability and reducing our carbon footprint.</li>
            <li><i class="ri-check-double-line"></i> Our team is made up of experienced professionals with backgrounds
              in transportation, technology, and business, and we are dedicated to providing the best possible
              experience for our users.</li>
          </ul>
          <p class="fst-italic">
            If you have any questions or would like to learn more about Sawari, please don't hesitate to contact us.
            Thank you for considering Sawari for your transportation needs.
          </p>
        </div>
      </div>
    </div>
    </div>
  </section><!-- End About Section -->

  <!-- ======= How sawari works ======= -->
  <section id="features" class="features">
    <div class="container">

      <div class="section-title">
        <h2>WorkFlow</h2>
        <p>How Sawari Works?</p>
      </div>

      <div class="row">
        <div class="col-lg-3">
          <ul class="nav nav-tabs flex-column">
            <li class="nav-item">
              <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">Download App</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Pick Up and Drop Off Locations</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="tab" href="#tab-3">Service Type & Price Type</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="tab" href="#tab-4">Payment Method</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="tab" href="#tab-5">Rating</a>
            </li>
          </ul>
        </div>
        <div class="col-lg-9 mt-4 mt-lg-0">
          <div class="tab-content">
            <div class="tab-pane active show" id="tab-1">
              <div class="row">
                <div class="col-lg-8 details order-2 order-lg-1">
                  <h3>Download Sawari Mobile App</h3>
                  <p>Download official sawari mobile app from App store or Play store.</p>
                </div>
                <div class="col-lg-4 text-center order-1 order-lg-2">
                  <img src="assets/img/1.png" alt="" class="img-fluid">
                </div>
              </div>
            </div>
            <div class="tab-pane" id="tab-2">
              <div class="row">
                <div class="col-lg-8 details order-2 order-lg-1">
                  <h3>Set Your Pick Up and Drop Off Locations</h3>
                  <p>Specify where we'll pick you up and where we'll drop you off.</p>
                </div>
                <div class="col-lg-4 text-center order-1 order-lg-2">
                  <img src="assets/img/2.png" alt="" class="img-fluid">
                </div>
              </div>
            </div>
            <div class="tab-pane" id="tab-3">
              <div class="row">
                <div class="col-lg-8 details order-2 order-lg-1">
                  <h3>Select Your Service Type & Price Type</h3>
                  <p>Choose from our vehicle options & you can choose fixed price or can do bargaining also.</p>
                </div>
                <div class="col-lg-4 text-center order-1 order-lg-2">
                  <img src="assets/img/4.png" alt="" class="img-fluid">
                </div>
              </div>
            </div>
            <div class="tab-pane" id="tab-4">
              <div class="row">
                <div class="col-lg-8 details order-2 order-lg-1">
                  <h3>Select Your Payment Method</h3>
                  <p>Choose your best payment option i.e. Cash, Sawari Wallet, eSewa, FonePay & Other more</p>
                </div>
                <div class="col-lg-4 text-center order-1 order-lg-2">
                  <img src="assets/img/3.png" alt="" class="img-fluid">
                </div>
              </div>
            </div>
            <div class="tab-pane" id="tab-5">
              <div class="row">
                <div class="col-lg-8 details order-2 order-lg-1">
                  <h3>Rate Your Ride Experience</h3>
                  <p>Rate your rider/driver and if you have any feedback can provide while rating a trip.</p>
                </div>
                <div class="col-lg-4 text-center order-1 order-lg-2">
                  <img src="assets/img/1.png" alt="" class="img-fluid">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ======= End How sawari works ======= -->


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

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

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