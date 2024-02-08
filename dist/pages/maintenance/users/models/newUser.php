<?php
include("./../../../../databases/db.php");

if (isset($_POST['name'])) {

    $name = $_POST['name'];
    $surnames = $_POST['surnames'];
    $phone = $_POST['phone'];
    $dni = $_POST['dni'];
    $userName = $_POST['userName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $state = (int) $_POST['state'];
    $id_charge = (int) $_POST['id_charge'];

    try {
        $query = "INSERT INTO users (names, surnames, phone, dni, user_name, email, password, state, id_charge)  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssssssii", $name, $surnames, $phone, $dni, $userName, $email, $password, $state, $id_charge);
        $stmt->execute();
        $stmt->close();

        $status = true;

    } catch (Exception $e) {
        $status = false;
    }

}
$conn->close();

echo json_encode([
    "status" => $status,
]);

?>
