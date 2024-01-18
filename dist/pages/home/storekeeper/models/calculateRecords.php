<?php


function calculateRecords($table)
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


