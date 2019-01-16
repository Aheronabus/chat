<?php 

	include "db.php";

	if ($_POST['boton-registro']) {
		
		$usuario = $_POST['user'];
		$contraseña = $_POST['pwd'];
		$email = $_POST['email'];

		$query = "INSERT INTO usuarios (usuario,contraseña,correo,permisos) values ('$usuario','$contraseña','$email',1)";

		$conexion->query($query);	
		echo "<h1>Se ha registrado con <span style='color:#11AA00;'>exito</span></h1>";
	} 

	$conexion->close();

 ?>

 <a href="index.php">Volver al inicio</a>