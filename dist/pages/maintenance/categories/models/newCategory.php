<?php

include("./../../../../databases/db.php");

if (isset($_POST['nameCategory'])) {
    $nameCategory = $_POST['nameCategory'];
    $description = $_POST['description'];

    try {
        // Preparar la consulta
        $query = "INSERT INTO categories (name, description) 
        VALUES (?, ?)";

        // Crear una declaración preparada
        $stmt = $conn->prepare($query);

        // Vincular los parámetros
        $stmt->bind_param("ss", $nameCategory, $description);

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