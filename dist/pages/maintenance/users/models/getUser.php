<?php
// obtener_cliente.php
include("./../../../../databases/db.php");

$id = (int)$_GET['id'];


$query = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

$json = array(
    'user' => array(),
    'charge' => array(),
);

while ($row = $result->fetch_assoc()) {
    $json['user'][] = array( 
        'id' => $row['id'],
        'names' => $row['names'],
        'surnames' => $row['surnames'],
        'phone' => $row['phone'],
        'dni' => $row['dni'],
        'user_name' => $row['user_name'],
        'email' => $row['email'],
        'password' => $row['password'],
        'id_charge' => $row['id_charge'],
    );
}

// Obtener los cargos
$queryc = "SELECT * FROM charges";
$stmtc = $conn->prepare($queryc);
$stmtc->execute();
$resultc = $stmtc->get_result();

while ($rowc = $resultc->fetch_assoc()) {
    $json['charge'][] = array(
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