<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");

include 'db.php';

$sql = "SELECT * FROM bills";
$result = $conn->query($sql);
$bills = [];

while ($row = $result->fetch_assoc()) {
    $bills[] = $row;
}

echo json_encode($bills);
?>