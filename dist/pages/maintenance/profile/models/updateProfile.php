<?php
include("./../../../../databases/db.php");
include("./../../../../php/empezar_session.php");

// Obtener datos del formulario
$id = $_SESSION["id_user"];
$name = trim($_POST['name']);
$surnames = trim($_POST['surnames']);
$phone = trim($_POST['phone']);
$dni = trim($_POST['dni']);
$userName = trim($_POST['userName']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);

try {
    // Actualizar datos en la base de datos
    $sql = "UPDATE users SET names = ?, surnames = ?, phone = ?, dni = ?, user_name = ?, email = ?, password = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssi", $name, $surnames, $phone, $dni, $userName, $email, $password, $id);
    $stmt->execute();

    $stmt->close();

    // Devolver un mensaje de éxito en formato JSON
    $status = true;

} catch (Exception $e) {
    $status = false;
}

$conn->close();

echo json_encode([
    'status' => $status
])

?>