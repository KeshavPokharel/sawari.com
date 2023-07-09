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
  <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
  crossorigin="anonymous"></script>
  
  <!-- Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
<style>

</style>
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
            <h2>Register / Sign In</h2>
            <ol>
              <li><a href="index.php">Home</a></li>
              <li>Register</li>
            </ol>
          </div>
  
        </div>
      </section><!-- End Breadcrumbs -->

      
      <!-- ======= Registration ======= -->
    <section class="vh-70" style="background-color: #eee;">
      <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-lg-12 col-xl-11">
            <div class="card text-black" style="border-radius: 25px;">
              <div class="card-body p-md-5">
                <div class="row justify-content-center">
                  <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
    
                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
    
                    <form class="mx-1 mx-md-4" action="forms/create.php" method="post">
    
                      <div class="d-flex flex-row align-items-center mb-4">
                        <div class="input-group">
                          <input type="text" id="fullname" name="fullname" class="form-control" placeholder="Full Name" />
                          <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                        </div>
                      </div>
                      
                      <div class="d-flex flex-row align-items-center mb-4">
                        <div class="input-group">
                          <input type="email" id="email" name="email" class="form-control" placeholder="Email" />
                          <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                        </div>
                      </div>
                      
                      <div class="d-flex flex-row align-items-center mb-4">
                        <div class="input-group">
                          <input type="password" id="password" name="password" class="form-control" placeholder="Password" />
                          <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                          <button class="btn btn-outline-secondary" type="button" id="showPasswordButton">
                            <i class="bi bi-eye"></i>
                          </button>
                        </div>
                      </div>
                      
                      <div class="d-flex flex-row align-items-center mb-4">
                        <div class="input-group">
                          <input type="password" id="cpassword" name="cpassword" class="form-control" placeholder="Repeat Password" />
                          <span class="input-group-text"><i class="bi bi-key-fill"></i></span>
                          <button class="btn btn-outline-secondary" type="button" id="showCPasswordButton">
                            <i class="bi bi-eye"></i>
                          </button>
                        </div>
                      </div>
                      
                      
    
                      <div class="form-check d-flex justify-content-center mb-5">
                        <input class="form-check-input me-2" type="checkbox" value="" id="termsCheckbox"/>
                        <label class="form-check-label" for="form2Example3">
                          I agree all statements in <a href="terms.php">Terms & Conditons</a>
                        </label>
                      </div>
                      
                      <div class="text-center text-lg-start mt-4 pt-2 login-cont" style="margin-top: -40px !important;
                      margin-left: 5rem;">
                        <p class="small fw-bold mt-2 pt-1 mb-0" style="padding-top: 0px;
                        margin-top: -10px !important;">Already have an account? <a href="register.php"
                          class="link-danger">Login</a></p>
                      </div>
                      <div id="errorContainer"></div>
                      <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                        
                       <input type="submit" class="btn btn-primary btn-lg" id="signup" name="Register" value="Register">
                      </div>
    
                    </form>
    
                  </div>
                  <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
    
                    <img src="assets/img/icon.png">
    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ======= END REGISTRATION ======= -->
  

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
  <script>
    $(document).ready(function () {
      $('form').on('submit', function (event) {
        event.preventDefault(); // Prevent form submission
        if (!$('#termsCheckbox').is(':checked')) {
          // Display an error message for the terms and conditions
          $('#errorContainer').text('Please accept the terms and conditions.').addClass('alert alert-danger').attr('role', 'alert');
          return; // Stop form submission
        }
        // Send the form data using AJAX
        $.ajax({
          url: 'forms/create.php',
          type: 'POST',
          data: $(this).serialize(),
          dataType: 'json',
          success: function (response) {
            if (response.error) {
              // Update the error message in the error container
              $('#errorContainer').text(response.error).addClass('alert alert-danger').attr('role', 'alert');
            } else if (response.success) {
              // Redirect to the desired page
              window.location.href = 'register.php'; // Replace with the desired page URL
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
<script>
  $(document).ready(function() {
    // Show/hide password for the 'password' field
    $('#showPasswordButton').click(function() {
      var passwordInput = $('#password');
      var passwordFieldType = passwordInput.attr('type');
  
      // Toggle password visibility
      if (passwordFieldType === 'password') {
        passwordInput.attr('type', 'text');
        $(this).find('i').removeClass('bi-eye').addClass('bi-eye-slash');
      } else {
        passwordInput.attr('type', 'password');
        $(this).find('i').removeClass('bi-eye-slash').addClass('bi-eye');
      }
    });
  
    // Show/hide password for the 'cpassword' field
    $('#showCPasswordButton').click(function() {
      var cpasswordInput = $('#cpassword');
      var cpasswordFieldType = cpasswordInput.attr('type');
  
      // Toggle password visibility
      if (cpasswordFieldType === 'password') {
        cpasswordInput.attr('type', 'text');
        $(this).find('i').removeClass('bi-eye').addClass('bi-eye-slash');
      } else {
        cpasswordInput.attr('type', 'password');
        $(this).find('i').removeClass('bi-eye-slash').addClass('bi-eye');
      }
    });
  });
  </script>
  
</main>
</body>

</html>

