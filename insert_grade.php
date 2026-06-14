<?php
require_once 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reg = $_POST['student_reg'];
    $role = $_POST['user_role']; // Capturing the role from the form

    // Check if this ID is already taken by a DIFFERENT role
    $check_sql = "SELECT user_role FROM student_results WHERE student_reg = ?";
    $stmt = $conn->prepare($check_sql);
    $stmt->bind_param("s", $reg);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row['user_role'] !== $role) {
            die("Error: Registration number $reg is already registered under a different role (" . $row['user_role'] . ").");
        }
    }

    // Proceed with registration/insertion if safe...
}
?>