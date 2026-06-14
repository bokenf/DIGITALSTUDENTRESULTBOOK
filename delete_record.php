<?php
// delete_record.php
session_start();
require_once 'db_connect.php';

// Security: Only allow Admins to delete
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'Admin') {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Secure: converts to integer
    $stmt = $conn->prepare("DELETE FROM student_results WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

header("Location: admin_dashboard.php");
exit();
?>