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
    //validate full name
    if (!preg_match('/^[a-zA-Z ]{5,}$/', $fullname)) {
        $errors[] = "Full name must contain alphabetic characters (A-Z, a-z) and be at least 5 characters long.";
    }

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

    // Check if the username already exists in the database
    $existingUsernameQuery = "SELECT * FROM users WHERE username = '$username'";
    $existingUsernameResult = mysqli_query($link, $existingUsernameQuery);
    if (mysqli_num_rows($existingUsernameResult) > 0) {
        $errors[] = "Username already exists.";
    }
    //age validation 
    $today = new DateTime();
$date = new DateTime($dob);
$age = $today->diff($date)->y;

if ($age < 16) {
    $errors[] = "You must be at least 16 years old to register.";
}
    // Check if the email already exists in the database
    $existingEmailQuery = "SELECT * FROM users WHERE email = '$email'";
    $existingEmailResult = mysqli_query($link, $existingEmailQuery);
    if (mysqli_num_rows($existingEmailResult) > 0) {
        $errors[] = "Email already exists.";
    }
     // Validate the password
     if (!preg_match('/^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/', $password)) {
        $errors[] = "Password must have at least one capital letter, one special character, and be at least 8 characters long.";
    }
    if (substr($phone, 0, 3) !== "977") {
        $phone = "977" . $phone;
    }
    $ch = curl_init();

    // Set the URL that you want to GET by using the CURLOPT_URL option.
    curl_setopt($ch, CURLOPT_URL, "https://emailvalidation.abstractapi.com/v1/?api_key=436b0d69bc9e4a1c933de17b39cf5f62&email=$email");
    
    // Set CURLOPT_RETURNTRANSFER so that the content is returned as a variable.
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    // Set CURLOPT_FOLLOWLOCATION to true to follow redirects.
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    
    // Execute the request.
    $data = curl_exec($ch);
    
    // Check for cURL errors and handle them if necessary.
    if ($data === false) {
        echo 'cURL error: ' . curl_error($ch);
        // Handle the error
    } else {
        // Close the cURL handle.
        curl_close($ch);
    
        // Decode the JSON response into a PHP array
        $response = json_decode($data, true);
    
        if (isset($response['is_disposable_email']['value']) && $response['is_disposable_email']['value'] === true) {
            $errors[] = "Please Do Not use disposabel email";
        }
    
        if (isset($response['is_valid_format']['value']) && $response['is_valid_format']['value'] === false) {
            $errors[] = "Enter a valid email format";
        }
    
        if (isset($response['deliverability']) && $response['deliverability'] !== "DELIVERABLE") {
            $errors[] = "Please enter a valid email address";
        }
    
        if (isset($response['is_smtp_valid']['value']) && $response['is_smtp_valid']['value'] === false) {
            $errors[] = "This email address does not support sending or receving mails";
        }
    }
    $ch = curl_init();

// Set the URL that you want to GET by using the CURLOPT_URL option.
curl_setopt($ch, CURLOPT_URL, "https://phonevalidation.abstractapi.com/v1/?api_key=51dd1bfa0aba4884abcc1a8a4399de17&phone=$phone");

// Set CURLOPT_RETURNTRANSFER so that the content is returned as a variable.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Set CURLOPT_FOLLOWLOCATION to true to follow redirects.
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

// Execute the request.
$data = curl_exec($ch);

// Check for cURL errors and handle them if necessary.
if ($data === false) {
    echo 'cURL error: ' . curl_error($ch);
    // Handle the error
} else {
    // Close the cURL handle.
    curl_close($ch);

    // Decode the JSON response into a PHP array
    $response = json_decode($data, true);

    if (isset($response['valid']) && $response['valid'] === false) {
        $errors[] = "Input a valid phone number format.";
    }

    if (
        !isset($response['country']['code']) || 
        !isset($response['country']['name']) ||
        ($response['country']['code'] !== "NP" && $response['country']['name'] !== "Nepal")
    ) {
        $errors[] = "Only numbers from Nepal are supported.";
    }
}

    if (empty($errors)) {
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
}

// Handle errors
if (!empty($errors)) {
    echo json_encode(['error' => $errors]);
}
?>
