<?php

include("./../../../../databases/db.php");

$query = "SELECT id, name FROM products";

$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$products = [];

while ($row = $result->fetch_assoc()) {

    $products[] = [
        'value' => $row['id'],
        'label' => $row['name'],
    ];

}

$products = json_encode($products);
echo $products;
$conn->close();

?>
