<?php
// obtener_categoria.php
include("./../../../../databases/db.php");

$id = (int)$_GET['id'];

$query = "SELECT * FROM suppliers WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();

$supplier = $result->fetch_assoc();
// Devuelves los datos de la categoria en formato JSON
echo json_encode($supplier);

$stmt->close();
$conn->close();
?>