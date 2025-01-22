<?php
require_once '../model/model.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $_SESSION['username'] = $username;

    if (!empty($username) && !empty($password)) {
        $user = login($username, $password);
        if ($user) {
            $_SESSION['user_type'] = $user['Type'];
            setcookie('user', $username, time() + (30 * 24 * 60 * 60), '/');
            
            if ($user['Type'] === 'admin' || $user['Type'] === 'Admin') {
                header('Location: ../view/admin.php');
            } else {
                header('Location: ../view/Dashboard.php');            
            }
            exit();
        } else {
            echo "<script>alert('Invalid username or password!'); window.location.href='../view/login.php';</script>";
        }
    } else {
        echo "<script>alert('Please fill in all fields!'); window.location.href='../view/login.php';</script>";
    }
}
?>
