<?php

function getUser($field)
{
    include("../../../../databases/db.php");
    include("./../../../../php/verificar_session.php");

    $id = $_SESSION['id_user'];

    $field = mysqli_real_escape_string($conn, $field);

    $sql = 'SELECT ' . $field .' FROM users WHERE id = ' . $id;

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->bind_result($user);
    $stmt->fetch();

    return $user;
}


