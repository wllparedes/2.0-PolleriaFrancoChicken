<?php

include("./../../../../databases/db.php");

$idSupplier = $_POST['IdsProducts'];

$supplier = [];

foreach ($idSupplier as $id) {

    $query = "SELECT * FROM suppliers WHERE id = ?";

    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $supplier[] = [
        'id' => $row['id'],
        'razon-social' => $row['company_name'],
        'direccion' => $row['address'],
        'ruc' => $row['ruc'],
        'telefono' => $row['phone'],
        'correo' => $row['email'],
    ];

}


$stmt->close();
$conn->close();

echo json_encode($supplier);

?>
