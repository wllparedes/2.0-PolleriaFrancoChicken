<?php

include("./../../../../databases/db.php");

if (isset($_POST['razon_social'])) {

    $razon_social = $_POST['razon_social'];
    $direccion = $_POST['direccion'];
    $ruc = $_POST['ruc'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    try {

        $query = "INSERT INTO suppliers (company_name, address, ruc, phone, email) VALUES (?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($query);

        $stmt->bind_param("sssss", $razon_social, $direccion, $ruc, $phone, $email);

        $stmt->execute();
        $stmt->close();

        $status = true;
    } catch (Exception $e) {
        $status = false;
    }
}

$conn->close();
echo json_encode([
    'status' => $status
]);



?>
