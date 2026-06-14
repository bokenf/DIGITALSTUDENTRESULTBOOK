<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Student Result Management System - Dashboard</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background-color: #f4f6f9; }
        .form-container { background: #fff; padding: 25px; margin-bottom: 30px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); max-width: 500px; margin-left: auto; margin-right: auto; }
        h1 { text-align: center; color: #2d3748; margin-bottom: 30px; font-size: 28px; }
        h2 { color: #1a365d; margin-top: 0; border-bottom: 2px solid #edf2f7; padding-bottom: 10px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; color: #4a5568; }
        input { width: 100%; padding: 10px; border: 1px solid #cbd5e0; border-radius: 4px; box-sizing: border-box; }
        button { background-color: #2b6cb0; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; width: 100%; font-weight: bold; }
        button:hover { background-color: #1a365d; }
    </style>
</head>
<body>

    <h1>📚 Digital Student Result Book Dashboard</h1>

    <div class="form-container">
        <h2>Lecturer Grade Entry Panel</h2>
        <form id="marksForm" action="insert_grade.php" method="POST">
            <div class="form-group">
                <label for="studentReg">Student Registration Number:</label>
                <input type="text" id="studentReg" name="student_reg" placeholder="e.g., BIT/1234/2024" required>
            </div>
            <div class="form-group">
                <label for="catMark">Continuous Assessment Test (CAT) Score (Max 30):</label>
                <input type="number" id="catMark" name="cat_mark" placeholder="0 - 30" step="0.5" min="0" max="30" required>
            </div>
            <div class="form-group">
                <label for="examMark">Final Examination Score (Max 70):</label>
                <input type="number" id="examMark" name="exam_mark" placeholder="0 - 70" step="0.5" min="0" max="70" required>
            </div>
            <button type="submit">Submit Grades to Ledger</button>
        </form>
    </div>

</body>
</html>