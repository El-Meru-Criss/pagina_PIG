<?php  
if (isset($_POST["nombre"]) && !empty($_POST["nombre"]) && isset($_POST["stock"]) && !empty($_POST["stock"]) && isset($_POST["precio"]) && !empty($_POST["precio"]) && isset($_POST["descripcion"]) && !empty($_POST["descripcion"])) 
{
    require_once'../modelo/mysql.php'; 
    $mysql= new mySQL();
    $mysql->conectar();
    $nombre=$_POST["nombre"];
    $descripcion=$_POST["descripcion"];
    $stock=$_POST["stock"];
    $precio=$_POST["precio"];
    $id=$_POST["id"];
    $mysql->efectuarConsulta("UPDATE proyecto.productos SET proyecto.productos.nombre='".$nombre."', 
    proyecto.productos.descripcion='".$descripcion."',
    proyecto.productos.stock='".$stock."',
    proyecto.productos.precio='".$precio."' WHERE proyecto.productos.idproductos = ".$id."");
?>
<head>
				<META HTTP-EQUIV="REFRESH" CONTENT="0.5;URL=../inicio.html">
				<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
				<center>
					<div class="alert alert-success"><b>producto fue Editado exitosamente!</b> Serás redirigido automáticamente.</div>
				</center>
			</head>
<?php
        }
?>