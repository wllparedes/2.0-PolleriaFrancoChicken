<?php
// obtener_categoria.php
include("./../../../../databases/db.php");

$id = (int)$_GET['id'];

$query = "SELECT * FROM categories WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();

$category = $result->fetch_assoc();
// Devuelves los datos de la categoria en formato JSON
echo json_encode($category);

$stmt->close();
$conn->close();
?>