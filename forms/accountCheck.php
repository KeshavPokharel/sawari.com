<?php if (isset($_COOKIE['auth_token'])) {

    echo '<li><a f class="getstarted" onClick="myAccount.showModal()">My Account</a></li>
                <li><a href="forms/logout.php" class="getstarted">Log Out</a></li>';

} else {

   echo ' <?php
          include "forms/accountCheck.php";
          ?>';
}
?>