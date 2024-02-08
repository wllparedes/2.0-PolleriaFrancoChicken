<?php

include("./../../../../databases/db.php");

$query = "SELECT id, name FROM charges WHERE id != 1";

$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$json = array();

while ($row = $result->fetch_assoc()) {
    $json[] = array(
        'value' => $row['id'],
        'label' => $row['name'],
    );
}

$jsonstring = json_encode($json);
echo $jsonstring;




?>
