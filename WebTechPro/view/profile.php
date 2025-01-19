<?php
session_start();
require_once('../model/model.php');

if (!isset($_COOKIE['user'])) {
    header('Location: login.php');
    exit();
}

$username = $_SESSION['username'];

$user = getUserDetails($username);

if ($user) {
    $name = $user['Name'];
    $email = $user['Email'];   
    $password = $user['Password']; 
    $type = $user['Type'];     
    $number = $user['number'];
    $gender = $user['gender'];
    $dob = $user['dob'];
    $profile_picture = $user['profile_picture']; 
} else {
    echo "User not found!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .profile-container {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 400px;
        }
        .profile-container img {
            border-radius: 50%;
            margin-bottom: 20px;
        }
        .profile-container h2 {
            color: #333;
            margin-bottom: 20px;
        }
        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 100%;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        a, button {
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            color: white;
            background-color: #007BFF;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }
        a:hover, button:hover {
            background-color: #0056b3;
        }
        button {
            background-color: #28a745;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div id="header"></div>
    <div class="profile-container">
        <img src="<?php echo $profile_picture; ?>" alt="Profile Picture" width="150" height="150">
        <h2>Your Profile</h2>
        <table>
            <tr>
                <th>Username</th>
                <td><?php echo $name; ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo $email; ?></td>
            </tr>
            <tr>
                <th>Password</th>
                <td><?php echo $password; ?></td>
            </tr>
            <tr>
                <th>Type</th>
                <td><?php echo $type; ?></td>
            </tr>
            <tr>
                <th>Number</th>
                <td><?php echo $number; ?></td>
            </tr>
            <tr>
                <th>Gender</th>
                <td><?php echo $gender; ?></td>
            </tr>
            <tr>
                <th>Date of Birth</th>
                <td><?php echo $dob; ?></td>
            </tr>
        </table>
        <a href="Dashboard.php">Back to Home</a>
        <button onclick="window.location.href='jhistory.php';">View Job History</button>
    </div>
    <div id="footer"></div>

    <script>

        function loadHeaderFooter() {
            fetch('header1.php')
                .then(response => response.text())
                .then(data => document.getElementById('header').innerHTML = data)
                .catch(error => console.error('Error loading header:', error));

            fetch('footer.html')
                .then(response => response.text())
                .then(data => document.getElementById('footer').innerHTML = data)
                .catch(error => console.error('Error loading footer:', error));
        }
        window.onload = function() {
            loadHeaderFooter();
            loadJobDetails();
        };
    </script>
</body>
</html>
