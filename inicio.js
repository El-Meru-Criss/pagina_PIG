
  
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
  