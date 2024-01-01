<?php
include("./../../../../databases/db.php");

$id = (int) $_GET['id'];


$order = [
    'order' => [],
    'products' => []
];

// get order

$query = "SELECT * FROM VIEW_ORDER WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$orderFound = $result->fetch_assoc();
$order['order'] = $orderFound;
$idRequirement = $orderFound['id_requirement'];
$stmt->close();

// get products

$query = "SELECT * FROM PRODUCT_REQUIREMENT WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $idRequirement);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    $order['products'][] = $row;
};

$stmt->close();
$conn->close();

echo json_encode($order);

?>
