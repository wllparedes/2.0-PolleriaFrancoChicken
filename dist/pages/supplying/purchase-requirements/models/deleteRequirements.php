<?php

include("./../../../../databases/db.php");

$id = $_POST['id'];

if (!empty($id)) {
    try {

        $query = "SELECT state FROM requirements WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_object();
        $estado = $row->state == 1 ? true : false;
        $stmt->close();

        if ($estado){

            $status = 'notDelete';

        }else{

            $query = "DELETE FROM requirements WHERE id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $id);
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
