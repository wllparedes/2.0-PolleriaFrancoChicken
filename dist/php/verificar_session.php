<?php
  // Si no existe guardada en session los noimbres y apellidos, rederigir al index (login)
  if(empty($_SESSION['user_name']) && empty($_SESSION['job_title_name'])){
    header('Location: ../../../../../index.php');
  }
?>