<?php

function getConnection(){
    $conn = mysqli_connect('127.0.0.1', 'root', '', 'shop_management');
    return $conn;
}

function isUsernameTaken($username){
    $conn = getConnection();
    $sql = "SELECT id FROM employees WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0)
    {
        return true;
    }
    else
    {
        return false;
    }
}

function registerEmployee($name, $contact, $username, $password){
    $conn = getConnection();
    $sql = "insert into employees VALUES('', '{$name}', '{$contact}', '{$username}', '{$password}')";
    if(mysqli_query($conn, $sql)){
        return true;
    }else{
        return false;
    }
}

?>
