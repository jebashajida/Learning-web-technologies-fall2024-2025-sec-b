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
    
    if(mysqli_num_rows($result) === 1){
        $user = mysqli_fetch_assoc($result);
        return $user;
    }

    return false;
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
    $sql = "INSERT INTO skill_verifications (file_name, file_path,skill_name) 
            VALUES ('{$file_name}', '{$file_path}','i')";
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

function changepassword($username, $newPassword) {
    $conn = getConnection();
    $sql = "UPDATE registration_pro SET Password='$newPassword' WHERE Name='$username'";
    return mysqli_query($conn, $sql);
}

function updateProfilePicture($username, $filePath) {
    $conn = getConnection();
    $sql = "UPDATE registration_pro SET profile_picture = '{$filePath}' WHERE Name = '{$username}'";
    return mysqli_query($conn, $sql);
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
    public function getJobHistory()
    {
        $sql = "SELECT id, title, company, start_date, end_date, responsibilities, achievements FROM job_history ORDER BY start_date DESC";
        $result = mysqli_query($this->db, $sql);
        $jobs = [];
        while ($row = $result->fetch_assoc()) {
            $jobs[] = [
                'id' => $row['id'],
                'title' => $row['title'],
                'company' => $row['company'],
                'start_date' => $row['start_date'],
                'end_date' => $row['end_date'],
                'responsibilities' => $row['responsibilities'],
                'achievements' => $row['achievements']
            ];
        }
        return $jobs;
    }

}

function fetchAllBlogs() {
    $connection = getConnection();
    $query = "SELECT * FROM blogs ORDER BY created_at DESC";
    $result = mysqli_query($connection, $query);

    $blogs = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $blogs[] = $row;
    }

    mysqli_close($connection);
    return $blogs;
}

function searchBlogsByTitle($title) {
    $connection = getConnection();
    $query = "SELECT * FROM blogs WHERE title LIKE '%$title%'";
    $result = mysqli_query($connection, $query);

    $blogs = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $blogs[] = $row;
    }

    mysqli_close($connection);
    return $blogs;
}

function paymentdetails($cardNumber, $nameOnCard, $expiryDate, $cvv, $billingAddress, $saveInfo) {
    $conn = getConnection();
    $sql = "INSERT INTO payments (card_number, name_on_card, expiry_date, cvv, billing_address, save_info) 
            VALUES ('$cardNumber', '$nameOnCard', '$expiryDate', '$cvv', '$billingAddress', $saveInfo)";
    return mysqli_query($conn, $sql);
}
?>