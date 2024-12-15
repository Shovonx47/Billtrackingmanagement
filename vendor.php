<?php
include 'db.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['bill_number'])) {
    $bill_number = $_GET['bill_number'];
    $sql = "SELECT * FROM bills WHERE bill_number = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $bill_number);
    $stmt->execute();
    $result = $stmt->get_result();
    echo json_encode($result->fetch_assoc());
}
?>