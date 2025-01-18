<?php
session_start();
require_once('../model/userModel.php');

if (isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if ($username == null || empty($password)) {
        echo "Username and Password are required.";
    } else {
        $_SESSION['username'] = $username;
        $status = login($username,$password);
        if ($status) {
          
            header('location: ../controller/home_sql.php');
        } else {
            echo "Invalid Username or Password.";
        }
    }
} else {
    header('location: ../view/login.html');
}
?>
