<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <title>User Home</title>
</head>
<body>
    <h1>Welcome <?php echo $_SESSION['name']; ?>!</h1>
    <a href="profile.php">Profile</a><br>
    <a href="change_password.php">Change Password</a><br>
    <a href="logout.php">Logout</a>
</body>
</html>