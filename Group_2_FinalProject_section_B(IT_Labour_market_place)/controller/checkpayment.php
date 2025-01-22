<?php
require_once('../model/Model.php');

header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data = json_decode(file_get_contents('php://input'), true);

    $cardNumber = $data['card_number'];
    $nameOnCard = $data['name_on_card'];
    $expiryDate = $data['expiry'];
    $cvv = $data['cvv'];
    $billingAddress = $data['billing_address'] ?? 'Same as shipping address';
    $saveInfo = $data['save_info'] ?? 0;

    if (empty($cardNumber) || empty($nameOnCard) || empty($expiryDate) || empty($cvv)) {
        echo json_encode(["status" => "error", "message" => "All fields are required."]);
        exit;
    }

    if (!preg_match('/^\d{16}$/', $cardNumber)) {
        echo json_encode(["status" => "error", "message" => "Invalid card number."]);
        exit;
    }

    if (!preg_match('/^(0[1-9]|1[0-2])\/\d{2}$/', $expiryDate)) {
        echo json_encode(["status" => "error", "message" => "Invalid expiry date format."]);
        exit;
    }

    if (!preg_match('/^\d{3,4}$/', $cvv)) {
        echo json_encode(["status" => "error", "message" => "Invalid CVV."]);
        exit;
    }

    $status = paymentdetails($cardNumber, $nameOnCard, $expiryDate, $cvv, $billingAddress, $saveInfo);

    if ($status) {
        echo json_encode(["status" => "success", "message" => "Payment processed successfully."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Payment failed."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
}
?>