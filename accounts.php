<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['bill_number'])) {
    $bill_number = $_POST['bill_number'];
    $status = 'Bill Received in Accounts';

    $sql = "UPDATE bills SET status = ? WHERE bill_number = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $status, $bill_number);
    $stmt->execute();
    echo json_encode(['message' => 'Status updated']);
}
?>