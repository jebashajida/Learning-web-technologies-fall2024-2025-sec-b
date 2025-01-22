<?php
session_start();
require_once('../model/model.php');

if (isset($_POST['confirm'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $dob = trim($_POST['dob']);
    $gender = trim($_POST['gender']);
    $username = $_SESSION['username'];

    if (empty($name) || empty($email) || empty($phone) || empty($dob) || empty($gender)) {
        echo "All fields are required.";
    } else {
        $status = updateUser($name, $email, $phone, $dob, $gender, $username);

        if ($status) {
            echo "Profile updated successfully!";
            header('location: ../controller/profile.php'); 
        } else {
            echo "Failed to update profile. Please try again.";
        }
    }
} else {
    header('location: ../view/edit_sql.html');
}
?>