<?php
require_once "script/db_connect.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["request_id"]) && isset($_POST["status"])) {
    $requestId = $_POST["request_id"];
    $status = $_POST["status"];

    // Update the status in the database
    $update_query = "UPDATE riders SET state = '$status' WHERE rider_id = $requestId";

    if ($link->query($update_query) === TRUE) {
        // Update successful
        http_response_code(200);
    } else {
        // Update failed
        http_response_code(500);
    }
} else {
    // Invalid request
    http_response_code(400);
}
?>
