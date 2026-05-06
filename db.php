<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "crud_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set charset (important for proper text handling)
$conn->set_charset("utf8mb4");
?>