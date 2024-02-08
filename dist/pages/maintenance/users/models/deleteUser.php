<?php

include("./../../../../databases/db.php");
include("./../../../../php/empezar_session.php");

$id = (int) $_POST['id'];
$idSession = (int) $_SESSION['id_user'];

$ifAdmin = '';

$query = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($datos = $result->fetch_object()) {
    $ifAdmin = $datos->id_charge == 1 ? true : false;
}

if (!empty($id)) {

    try {

        if ($id == $idSession) {
            $status = 'notDelete';
        } elseif ($ifAdmin) {
            $status = 'notDeleteAdmin';
        } else {
            $query = "DELETE FROM users WHERE id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $id);
            $stmt->execute();

            $stmt->close();
            $status = true;
        }

    } catch (Exception $e) {

        $status = false;

    }
}
$conn->close();

echo json_encode([
    'status' => $status
])

    ?>
