<?php
	SESSION_START();
	if(!isset($_SESSION['userOK']))
		$_SESSION['userOK']=false;
	if(!isset($_GET['op'])){
		$op=-10; //la aplicación está iniciando
		$error=1;
		$mensaje_form="";
	}
	else
		$op=$_GET['op'];
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8" >
		<title>	Contenedor	</title>
		<link rel="stylesheet" href="CSS/estilos.css">
	</head>
	<body>
	<div id="principal">

		<?php
			if ($_SESSION['userOK']) {
				$cabe = "cabecera";
			}else {
				$cabe = "";
			}
		?>
		<header id="<?php echo $cabe;?>">
			<h1>Sistema de Finanzas Personales</h1>
			<?php
				if ($_SESSION['userOK']) {
					$img = $_SESSION['imagen'];
					$nom = $_SESSION['nombre'];
					echo "<div class="."usuario".">";
					echo "<label>".$nom."</label>";
						echo "<img class="."imgPerfil"." src=".$img.">";
					echo "</div>";
				}
			?>
		</header>
