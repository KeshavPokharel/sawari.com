<?php if (isset($_COOKIE['auth_token'])) {

    echo '<ul style="list-style-type: none;  cursor:pointer;"><li><a href="myaccount.php">Account</a></li>
                <li><a href="forms\logout.php" class="getstarted">Log Out</a></li></ul>';

} else {
   echo '<ul style="list-style-type: none;  cursor:pointer;"><li><a href="register.php">Login</a></li>
                <li><a href="registration.php" class="getstarted">Register</a></li></ul>';
}
?>