<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vendor_name = $_POST['vendor_name'];
    $bill_number = date('y') . date('m') . date('d') . str_pad(rand(1, 99), 2, '0', STR_PAD_LEFT);
    $status = 'Bill Sent To Accounts';

    $sql = "INSERT INTO bills (bill_number, vendor_name, status) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss', $bill_number, $vendor_name, $status);
    $stmt->execute();
    echo json_encode(['bill_number' => $bill_number]);
}
?>