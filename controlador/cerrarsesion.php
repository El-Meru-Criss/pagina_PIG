<?php

require_once '../modelo/usuarios.php'; 

  session_start();
    unset($_SESSION['email']); 
  unset($_SESSION['acceso']);
  session_destroy();
  header("Location: ../inicio.html");
  exit;

?>