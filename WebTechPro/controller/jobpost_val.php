<?php
require_once '../model/model.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $model = new JobModel();

    if ($action === 'post_job') {
        $title = $_POST['title'] ?? '';
        $type = $_POST['type'] ?? '';
        $company = $_POST['company'] ?? '';
        $pay = floatval($_POST['pay'] ?? 0);
        $description = $_POST['description'] ?? '';

        $result = $model->postJob($title, $type, $company, $pay, $description);
        if ($result) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => 'Failed to post job.']);
        }
        exit;
    }
}

http_response_code(400);
echo json_encode(['error' => 'Invalid request']);
?>
