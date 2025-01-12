<!DOCTYPE html>
<html lang="en">
<head>
    <title>Shop Management System</title>
</head>

<body>
    <h3>Register Employee</h3>
    <form action="../controller/reg_val.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="contact">Contact No:</label>
        <input type="text" id="contact" name="contact" required><br><br>

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit">Register</button><br><br>
        <a href="login.php">Login</a>
    </form>


    <script>
        function displayMessage(msg, color = 'green')
        {
            message = document.getElementById('message');
            message.textContent = msg;
            messag.style.color = color;
            setTimeout
        }

        function registerEmployee()
        {

        }
    </script>

</body>
</html>
