<?php
include "db.php";
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
    	<ul>
    		<a href="" class="itemsMenu"><li>MENU</li></a>    
    	</ul>
    </div>

	<div id="contenedor">
		<div id="caja-chat">
			<div id="chat"></div>
		</div>

		<form method="POST" action="chat.php">
			<input type="text" name="nombre" placeholder="Ingresa tu nombre">			
			<textarea name="mensaje" placeholder="Ingresa tu mensaje"></textarea>
			<input type="submit" name="enviar" value="Enviar">
		</form>

		<?php
			if (isset($_POST['enviar'])) {
				
				$nombre = $_POST['nombre'];
				$mensaje = $_POST['mensaje'];


				$consulta = "INSERT INTO chat (nombre, mensaje) VALUES ('$nombre', '$mensaje')";

				$ejecutar = $conexion->query($consulta);

				if ($ejecutar) {
					echo "<embed loop='false' src='notificacion.mp3' hidden='true' autoplay='true' width=0 height=0>";
				}
			}

		?>
	</div>

</body>
</html>