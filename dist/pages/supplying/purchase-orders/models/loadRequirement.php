<?php

include("./../../../../databases/db.php");

$idSupplier = $_POST['IdsProducts'];

$supplier = [];

foreach ($idSupplier as $id) {

    $query = "SELECT * FROM requirements WHERE id = ?";

    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $status = $row['state'] ? 'success' : 'danger';
    $statusName = $row['state'] ? 'Activo' : 'Inactivo';
    $badgeStatus = '<span class="badge alert-'. $status .'">' . $statusName . '</span>';

    $supplier[] = [
        'id' => $row['id'],
        'fecha-y-hora' => $row['date_time'],
        'descripcion' => $row['description'],
        'estado' => $badgeStatus,
        'subtotal' => $row['subtotal']
    ];

}


$stmt->close();
$conn->close();

echo json_encode($supplier);

?>
