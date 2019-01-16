<?php 
	session_start();
	include "db.php";

	$query = "TRUNCATE TABLE chat";

	$conexion->query($query);

	header('location:chat.php');


 ?>