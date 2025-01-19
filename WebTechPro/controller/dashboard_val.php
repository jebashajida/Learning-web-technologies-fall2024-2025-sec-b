<?php
require_once '../model/model.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $filter = $_POST['filter'] ?? '';
    $model = new JobModel();

    if ($action === 'get_jobs') {
        $jobs = $model->getJobs($filter);
        echo json_encode($jobs);
    }
    
}
?>