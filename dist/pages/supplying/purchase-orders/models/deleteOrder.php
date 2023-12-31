<?php

include("./../../../../databases/db.php");

$id = $_POST['id'];

if (!empty($id)) {
    try {

        $query = "SELECT state, id_requirement FROM purchase_orders WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_object();
        $estado = $row->state == 1 ? true : false;
        $idRequirement = $row->id_requirement;
        $stmt->close();

        if ($estado) {

            $status = 'notDelete';

        } else {

            $query = "DELETE FROM purchase_orders WHERE id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->close();

            $query = "UPDATE requirements SET state = 0 WHERE id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('i', $idRequirement);
            $stmt->execute();
            $stmt->close(); 

            $status = true;
        }

    } catch (Exception $e) {

        $status = false;

    }
}

$conn->close();

echo json_encode([
    'status' => $status
])

?>
