<?php

include("./../../../../databases/db.php");

$idsProducts = $_POST['IdsProducts'];

$products;

foreach ($idsProducts as $idProduct) {

    $query = "SELECT id, name, price, category_name FROM SELECTEDPRODUCTS WHERE id = ?";

    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $idProduct);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $products[] = [
        'id' => $row['id'],
        'nombre' => $row['name'],
        'precio' => $row['price'],
        'categoria' => $row['category_name'],
    ];

}

$conn->close();

echo json_encode($products);

?>
