<?php
// obtener_cliente.php
include("./../../../../databases/db.php");
include("./../../../../php/empezar_session.php");

$id = $_SESSION["id_user"];


$query = "SELECT * FROM SELECTPROFILE WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

$profile = $result->fetch_assoc();

// Devuelves los datos del usuario en formato JSON
echo json_encode($profile);

$stmt->close();
$conn->close();

?>