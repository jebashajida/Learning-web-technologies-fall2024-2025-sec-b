
<?php
header("Content-Type: application/json");

$dsn = "mysql:host=127.0.0.1;dbname=webtech;charset=utf8";
$username = "root";
$password = "";

$data = json_decode(file_get_contents("php://input"), true);
$text = $data["text"] ?? "";
$type = $data["type"] ?? "sent";

if (empty($text)) {
    echo json_encode(["status" => "error", "message" => "Message cannot be empty."]);
    exit;
}

try {
    $pdo = new PDO($dsn, $username, $password);
    $stmt = $pdo->prepare("INSERT INTO messages (text, type, created_at) VALUES (:text, :type, NOW())");
    $stmt->execute(["text" => $text, "type" => $type]);
    echo json_encode(["status" => "success", "message" => "Message sent."]);
} catch (PDOException $e) {
    echo json_encode(["status" => "error", "message" => "Failed to send message."]);
}
?>
