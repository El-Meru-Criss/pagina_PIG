<?php 

    require_once '../modelo/mysql.php';
    $mysql = new MySQL();

    $mysql->conectar();

    $id_producto = $_POST['id_producto'];

    $producto = $mysql->efectuarConsulta("SELECT 
    proyecto.productos.idproductos, 
    proyecto.productos.nombre, 
    proyecto.productos.precio, 
    proyecto.productos.stock,
    proyecto.productos.descripcion,
    proyecto.productos.img 
    
    FROM proyecto.productos
    
    WHERE proyecto.productos.idproductos = ".$id_producto."");

    $row = mysqli_fetch_assoc($producto);

    ?>

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
                                <input type='hidden' id="producto_id" value='<?php echo $id_producto ?>' name='id'>
                                <div class="form-group">
                                <h5>Nombre</h5>
                                    <input type="text" class="form-control form-control-user"
                                        id="producto_nombre" aria-describedby="nombre" name="nombre"
                                        value="<?php echo $row['nombre']?>">
                                </div>

                                <div class="form-group">
                                <h5>descripcion</h5>
                                    <input type="text" class="form-control form-control-user"
                                        id="producto_descripcion" aria-describedby="descripcion" name="descripcion"
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

                                <a data-dismiss="modal" class="btn btn-danger btn-user btn-block">
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

    <?php

    $mysql->desconectar();

?>