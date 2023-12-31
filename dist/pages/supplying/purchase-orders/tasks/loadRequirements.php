<?php

include("./../../../../databases/db.php");

$query = "SELECT id, subtotal FROM requirements WHERE state = 0";

$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$requirements = [];

while ($row = $result->fetch_assoc()) {

    $requirements[] = [
        'value' => $row['id'],
        'label' => $row['subtotal'],
    ];

}

echo json_encode($requirements);

$stmt->close();
$conn->close();

?>
