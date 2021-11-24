<?php
	if(isset($_POST['nickname']) && !empty($_POST['nickname']) 
	&& 
	isset($_POST['nombre']) && !empty($_POST['nombre'])
	&& 
	isset($_POST['apellido']) && !empty($_POST['apellido'])
	&& 
	isset($_POST['email']) && !empty($_POST['email'])
	&& 
	isset($_POST['contraseña']) && !empty($_POST['contraseña'])
	&& 
	isset($_POST['telefono']) && !empty($_POST['telefono'])
	&& 
	isset($_POST['departamento']) && !empty($_POST['departamento'])
	&& 
	isset($_POST['ciudad']) && !empty($_POST['ciudad'])
	&& 
	isset($_POST['direccion']) && !empty($_POST['direccion']) ) {


	require_once '../modelo/mysql.php';
	$mysql = new MySQL();

	$mysql->conectar();

	$nickname = $_POST['nickname'];
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$email = $_POST['email'];
	$contraseña = MD5($_POST['contraseña']);
	$telefono = $_POST['telefono'];
	$departamento = $_POST['departamento'];
	$ciudad = $_POST['ciudad'];
	$direccion = $_POST['direccion'];
	$adicional = $_POST['adicional'];

	$consulta = $mysql->efectuarConsulta(
		"SELECT proyecto.usuarios.email 
		FROM proyecto.usuarios 
		WHERE proyecto.usuarios.email = '".$email."';");
	$cmpEmail = mysqli_fetch_assoc($consulta);

	$consulta = $mysql->efectuarConsulta(
		"SELECT proyecto.usuarios.nickname 
		FROM proyecto.usuarios 
		WHERE proyecto.usuarios.nickname = '".$nickname."';");
	$cmpNickname = mysqli_fetch_assoc($consulta);

	if (
		empty($cmpEmail['email']) == false
		//strcmp($cmpEmail['email'],$email) == 0
		) {
		
		?>

		<head>
			<META HTTP-EQUIV="REFRESH" CONTENT="0.5;URL=../register.html">
			<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
			<center>
				<div class="alert alert-warning"><b>El email ya existe!!</b> digite un email valido o inicie sesion con el.</div>
			</center>
		</head>

		<?php
		

	} elseif (
		empty($cmpNickname['nickname']) == false
		//strcmp($cmpNickname['nickname'],$nickname) == 0
		) {
		
		?>

		<head>
			<META HTTP-EQUIV="REFRESH" CONTENT="0.5;URL=../register.html">
			<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
			<center>
				<div class="alert alert-warning"><b>El Nickname ya existe!!</b> Escoje uno disponible.</div>
			</center>
		</head>

		<?php

	} else {

		$mysql->efectuarConsulta(

			"INSERT INTO proyecto.usuarios 
			VALUES 
			('',
			'".$nickname."',
			'".$nombre."',
			'".$apellido."',
			'".$email."',
			'".$contraseña."',
			'".$telefono."',
			'2')"
		);

		$mysql->efectuarConsulta(

			"INSERT INTO proyecto.direccion 
			VALUES 
			('',
			'".$departamento."',
			'".$ciudad."',
			'".$direccion."',
			'".$adicional."')"
		);
	
		$consulta = $mysql->efectuarConsulta(
	
			"SELECT 
	
			proyecto.usuarios.idusuarios
	
			FROM proyecto.usuarios 
	
			WHERE proyecto.usuarios.email = '".$email."';"
	
		);

		$consulta1 = $mysql->efectuarConsulta(
	
			"SELECT 
	
			proyecto.direccion.iddireccion
	
			FROM proyecto.direccion 
	
			WHERE proyecto.direccion.direccion = '".$direccion."';"
	
		);
	
		$user = mysqli_fetch_assoc($consulta);

		$user1 = mysqli_fetch_assoc($consulta1);
	
		$mysql->efectuarConsulta(
	
			"INSERT INTO proyecto.direccion_has_usuarios 
	
			VALUES 
	
			(".$user1['iddireccion'].",".$user['idusuarios'].");"
		);

		?>

			<head>
				<META HTTP-EQUIV="REFRESH" CONTENT="0.5;URL=../inicio.html">
				<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
				<center>
					<div class="alert alert-success"><b>Usuario creado Correctamente!</b> Serás redirigido automáticamente.</div>
				</center>
			</head>

		<?php
		
	}
	/*$usuario = $_POST['usuario'];
	$contraseña = $_POST['contraseña'];
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$email = $_POST['email'];*/

	

	$mysql->desconectar();

	
?>


<?php
        }
        else{?>
            <head>
				<META HTTP-EQUIV="REFRESH" CONTENT="0.5;URL=../register.html">
				<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
				<center>
					<div class="alert alert-warning"><b>POR FAVOR LLENAR TODOS LOS CAMPOS</b> Serás redirigido automáticamente.</div>
				</center>
			</head>
<?php
        }
		?>