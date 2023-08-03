<?php
// delete_request.php

// Enable error reporting and display all errors for debugging purposes
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "script/db_connect.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["request_id"])) {
    $request_id = $_POST["request_id"];

    // Prepare the DELETE query with a prepared statement
    $delete_query = "DELETE FROM ride_requests WHERE request_id = ?";

    if ($stmt = $link->prepare($delete_query)) {
        $stmt->bind_param("i", $request_id);
        if ($stmt->execute()) {
            // Deletion successful
            http_response_code(200);
            exit; // Important: Stop script execution after successful deletion
        } else {
            // Deletion failed
            http_response_code(500);
            exit; // Important: Stop script execution after failed deletion
        }

    } else {
        // Error in preparing the statement
        http_response_code(500);
        exit; // Important: Stop script execution after error
    }
} else {
    // Invalid request
    http_response_code(400);
    exit; // Important: Stop script execution after invalid request
}
