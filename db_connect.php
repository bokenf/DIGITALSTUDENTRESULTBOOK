<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student_tracker"; // Your database name

// Initialize connection handler
$conn = new mysqli($servername, $username, $password, $dbname);

// Verify database connection path integrity
if ($conn->connect_error) {
    die("Database Connection failed: " . $conn->connect_error);
}
?>