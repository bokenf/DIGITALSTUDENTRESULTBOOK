<?php
session_start();
require_once 'db_connect.php';
require_once 'student_view_logic.php';

// Security: Only allow logged-in students
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'Student') {
    header("Location: login.php");
    exit();
}

$reg = $_SESSION['user_id'];
$result = getStudentResults($conn, $reg);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Portal | My Results</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #f4f7f6; padding: 40px; }
        .container { max-width: 800px; margin: auto; background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        h2 { color: #2d3748; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th { background: #3182ce; color: white; padding: 12px; text-align: left; }
        td { padding: 12px; border-bottom: 1px solid #e2e8f0; }
        .logout { display: inline-block; margin-top: 20px; color: #e53e3e; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>

<div class="container">
    <h2>Welcome, <?php echo htmlspecialchars($reg); ?></h2>
    
    <?php if ($result->num_rows > 0): ?>
        <table>
            <tr><th>CAT (30%)</th><th>Exam (70%)</th><th>Total</th><th>Grade</th></tr>
            <?php while($row = $result->fetch_assoc()): 
                $total = $row['cat_score'] + $row['exam_score'];
                $grade = getGrade($total);
            ?>
                <tr>
                    <td><?php echo $row['cat_score']; ?></td>
                    <td><?php echo $row['exam_score']; ?></td>
                    <td><?php echo $total; ?></td>
                    <td><strong><?php echo $grade; ?></strong></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>No results available at this time. Please contact your department.</p>
    <?php endif; ?>

    <a href="logout.php" class="logout">Logout</a>
</div>

</body>
</html>