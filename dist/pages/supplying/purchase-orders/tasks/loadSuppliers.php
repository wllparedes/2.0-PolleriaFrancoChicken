<?php

include("./../../../../databases/db.php");

$query = "SELECT id, company_name FROM suppliers";

$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$suppliers = [];

while ($row = $result->fetch_assoc()) {

    $suppliers[] = [
        'value' => $row['id'],
        'label' => $row['company_name'],
    ];

}

echo json_encode($suppliers);

$stmt->close();
$conn->close();

?>
