<?php

include("./../../../../databases/db.php");

if (isset($_POST['razon_social'])) {

    $razon_social = $_POST['razon_social'];
    $direccion = $_POST['direccion'];
    $ruc = $_POST['ruc'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    try {
        // Preparar la consulta
        $query = "INSERT INTO suppliers (company_name, address, ruc, phone, email)
        VALUES (?, ?, ?, ?, ?)";

        // Crear una declaración preparada
        $stmt = $conn->prepare($query);

        // Vincular los parámetros
        $stmt->bind_param("sssss", $razon_social, $direccion, $ruc, $phone, $email);

        // Ejecutar la consulta
        $stmt->execute();
        // Cerrar
        $stmt->close();
        $conn->close();

        echo "correcto";
    } catch (Exception $e) {
        echo "error";
    }
}
?>