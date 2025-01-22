<?php
require '../model/model.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    if ($action === 'fetchBlogs') {
        $blogs = fetchAllBlogs();
        echo json_encode($blogs);
    } elseif ($action === 'searchBlogs') {
        $title = $_POST['title'] ?? '';
        $blogs = searchBlogsByTitle($title);
        echo json_encode($blogs);
    }
    exit();
}
