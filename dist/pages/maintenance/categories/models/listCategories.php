<?php

include("./../../../../databases/db.php");

$query = "SELECT * FROM categories";

$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$json = array();

while ($row = $result->fetch_assoc()) {

    $json[] = array(
        'id_category' => "" . $row['id'] . "",
        'nameCategory' => $row['name'],
        'description' => $row['description'],
    );
}

$jsonstring = json_encode($json);
echo $jsonstring;

?>