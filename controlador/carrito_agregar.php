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

$mysql->efectuarConsulta(
    "INSERT INTO proyecto.compradores 
    VALUES (".$usuario->getIdusuarios().",".$id_producto.");");

$mysql->desconectar();

?>