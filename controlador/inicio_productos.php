<?php 

     //llamo el modelo
     require '../modelo/usuarios.php';
     //instancio la clase
     $user = new Usuario();

     //inicio sesion
     session_start();
     //defino los parametros de inicio de sesion
    

    require_once '../modelo/mysql.php';
    $mysql = new MySQL();

    $mysql->conectar();

    $producto = $mysql->efectuarConsulta("SELECT 
    proyecto.productos.idproductos, 
    proyecto.productos.nombre, 
    proyecto.productos.precio, 
    proyecto.productos.stock,
    proyecto.productos.descripcion,
    proyecto.productos.img 
    
    FROM proyecto.productos
    
    WHERE proyecto.productos.stock > 0");

    
?>

<?php if (empty($_SESSION['usuario']) && empty($_SESSION['acceso'])) { ?>

<?php } else {
    $usuario = $_SESSION['usuario'];
    $acceso = $_SESSION['acceso'];

    if ($usuario->getRoles_idroles() == 1) {
        ?> 
            <button type="button" onclick="Mostrar_agotados()" class="btn btn-outline-warning"><i class="fas fa-exclamation-triangle"></i> Productos sin existencias</button>
            <br> <br>
        <?php
    }

} ?>

    <?php while ($pro = mysqli_fetch_array($producto)) { ?>

    <div class="card card-productosCRISS">
        <a href="producto.html">
        <img src="data:image/jpg;base64,<?php echo base64_encode($pro['img']);?>" class="img-fluid rounded-start img-productos" alt="...">
        </a>
        <div class="card-body">
        <h5 class="card-title"><?php echo $pro['nombre']; ?></h5>
        <p class="card-text"> <i><?php echo $pro['descripcion']; ?>.</i>  <br> Precio: $<?php echo $pro['precio'] ?> <br> Disponibles: <?php echo $pro['stock'] ?></p>
        <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
        <?php 
            //verifica que se haya iniciado la sesión, de lo contrario re dirige al login
            if (empty($_SESSION['usuario']) && empty($_SESSION['acceso'])){
                ?> 
                <button type="button" onclick="falta_registrarse()" class="btn btn-outline-primary"><i class="fas fa-exclamation-circle"></i> info</button>
                <?php
            } else {
                $usuario = $_SESSION['usuario'];
                $acceso = $_SESSION['acceso'];

                if ($usuario->getRoles_idroles() == 1) {
                    ?> 

<a type="button" data-toggle="modal" data-target="#exampleModal" onclick="editar_producto_menu(<?php  echo $pro['idproductos'] ?>)" class="btn btn-outline-primary"><i class="fas fa-pen"></i> editar</a>
                        <!-- <a type="button" href="editarProducto.php?id=<?php echo $pro['idproductos'] ?>" class="btn btn-outline-primary"><i class="fas fa-pen"></i> editar</a> -->
                        <button type="button" onclick="eliminar_producto(<?php  echo $pro['idproductos'] ?>)" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i> eliminar</button>
                        
                    <?php
                } else {
                    ?>
                    <button type="button" onclick="Agregar(<?php  echo $pro['idproductos'] ?>)" class="btn btn-outline-success"><i class="fas fa-shopping-cart"></i> Add To Car</button>
                    <button type="button" class="btn btn-outline-warning"><i class="fas fa-star"></i></button>
                    <?php
                }

            }
        ?>
        
        </div>
    </div>
    
    <?php } ?>

<!-- </div> -->


    

<?php

    $mysql->desconectar();

?>