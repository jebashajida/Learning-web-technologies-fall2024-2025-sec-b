<?php
require_once '../model/model.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    $model = new JobModel();

    if ($action === 'get_jobs') {
        $filter = $_POST['filter'] ?? '';
        $jobs = $model->getJobs($filter);
        header('Content-Type: application/json');
        echo json_encode($jobs);
        exit;
    }

    if ($action === 'get_job') {
        $jobId = intval($_POST['id'] ?? 0);
        $job = $model->getJobById($jobId);
        header('Content-Type: application/json');
        echo json_encode($job);
        exit;
    }

    if ($action === 'apply_job') {
        $jobId = intval($_POST['id'] ?? 0);

        if ($jobId > 0) {
            $result = $model->applyForJob($jobId);

            if ($result) {
                header('Content-Type: application/json');
                echo json_encode(['success' => true]);
                exit;
            } else {
                header('Content-Type: application/json');
                echo json_encode(['success' => false, 'error' => 'Failed to apply for job.']);
                exit;
            }
        }
    }
}

http_response_code(400);
echo json_encode(['error' => 'Invalid request']);
?>
