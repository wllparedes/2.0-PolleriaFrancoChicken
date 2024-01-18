<?php


class InformationDashboard
{

    public function calculateRecords($table)
    {
        include("../../../../databases/db.php");

        $table = mysqli_real_escape_string($conn, $table);

        $sql = 'SELECT COUNT(*) as TOTAL FROM ' . $table;

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->bind_result($total);
        $stmt->fetch();

        return $total;

    }

    public function getUser($field)
    {
        include("../../../../databases/db.php");

        $id = $_SESSION['id_user'];

        $field = mysqli_real_escape_string($conn, $field);

        $sql = 'SELECT ' . $field . ' FROM users WHERE id = ' . $id;

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->bind_result($user);
        $stmt->fetch();

        return $user;
    }


}