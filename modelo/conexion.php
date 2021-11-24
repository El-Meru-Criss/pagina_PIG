<?php 

session_start();


$sesioon_usuario = $_SESSION['usuario']; 

if ( $sesioon_usuario == null && $sesioon_usuario == '' ) {
 
  header('location: ../LOGIN/LOGIN.HTML');

  die();
}



function conexion(){

return mysqli_connect('localhost','root',
                      "",'proyecto');

}


?>