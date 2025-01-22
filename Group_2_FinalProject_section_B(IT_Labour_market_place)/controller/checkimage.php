<?php
session_start();
require_once('../model/userModel.php');

if (!isset($_SESSION['username'])) {
    header('location: ../view/login.html');
    exit();
}

if (isset($_POST['submit'])) {
    $username = $_SESSION['username'];
    if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['profile_pic']['tmp_name'];
        $fileName = $_FILES['profile_pic']['name'];
        $fileSize = $_FILES['profile_pic']['size'];
        $fileType = $_FILES['profile_pic']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        $allowedfileExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        if (in_array($fileExtension, $allowedfileExtensions)) {
            $uploadFileDir = '../uploads/';
            $dest_path = $uploadFileDir . $username . '.' . $fileExtension;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                if (updateProfilePicture($username, $dest_path)) {
                    echo "Profile picture updated successfully!";
                    header('location : profile_sql.php');
                } else {
                    echo "Failed to update profile picture in database.";
                }
            } else {
                echo "Failed to move the uploaded file.";
            }
        } else {
            echo "Invalid file type. Only JPG, JPEG, PNG, and GIF are allowed.";
        }
    } else {
        echo "File upload error.";
    }
} else {
    echo "Form not submitted.";
}
?>