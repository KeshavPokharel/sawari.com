<?php
if (!isset($_COOKIE['auth_token'])) {
header("Location:   register.php");
exit; 
}