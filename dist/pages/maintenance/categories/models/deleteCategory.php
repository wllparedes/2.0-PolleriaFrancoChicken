<?php

include("./../../../../databases/db.php");

$id = $_POST['id'];

if (!empty($id)) {
    try {

        $query = "DELETE FROM categories WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $status = true;
    
    } catch (Exception $e) {
        $status = false;
    }
}

$stmt->close();
$conn->close();

echo json_encode([
    'status' => $status
]);

?>
