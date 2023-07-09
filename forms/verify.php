<?php
include "../script/db_connect.php";
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', 'errorlogin.log');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $checkemailQuery = "SELECT * FROM users WHERE email = '$email'";
    $emailResult = mysqli_query($link, $checkemailQuery);
    
    if (mysqli_num_rows($emailResult) > 0) {
        $row = mysqli_fetch_assoc($emailResult);
        $hashedPassword = $row['password'];
        $fullname = $row['fullname'];

        if (password_verify($password, $hashedPassword)) {
            // Password is correct, proceed with login logic
            // Start a session, set session variables, etc.
            // Redirect to the main page or dashboard
            $_SESSION["fullname"] = $fullname;
            $token = $row['token'];
            setcookie('auth_token', $token, time() + (86400 * 30), '/', '', false, true); // Set to expire in 30 days
            echo json_encode(['success' => 'User created successfully']);
            exit;
        } else {
            // Password is incorrect
            $error = "Invalid email or password.";
            
            $_SESSION['error'] = $error;
        }
    } else {
        $error = "Invalid email or password.";
        
        $_SESSION['error'] = $error;
    }
    echo json_encode(['error' => $error]);
}
?>
