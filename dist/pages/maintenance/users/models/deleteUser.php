<?php

include("./../../../../databases/db.php");
include("./../../../../php/empezar_session.php");

$id = (int) $_POST['id'];
$idSession = (int) $_SESSION['id_user'];

if (!empty($id)) {
    try {

        if ($id == $idSession) {
            $status = 'notDelete';
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
