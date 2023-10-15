<head>
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
  <link href="style/styles.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <style>

  </style>
</head>

<body>
  <dialog id="myAccount">
    <?php include "forms/accountCheck.php"; ?>
    <div style="text-align: center;">
        <button class="btn btn-danger" onclick="myAccount.close()">Close</button>
    </div>
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
          <li><a href="rides.php">My Rides</a></li>
          <li><a href="book.php">Book a Ride</a></li>
                    <!-- dropdown -->
                    <li class="dropdown"><a href="#"><span>More</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                <li><a href="about.php">About us</a></li>
                <li><a href="services.php">Services</a></li>
                </ul>
          <li><a href="contact.php">Contact</a></li>
          <nav>
 
  <li>
  <form class="form-inline my-2 my-lg-0" action="search.php" method="GET">
    <div class="input-group" style="margin-left: 10px;">
      <input class="form-control" type="text" name="query" placeholder="Search">
      <div class="input-group-append">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </div>
    </div>
  </form>
</li>


</nav>

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
<main class="mt-5" style="margin-top: 10% !important;">
<?php
include 'script/db_connect.php'; // Include your database connection code here

if (isset($_GET['query'])) {
    $searchQuery = $_GET['query'];

    if (isset($_COOKIE['auth_token'])) {
        $authToken = $_COOKIE['auth_token'];
        $query = "SELECT user_id FROM users WHERE token = '$authToken'";
        $result = $link->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $user_id = $row['user_id'];

            $search_query = "SELECT * FROM ride_requests WHERE user_id = $user_id AND (pickup_loc LIKE '%$searchQuery%' OR dropoff_loc LIKE '%$searchQuery%') ORDER BY request_id DESC";
            $search_result = $link->query($search_query);

            if ($search_result->num_rows > 0) {
                while ($row = $search_result->fetch_assoc()) {
                    $request_id = $row['request_id'];
                    $pickup_location = $row['pickup_loc'];
                    $dropoff_location = $row['dropoff_loc'];
                    $ride_time = $row['ride_time'];
                    $vehicle_type = $row['v_type'];
                    $price = $row['price'];
                    $status = $row['status'];

                    echo '<div class="card border" data-request-id="' . $request_id . '">';
                    echo '<div class="card-body">';
                    echo '<table class="table table-sm  table-borderless">';
                    echo '<tbody>';
                    echo '<tr>';
                    echo '<td>Pickup location:</td>';
                    echo '<td>' . $pickup_location . '</td>';
                    echo '<td>Dropoff Location:</td>';
                    echo '<td>' . $dropoff_location . '</td>';
                    echo '<td>Ride Time:</td>';
                    echo '<td>' . $ride_time . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Vehicle type:</td>';
                    echo '<td>' . $vehicle_type . '</td>';
                    echo '<td>Price:</td>';
                    echo '<td>' . $price . '</td>';
                    echo '<td>Status:</td>';
                    echo '<td>' . $status . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td colspan="6" class="text-center">';
                    if ($status == 'pending') {
                        echo '<p class="text-warning">Your request is still pending</p>';
                    } elseif ($status == 'accepted') {
                        echo '<p class="text-success">Your request has been accepted by ' . $RiderFullName . ', happy ride</p>';
                    } elseif ($status == 'rejected') {
                        echo '<p class="text-warning">Sorry, your request has been rejected</p>';
                    }
                    echo '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Finished riding or want to delete this request';
                    echo '<button type="button" class="btn btn-danger" onclick="deleteRow(' . $request_id . ')">Delete</button>';
                    echo '</td>';
                    echo '</tr>';
                    echo '</tbody>';
                    echo '</table>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo 'No results found.';
            }
        } else {
            echo 'Invalid authentication token. Please log in and try again.';
        }
    } else {
        echo 'Authentication token not found. Please log in and try again.';
    }
} else {
    echo 'Please enter a search query.';
}
?>
 

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>
      <script>
    function deleteRow(request_id) {
        console.log(request_id);
        var confirmDelete = window.confirm("Are you sure you want to delete this request?");
        if (confirmDelete) {
            // Send an AJAX request to delete the row from the database
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "delete_request.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // On successful deletion, remove the card from the page
                    var card = document.querySelector(".card[data-request-id='" + request_id + "']");
                    if (card) {
                        card.remove();
                    }
                }
                location.reload();
            };
            xhr.send("request_id=" + request_id);
        }
    }
</script>
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
</html>