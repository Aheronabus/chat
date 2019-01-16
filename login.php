<?php 

	if ($_POST['boton-login']) {
			
		include "db.php";

		$usuario = $_POST['user'];
		$contraseña = $_POST['pwd'];

		$consulta = mysqli_query($conexion,"SELECT * FROM usuarios WHERE (usuario = '$usuario') OR (correo = '$usuario')");

		$contador = 0;

		while ($fila = mysqli_fetch_array($consulta)){

			$usuarioDB = $fila['usuario'];
			$contraseñaDB = $fila['contraseña'];
			$emailDB = $fila['correo'];

			if ($contraseñaDB == $contraseña) {
				echo "Sesión iniciada";
				header('location: chat.php');
			} else {
				echo "<p>Contraseña incorrecta para usuario: <span style='color: #740011;'>",$usuario,"</span></p>";
				echo "<a href='index.php'>volver a inicio</a>";
			}

			$contador = $contador + 1;
		}	

		if ($contador == 0) {
			echo "Este usuario no existe<br>";
			echo "<a href='index.php'>volver a inicio</a>";
		}
	}
?>