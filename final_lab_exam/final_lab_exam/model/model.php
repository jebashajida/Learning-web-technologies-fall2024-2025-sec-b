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

function searchEmployee($query) {
    $conn = getConnection();
    $searchValue = mysqli_real_escape_string($conn, $query);
    $sql = "SELECT * FROM employees WHERE name LIKE '%$searchValue%'";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div>" . $row['name'] . " - " . $row['contact'] . "</div>";
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

function loadEmployeeTable() {
    $conn = getConnection();
    $sql = "SELECT * FROM employees";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        echo "<table border='1'>";  
        echo "<tr><th>ID</th><th>Name</th><th>Contact</th><th>Username</th><th>Password</th><th>Actions</th></tr>";  
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['ID'] . "</td>";
            echo "<td>" . $row['Name'] . "</td>";
            echo "<td>" . $row['C.O.'] . "</td>"; 
            echo "<td>" . $row['Username'] . "</td>";
            echo "<td>" . $row['Password'] . "</td>";

            echo "<td><button class='updateBtn' data-id='" . $row['ID'] . "'>Update</button> 
                      <button class='deleteBtn' data-id='" . $row['ID'] . "'>Delete</button></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}


function getEmployeeById($id) {
    $conn = getConnection();
    $employeeId = mysqli_real_escape_string($conn, $id);
    $sql = "SELECT * FROM employees WHERE id = '$employeeId'";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        $employee = mysqli_fetch_assoc($result);
        echo json_encode($employee);
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

function deleteEmployee($id) {
    $conn = getConnection();
    $employeeId = mysqli_real_escape_string($conn, $id);
    $sql = "DELETE FROM employees WHERE id = '$employeeId'";

    if (mysqli_query($conn, $sql)) {
        echo "Employee deleted successfully.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>