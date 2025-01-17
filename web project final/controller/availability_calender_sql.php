<?php
session_start();
require_once('../model/userModel.php');

if (isset($_SESSION['username'])) {
    if (isset($_POST['day']) && isset($_POST['status'])) {
        $freelancer = $_SESSION['username']; // Use session username to identify freelancer
        $day = trim($_POST['day']);          // Expected format: 'YYYY-MM-DD'
        $status = trim($_POST['status']);    // 'available' or 'unavailable'

        $isAvailable = ($status === 'available') ? 1 : 0;

        $result = updateAvailability($freelancer, $day, $isAvailable); // Function to update DB

        if ($result) {
            echo "Availability updated successfully.";
        } else {
            echo "Failed to update availability.";
        }
    } else {
        echo "Invalid parameters.";
    }
} else {
    echo "Unauthorized access.";
}
?>

