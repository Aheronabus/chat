<?php
	session_start();
	include "db.php";

	$sesion = $_SESSION['user'];

	if ($sesion == null || $sesion == "") {
		echo "Debes iniciar sesión para acceder al chat<br>";
		echo "<a href='index.php'>Volver a inicio</a>";
		die();
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Chat</title>
	<link rel="stylesheet" type="text/css" href="estilos.css">
	<link href="https://fonts.googleapis.com/css?family=Mukta+Vaani" rel="stylesheet">

	<script type="text/javascript">
		function ajax(){
			var req = new XMLHttpRequest();

			req.onreadystatechange = function(){
				if (req.readyState == 4 && req.status == 200) {
					document.getElementById('chat').innerHTML = req.responseText;
				}
			}

			req.open('GET', 'conexion.php', true);
			req.send();
		}

		//linea que hace que se refreseque la pagina cada segundo
		setInterval(function(){ajax();}, 1000);
	</script>
</head>
<body onload="ajax();">
	
    <input type="checkbox" class="checkbox" id="check">
    <label class="menu" for="check">|||</label>
    <div class="left-panel">
    	<div id="flotante"></div>
    	<div id="opciones-menu">
    		<table id="items-menu" border="2px">
    			<tr>
    				<td>__MENU__ chat pre-alpha 1.0</td>
    				<td colspan="2"></td>
    			</tr>
    			<tr>
    				<td class="boton-menu" onclick="window.location='logout.php'">Cerrar Sesion</td>
    			</tr>
    			<tr>
    				<td class="boton-menu" onclick="window.location='vaciarchat.php'">Borrar Chat</td>
    			</tr>
    		</table>
    	</div>
    </div>

	<div id="contenedor">
		<div id="caja-chat">
			<div id="chat"></div>
		</div>
		
		<div id="seccion_input">

			<form method="POST" action="chat.php">
				<textarea id="seccion_mensaje" name="mensaje" placeholder="Ingresa tu mensaje"></textarea>
				<input type="submit" name="enviar" id="enviar" value="Enviar">
			</form>

			<?php
				if (isset($_POST['enviar'])) {
				
					$nombre = strtoupper($_SESSION['user']);
					$mensaje = $_POST['mensaje'];

					if (strlen($mensaje)>0) {
					
						$consulta = "INSERT INTO chat (nombre, mensaje) VALUES ('$nombre', '$mensaje')";

						$ejecutar = $conexion->query($consulta);

						if ($ejecutar) {
							echo "<embed loop='false' src='notificacion.mp3' hidden='true' autoplay='true' width=0 height=0>";
						}	
					} else{
						echo "<script>alert('El mensaje no puede estár vacio');</script>";
				}
			}

		?>
		</div>
	</div>

</body>
</html>