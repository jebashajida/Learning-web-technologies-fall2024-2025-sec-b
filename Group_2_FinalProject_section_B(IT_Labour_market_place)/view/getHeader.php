<?php
session_start();
if (isset($_SESSION['user_type'])) {
    if ($_SESSION['user_type'] === 'Employer') {
        include 'header1.php';
    } else if ($_SESSION['user_type'] === 'Job-Seeker') {
        include 'header2.php';
    }
} else {
    include 'header1.php';
}
?>