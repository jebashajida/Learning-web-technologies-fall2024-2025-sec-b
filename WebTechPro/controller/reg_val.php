<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $errors = [];

    $name = trim($_POST['username']);
    if (empty($name)) {
        $errors['name'] = "Name is required.";
    }

    $email = trim($_POST['email']);
    if (empty($email)) {
        $errors['email'] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format.";
    }

    $password = $_POST['password'];
    $retype_password = $_POST['retype-password'];
    if (empty($password)) {
        $errors['password'] = "Password is required.";
    } elseif (!preg_match('/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,24}$/', $password)) {
        $errors['password'] = "Password must be 8-24 characters long, contain at least one uppercase letter, one number, and one special character.";
    }

    if ($password !== $retype_password) {
        $errors['retype_password'] = "Passwords do not match.";
    }

    $type = $_POST['type'] ?? '';
    if (empty($type)) {
        $errors['type'] = "Please select what you are looking for.";
    }

    $number = trim($_POST['number']);
    if (empty($number)) {
        $errors['number'] = "Phone number is required.";
    } elseif (!preg_match('/^\d{11}$/', $number)) {
        $errors['number'] = "Phone number must be 11 digits.";
    }

    $dob = $_POST['dob'];
    if (empty($dob)) {
        $errors['dob'] = "Date of birth is required.";
    } else {
        $dobDate = new DateTime($dob);
        $currentDate = new DateTime();
        $age = $currentDate->diff($dobDate)->y;
        if ($age < 18) {
            $errors['dob'] = "You must be at least 18 years old.";
        }
    }

    $gender = $_POST['g'] ?? '';

    if (!isset($_POST['terms'])) {
        $errors['terms'] = "You must agree to the Terms of Use and Privacy Policy.";
    }

    if (empty($errors)) {

        include '../model/model.php';

        $result = adduser($name, $email, $password, $type , $number, $gender, $dob);

        if ($result) {
            setcookie("user_name", $name, time() + (30 * 24 * 60 * 60), "/");
            echo "<p>Registration successful! Welcome, " . htmlspecialchars($name) . "</p>";
        } else {
            echo "<p>An error occurred while saving your information. Please try again.</p>";
        }
    } else {

        foreach ($errors as $field => $error) {
            echo "<p>Error in $field: $error</p>";
        }
    }
}
?>

<html>
<div style="margin-top: 20px; border-top: 1px solid #eaeaea; padding-top: 20px;">
            <form style="margin-top: 10px;">
                <button type="button" onclick="window.location.href='../view/login.php';">Go-To Login</button>
            </form>
        </div>
</html>