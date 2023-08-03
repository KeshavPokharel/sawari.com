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
    <section id="about" class="about mt-4 mx-4">
        <h1 class="h1 text-center">Your Recent booking</h1>
    <?php
    // Retrieve user_id from users table using auth_token from the cookie
    if (isset($_COOKIE['auth_token'])) {
        $authToken = $_COOKIE['auth_token'];
        $query = "SELECT user_id FROM users WHERE token = '$authToken'";
        $result = $link->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $user_id = $row['user_id'];

            // Fetch ride request data for the current user from ride_request table
            $ride_query = "SELECT * FROM ride_requests WHERE user_id = $user_id ORDER BY request_id DESC LIMIT 10";
            $ride_result = $link->query($ride_query);

            if ($ride_result->num_rows > 0) {
                // Loop through the retrieved data and display it
                while ($ride_row = $ride_result->fetch_assoc()) {
                    $pickup_location = $ride_row['pickup_loc'];
                    $dropoff_location = $ride_row['dropoff_loc'];
                    $ride_time = $ride_row['ride_time'];
                    $vehicle_type = $ride_row['v_type'];
                    $price = $ride_row['price'];
                    $status = $ride_row['status'];
                    ?>
                    <div class="card border">
                        <div class="card-body">
                            <table class="table table-sm  table-borderless">
                                <tbody>
                                    <tr>
                                        <td>Pickup location:</td>
                                        <td><?php echo $pickup_location; ?></td>
                                        <td>Dropoff Location:</td>
                                        <td><?php echo $dropoff_location; ?></td>
                                        <td>Ride Time:</td>
                                        <td><?php echo $ride_time; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Vehicle type:</td>
                                        <td><?php echo $vehicle_type; ?></td>
                                        <td>Price:</td>
                                        <td><?php echo $price; ?></td>
                                        <td>Status:</td>
                                        <td><?php echo $status; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php
                }
            } else {
                // No ride request data found for the current user
                echo "No ride request data found for the current user.";
            }
        } else {
            // Invalid authentication token
            echo "Invalid authentication token. Please log in and try again.";
        }
    } else {
        // Authentication token not found
        echo "Authentication token not found. Please log in and try again.";
    }
    ?>
</section>

</body>

</html>