<?php

include("./../../../../databases/db.php");
include("./../../../../php/empezar_session.php");

if (isset($_POST['items'])) {

    $items = $_POST['items'];
    $description = $_POST['description'] ? $_POST['description'] : 'Sin descripción';
    $idUser = $_SESSION["id_user"];

    try {
        // * insertar a la tabla requirements

        $sql = "INSERT INTO requirements (id_user, description) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('is', $idUser, $description);
        $stmt->execute();

        $idRequirement = $conn->insert_id;

        // * insertar a la tabla requirements_products

        foreach ($items as $item => $value) {

            $valueNow = (int) $value;
            $itemNow = (int) $item;

            $sql = "INSERT INTO products_requirements (id_requirement, id_product, quantity) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('iii', $idRequirement, $itemNow, $valueNow);
            $stmt->execute();

        }

        $stmt->close();

        // * calcular el sub_total

        $sql = "SELECT * FROM CALCULATE_SUBTOTAL_REQUIREMENT WHERE id_requirement = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $idRequirement);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_object();
        $subtotal = (double) $row->subtotal;

        $stmt->close();

        // * insertar el subtotal

        $sql = "UPDATE requirements SET subtotal = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('di', $subtotal, $idRequirement);
        $stmt->execute();

        $status = true;

    } catch (Exception $e) {

        $status = $e->getMessage();
    
    }


} else{
    $status = 'No se ha seleccionado ningún producto';
}


$conn->close();

echo json_encode([
    'status' => $status
])

?>
