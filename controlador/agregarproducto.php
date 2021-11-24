<?php  
if (isset($_POST["nombre"]) && !empty($_POST["nombre"])
    && isset($_POST["stock"]) && !empty($_POST["stock"])
    && isset($_POST["precio"]) && !empty($_POST["precio"])
    && isset($_POST["descripcion"]) && !empty($_POST["descripcion"])) 
{
    require_once'../modelo/mysql.php'; 
    $mysql= new mySQL();
    $mysql->conectar();
    $nombre=$_POST["nombre"];
    $descripcion=$_POST["descripcion"];
    $stock=$_POST["stock"];
    $precio=$_POST["precio"];
    $img= addslashes(file_get_contents($_FILES['img']['tmp_name']));
    $mysql->efectuarConsulta("INSERT into proyecto.productos values ('','".$nombre."','".$descripcion."','".$stock."','".$precio."','".$img."')");
    $mysql->desconectar();
?>
            <head>
				<META HTTP-EQUIV="REFRESH" CONTENT="3;URL=../inicio.html">
				<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
				<center>
					<div class="alert alert-success"><b>producto fue creado exitosamente!</b> Serás redirigido automáticamente.</div>
				</center>
			</head>
<?php
}
else{?>
        <head>
        <META HTTP-EQUIV="REFRESH" CONTENT="3;URL=../registrarproducto.php">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <center>
            <div class="alert alert-warning"><b>OCURRIO UN ERROR</b> Serás redirigido automáticamente.</div>
        </center>
    </head>
<?php }?>
