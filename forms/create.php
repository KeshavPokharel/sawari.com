<?php
include "../script/db_connect.php";
ini_set('display_errors', 0);
ini_set('log_errors', 1);
error_reporting(E_ALL);
ini_set('error_log', 'error.log');
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"]; // Added this line to retrieve the value of 'cpassword'

    // Check if 'cpassword' is empty or not provided
    if (empty($cpassword)) {
        $errors[] = "Confirm password field is missing.";
    } elseif ($password !== $cpassword) {
        $errors[] = "Passwords do not match.";
    }

    $checkemailQuery = "SELECT * FROM users WHERE email = '$email'";
    $emailResult = mysqli_query($link, $checkemailQuery);

    if (strlen($fullname) < 4 || strlen($fullname) > 20) {
        $errors[] = "Username must be between 4 and 20 characters long.";
    }

    if (!preg_match('/[!@#$%^&*]/', $password)) {
        $errors[] = "Password must contain at least one special character.";
    }
    if (!preg_match('/\d/', $password)) {
        $errors[] = "Password must contain at least one number.";
    }
    if (mysqli_num_rows($emailResult) > 0) {
        $errors[] = "Email already exists.";
    }

    if (!empty($errors)) {
        echo json_encode(['error' => $errors]);
        exit;
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $token = bin2hex(random_bytes(32));
    $sql = "INSERT INTO users (fullname, email, password, token, date) 
            VALUES ('$fullname', '$email', '$hashedPassword', '$token', current_timestamp())";

    $result = mysqli_query($link, $sql);

    if ($result === false) {
        echo "Error executing query: " . mysqli_error($link);
    } else {
        if (mysqli_affected_rows($link) > 0) {
            echo json_encode(['success' => 'User created successfully']);
            exit;
        } else {
            echo "No rows were affected.";
        }
    }
}
