<?php
session_start();
require_once('../model/userModel.php');

if (isset($_POST['submit_s'])) {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $cpassword = trim($_POST['retype-password']);
    $type = $_POST['looking-for'];
    $number=trim($_POST['number']);
    $gender=trim($_POST['g']);
    $dob=trim($_POST['dob']);

    if ($username == null || empty($password) || empty($cpassword) || empty($email) || empty($type)|| empty($number) ||empty($gender) || empty($dob)){
        echo "All fields are required.";
    } elseif ($password != $cpassword) {
        echo "Passwords do not match.";
    } else {
        $status =adduser($username, $email, $password, $type , $number, $gender, $dob);
        if ($status) {
            header('location: ../view/login.html');
        } else {
            echo "Signup failed. Try again.";
        }
    }
} else {
    header('location: ../view/signup.html');
}
?>
