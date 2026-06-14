<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Login | Digital Result System</title>
    <style>
        :root {
            --primary: #2b6cb0;
            --secondary: #1a365d;
            --bg: #f4f6f9;
            --text: #2d3748;
        }
        body { font-family: 'Segoe UI', Tahoma, sans-serif; background-color: var(--bg); display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        
        .form-container { 
            background: #fff; padding: 35px; border-radius: 12px; 
            box-shadow: 0 10px 25px rgba(0,0,0,0.1); width: 100%; max-width: 400px;
            transition: transform 0.3s ease;
        }
        .form-container:hover { transform: translateY(-5px); }
        
        h2 { color: var(--secondary); margin-bottom: 25px; text-align: center; font-weight: 600; }
        
        .form-group { margin-bottom: 20px; position: relative; }
        label { display: block; margin-bottom: 8px; font-size: 0.9rem; color: #4a5568; font-weight: 600; }
        
        input, select { 
            width: 100%; padding: 12px; border: 2px solid #e2e8f0; border-radius: 8px; 
            box-sizing: border-box; transition: all 0.3s ease; font-size: 1rem;
        }
        
        input:focus, select:focus { 
            border-color: var(--primary); outline: none; box-shadow: 0 0 0 3px rgba(43, 108, 176, 0.2); 
        }

        button { 
            background-color: var(--primary); color: white; padding: 14px; border: none; 
            border-radius: 8px; cursor: pointer; font-size: 1rem; width: 100%; font-weight: bold;
            transition: background 0.3s ease, transform 0.2s;
        }
        button:hover { background-color: var(--secondary); transform: scale(1.02); }
        
        .strength-meter { font-weight: bold; margin-top: 8px; font-size: 0.8rem; }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Secure User Login</h2>
        <form id="loginForm" action="authenticate.php" method="POST">
            <div class="form-group">
                <label for="userId">Registration Number</label>
                <input type="text" id="userId" name="user_id" placeholder="e.g., BIT/0001/2023" required>
            </div>
            <div class="form-group">
                <label for="userRole">System Role</label>
                <select id="userRole" name="user_role" required>
                    <option value="">-- Select Role --</option>
                    <option value="Admin">Administrator</option>
                    <option value="Lecturer">Lecturer</option>
                    <option value="Student">Student</option>
                </select>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="••••••••" required>
                
                <div style="margin-top: 10px; display: flex; align-items: center; gap: 8px;">
                    <input type="checkbox" id="togglePassword" style="width: 18px; height: 18px; cursor: pointer;">
                    <label for="togglePassword" style="font-weight: normal; margin-bottom: 0; cursor: pointer;">Show Password</label>
                </div>
                <div id="passwordStrength" class="strength-meter"></div>
            </div>
            <button type="submit">Authenticate Session</button>
        </form>
    </div>

    <script src="validation.js"></script>
</body>
</html>