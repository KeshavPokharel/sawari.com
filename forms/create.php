<?php
include "../script/db_connect.php"; // Include your database connection script.
ini_set('display_errors', 0);
ini_set('log_errors', 1);
error_reporting(E_ALL);
ini_set('error_log', 'error.log');
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    // Validate and sanitize each input field
    $fullname = isset($_POST["fullname"]) ? $_POST["fullname"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $username = isset($_POST["username"]) ? $_POST["username"] : "";
    $gender = isset($_POST["gender"]) ? $_POST["gender"] : "";
    $dob = isset($_POST["dob"]) ? $_POST["dob"] : "";
    $phone = isset($_POST["phone"]) ? $_POST["phone"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";
    $cpassword = isset($_POST["cpassword"]) ? $_POST["cpassword"] : "";
    
    // Check if 'cpassword' is empty or not provided
    if (empty($cpassword)) {
        $errors[] = "Confirm password field is missing.";
    } elseif ($password !== $cpassword) {
        $errors[] = "Passwords do not match.";
    }
    
    // Validate Username
    if (strlen($username) < 4 || strlen($username) > 20) {
        $errors[] = "Username must be between 4 and 20 characters long.";
    }

    // Validate Gender (Assuming gender should be 'male', 'female', or 'other')
    $validGenders = ['male', 'female', 'other'];
    if (!in_array($gender, $validGenders)) {
        $errors[] = "Invalid gender selection.";
    }

    // Validate Phone Number (Assuming a valid phone number is 10 digits)
    if (strlen($phone) !== 10 || !ctype_digit($phone)) {
        $errors[] = "Invalid phone number. It should be 10 digits.";
    }

    // Perform database insertion
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $token = bin2hex(random_bytes(32));
    
    // Adjust the SQL query to exclude the 'pp_path' column
    $sql = "INSERT INTO users (fullname, email, password, token, date, username, phone, gender, dob) 
            VALUES ('$fullname', '$email', '$hashedPassword', '$token', current_timestamp(), '$username', '$phone', '$gender', '$dob')";
    
    $result = mysqli_query($link, $sql);
    
    if ($result === false) {
        $errors[] = "Error executing query: " . mysqli_error($link);
    } else {
        if (mysqli_affected_rows($link) > 0) {
            echo json_encode(['success' => 'User created successfully']);
            exit;
        } else {
            $errors[] = "No rows were affected.";
        }
    }
}

// Handle errors
if (!empty($errors)) {
    echo json_encode(['error' => $errors]);
}
?>
