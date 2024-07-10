<?php
SESSION_START();
include('bd.php');
$usuario=$_SESSION['correo'];
$descripcion=$_GET['descripcion'];


$query="INSERT INTO tipo_gasto
	VALUES('".$descripcion."','".$usuario."')";
	bd_consulta($query);
	
header('Location: index.php?op=20');

?>