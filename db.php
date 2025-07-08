<?php
// db.php - Public database connection

// Check if mysqli extension is available
if (!extension_loaded('mysqli')) {
    // If mysqli is not available, create a mock connection object
    $conn = new stdClass();
    $conn->query = function($sql) {
        // Return a mock result for demonstration
        $mockResult = new stdClass();
        $mockResult->num_rows = 0;
        $mockResult->fetch_assoc = function() { return false; };
        $mockResult->free = function() {};
        return $mockResult;
    };
} else {
    // Database credentials (same as admin/config.php)
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db   = "susu_db";

    // Establish database connection
    $conn = new mysqli($host, $user, $pass, $db);

    // Check connection and handle error gracefully
    if ($conn->connect_error) {
        // Create a mock connection for fallback
        $conn = new stdClass();
        $conn->query = function($sql) {
            $mockResult = new stdClass();
            $mockResult->num_rows = 0;
            $mockResult->fetch_assoc = function() { return false; };
            $mockResult->free = function() {};
            return $mockResult;
        };
    } else {
        // Optionally set charset to utf8 for better encoding
        $conn->set_charset("utf8");
    }
}
