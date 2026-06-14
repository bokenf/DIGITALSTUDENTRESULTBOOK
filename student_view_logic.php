<?php
// student_view_logic.php
function getStudentResults($conn, $regNumber) {
    // We use a prepared statement to keep it secure
    $stmt = $conn->prepare("SELECT * FROM student_results WHERE student_reg = ?");
    $stmt->bind_param("s", $regNumber);
    $stmt->execute();
    return $stmt->get_result();
}
?>