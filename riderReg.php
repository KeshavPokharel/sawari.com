<?php
include 'forms/loginCheck.php';
?>
<?php
require_once "script/db_connect.php";
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Function to generate a random filename
function generateRandomFileName($file)
{
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $randomString = uniqid();
    return $randomString . '.' . $extension;
}

if (isset($_POST['submit'])) {
    // Get the user_id from the auth_token (Replace this with your actual authentication code)
    $authToken = $_COOKIE['auth_token']; // Get the auth_token from the cookie

    // Query to retrieve user_id from users table using the token
    $query = "SELECT user_id FROM users WHERE token = '$authToken'";
    $result = $link->query($query);

    if ($result->num_rows > 0) {
        // User found in the database
        $row = $result->fetch_assoc();
        $user_id = $row['user_id'];

        // Form data
        $name = $_POST['name'];
        $address = $_POST['address'];
        $message = $_POST['message'];
        $tel=$_POST['tel'];
        $date=$_POST['date'];
        $gender = $_POST['gender'];
        $vehicleType = $_POST['vehicleType'];

        // File paths
        $uploadsDir = $_SERVER['DOCUMENT_ROOT'] . '/';
        $cvPath = '';
        $licensePath = '';
        $bluebookPath = '';
        $insurancePath = '';

        // Upload CV
        if ($_FILES['cv']['error'] === UPLOAD_ERR_OK) {
            $cvPath = 'cv/' . generateRandomFileName($_FILES['cv']);
            move_uploaded_file($_FILES['cv']['tmp_name'], $uploadsDir . $cvPath);
        }

        // Upload license
        if ($_FILES['license']['error'] === UPLOAD_ERR_OK) {
            $licensePath = 'license/' . generateRandomFileName($_FILES['license']);
            move_uploaded_file($_FILES['license']['tmp_name'], $uploadsDir . $licensePath);
        }

        // Upload bluebook
        if ($_FILES['bluebook']['error'] === UPLOAD_ERR_OK) {
            $bluebookPath = 'bluebook/' . generateRandomFileName($_FILES['bluebook']);
            move_uploaded_file($_FILES['bluebook']['tmp_name'], $uploadsDir . $bluebookPath);
        }

        // Upload insurance
        if ($_FILES['insurance']['error'] === UPLOAD_ERR_OK) {
            $insurancePath = 'insurance/' . generateRandomFileName($_FILES['insurance']);
            move_uploaded_file($_FILES['insurance']['tmp_name'], $uploadsDir . $insurancePath);
        }

     // Insert data into riders table
     $insert_query = "INSERT INTO riders (user_id, full_name, address, message, cv_path, license_path, bluebook_path, insurance_path, phonenumber, dateofbirth, gender, vehicle, `state`)
     VALUES ('$user_id', '$name', '$address', '$message', '$cvPath', '$licensePath', '$bluebookPath', '$insurancePath', '$tel', '$date', '$gender', '$vehicleType', 'pending')";
     


        if ($link->query($insert_query) === TRUE) {
            // Data inserted successfully
            echo '<div class="container h-100 d-flex align-items-center justify-content-center">
                <div class="card">
                    <div class="class-body text-center">
                        <br>
                      <p class="p">  Your Form is successfully subbmited and being reviewed</p>
                       <p class="p"> click ok , you will be rediret to index page</p><br>
                        <a href="index.php"><button class="btn btn-lg btn-danger">OK</button></a>
                    </div>
                </div>
            </div>';
        } else {
            echo "Error: " . $insert_query . "<br>" . $link->error;
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
    <section class="vh-70 mt-5" style="background-color: #2779e2;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-9">

                    <h1 class="text-white mb-4">Apply to be a rider!</h1>
                    <h4 class="text-white mb-4">Plese fill the data accuratly , make sure all your details match with
                        the documents you provide</h4>
                    <form method="post" enctype="multipart/form-data">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body">

                                <div class="row align-items-center pt-4 pb-3">
                                    <div class="col-md-3 ps-5">

                                        <h6 class="mb-0">Full name</h6>

                                    </div>
                                    <div class="col-md-9 pe-5">

                                        <input type="text" name="name" class="form-control form-control-lg" />

                                    </div>
                                </div>

                                <hr class="mx-n3">

                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">

                                        <h6 class="mb-0">Address</h6>

                                    </div>
                                    <div class="col-md-9 pe-5">

                                        <input type="text" name="address" class="form-control form-control-lg"
                                            placeholder="Enter your full address (House No., Street, Ward No., Municipality/VDC, District)" />

                                    </div>
                                </div>
                                <hr class="mx-n3">

                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">

                                        <h6 class="mb-0">Phone Number</h6>

                                    </div>
                                    <div class="col-md-9 pe-5">

                                        <input type="tel" name="tel" class="form-control form-control-lg"
                                            placeholder="Enter your number without country code as given: 9*********" />

                                    </div>
                                </div>
                                <hr class="mx-n3">

                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">

                                        <h6 class="mb-0">Date Of Birth</h6>

                                    </div>
                                    <div class="col-md-9 pe-5">

                                        <input type="date" name="date" class="form-control form-control-lg"
                                            placeholder="Enter your Date Of Birth in AD" />

                                    </div>
                                </div>
                                <hr class="mx-n3">

                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">

                                        <h6 class="mb-0">Gender</h6>

                                    </div>
                                    <div class="col-md-9 pe-5">

                                    <select class="form-control" id="gender" name="gender" required>
                                    <option value="" disabled selected>Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>

                                    </div>
                                </div>
                                <hr class="mx-n3">

                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">

                                        <h6 class="mb-0">Gender</h6>

                                    </div>
                                    <div class="col-md-9 pe-5">

                                <select class="form-control" id="vehicleType" name="vehicleType" required>
                                    <option value="" disabled selected>Select vehile type</option>
                                    <option value="car">Car</option>
                                    <option value="bike">Bike</option>
                                    <option value="scooter">Scooter</option>
                                    <option value="tuktuk">Tuktuk</option>
                                </select>

                                    </div>
                                </div>
                                <hr class="mx-n3">

                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">

                                        <h6 class="mb-0">Message</h6>

                                    </div>
                                    <div class="col-md-9 pe-5">

                                        <textarea class="form-control" rows="3" name="message"
                                            placeholder="Why you're interested in this role , Questions for us? or Anything else we should know? "></textarea>

                                    </div>
                                </div>

                                <hr class="mx-n3">

                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">

                                        <h6 class="mb-0">Upload CV</h6>

                                    </div>
                                    <div class="col-md-9 pe-5">

                                        <input class="form-control form-control-lg" accept="application/pdf" name="cv" required id="formFileLg"
                                            type="file" />
                                        <div class="small text-muted mt-2">Upload your CV/Resume or any other relevant
                                            file.
                                            Max file
                                            size 50 MB</div>

                                    </div>
                                    <div class="col-md-3 ps-5">

                                        <h6 class="mb-0">Upload license</h6>

                                    </div>
                                    <div class="col-md-9 pe-5">

                                        <input class="form-control form-control-lg" accept="image/*" name="license" required
                                            id="formFileLg" type="file" />
                                        <div class="small text-muted mt-2">Upload your scanned copy of your driving
                                            license
                                            Max file
                                            size 50 MB</div>

                                    </div>
                                    <div class="col-md-3 ps-5">

                                        <h6 class="mb-0">Upload bluebook</h6>

                                    </div>
                                    <div class="col-md-9 pe-5">

                                        <input class="form-control form-control-lg" accept="image/*" name="bluebook" required
                                            id="formFileLg" type="file" />
                                        <div class="small text-muted mt-2">Upload your scanned copy of the bluebook with
                                            your name
                                            Max file
                                            size 50 MB</div>

                                    </div>
                                    <div class="col-md-3 ps-5">

                                        <h6 class="mb-0">Upload Insurance </h6>

                                    </div>
                                    <div class="col-md-9 pe-5">

                                        <input class="form-control form-control-lg" accept="image/*" name="insurance" required
                                            id="formFileLg" type="file" />
                                        <div class="small text-muted mt-2">Upload your scanned copy of the insurance
                                            copy
                                            with
                                            your name
                                            Max file
                                            size 50 MB</div>

                                    </div>
                                </div>

                                <hr class="mx-n3">

                                <div class="px-5 py-4">
                                    <button type="submit" name="submit" class="btn btn-primary btn-lg">Send
                                        application</button>
                                </div>

                            </div>
                        </div>
       
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>