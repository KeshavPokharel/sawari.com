<?php if (isset($_COOKIE['auth_token'])) {

    echo '<ul style="list-style-type: none;"><li><a href="../myaccount.php">Account</a></li>
                <li><a href="forms\logout.php" class="getstarted">Log Out</a></li></ul>';

} else {
   echo "no user account found";
}
?>