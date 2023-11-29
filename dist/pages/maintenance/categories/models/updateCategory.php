<?php

include("./../../../../databases/db.php");

$id = (int) trim($_POST['id']);
$nameCategory = trim($_POST['nameCategory']);
$description = trim($_POST['description']);


try {
    $sql = "UPDATE categories SET name = ?, description = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $nameCategory, $description, $id);
    $stmt->execute();
    // Cerrar el stmt y la connexión
    $stmt->close();
    $conn->close();
    echo 'correcto';
} catch (Exception $e) {
    echo 'error';
}


?>