<?php
session_start();
require_once('../model/userModel.php');
if (!isset($_SESSION['username'])) {
    header('location: ../view/login.html');
    exit();
}
$username = $_SESSION['username'];

$user=getUserDetails($username);
if ($user) {
    $name = $user['Name'];
    $email = $user['Email'];   // Fetch email from the database
    $number=$user['number'];
    $dob=$user['dob'];
    $gender=$user['gender'];
    
} else {
    echo "User not found!";
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>HOME Page</title>
</head>
<body>
    <h1>Welcome, <?php echo $username; ?>!</h1>
   
    <ul>
        <li><a href="../controller/profile_sql.php">View Profile</a></li>
        <li><a href="../view/edit.php?name=<?php echo $name ; ?>&email=<?php echo $email; ?>&phone=<?php echo $number; ?>&dob=<?php echo $dob; ?>&gender=<?php echo $gender; ?>">Edit Profile</a></li>
        
        <li><a href="../controller/viewuser_sql.php">View All Users</a></li><br>
        <li><a href="../view/terms.html">Terms</a></li>
        <li><a href="../controller/logout.php">Logout</a></li>
    </ul>
</body>

</html>
