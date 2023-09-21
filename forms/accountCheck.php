<?php require_once "script/db_connect.php";
?>
<?php if (isset($_COOKIE['auth_token'])) {

    echo '<ul style="list-style-type: none;  cursor:pointer;"><li><a href="myaccount.php">Account</a></li>
                <li><a href="forms\logout.php" class="getstarted">Log Out</a></li>';
    if (isset($_COOKIE['auth_token'])) {
        $authToken = $_COOKIE['auth_token'];

        // Query to check if the user exists in the riders table based on the auth_token
        $query = "SELECT rider_id  FROM riders WHERE user_id = (SELECT user_id FROM users WHERE token = '$authToken') AND state = 'approved'  LIMIT 1";

        $result = $link->query($query);

        if ($result->num_rows > 0) {
            // User is registered as a rider
           
            echo '<li><a href="rideRequest.php" class="getstarted">ReqView</a></li></ul>';
            echo '<ul style="list-style-type: none; class="getstarted" cursor:pointer;><li><a href="mybooking.php" class="getstarted">Bookings</a></li></ul>';
        }
    }
} else {
    echo '<ul style="list-style-type: none;  cursor:pointer;"><li><a href="register.php">Login</a></li>
                <li><a href="registration.php" class="getstarted">Register</a></li></ul>';
}

?>