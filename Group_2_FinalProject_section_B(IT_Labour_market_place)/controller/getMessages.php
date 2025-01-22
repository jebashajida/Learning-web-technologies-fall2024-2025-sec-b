<?php
header("Content-Type: application/json");

$dsn = "mysql:host=127.0.0.1;dbname=webtech;charset=utf8";
$username = "root";
$password = "";

try {
    $pdo = new PDO($dsn, $username, $password);
    $stmt = $pdo->query("SELECT text, type FROM messages ORDER BY created_at ASC");
    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($messages);
} catch (PDOException $e) {
    echo json_encode([]);
}
?>