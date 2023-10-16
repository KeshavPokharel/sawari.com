<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Replace with your database connection details
require_once "script/db_connect.php";

$searchResults = array(); // Initialize an array to store search results

if (isset($_GET['query'])) {
    $searchQuery = $_GET['query'];

    // Create an SQL query to search for riders based on rider_id or full_name
    $search_query = "SELECT * FROM riders 
                    WHERE rider_id = '$searchQuery' OR full_name LIKE '%$searchQuery%'";

    $search_result = $link->query($search_query);

    if ($search_result->num_rows > 0) {
        while ($row = $search_result->fetch_assoc()) {
            $searchResults[] = $row;
        }
    }
}

$link->close(); // Close the database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rider Search</title>    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  
</head>
<body>
    <div class="container mt-5">
        <h1>Rider Search</h1>
        <a href="admin.php"><button class="btn btn-outline-danger">admin </button></a>
        <form class="form-inline my-2 my-lg-0 mb-3" action="search_riders.php" method="GET">
            <input class="form-control mr-sm-2" type="text" name="query" placeholder="Search">
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
        </form>
        
        <section id="results" class="about table-responsive">
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
                <?php foreach ($searchResults as $request) { ?>
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
    </div>

    <script>
        // You can add JavaScript for the updateStatus function here
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
</html>
