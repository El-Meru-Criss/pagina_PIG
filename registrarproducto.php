<?php 
require 'Modelo/MySQL.php';
$mysql = new Mysql();
//llamo el modelo
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


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <link rel="stylesheet" href="inicio.css">
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="package/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="personalizado.css">
    <script src="https://kit.fontawesome.com/43f4b789f9.js" crossorigin="anonymous"></script>

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image" style="background: url(http://www.ardiseny.es/wordpress/http://wp.ardiseny.es/wp-content/uploads/2015/04/icono-diseno-web-blog-difusion-producto.png);"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">crear un nuevo producto</h1>
                            </div>
                            <form class="user" method="post" action="controlador/agregarproducto.php" enctype="multipart/form-data">
                                <div class="form-group">    
                                    <h5>Imagen</h5>
                                    <input type="file" class="btn btn-primary btn-user btn-block" required="" name="img">
                                </div>
                                <div class="form-group">
                                    <h5>Nombre</h5>
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                      name="nombre" placeholder="nombre del producto" required="">
                                </div>
                                <div class="form-group">
                                    <h5>descripcion</h5>
                                    <input type="text" class="form-control form-control-user" id="descripcion"
                                    name="descripcion" placeholder="descripcion del producto" required="">
                                </div>
                                <div class="form-group row">
                                    <h5>stock</h5>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="stock"
                                        name="stock" placeholder="stock del producto" required="">
                                    </div>
                                    <div class="col-sm-6">
                                        
                                        <input type="text" class="form-control form-control-user" id="precio"
                                        name="precio" placeholder="precio del producto" required="">
                                    </div>
                                </div>
                                <br>
                                <input type="submit" class="btn btn-primary btn-user btn-block" value="registrar producto">
                                <a href="inicio.html" class="btn btn-danger btn-user btn-block">
                                    cancelar
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script src="package/dist/sweetalert2.js"></script>
    <script src="CRISS.js"></script>

</body>

</html>