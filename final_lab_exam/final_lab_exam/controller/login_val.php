<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        die('Username and password are required.');
    }
    else{
        $result = registerEmployee($name, $contact, $username, $password);
    }


}
?>