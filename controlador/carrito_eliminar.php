<?php 

//llamo el modelo
require '../modelo/usuarios.php';
//instancio la clase
$user = new Usuario();

//inicio sesion
session_start();
//defino los parametros de inicio de sesion
$usuario = $_SESSION['usuario'];
$acceso = $_SESSION['acceso'];

require_once '../modelo/mysql.php';
$mysql = new MySQL();

$mysql->conectar();

$id_producto = $_POST['id_producto'];

$mysql->efectuarConsulta("DELETE FROM proyecto.compradores 
    
    WHERE proyecto.compradores.usuarios_idusuarios = ".$usuario->getIdusuarios()." 
    AND proyecto.compradores.productos_idproductos = ".$id_producto."");

    // "INSERT INTO proyecto.compradores 
    // VALUES (".$usuario->getIdusuarios().",".$id_producto.");"

$mysql->desconectar();

?>