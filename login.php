<?php 

	session_start();

	if (isset($_POST['boton-login'])) {
			
		include "db.php";

		$usuario = $_POST['user'];
		$contraseña = $_POST['pwd'];

		$consulta = mysqli_query($conexion,"SELECT * FROM usuarios WHERE (usuario = '$usuario') OR (correo = '$usuario')");

		if(mysqli_num_rows($consulta)>0){

			$fila = mysqli_fetch_array($consulta);

			$usuarioBD = $fila['usuario'];
			$contraseñaBD = $fila['contraseña'];
			$emailBD = $fila['correo'];

			if ($contraseñaBD == $contraseña) {
				$_SESSION['user'] = $usuarioBD;
				echo $_SESSION['user'];
				header('location:chat.php');
			} else {
				echo "<p>Contraseña incorrecta para usuario: <span style='color: #740011;'>",$usuario,"</span></p>";
				echo "<a href='index.php'>volver a inicio</a>";
			}
		}else
		{
			echo "Este usuario no existe<br>";
			echo "<a href='index.php'>volver a inicio</a>";
		}	
	}
?>