<?php
require_once "script/db_connect.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Get the auth_token from the cookie
  $authToken = $_COOKIE['auth_token'];

  // Query to retrieve user_id from users table using the token
  $userQuery = "SELECT user_id FROM users WHERE token = '$authToken'";
  $userResult = $link->query($userQuery);

  if ($userResult->num_rows > 0) {
    // User found in the database
    $userRow = $userResult->fetch_assoc();
    $user_id = $userRow['user_id'];

    // Retrieve form data
    $pickupLocation = $_POST['pickup_location'];
    $dropoffLocation = $_POST['dropoff_location'];
    $price = $_POST['price'];
    $pickupDateTime = $_POST['pickup_datetime'];
    $vehicleType = $_POST['vehicle_type'];

    // Insert data into the ride_request table
    $insertQuery = "INSERT INTO ride_requests (user_id, pickup_loc, dropoff_loc, price, ride_time, v_type, status)
                        VALUES ('$user_id', '$pickupLocation', '$dropoffLocation', '$price', '$pickupDateTime', '$vehicleType', 'pending')";

    if ($link->query($insertQuery) === TRUE) {
      // Data inserted successfully
      echo "Ride request submitted successfully!";
    } else {
      echo "Error: " . $insertQuery . "<br>" . $link->$error;
    }
  } else {
    // User not found in the database
    echo "Invalid authentication token. Please log in and try again.";
  }

  $link->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sawari - Contact</title>

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
        <h2>Book a Ride</h2>
        <ol>
          <li><a href="index.php">Home</a></li>
          <li>Book a Ride</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs -->

  <!-- Book Ride Section -->
  <section id="book" class="book">
    <div class="container">

      <div class="section-title">
        <h2>Book a Ride</h2>
        <p>Enter your trip details to book a ride with Sawari</p>
      </div>

      <form class="book-form" method="post">

        <div class="form-group">
          <input type="text" name="pickup_location" placeholder="Pickup Location">
        </div>

        <div class="form-group">
          <input type="text" name="dropoff_location" placeholder="Dropoff Location">
        </div>
        <div class="form-group">
          <input type="text" name="price" placeholder="Price">
        </div>

        <div class="form-group">
          <input type="datetime-local" name="pickup_datetime" placeholder="Pickup Date/Time">
        </div>

        <div class="form-group">
          <select name="vehicle_type">
            <option disabled selected>Select Vehicle Type</option>
            <option>Two wheller</option>
            <option>car</option>
            <option>SUV</option>
          </select>
        </div>

        <div class="form-group">
          <button type="submit" name="submit" class="book-btn">Book Now</button>
        </div>

      </form>

    </div>
  </section>
  <!-- End book -->


  <!-- Book Style -->
  <style>
    .book {
      padding: 60px 0;
      background: #f5f5f5;
    }

    .book-form {
      background: #fff;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .book-form input,
    .book-form select {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      box-sizing: border-box;
      border: 1px solid #ddd;
      outline: none;
    }

    .book-btn {
      width: 100%;
      padding: 12px;
      background: #007bff;
      color: #fff;
      border: 0;
      outline: none;
      cursor: pointer;
      transition: 0.3s;
    }

    .book-btn:hover {
      background: #0062cc;
    }
  </style>


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