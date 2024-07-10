<?php
SESSION_START();
include('bd.php');
$usuario=$_SESSION['correo'];
$descripcion=$_GET['desc'];
$query='DELETE FROM tipo_gasto
		WHERE descripcion="'.$descripcion.'" AND
		usuario_correo="'.$usuario.'"';
bd_consulta($query);
header('Location: index.php?op=20');

?>