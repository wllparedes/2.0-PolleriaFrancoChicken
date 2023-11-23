<?php

include("./../databases/db.php");
include("empezar_session.php");
// include("acceso_session.php");

// Verificar si el usuario existe y luego guardar en session sus nombres apellidos y cargo
if (!empty($_POST["email"]) and !empty($_POST["password"])) {

  $email = $_POST["email"];
  $password = $_POST["password"];

  // Obtener correo y password de la base de datos
  $query = "SELECT * FROM users WHERE email = ? AND password = ?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("ss", $email, $password);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($datos = $result->fetch_object()) {

    // Guardar en session los datos del usuario
    $_SESSION["id_user"] = $datos->id;
    $_SESSION["user_name"] = $datos->user_name;

    // Obtener el nombre del cargo
    $query_charge = "SELECT * FROM charges WHERE id = ?";
    $stmt_charge = $conn->prepare($query_charge);
    $stmt_charge->bind_param("i", $datos->id_charge);
    $stmt_charge->execute();
    $result_charge = $stmt_charge->get_result();

    if ($dato_charge = $result_charge->fetch_object()) {
      $_SESSION["job_title_name"] = $dato_charge->name;
    }
    // Redireccionar a la pagina de inicio

    if (isset($_SESSION["job_title_name"])) {
      switch ($_SESSION["job_title_name"]) {
        case 'Recepcionista':
          $redirect = "dist/pages/home/recepcionista/views/inicio";
          break;
        case 'Almacenero':
          $redirect = "dist/pages/home/storekeeper/views/index";
          break;
        case 'Mesero':
          $redirect = "dist/pages/home/mesero/views/inicio";
          break;
        default:
          $redirect = "index";
          break;
      }
    } else {
      $redirect = "index"; // Set a default redirect if $_SESSION["job_title_name"] is not set
    }

    echo $redirect;

  } else {
    echo 'error';
  }
} else {
  echo 'incompleto';
}

?>
