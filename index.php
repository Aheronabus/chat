<?php
	session_start();
	if (isset($_SESSION['user'])) {
		header('location:chat.php');
	}
	include 'db.php'; 

?>

<!DOCTYPE html>
<html lang="es">
<head>
<body>
	<div id="registro">
		<form action="registrar.php" method="POST">
			<input type="text" placeholder="Usuario" name="user">
			<input type="password" placeholder="Contraseña"	 name="pwd">
			<input type="text" placeholder="E-Mail"	 name="email">
			<input type="submit" value="Registrar" name="boton-registro">
		</form>
	</div>
	<div id="login">
		<form action="login.php" method="POST">
			<input type="text" placeholder="Usuario/E-Mail" name="user">
			<input type="password" placeholder="Contraseña"	 name="pwd">
			<input type="submit" value="Iniciar Sesión" name="boton-login">
	</div>
</body>
</html>