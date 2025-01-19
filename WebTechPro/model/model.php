<?php
function getConnection() {
    $conn = mysqli_connect('127.0.0.1', 'root', '', 'webtech');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}

function login($username, $password){
    $conn = getConnection();
    $sql = "SELECT * FROM registration_pro WHERE Name='{$username}' AND Password='{$password}'";
    $result = mysqli_query($conn, $sql);
    return mysqli_num_rows($result)===1;
}

function adduser($username, $email, $password, $type , $number, $gender, $dob) {
    $conn = getConnection();
    $sql = "INSERT INTO registration_pro (Name, Email, Password,Type,number,gender,dob) VALUES ('{$username}', '{$email}', '{$password}', '{$type}','{$number}','{$gender}','{$dob}')";
    return mysqli_query($conn, $sql);
}

function getUserDetails($username) {
    $conn = getConnection();
    $sql = "SELECT * FROM registration_pro WHERE Name='{$username}'";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}

function addCertification($user_id, $file_name, $file_path) {
    $conn = getConnection();
    $sql = "INSERT INTO skill_verifications (user_id, file_name, file_path,skill_name) 
            VALUES ('', '{$file_name}', '{$file_path}','i')";
    return mysqli_query($conn, $sql);
}

function updateTermsAgreement($user_id, $email_sent) {
    $conn = getConnection();
    $sql = "INSERT INTO terms (user_id, agreed_at, email_sent)
            VALUES ('{$user_id}', NOW(), '{$email_sent}')
            ON DUPLICATE KEY UPDATE agreed_at = NOW(), email_sent = '{$email_sent}'";

    return mysqli_query($conn, $sql);
}

function updateUser($name, $email, $phone, $dob, $gender, $username) {
    $conn = getConnection();
    $sql = "UPDATE registration_pro 
            SET Name = '{$name}', Email = '{$email}', number = '{$phone}', gender = '{$gender}', dob = '{$dob}'
            WHERE Name = '{$username}'";

    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}

function changepassword($cu_pass,$pass,$re_pass) {
    $conn = getConnection();
    $sql = "UPDATE registration_pro 
            SET Name = '{$name}', Email = '{$email}', number = '{$phone}', gender = '{$gender}', dob = '{$dob}'
            WHERE Name = '{$username}'";

    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}

class JobModel {
    private $db;

    public function __construct() {
        $this->db = getConnection();
    }

    public function getJobs($filter = '') {
        $sql = "SELECT * FROM jobs";
        if ($filter) {
            $sql .= " WHERE type LIKE '%$filter%'";
        }
        $result = mysqli_query($this->db, $sql);
        $jobs = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $jobs[] = $row;
        }
        return $jobs;
    }
    public function getJobById($id) {
        $sql = "SELECT * FROM jobs WHERE id = $id";
        $result = mysqli_query($this->db, $sql);
        return mysqli_fetch_assoc($result);
    }
    public function postJob($title, $type, $company, $pay, $description) {
        $sql = "INSERT INTO jobs (title, type, company, pay, applications, description) 
                VALUES ('$title', '$type', '$company', $pay, 0, '$description')";
        return mysqli_query($this->db, $sql);
    }
    public function applyForJob($jobId) {
        $sql = "UPDATE jobs SET applications = applications + 1 WHERE id = $jobId";
        return mysqli_query($this->db, $sql);
    }
    public function addJobToHistory($username, $jobId) {
        $sql = "INSERT INTO job_history (username, job_id, applied_at) 
                VALUES ('$username', $jobId, NOW())";
        return mysqli_query($this->db, $sql);
    }
}

?>