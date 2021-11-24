<?php 

//llamo el modelo
require '../modelo/usuarios.php';
//instancio la clase
$user = new Usuario();

//inicio sesion
session_start();
//defino los parametros de inicio de sesion

if (empty($_SESSION['usuario']) && empty($_SESSION['acceso'])) {

} else {

    $usuario = $_SESSION['usuario'];
    $acceso = $_SESSION['acceso'];

    if ($usuario->getRoles_idroles() == 2) {
        ?>    
        <a class="nav-link" href="carrito.html"> <i class="fas fa-shopping-cart"></i> carrito</a>        
        <?php
    }

    
}

?>