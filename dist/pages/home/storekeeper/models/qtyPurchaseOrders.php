<?php

include("./../../../../databases/db.php");


$query = "SELECT * FROM PURCHASE_ORDERS_FOR_MONTH";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$json = [];

while ($row = $result->fetch_assoc()) {
    $json[] = [
        'month' => $row['month'],
        'quantity' => $row['qty_orders'],
    ];

}

echo json_encode($json);