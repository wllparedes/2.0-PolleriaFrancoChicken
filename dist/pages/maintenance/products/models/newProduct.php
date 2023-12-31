<?php
include("./../../../../databases/db.php");

include("./../../../../php/verifySizeImage.php");

if (isset($_POST['name'])) {

    $name = $_POST['name'];
    $price = $_POST['price'];
    $id_category = (int) $_POST['id_category'];

    try {
        $query = "INSERT INTO products (name, price, id_category)  VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssi", $name, $price, $id_category);
        $stmt->execute();
        $stmt->close();

        $status = true;

    } catch (Exception $e) {
        $status = false;
    }

}

$conn->close();


echo json_encode([
    'status' => $status,
])

?>
