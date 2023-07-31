<?php
session_start();

// If admin is not logged in, redirect to the login page
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit;
}
require_once "script/db_connect.php";

// Function to fetch pending rider requests
function getPendingRiderRequests()
{
    global $link;
    $query = "SELECT * FROM riders WHERE state = 'pending' ORDER BY rider_id ASC";
    $result = $link->query($query);
    $requests = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $requests[] = $row;
        }
    }

    return $requests;
}

// Handle status update request
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["request_id"]) && isset($_POST["status"])) {
    $requestId = $_POST["request_id"];
    $status = $_POST["status"];

    // Update the status in the database
    $update_query = "UPDATE riders SET state = '$status' WHERE rider_id = $requestId";

    if ($link->query($update_query) === TRUE) {
        // Update successful
        http_response_code(200);
    } else {
        // Update failed
        http_response_code(500);
    }
}

// Get pending rider requests
$pendingRequests = getPendingRiderRequests();
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
<section id="about" class="about mt-5 table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Rider ID</th>
                    <th scope="col">Address</th>
                    <th scope="col">Message</th>
                    <th scope="col">CV</th>
                    <th scope="col">License</th>
                    <th scope="col">Bluebook</th>
                    <th scope="col">Insurance</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pendingRequests as $request) { ?>
                    <tr>
                        <th scope="row"><?php echo $request['rider_id']; ?></th>
                        <td><?php echo $request['address']; ?></td>
                        <td><?php echo $request['message']; ?></td>
                        <td><?php echo $request['cv_path']; ?></td>
                        <td><?php echo $request['license_path']; ?></td>
                        <td><?php echo $request['bluebook_path']; ?></td>
                        <td><?php echo $request['insurance_path']; ?></td>
                        <td>
                            <form class="update-form" method="post">
                                <input type="hidden" name="request_id" value="<?php echo $request['rider_id']; ?>">
                                <select name="status" onchange="updateStatus(this)">
                                    <option value="pending" <?php if ($request['state'] === 'pending') echo 'selected'; ?>>Pending</option>
                                    <option value="approved" <?php if ($request['state'] === 'approved') echo 'selected'; ?>>Approved</option>
                                    <option value="rejected" <?php if ($request['state'] === 'rejected') echo 'selected'; ?>>Rejected</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>

    <script>
        // AJAX function to update the status without page reload
        function updateStatus(selectElement) {
            const form = selectElement.closest('.update-form');
            const formData = new FormData(form);

            fetch('update_status.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error updating status.');
                    }
                    // Refresh the page to remove the updated row
                    location.reload();
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    </script>
  

</body>