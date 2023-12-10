<?php

include("./../../../../databases/db.php");

$id = (int) trim($_POST['id']);
$razon_social = trim($_POST['razon_social']);
$direccion = trim($_POST['direccion']);
$ruc = trim($_POST['ruc']);
$phone = trim($_POST['phone']);
$email = trim($_POST['email']);


try {
    $sql = "UPDATE suppliers SET company_name = ?, address = ?, ruc = ?, phone = ?, email = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $razon_social, $direccion, $ruc, $phone, $email, $id);
    $stmt->execute();
    // Cerrar el stmt y la connexión
    $stmt->close();
    $status = true;
} catch (Exception $e) {
    $status = false;
}

$conn->close();

echo json_encode([
    'status' => $status,
]);

?>
