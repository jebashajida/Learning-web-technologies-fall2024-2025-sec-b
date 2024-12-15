<?php
session_start();
if (!isset($_SESSION['userid']) || $_SESSION['user_type'] !== 'Admin') {
    header('Location: login.php');
    exit;
}

$users = file('users.txt', FILE_IGNORE_NEW_LINES);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Users</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Registered Users</h1>
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>User Type</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($users as $user) {
                list($id, $password, $name, $user_type) = explode('|', $user);
                echo "<tr>
                        <td>$id</td>
                        <td>$name</td>
                        <td>$user_type</td>
                    </tr>";
            }
            ?>
        </tbody>
    </table>
    
    <a href="admin_home.php">Back to Admin Home</a>
</body>
</html>