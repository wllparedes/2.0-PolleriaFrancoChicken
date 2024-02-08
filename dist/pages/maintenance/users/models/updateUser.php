<?php
include("./../../../../databases/db.php");

// Obtener datos del formulario
$id = (int) trim($_POST['id']);
$name = trim($_POST['name']);
$surnames = trim($_POST['surnames']);
$phone = trim($_POST['phone']);
$dni = trim($_POST['dni']);
$userName = trim($_POST['userName']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);
$state = $_POST['state'];
$id_charge = (int) trim($_POST['id_charge']);

try {
    // Actualizar datos en la base de datos


    if ($state == 'notExist') {

        $state = (int) $state;
        $sql = "UPDATE users SET names = ?, surnames = ?, phone = ?, dni = ?, user_name = ?, email = ?, password = ?, id_charge = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssii", $name, $surnames, $phone, $dni, $userName, $email, $password, $id_charge, $id);
        $stmt->execute();
        $stmt->close();

    } else {

        $state = (int) $state;
        $sql = "UPDATE users SET names = ?, surnames = ?, phone = ?, dni = ?, user_name = ?, email = ?, password = ?, state = ?, id_charge = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssiii", $name, $surnames, $phone, $dni, $userName, $email, $password, $state, $id_charge, $id);
        $stmt->execute();
        $stmt->close();
    }



    $status = true;

} catch (Exception $e) {
    $status = false;
}

$conn->close();

echo json_encode([
    'status' => $status
])

    ?>
