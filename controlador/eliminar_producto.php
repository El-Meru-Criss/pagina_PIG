<?php 

require_once '../modelo/mysql.php';
$mysql = new MySQL();

$mysql->conectar();

$id_producto = $_POST['id_producto'];

$mysql->efectuarConsulta(
    "DELETE FROM proyecto.productos 
    WHERE proyecto.productos.idproductos = ".$id_producto."");
    
    // "DELETE FROM proyecto.compradores 
    
    // WHERE proyecto.compradores.usuarios_idusuarios = ".$usuario->getIdusuarios()." 
    // AND proyecto.compradores.productos_idproductos = ".$id_producto."");

    // "INSERT INTO proyecto.compradores 
    // VALUES (".$usuario->getIdusuarios().",".$id_producto.");"

$mysql->desconectar();

?>