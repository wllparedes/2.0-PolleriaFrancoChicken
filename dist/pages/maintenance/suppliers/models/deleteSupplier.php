<?php

include("./../../../../databases/db.php");

$id = $_POST['id'];

if (!empty($id)) {
    try {
        $query = "DELETE FROM suppliers WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        $status = true;
    } catch (Exception $e) {
        $status = false;
    }
}

$conn->close();

echo json_encode([
    'status' => $status
]);

?>
