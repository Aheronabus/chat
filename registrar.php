<?php 

	include "db.php";

	if ($_POST['boton-registro']) {
		
		$usuario = $_POST['user'];
		$contraseña = $_POST['pwd'];
		$email = $_POST['email'];

		$query = "INSERT INTO usuarios (usuario,contraseña,correo,permisos) values ('$usuario','$contraseña','$email',1)";

		$conexion->query($query);	
		echo "Se ha registrado con exito";
	} 

	$conexion->close();

 ?>

 <a href="index.php">Volver al inicio</a>