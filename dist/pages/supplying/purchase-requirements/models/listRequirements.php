<?php

include("./../../../../databases/db.php");

$query = "SELECT * FROM requirements";

$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$json = array();

while ($row = $result->fetch_assoc()) {

    $date = explode(" ", $row['date_time']);
    $day = $date[0];
    $hour = $date[1];
    $state = $row['state'] == 0 ? "<div class='badge alert-danger'>Inactivo</div>" : "<div class='badge alert-success'>Activo</div>";

    $queryx = "SELECT concat(names, ' ' ,surnames) as name FROM users WHERE id = ?;";
    $stmtx = $conn->prepare($queryx);
    $stmtx->bind_param('i', $row['id_user']);
    $stmtx->execute();
    $resultx = $stmtx->get_result();
    $rowx = $resultx->fetch_assoc();
    $names_user = $rowx['name'];

    $json[] = array(
        'id_requirement' => "" . $row['id'] . "",
        'name_user' => $names_user,
        'day' => $day,
        'hour' => $hour,
        'description' => $row['description'],
        'subtotal' => $row['subtotal'],
        'state' => $state,
    );
}

$jsonstring = json_encode($json);
echo $jsonstring;

?>