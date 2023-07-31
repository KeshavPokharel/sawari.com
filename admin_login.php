<!-- admin_login.php -->
<?php
session_start();
// admin_login.php
require_once "script/db_connect.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Perform a database query to check the admin credentials
    $query = "SELECT * FROM admins WHERE username = '$username' AND password = '$password'";
    $result = $link->query($query);

    if ($result->num_rows === 1) {
        // Admin login successful
        $admin_data = $result->fetch_assoc();
        
        $_SESSION['admin_id'] = $admin_data['admin_id'];
        header("Location: admin.php"); // Redirect to admin.php
        exit;
    } else {
        // Invalid credentials, show an error message or redirect back to admin_login.php with an error message
        echo "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<body>
    <h2>Admin Login</h2>
    <form  method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <input type="submit" value="Login">
    </form>
</body>
</html>
