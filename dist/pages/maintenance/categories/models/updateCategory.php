<?php

include("./../../../../databases/db.php");

$id = (int) trim($_POST['id']);
$nameCategory = trim($_POST['nameCategory']);
$description = trim($_POST['description']);


try {
    $sql = "UPDATE categories SET name = ?, description = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $nameCategory, $description, $id);
    $stmt->execute();

    $stmt->close();
    $status = true;
} catch (Exception $e) {
    $status = false;
}

$conn->close();


echo json_encode([
    'status' => $status
]);


?>