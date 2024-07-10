<?php
	include('encabezado.php');
	$mensaje_form="";

	if(!$_SESSION['userOK']){
		if($op=="-1")
			$mensaje_form="Usuario o contraseña incorrectos";

		if ($op=="-2" || $op=="-3" || $op=="-4"){
			include('registrarUsuario.html');
			if ($op=="-3")
				$mensaje_form="Usuario ya registrado";
			if ($op=="-4")
			 $mensaje_form="No se pudo registrar el usuario";
		}
		else
			include('autenticar.php');
	}
	else{
		include('menu.php');
		switch($op){
			case "1":
				$mensaje_form="Bienvenido ".$_SESSION['nombre'];
				include('vacio.php');break;
			case "0":include('salir.php');break;
			case "10":include('gastos.php');break;
			case "20":include('tipo_gasto_listado.php');break;
			case "25":include('tipo_gasto_agregar.php');break;
			case "22":include('tipo_gasto_editar.php');break;
			case "30":include('perfil_usuario2.php');break;
			case '35':include('cambiarContraseña.html');break;
			case '36':
				$mensaje_form="Contraseña actual es incorrecta";
				include('cambiarContraseña.html');
			break;
			case '37':
				$mensaje_form="No se puede al actualizar la contraseña";
				include('cambiarContraseña.html');
			break;
		}
	}
	include('pie.php');
?>
