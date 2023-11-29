<?php

include("./../../../../databases/db.php");

$query = "SELECT * FROM products";

$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$json = array();

while ($row = $result->fetch_assoc()) {

    $queryx = "SELECT name FROM categories WHERE id = ?";
    $stmtx = $conn->prepare($queryx);
    $stmtx->bind_param('i', $row['id_category']);
    $stmtx->execute();
    $resultx = $stmtx->get_result();
    $rowx = $resultx->fetch_assoc();
    $name_category = $rowx['name'];

    $json[] = array(
        'id_product' => "" . $row['id'] . "",
        'name' => $row['name'],
        'price' => $row['price'],
        'category' => $name_category, 
    );
}

$jsonstring = json_encode($json);
echo $jsonstring;

?>