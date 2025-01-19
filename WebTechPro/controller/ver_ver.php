<?php
session_start();
require_once('../model/model.php');

if (isset($_POST['verification'])) {
    $user_id = 1;
    $file = $_FILES['certification'];

    if ($file['error'] === UPLOAD_ERR_OK) {
        $file_name = $file['name'];
        $file_tmp_path = $file['tmp_name'];
        $upload_dir = '../certification/';
        $file_path = $upload_dir . basename($file_name);

        if (move_uploaded_file($file_tmp_path, $file_path)) {

            $status = addCertification($user_id, $file_name, $file_path);

            if ($status) {
                echo "Certification uploaded successfully!";
            } else {
                echo "Failed to upload certification.";
            }
        } else {
            echo "Error uploading file. Please try again.";
        }
    } else {
        echo "No file selected or an error occurred during upload.";
    }
} else {
    header('location: ../view/verification.html');
}
?>
