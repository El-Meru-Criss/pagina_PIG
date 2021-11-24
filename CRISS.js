function Mostrar() {
  
  $.ajax({ //Alertas y mostrar info sin necesidad de recargar la pagina
    type: "POST",
    url: "controlador/inicio_productos.php",
    success:function(d) {
        
        $("#articulos").html(d);
    }
})
  let timerInterval
  Swal.fire({
    title: 'Actualizando',
    html: 'Los productos se actulizaran en <b></b> milliseconds.',
    timer: 1000,
    timerProgressBar: true,
    didOpen: () => {
      Swal.showLoading()
      const b = Swal.getHtmlContainer().querySelector('b')
      timerInterval = setInterval(() => {
        b.textContent = Swal.getTimerLeft()
      }, 100)
    },
    willClose: () => {
      clearInterval(timerInterval)
    }
  }).then((result) => {
    /* Read more about handling dismissals below */
    if (result.dismiss === Swal.DismissReason.timer) {
      console.log('I was closed by the timer')
    }
  })
}

function Mostrar_agotados() {
  
  $.ajax({ //Alertas y mostrar info sin necesidad de recargar la pagina
    type: "POST",
    url: "controlador/inicio_productos_agotados.php",
    success:function(d) {
        
        $("#articulos").html(d);
    }
})
  let timerInterval
  Swal.fire({
    title: 'Actualizando',
    html: 'Los productos se actulizaran en <b></b> milliseconds.',
    timer: 1000,
    timerProgressBar: true,
    didOpen: () => {
      Swal.showLoading()
      const b = Swal.getHtmlContainer().querySelector('b')
      timerInterval = setInterval(() => {
        b.textContent = Swal.getTimerLeft()
      }, 100)
    },
    willClose: () => {
      clearInterval(timerInterval)
    }
  }).then((result) => {
    /* Read more about handling dismissals below */
    if (result.dismiss === Swal.DismissReason.timer) {
      console.log('I was closed by the timer')
    }
  })
}

function menu_usuario() {
  
  $.ajax({ //Alertas y mostrar info sin necesidad de recargar la pagina
    type: "POST",
    url: "controlador/menu_usuarios.php",
    success:function(d) {
        
        $("#user").html(d);
        mostrar_carrito();
        
    }
})
  
}

function login() {
  var datos = {
    "email":$("#email").val(),
    "password":$("#password").val(),
  }

  $.ajax({
    type: "POST",
    url: "controlador/login.php",
    data:datos,
    success:function(d) {
      Swal.fire('Registrado!', 'Has iniciado secion con exito', 'success');
      menu_usuario();
      mostrar_carrito();
    }
  })
}

function falta_registrarse() {
  Swal.fire({
    title: 'Necesitas iniciar secion',
    text: "Si deseas comprar un producto es necesario que inicies secion, podras hacerlo en el boton 'perfil' en las opciones de la barra superior",
    icon: 'warning',
  })
}

function Agregar(id_producto) {
  
  var datos = {
    "id_producto":id_producto
  }

  // alert(datos['id_producto']);

  $.ajax({
    type: "POST",
    url: "controlador/carrito_agregar.php",
    data:datos,
    success:function(d) {
      carrito_actualizar()
      Swal.fire('Agregado!', 'Podras realizar tu compra o cancelarla en el carrito', 'success');
    }
  }) 
  
}

function carrito_actualizar() {
  $.ajax({ //Alertas y mostrar info sin necesidad de recargar la pagina
    type: "POST",
    url: "controlador/carrito_actualizar.php",
    success:function(d) {
        
        $("#contenido_carrito").html(d);
        
    }
  })

  let timerInterval
  Swal.fire({
    title: 'Actualizando',
    html: 'Los productos se actulizaran en <b></b> milliseconds.',
    timer: 1000,
    timerProgressBar: true,
    didOpen: () => {
      Swal.showLoading()
      const b = Swal.getHtmlContainer().querySelector('b')
      timerInterval = setInterval(() => {
        b.textContent = Swal.getTimerLeft()
      }, 100)
    },
    willClose: () => {
      clearInterval(timerInterval)
    }
  }).then((result) => {
    /* Read more about handling dismissals below */
    if (result.dismiss === Swal.DismissReason.timer) {
      console.log('I was closed by the timer')
    }
  })

  
}

function Eliminar(id_producto) {
    Swal.fire({
        title: 'Descartar este producto?',
        text: "Podras volverlo a buscar si te arrepientes!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: 'success',
        confirmButtonText: 'descartar'
      }).then((result) => {
        if (result.isConfirmed) {

          var datos = {
            "id_producto":id_producto
          }

          $.ajax({
            type: "POST",
            url: "controlador/carrito_eliminar.php",
            data:datos,
            success:function(d) {
              Swal.fire(
                'Descartado!',
                'Has descartado con exito este producto.',
                'success'
              );
              carrito_actualizar();
            }
          })



          
        }
      })
}

function eliminar_producto(id_producto) {
  Swal.fire({
    title: 'Descartar este producto?',
    text: "No podras revocar esta accion",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: 'success',
    confirmButtonText: 'descartar'
  }).then((result) => {
    if (result.isConfirmed) {

      var datos = {
        "id_producto":id_producto
      }

      $.ajax({
        type: "POST",
        url: "controlador/eliminar_producto.php",
        data:datos,
        success:function(d) {
          
          Mostrar();
          Swal.fire(
            'Eliminado correctamente',
            '',
            'success'
          );

        }
      })



      
    }
  })
}

function identidad() {
    Swal.fire({
        title: '¿Quienes somos?',
        text: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla, praesentium cumque illo sint voluptates dolore. Soluta dolore error explicabo suscipit velit corporis itaque consequuntur accusantium ipsam. Dolorem qui quisquam dicta. ',
        imageUrl: 'logo.jpg',
        imageWidth: 250,
        imageHeight: 150,
        imageAlt: 'Custom image'
      })
}

function mostrar_carrito() {
  $.ajax({ //Alertas y mostrar info sin necesidad de recargar la pagina
    type: "POST",
    url: "controlador/mostrar_carrito.php",
    success:function(d) {
      $("#btn_carrito").html(d);
    }
  })
}

function Compra() {
    Swal.fire({
        title: 'Realizar compra?',

        showCancelButton: true,
        confirmButtonText: 'Comprar',

      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {

          $.ajax({ //Alertas y mostrar info sin necesidad de recargar la pagina
            type: "POST",
            url: "controlador/pagar.php",
            success:function(d) {
              carrito_actualizar();
              Swal.fire('Comprado!', '', 'success');
              
            }
          })

          
        }
      })
      
}

function editar_producto_menu(id_producto) {

  var datos = {
    "id_producto":id_producto
  }

  $.ajax({
    type: "POST",
    url: "controlador/editar_producto_menu.php",
    
    data:datos,
    success:function(d) {
      $("#contenido_producto_editar").html(d);
      // Mostrar();
      // Swal.fire(
      //   'Editado correctamente',
      //   '',
      //   'success'
      // );

    }
  })
  
}

function editar_producto_funcion() {
  var datos = {
    "producto_id":$("#producto_id").val(),
    "producto_nombre":$("#producto_nombre").val(),
    "producto_descripcion":$("#producto_descripcion").val(),
    "producto_nombre":$("#producto_nombre").val(),
    "producto_nombre":$("#producto_nombre").val(),
  }
}