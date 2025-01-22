<?php
session_start();
require_once('../model/model.php');

if (isset($_POST['verification'])) {
    //$user_id = 1;
    $file = $_FILES['certification'];

    if (isset($_FILES['certification']) && $_FILES['certification']['error'] === UPLOAD_ERR_OK) {
        $file_name = $file['name'];
        $file_tmp_path = $file['tmp_name'];
        $upload_dir = '../uploads/certifications/';
        $file_path = $upload_dir . basename($file_name);
        if (!is_dir($upload_dir) || !is_writable($upload_dir)) {
            die("Upload directory does not exist or is not writable.");
        }

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
        echo "Error: " . $file['error'];
    }
} else {
    echo json_encode(["error" => "Invalid request. Missing verification data."]);
    exit;}
?>
