<?php
session_start();
require_once 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $role = $_POST['user_role'];
    
    // 1. Basic database check: 
    // We check if this user exists in our records (optional but recommended)
    // For now, we simply store the session data safely
    $_SESSION['user_role'] = $role;
    $_SESSION['user_id'] = $user_id;

    // 2. Redirect based on role
    if ($role == 'Admin') {
        header("Location: admin_dashboard.php");
    } elseif ($role == 'Lecturer') {
        header("Location: dashboard.php");
    } elseif ($role == 'Student') {
        header("Location: student_dashboard.php");
    } else {
        // If something goes wrong, send them back to login
        header("Location: login.php?error=invalid_role");
    }
    exit();
}
?>