<?php

include("./../../../../databases/db.php");

$query = "SELECT * FROM users";

$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$users = array();

while ($row = $result->fetch_assoc()) {

    $queryx = "SELECT name FROM charges WHERE id = ?";
    $stmtx = $conn->prepare($queryx);
    $stmtx->bind_param('i', $row['id_charge']);
    $stmtx->execute();
    $resultx = $stmtx->get_result();
    $rowx = $resultx->fetch_assoc();
    $name_charge = $rowx['name'];

    $users[] = array(
        'id_user' => "" . $row['id'] . "",
        'names' => $row['names'],
        'surnames' => $row['surnames'],
        'phone' => $row['phone'],
        'dni' => $row['dni'],
        'user_name' => $row['user_name'],
        'email' => $row['email'],
        'charge' => $name_charge,
    );


}

$jsonstring = json_encode($users);
echo $jsonstring;

?>
