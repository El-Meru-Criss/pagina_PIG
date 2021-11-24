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

    $producto = $mysql->efectuarConsulta("SELECT 
    proyecto.compradores.usuarios_idusuarios,
    proyecto.compradores.productos_idproductos,
    proyecto.productos.nombre, 
    proyecto.productos.precio, 
    proyecto.productos.stock,
    proyecto.productos.img  

    FROM proyecto.compradores 

    INNER JOIN proyecto.productos ON proyecto.productos.idproductos = proyecto.compradores.productos_idproductos
    
    WHERE proyecto.compradores.usuarios_idusuarios = ".$usuario->getIdusuarios()."");

    ?> 
    
    <div id="lista">

        <?php $cantidad=0; $valor=0; while ($pro = mysqli_fetch_array($producto)) { ?>


        <div class="card mb-3" style="max-width: 100%;">
            <div class="row g-0">
            <div class="col-md-4">
                <img class="img-fluid rounded-start img-productos"  src="data:image/jpg;base64,<?php echo base64_encode($pro['img']);?>"/>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                <h5 class="card-title"> <?php echo $pro['nombre']; ?> </h5>
                <p class="card-text">Precio Unidad:         $<?php echo $pro['precio']; $valor= $valor + $pro['precio']; $cantidad++; ?></p>

                <a class="btn btn-outline-danger" type="button" style="float: right" onclick="Eliminar(<?php echo $pro['productos_idproductos']; ?>)">
                    <i class="fas fa-trash-alt"></i>
                </a>

                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
            </div>
        </div>


        <?php } ?>



    </div>

    <div class="card text-center" style="margin-top: 1em;">
        <div class="card-header">
        Carrito De Compras
        </div>
        <div class="card-body">

        <button type="button" onclick="carrito_actualizar()" class="btn btn-outline-primary"><i class="fas fa-sync"></i> Actualizar</button>
            <hr>

            <h5 class="card-title">Total: $ <?php echo $valor; ?></h5>
            <p class="card-text">Cantidad De Articulos A Comprar:  <?php echo $cantidad; ?></p>

            <h6>Metodos De Pago</h6>
            <hr>
            
            <a class="btn btn-outline-success" onclick="Compra()" role="button" aria-expanded="true"><i class="far fa-credit-card"></i> Pagar todo</a>

            <!-- Card Content - Collapse -->
            

        
        
        </div>


    </div>


    
    <?php

    $mysql->desconectar();

?>