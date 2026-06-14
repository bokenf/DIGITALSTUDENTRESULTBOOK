<?php
session_start();
require_once 'db_connect.php';
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'Admin') {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard | Digital Result System</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, sans-serif; background-color: #f4f6f9; color: #2d3748; padding: 40px; }
        .container { max-width: 900px; margin: auto; background: #fff; padding: 30px; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); }
        h2 { color: #1a365d; margin-bottom: 25px; border-bottom: 3px solid #edf2f7; padding-bottom: 15px; }
        
        table { width: 100%; border-collapse: separate; border-spacing: 0; margin-top: 20px; }
        th { background-color: #2b6cb0; color: white; padding: 15px; text-align: left; }
        th:first-child { border-top-left-radius: 8px; }
        th:last-child { border-top-right-radius: 8px; }
        td { padding: 15px; border-bottom: 1px solid #e2e8f0; }
        
        tr:hover { background-color: #f7fafc; }
        
        .btn-delete { 
            background: #feb2b2; color: #9b2c2c; padding: 8px 16px; 
            border-radius: 6px; text-decoration: none; font-size: 0.85rem; font-weight: 600;
            transition: all 0.2s;
        }
        .btn-delete:hover { background: #f56565; color: white; }
        
        .logout-link { display: inline-block; margin-top: 20px; color: #718096; text-decoration: none; font-size: 0.9rem; }
        .logout-link:hover { color: #2d3748; }
    </style>
</head>
<body>

<div class="container">
    <h2>System Administrator: Student Records</h2>
    <table>
        <thead>
            <tr>
                <th>Registration Number</th>
                <th>CAT Score</th>
                <th>Exam Score</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $res = $conn->query("SELECT * FROM student_results");
            while($row = $res->fetch_assoc()) {
                echo "<tr>
                    <td><strong>{$row['student_reg']}</strong></td>
                    <td>{$row['cat_score']}</td>
                    <td>{$row['exam_score']}</td>
                    <a href='delete_record.php?id={$row['id']}' class='btn-delete'>Delete</a>
                </tr>";
            }
            ?>
        </tbody>
    </table>
    <a href="logout.php" class="logout-link">← Securely Logout</a>
</div>

</body>
</html>