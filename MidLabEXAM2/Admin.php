<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Home</title>
</head>
<body>
    <h1>Welcome, Admin <?php echo $_SESSION['name']; ?>!</h1>
    <a href="view_users.php">View Users</a><br>
    <a href="profile.php">Profile</a><br>
    <a href="change_password.php">Change Password</a><br>
    <a href="logout.php">Logout</a>
</body>
</html>