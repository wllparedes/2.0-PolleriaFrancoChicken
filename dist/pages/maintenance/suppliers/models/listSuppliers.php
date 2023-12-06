<?php

include("./../../../../databases/db.php");

$query = "SELECT * FROM suppliers";

$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$json = array();

while ($row = $result->fetch_assoc()) {

    $json[] = array(
        'id_supplier' => "" . $row['id'] . "",
        'razon_social' => $row['company_name'],
        'direccion' => $row['address'],
        'ruc' => $row['ruc'],
        'phone' => $row['phone'],
        'email' => $row['email'],
    );
}

$jsonstring = json_encode($json);
echo $jsonstring;

?>