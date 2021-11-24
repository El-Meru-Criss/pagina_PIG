<?php
	if(isset($_POST['email']) && !empty($_POST['email']) 
	&& 
	isset($_POST['password']) && !empty($_POST['password']) ){

		require_once '../modelo/mysql.php'; //esta funcion llama informacion, de la ruta especifica

		$username=$_POST['email'];
		$password=MD5($_POST['password']);

		//se instancia la clase, es decir, se llama para poder usar sus metodos
		$mysql = new MySQL();

		//se hace uso del metodo para conectar a la base de datos
		$mysql->conectar();

		$usuarios = $mysql->efectuarConsulta("SELECT
								proyecto.usuarios.email,
								proyecto.usuarios.contraseña,
								proyecto.usuarios.nickname,
								proyecto.usuarios.idusuarios,
								proyecto.usuarios.roles_idroles
								FROM
								proyecto.usuarios
								WHERE proyecto.usuarios.email ='".$username."' &&
								proyecto.usuarios.contraseña= '".$password."'" );

		//se desconecta de la base de datos para liberar memoria
		$mysql->desconectar();

		if (mysqli_num_rows($usuarios) > 0) {

			require_once '../modelo/usuarios.php';
			session_start();
			$usuario = new usuario();

			while($resultado= mysqli_fetch_assoc($usuarios))
			{
				$email=$resultado["email"];
				$nickname=$resultado["nickname"];
				$idusuarios=$resultado["idusuarios"];
				$roles_idroles=$resultado["roles_idroles"];

				$usuario->setEmail($email);
				$usuario->setNickname($nickname);
				$usuario->setIdusuarios($idusuarios);
				$usuario->setRoles_idroles($roles_idroles);
			}

			$_SESSION['usuario'] = $usuario;
			$_SESSION['acceso'] = true;

			// header("Location: ../inicio.html");
			

		}else{


			// header("Location: ../inicio.html");
		}

	}
?>