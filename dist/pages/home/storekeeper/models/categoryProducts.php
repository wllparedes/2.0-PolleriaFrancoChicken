<?php

include("./../../../../databases/db.php");


$query = "SELECT * FROM QUANTITY_PRODUCT_FOR_CATEGORY";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$json = [];

while ($row = $result->fetch_assoc()) {
    $json[] = [
        'name' => $row['name'],
        'quantity' => $row['qty'],
    ];

}

echo json_encode($json);