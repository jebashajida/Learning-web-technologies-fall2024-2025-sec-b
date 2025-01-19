<?php
require_once '../model/model.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    $model = new JobModel();

    if ($action === 'add_job_history') {
        $jobId = intval($_POST['id'] ?? 0);
        $username = $_COOKIE['user'];
    
        if ($jobId > 0) {
            $result = $model->addJobToHistory($username, $jobId);
    
            if ($result) {
                header('Content-Type: application/json');
                echo json_encode(['success' => true]);
                exit;
            } else {
                header('Content-Type: application/json');
                echo json_encode(['success' => false, 'error' => 'Failed to add job to history.']);
                exit;
            }
        }
    }
}

http_response_code(400);
echo json_encode(['error' => 'Invalid request']);
?>