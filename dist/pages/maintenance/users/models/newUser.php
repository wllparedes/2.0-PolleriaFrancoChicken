<?php
include("./../../../../databases/db.php");

if (isset($_POST['name'])) {

    $name = $_POST['name'];
    $surnames = $_POST['surnames'];
    $phone = $_POST['phone'];
    $dni = $_POST['dni'];
    $userName = $_POST['userName'];
    $email = $_POST['email'];
    $id_charge = (int) $_POST['id_charge'];
    $password = $_POST['password'];

    try {
        $query = "INSERT INTO users (names, surnames, phone, dni, user_name, email, password, id_charge)  VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssssssi", $name, $surnames, $phone, $dni, $userName, $email, $password, $id_charge);
        $stmt->execute();
        $stmt->close();

        $status = true;

    } catch (Exception $e) {
        $status = false;
    }
    
}
$conn->close();

echo json_encode([
    "status"=> $status,
]);

?>
