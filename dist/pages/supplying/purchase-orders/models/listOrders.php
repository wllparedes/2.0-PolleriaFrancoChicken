<?php

include("./../../../../databases/db.php");

$query = "SELECT * FROM VIEW_ORDER";

$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$orders = [];

while ($row = $result->fetch_assoc()) {

    $datetime = new DateTime($row['date_time']);
    $date = $datetime->format('j \d\e F \d\e Y');
    $hour = $datetime->format('h:i A');

    $status = $row['state'] ? 'success' : 'danger';
    $statusName = $row['state'] ? 'Activo' : 'Inactivo';
    $badgeStatus = '<span class="badge alert-' . $status . '">' . $statusName . '</span>';

    $orders[] = [
        'id' => $row['id'],
        'id_requirement' => $row['id_requirement'],
        'company_name' => $row['company_name'],
        'state' => $badgeStatus,
        'observation' => $row['observation'],
        'date' => $date,
        'hour' => $hour,
        'subtotal' => $row['subtotal'],
        'total' => $row['total']
    ];
}

echo json_encode($orders);

?>
