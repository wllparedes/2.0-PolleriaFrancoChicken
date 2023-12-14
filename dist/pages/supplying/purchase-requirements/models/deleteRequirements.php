<?php

include("./../../../../databases/db.php");

$id = $_POST['id'];

if (!empty($id)) {
    try {
        $query = "DELETE FROM requirements WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $stmt->close();
        $conn->close();

        $status = true;

    } catch (Exception $e) {

        $status = false;

    }
}

echo json_encode([
    'status' => $status
])

?>