<?php
SESSION_START();
include('bd.php');
$usuario=$_SESSION['correo'];
$descripcion=$_GET['descripcion'];
$descOld=$_GET['descOld'];


$query='UPDATE tipo_gasto 
	SET descripcion="'.$descripcion.'"
	WHERE usuario_correo="'.$usuario.'" AND
		descripcion="'.$descOld.'"';
	//echo $query;	
	bd_consulta($query);

header('Location: index.php?op=20');

?>