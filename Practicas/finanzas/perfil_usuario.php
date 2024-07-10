<?php 

$nombre_completo=$_SESSION['nombre']." ".$_SESSION['paterno']." ".$_SESSION['materno'];
$fecha=$_SESSION['fecha_nacimiento'];
switch($_SESSION['ocupacion']){
	case "1":$ocupacion="Empleado";break;
	case "2":$ocupacion="Hogar";break;
	case "3":$ocupacion="Independiente";break;
	case "4":$ocupacion="Empresario";break;
}
$cp=$_SESSION['codigo_postal'];
$correo=$_SESSION['correo'];
$telefono=$_SESSION['telefono'];
//$fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
//move_uploaded_file($fileTmpPath, "imgPerfil.png");
?>	
		<section id="seccion">	
		<header id="header_form"> Perfil del usuario</header>	
		<figure id="foto">
			<img src="imgPerfil.png">
			<figcaption><?php echo $nombre_completo;?></figcaption>		
		</figure>
		<section id="datos">
		   <div class="myField">
				<label> Nombre completo: </label>
				<span> <?php echo $nombre_completo; ?> </span>
			</div>
		   <div class="myField">
				<label> Fecha de Nacimiento: </label>
				<span> <?php echo $fecha; ?> </span>
			</div>		
		   <div class="myField">
				<label> Ocupación: </label>
				<span> <?php echo $ocupacion; ?> </span>
			</div>		
			 <div class="myField">
				<label> Teléfono: </label>
				<span><?php echo $telefono;?></span>
			</div>			
			 <div class="myField">
				<label> Código Postal: </label>
				<span><?php echo $cp;?></span>
			</div>	 	
			 <div class="myField">
				<label> Correo Electrónico: </label>
				<span><?php echo $correo;?></span>
			</div>			
 		<section>


