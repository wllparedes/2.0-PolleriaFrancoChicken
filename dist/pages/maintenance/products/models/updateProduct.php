<?php
include("./../../../../databases/db.php");

// Obtener datos del formulario
$id = (int) trim($_POST['id']);
$name = trim($_POST['name']);
$price = trim($_POST['price']);
$id_category = (int) trim($_POST['id_category']);

try {
    // Actualizar datos en la base de datos
    $sql = "UPDATE products SET name = ?, price = ?, id_category = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sdii", $name, $price, $id_category, $id);
    $stmt->execute();

    $stmt->close();

    // Devolver un mensaje de éxito en formato JSON
    echo 'correcto';
} catch (Exception $e) {
    echo 'error';
}

$conn->close();

?>