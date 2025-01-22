<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh;
    background-color: #f9f9f9;
}

.logo {
    margin-bottom: 20px;
}

.logo img {
    width: 150px; 
    height: auto;
}

.form-container {
    background: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    text-align: center;
}

h2 {
    margin-bottom: 20px;
    color: #333;
}

form {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
}

label {
    margin-bottom: 5px;
    font-weight: bold;
    color: #555;
}

input[type="text"], input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
}

input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

a {
    color: #007BFF;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}
    </style>

</head>
<body>
    <div class="logo">
        <img src="logo1.png" alt="Logo">
    </div>
    <h2>Login</h2>
    <form name="loginForm" action="../controller/login_val.php" method="POST">
        <label>Username:</label>
        <input type="text" name="username" id="username" required><br><br>
        <label>Password:</label>
        <input type="password" name="password" id="password" required><br><br>
        <input type="submit" value="Login">
    </form>
    <br>
    <label>Don't have an account?
    <a href="Signup.php">Signup</a></label>
</body>
</html>