<?php
// obtener_producto.php
include("./../../../../databases/db.php");

$id = (int)$_GET['id'];


$query = "SELECT * FROM products WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

$json = array(
    'product' => array(),
    'category' => array(),
);

while ($row = $result->fetch_assoc()) {
    $json['product'][] = array( 
        'id' => $row['id'],
        'name' => $row['name'],
        'price' => $row['price'],
        'id_category' => $row['id_category'],
    );
}

// Obtener los cargos
$queryc = "SELECT * FROM categories";
$stmtc = $conn->prepare($queryc);
$stmtc->execute();
$resultc = $stmtc->get_result();

while ($rowc = $resultc->fetch_assoc()) {
    $json['category'][] = array(
        'value' => $rowc['id'],
        'label' => $rowc['name'],
    );
}

// Devuelves los datos del usuario en formato JSON
echo json_encode($json);

$stmt->close();
$stmtc->close();
$conn->close();

?>