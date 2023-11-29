<?php
include("./../../../../databases/db.php");

if (isset($_POST['name'])) {

    $name = $_POST['name'];
    $price = $_POST['price'];
    $id_category = (int) $_POST['id_category'];


    try {
        $query = "INSERT INTO products (name, price,id_category)  VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssi", $name, $price, $id_category);
        $stmt->execute();
        $stmt->close();
        echo 'correcto';
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    
}
$conn->close();


// TODO:
    // ? Si el session:id == id_user { alert (usted no puede eliminarse a si mismo) } 

?>
