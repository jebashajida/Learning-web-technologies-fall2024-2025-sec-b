<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .signup-container {
            background-color: #ffffff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 500px;
        }

        .signup-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555555;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        .form-group input[type="radio"] {
            width: auto;
            margin-right: 5px;
        }

        .form-group .radio-group {
            display: flex;
            justify-content: space-between;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: #4CAF50;
            outline: none;
        }

        .submit-btn {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .submit-btn:hover {
            background-color: #45a049;
        }

        .form-group .error-message {
            color: red;
            font-size: 12px;
        }

        @media (max-width: 600px) {
            .signup-container {
                padding: 20px;
            }

            .form-group input,
            .form-group select,
            .form-group textarea {
                font-size: 12px;
            }
        }

        .form-group .terms {
            font-size: 14px;
            display: flex;
            align-items: center;
        }

        .form-group .terms input[type="checkbox"] {
            margin-right: 10px;
        }

        .form-group .terms a {
            color: #4CAF50;
            text-decoration: none;
        }

        .form-group .terms a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="signup-container">
        <h2>Signup</h2>
        <form method="POST" action="../controller/reg_val.php">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div class="form-group">
                <label for="retype-password">Confirm Password:</label>
                <input type="password" name="retype-password" id="retype-password" required>
            </div>
            <div class="form-group">
                <label for="type">Type:</label>
                <select name="type" id="type" required>
                    <option value="Job-Seeker">Job-Seeker</option>
                    <option value="Employer">Employer</option>
                </select>
            </div>
            <div class="form-group">
                <label for="number">Phone Number:</label>
                <input type="number" name="number" id="number" required>
            </div>
            <div class="form-group">
                <label>Gender:</label>
                <div class="radio-group">
                    <label><input type="radio" name="g" value="Male" required> Male</label>
                    <label><input type="radio" name="g" value="Female" required> Female</label>
                    <label><input type="radio" name="g" value="Other" required> Other</label>
                </div>
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth:</label>
                <input type="date" name="dob" id="dob" required>
            </div>
            <div class="form-group terms">
                <input type="checkbox" name="terms" id="terms" required>
                Do you agree to our <a href="terms.html">Terms of Use</a>?
            </div>
            <button type="submit" class="submit-btn">Signup</button>
        </form>
    </div>
</body>
</html>
