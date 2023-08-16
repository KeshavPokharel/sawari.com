<?php
require_once "script/db_connect.php";

// Function to get the full name of the rider from the users table using the user_id
function getRiderFullName($userId, $link)
{
    $query = "SELECT fullname FROM users WHERE user_id = $userId";
    $result = $link->query($query);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['fullname'];
    } else {
        return "Unknown Rider";
    }
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["request_id"]) && isset($_POST["status"])) {
    $requestId = $_POST["request_id"];
    $status = $_POST["status"];

    // Update the status in the database
    $update_query = "UPDATE ride_requests SET status = '$status' WHERE request_id = $requestId";

    if ($link->query($update_query) === TRUE) {
        // Update successful
        header("Location: rideRequest.php"); // Redirect to the admin.php page to refresh the table
        exit;
    } else {
        // Update failed
        echo "Error updating status: " . $link->$error;
    }
}

// Fetch data from the database (oldest first) where status is pending
$query = "SELECT * FROM ride_requests WHERE status = 'pending' ORDER BY rider_id ASC";
$result = $link->query($query);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Pending Ride Requests</title>
</head>
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

<body>
<dialog id="myAccount" style=" margin-right: 7.5%;
  width: 141px;
  border: 1px;
  border-radius: 5%;
  margin-top: 85px;">
    <?php include "forms/accountCheck.php"; ?>
    <button class="btn btn-danger" onclick="myAccount.close()">close</button>
  </dialog>
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
    <hr class="hr hr-blurry" />
    <header>
        <h1>Pending Ride Requests</h1>
    </header>
    <section id="about" class="about mt-5 table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Rider Full Name</th>
                    <th scope="col">Pickup Location</th>
                    <th scope="col">Dropoff Location</th>
                    <th scope="col">Time</th>
                    <th scope="col">price</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . getRiderFullName($row['user_id'], $link) . '</td>';
                    echo '<td>' . $row['pickup_loc'] . '</td>';
                    echo '<td>' . $row['dropoff_loc'] . '</td>';
                    echo '<td>' . $row['ride_time'] . '</td>';
                    echo '<td>' . $row['price'] . '</td>';
                    echo '<td>';
                    echo '<form method="post">';
                    echo '<input type="hidden" name="request_id" value="' . $row['request_id'] . '">';
                    echo '<select name="status" onchange="this.form.submit()">';
                    echo '<option value="pending" ' . ($row['status'] === 'pending' ? 'selected' : '') . '>Pending</option>';
                    echo '<option value="accepted" ' . ($row['status'] === 'accepted' ? 'selected' : '') . '>Accepted</option>';
                    echo '<option value="rejected" ' . ($row['status'] === 'rejected' ? 'selected' : '') . '>Rejected</option>';
                    echo '</select>';
                    echo '</form>';
                    echo '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </section>
</body>

</html>