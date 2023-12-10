<?php

include("./../../../../databases/db.php");

if (isset($_POST['nameCategory'])) {

    $nameCategory = $_POST['nameCategory'];
    $description = $_POST['description'];

    try {

        $query = "INSERT INTO categories (name, description) VALUES (?, ?)";

        $stmt = $conn->prepare($query);

        $stmt->bind_param("ss", $nameCategory, $description);

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
