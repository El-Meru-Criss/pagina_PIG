<?php 

//llamo el modelo
require '../modelo/usuarios.php';
//instancio la clase
$user = new Usuario();

//inicio sesion
session_start();
//defino los parametros de inicio de sesion

if (empty($_SESSION['usuario']) && empty($_SESSION['acceso'])) {
    
    ?>
            <div class="card card-body registro_usuario">
                <center>
                <i class="fas fa-user-circle fa-2x"></i> <br> <hr>
                    <form method="post" action="controlador/login.php">
                    <input type="email" name="email" id="email"  required placeholder="Email" class="boton_registro">
                    <input type="password" name="password" id="password" required placeholder="Password" class="boton_registro">
                    <!-- <input type="submit" class="btn btn-outline-info" value="Iniciar sesion"> -->
                    </form>
                    <button type="button" onclick="login()" class="btn btn-outline-info">Iniciar sesion</button>
                    <hr>
                <a type="button" href="register.html" class="btn btn-outline-info">Crear cuenta</a>
                </center>
            </div>
    <?php
} else {
    $usuario = $_SESSION['usuario'];
    $acceso = $_SESSION['acceso'];

    ?>

            <div class="card card-body registro_usuario sesion_activa">
                <center>
                
                <?php echo $usuario->getNickname(); ?>
                    <hr>
                    <button type="button"  class="btn btn-outline-danger" onclick="window.location.href='controlador/cerrarsesion.php'">Cerrar sesion</button>
                    <button type="button"  class="btn btn-outline-primary">Editar</button>
                    <?php
                        if ($usuario->getRoles_idroles() == 2) {
                            ?>
                            <button type="button"  class="btn btn-outline-primary">tarjetas</button>
                            <?php
                        }
                    ?>
                    <?php
                        if ($usuario->getRoles_idroles() == 1) {
                            ?>
                            <a type="button" href="registrarproducto.php"  class="btn btn-outline-primary">agregar Producto</a>
                            <?php
                        }
                    ?>
                    
                    
                    


                </center>
            </div>

    <?php
}


?>