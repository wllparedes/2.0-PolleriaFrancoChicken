<?php

include("./../../../../databases/db.php");

$id = (int)$_GET['id'];

$query = "SELECT * FROM VIEW_REQUIREMENT WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();

$req_p = array(
    'requerimientos' => array(),
    'productos' => array(),
);

$result = $stmt->get_result();

$requirement = $result->fetch_assoc();

$req_p['requerimientos'][]=$requirement;
$stmt->close();

$query = "SELECT * FROM PRODUCT_REQUIREMENT WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();

$result2 = $stmt->get_result();

while($row=$result2->fetch_assoc()){
    $req_p["productos"][]=$row;
};

echo json_encode($req_p);



$stmt->close();
$conn->close();
?>