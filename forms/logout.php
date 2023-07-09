<?php
include 'script/session.php';

// Clearing all session variables
$_SESSION = array();

// Destroying all  the session
session_destroy();
header("Location: ../index.php"); //transfering user to login.php
setcookie('auth_token', '', time() - 3600, '/', '', false, true);
exit();
?>