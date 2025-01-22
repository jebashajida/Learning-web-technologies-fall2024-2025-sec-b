<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rawData = file_get_contents('php://input');

    $data = json_decode($rawData, true);

    if (
        isset($data['userType']) && !empty($data['userType']) &&
        isset($data['disputeDetails']) && !empty($data['disputeDetails']) &&
        isset($data['contactInfo']) && filter_var($data['contactInfo'], FILTER_VALIDATE_EMAIL)
    ) {
        $userType = htmlspecialchars($data['userType']);
        $disputeDetails = htmlspecialchars($data['disputeDetails']);
        $contactInfo = htmlspecialchars($data['contactInfo']);

        $conn = mysqli_connect('127.0.0.1', 'root', '', 'webtech');
        $sql = "INSERT INTO disputes (user_type, dispute_details, contact_info, status) VALUES ('{$userType}', '{$disputeDetails}', '{$contactInfo}','Pending review')";
        mysqli_query($conn, $sql);
        mysqli_close($conn);

        $response = [
            'success' => true,
            'status' => 'Pending review',
        ];
    } else {
        $response = [
            'success' => false,
            'message' => 'Invalid input. Please ensure all fields are correctly filled.',
        ];
    }
} else {
    $response = [
        'success' => false,
        'message' => 'Invalid request method. Please use POST.',
    ];
}

echo json_encode($response);
?>