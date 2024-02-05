<?php

include("./../../../../databases/db.php");

$query = "SELECT * FROM VIEW_ORDER";

$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$orders = [];

$MONTH_ES = [
    'January' => 'Enero',
    'February' => 'Febrero',
    'March' => 'Marzo',
    'April' => 'Abril',
    'May' => 'Mayo',
    'June' => 'Junio',
    'July' => 'Julio',
    'August' => 'Agosto',
    'September' => 'Septiembre',
    'October' => 'Octubre',
    'November' => 'Noviembre',
    'December' => 'Diciembre'
];

while ($row = $result->fetch_assoc()) {

    $datetime = new DateTime($row['date_time']);

    $month = $datetime->format('F');
    $year = $datetime->format('Y');
    $day = $datetime->format('d');

    $month_es = $MONTH_ES[$month];
    $date = $day . ' de ' . $month_es . ' del ' . $year;

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
