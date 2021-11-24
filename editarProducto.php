<?php

require 'modelo/usuarios.php';
//instancio la clase
$user = new Usuario();

//inicio sesion
session_start();
        //defino los parametros de inicio de sesion
     $usuario = $_SESSION['usuario'];
    $acceso = $_SESSION['acceso'];

    //verifica que se haya iniciado la sesión, de lo contrario re dirige al login
    if($usuario == '' && $usuario == null &&
       $acceso == '' && $acceso == null){
        header("Location: login.html");
    }

//se llama a la clase
require 'modelo/mysql.php';

   //se valida que efectivamente se envie una variable tipo get desde la página usuarios.php
   // En este punto PHP reconoce que llegó una variable llamada id 
    if( isset($_GET['id']) && !empty($_GET['id'])){
        
        // se asigna esa variable recibida a la variable $variable
$variable= $_GET['id'];

//se instancia la clase
$mysql = new mysql();
//se conecta a la bd por medio del método
$mysql->conectar();

//se ejecuta la consulta
//La consulta trae todos los campos de la tabla usuarios que sean igual al id recibido
//Es decir de acuerdo al id recibido me muestra los datos de una persona en particular (cada persona o usuario tiene un id único)
$consulta  = $mysql->efectuarConsulta("SELECT  proyecto.productos.nombre, proyecto.productos.descripcion,proyecto.productos.stock,proyecto.productos.precio,proyecto.productos.img FROM proyecto.productos where proyecto.productos.idproductos='".$variable."'");

// se captura le resultado de la consulta por medio de mysqli_fetch_assoc(la consulta anterior)
// mysql_fetch_assoc() es equivalente a llamar a mysql_fetch_array() con MYSQL_ASSOC como segundo parámetro opcional. Únicamente devuelve un array asociativo.
// como en este punto estamos seguros que solo me va a traer una fila ya que solo existe un usuario por cada id no necesitamos hacer un ciclo
$row = mysqli_fetch_assoc($consulta);

//llamamos al método desconectar
    $mysql->desconectar();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edicion Usuarios</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="inicio.css">
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="package/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="personalizado.css">
    <script src="https://kit.fontawesome.com/43f4b789f9.js" crossorigin="anonymous"></script>

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">


            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-password-image" style="background: url(data:image/jpg;base64,<?php echo base64_encode($row['img']);?>);"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Editar Informacion del producto</h1>
                                    </div>
                                    <form class="user" action="controlador/editarproducto.php" method="POST" enctype="multipart/form-data"> 
                                        <input type='hidden' value='<?php echo $variable ?>' name='id'>
                                        <div class="form-group">
                                        <h5>Nombre</h5>
                                            <input type="text" class="form-control form-control-user"
                                                id="editarNombre" aria-describedby="nombre" name="nombre"
                                                value="<?php echo $row['nombre']?>">
                                        </div>

                                        <div class="form-group">
                                        <h5>descripcion</h5>
                                            <input type="text" class="form-control form-control-user"
                                                id="editarNombre" aria-describedby="descripcion" name="descripcion"
                                                value="<?php echo $row['descripcion']?>">
                                        </div>

                                        <div class="form-group">
                                        <h5>stock</h5>
                                            <input type="text" class="form-control form-control-user"
                                                id="editarNombre" aria-describedby="stock" name="stock"
                                                value="<?php echo $row['stock']?>"
                                                placeholder="cantidad del producto...">
                                        </div>

                                        <div class="form-group">
                                        <h5>precio</h5>
                                            <input type="text" class="form-control form-control-user"
                                                id="editarNombre" aria-describedby="precio" name="precio"
                                                value="<?php echo $row['precio']?>"
                                                placeholder="precio del producto...">
                                        </div>
                                        
                                        <input type="submit" value="Guardar" class="btn btn-primary btn-user btn-block">

                                        <a href="inventario.php" class="btn btn-google btn-user btn-block">
                                            cancelar
                                        </a>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>