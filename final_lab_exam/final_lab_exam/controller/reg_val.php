<?php
 require_once '../model/model.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($name) || empty($contact) || empty($username) || empty($password)) {
        die('All fields are required.');
    }

    else if (!preg_match('/^[0-9]{11}$/', $contact)) {
        die('Invalid contact number. Must be 11 digits.');
    }

    else if (isUsernameTaken($username)) {
        die('Username is already taken. Please choose another one.');
    }

    else if (strlen($password) < 8) {
        die('Password must be at least 8 characters long.');
    }

    else{
        $result = registerEmployee($name, $contact, $username, $password);
        if ($result) {
            header('location: ../view/login.php');
        }   
        else {
            echo "Registration failed.";
        }
    }
}
?>