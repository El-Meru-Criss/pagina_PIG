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

//MYSQL

require_once '../modelo/mysql.php';
$mysql = new MySQL();

$mysql->conectar();

$consulta = $mysql->efectuarConsulta("SELECT proyecto.compradores.usuarios_idusuarios, 
    proyecto.compradores.productos_idproductos 

    FROM proyecto.compradores 

    WHERE proyecto.compradores.usuarios_idusuarios = ".$usuario->getIdusuarios().";");

while ($pro = mysqli_fetch_array($consulta)) {

    $consulta2 = $mysql->efectuarConsulta("SELECT proyecto.productos.stock 
    FROM proyecto.productos 
    WHERE proyecto.productos.idproductos = ".$pro['productos_idproductos']."");

    $stock = mysqli_fetch_assoc($consulta2);

    $mysql->efectuarConsulta(
        "UPDATE proyecto.productos 
        SET proyecto.productos.stock=".$stock['stock']."-1 
        WHERE proyecto.productos.idproductos = ".$pro['productos_idproductos'].";");

    $mysql->efectuarConsulta(
        "DELETE FROM proyecto.compradores 
        WHERE proyecto.compradores.usuarios_idusuarios = ".$pro['usuarios_idusuarios']." AND proyecto.compradores.productos_idproductos = ".$pro['productos_idproductos']."");


};

$mysql->desconectar();



?>