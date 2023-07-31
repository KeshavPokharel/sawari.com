<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sawari - Register</title>

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
  <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
    crossorigin="anonymous"></script>

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
        <h2>Register / Sign In</h2>
        <ol>
          <li><a href="index.php">Home</a></li>
          <li>Register</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs -->

  <!-- ======= Register ======= -->
  <section class="vh-100">

    <div class="container-fluid h-custom">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5">
          <img src="assets/img/icon.png">
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
          <form action="forms/verify.php" method="post">
            <!-- Email input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="email">Email address</label>
              <input type="email" id="email" name="email" class="form-control form-control-lg" required
                placeholder="Enter email or phone number" />
            </div>

            <div class="form-outline mb-3">
              <label class="form-label" for="password">Password</label>
              <input type="password" id="password" name="password" class="form-control form-control-lg" required
                placeholder="Password" />
            </div>


            <div class="d-flex justify-content-between align-items-center">
              <!-- Checkbox -->
              <div class="form-check mb-0">
                <input class="form-check-input me-2" type="checkbox" value="" id="terms" />
                <label class="form-check-label" for="terms">
                  Remember me
                </label>
              </div>
              <a href="#!" class="text-body">Forgot password?</a>
            </div>
            <div class="text-center text-lg-start mt-4 pt-2">
              <div id="errorContainer"></div>
            </div>
            <div class="text-center text-lg-start mt-4 pt-2">
              <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="registration.php"
                  class="link-danger">Register</a></p>
              <p class="small fw-bold mt-2 pt-1 mb-0">Forget password?, Need help <a href="forms/passwordReset.php"
                  class="link-danger">Reset password</a></p>
              <input type="submit" class="btn btn-primary btn-lg"
                style="padding-left: 2.5rem; padding-right: 2.5rem; margin: 30px;" id="login" name="login"
                value="Login">

            </div>

          </form>
        </div>
      </div>
    </div>

  </section><!-- End Register Section -->

  <!-- End Register Section -->

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
  <script>
    $(document).ready(function () {
      $('form').on('submit', function (event) {
        event.preventDefault(); // Prevent form submission

        // Send the form data using AJAX
        $.ajax({
          url: 'forms/verify.php', // Replace with the actual script URL
          type: 'POST',
          data: $(this).serialize(),
          dataType: 'json',
          success: function (response) {
            if (response.error) {
              // Update the error message in the error container
              $('#errorContainer').text(response.error).addClass('alert alert-danger').attr('role', 'alert');
            } else if (response.success) {
              // Redirect to the desired page
              window.location.href = 'index.php'; // Replace with the desired page URL
            }
          },
          error: function () {
            // Handle AJAX error
            $('#errorContainer').text('An error occurred.');
          }
        });
      });
    });
  </script>
  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>
  </main>
</body>

</html>