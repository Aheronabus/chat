<?php

date_default_timezone_set('UTC');

$servidor = "localhost";
$usuario= "root";
$password = "Marioloco456";
$base_datos = "appchat";



$conexion = new mysqli($servidor, $usuario, $password, $base_datos);


#function formatearFecha($fecha){
#	return date('g:i a', strtotime($fecha));
#}


?>