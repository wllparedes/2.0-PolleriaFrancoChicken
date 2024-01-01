<?php

include("./../../../../databases/db.php");

if (empty($_POST['idSupplier']) and empty($_POST['idRequirement']) and empty($_POST['dateTime'])) {
    return json_encode(['status' => 400, 'message' => 'No se han recibido todos los datos']);
} else {

    $idSupplier = $_POST['idSupplier'];
    $idRequirement = $_POST['idRequirement'];
    $dateTime = $_POST['dateTime'];
    $observation = 'Sin obersevación';

    try {

        // select subTotal from requirements where idRequirement = 1;
        $query = "SELECT subtotal FROM requirements WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('i', $idRequirement);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_object();
        $subTotal = (float) $row->subtotal;

        // IGV Y Monto final 
        $igv = (float) $subTotal * 0.18;
        $total = (float) $subTotal + $igv;
        $stmt->close();

        // new purchase orders
        $query = "INSERT INTO purchase_orders (observation, date_time, total, id_supplier, id_requirement) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ssdii', $observation, $dateTime, $total, $idSupplier, $idRequirement);
        $stmt->execute();
        $stmt->close();

        // update requirement
        $query = "UPDATE requirements SET state = 1 WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('i', $idRequirement);
        $stmt->execute();
        $stmt->close();

        $status = true;

    } catch (Exception $e) {
        $status = $e->getMessage();
    }

    $conn->close();

    echo json_encode([
        'status' => $status,
    ]);

}



