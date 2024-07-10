<?php
  SESSION_START();
  if (!isset($_SESSION['userOK'])) {
    $_SESSION['userOK']=false;
  }else {
    
  }
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8" >
		<title>	Contenedor	</title>
		<link rel="stylesheet" href="estilos.css">
	</head>
	<body>
	<div id="principal">
		<header id="cabecera">
			<h1>Sistema de Finanzas Personales</h1>
		</header>
