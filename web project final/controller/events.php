<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' || $_SERVER['REQUEST_METHOD'] === 'GET') {
    $conn = mysqli_connect('127.0.0.1', 'root', '', 'availability_calendar');

    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    $action = $_GET['action'] ?? null;

    if ($action === 'get') {
        $result = $conn->query("SELECT * FROM events");
        $events = [];

        while ($row = $result->fetch_assoc()) {
            $events[] = [
                'id' => $row['id'],
                'title' => $row['title'],
                'start' => $row['start'],
                'end' => $row['end'],
                'color' => $row['color'],
            ];
        }

        echo json_encode($events);
    } elseif ($action === 'add') {
        $title = $_POST['title'];
        $start = $_POST['start'];
        $end = $_POST['end'];

        $sql = "INSERT INTO events (title, start, end) VALUES ('$title', '$start', '$end')";
        if ($conn->query($sql)) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['error' => $conn->error]);
        }
    } elseif ($action === 'update') {
        $id = $_POST['id'];
        $start = $_POST['start'];
        $end = $_POST['end'];

        $sql = "UPDATE events SET start='$start', end='$end' WHERE id=$id";
        if ($conn->query($sql)) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['error' => $conn->error]);
        }
    } elseif ($action === 'delete') {
        $id = $_POST['id'];

        $sql = "DELETE FROM events WHERE id=$id";
        if ($conn->query($sql)) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['error' => $conn->error]);
        }
    }

    $conn->close();
}
?>
