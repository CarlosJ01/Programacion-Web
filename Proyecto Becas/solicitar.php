<?php
  SESSION_START();
  if (isset($_SESSION["login"])) {
    if ($_SESSION["login"] != "usuario") {
      header('Location: index.php');
    }
  }
  if (!isset($_SESSION["login"])) {
    header('Location: index.php');
  }

  include("coneccionBD\bd.php");
  $query = 'SELECT COUNT(*) AS num FROM solicitudes WHERE numeroControl="'.$_SESSION["numeroControl"].'"';
  $result=bd_consulta($query);
  $row=mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Particulas</title>
	<!--<link href='http://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>-->
	<link rel="stylesheet" href="css/estilos_2.css">
</head>
<header>
		<div class="menu">
			<div class="contenedor">
				<div class="logo">BECAS CEITM</div>
				<nav>
					<ul>
            <li><a href="bienvenida.php">INICIO</a></li>
            <li><a href="solicitar.php">SOLICITAR</a></li>
            <li><a href="consultar.php">CONSULTAR</a></li>
            <li><a href="salir.php">SALIR</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</header>
<body  >

	<div id="becasitm"></div>


  <script src="">

  </script>
	<div class="texto">
		<img src="images/logoITM.png" alt="" class="logo">
<br>
		<h2>Tramita tu beca</h2>
		<br>
		<p>INSTITUTO TECNOLOGICO DE MORELIA</p>
	</div>

  <script src="js/registrarBeca.js"></script>

	<div class="principal contenedor">
    <article>
      <div class="Titulo">
        <h1>Tramitar Beca</h1>
        <p>Sube los documentos para solicitar la beca</p>
      </div>
      <div class="Formulario">
        <form action="coneccionBD/insertarSolicitud.php" enctype="multipart/form-data" method="post" onsubmit="return solicitar('<?php echo $row["num"]; ?>')">
          <div>
              <label>Numero de Control:</label>
              <input type="text" name="numCont" value="<?php echo $_SESSION["numeroControl"] ?>" readonly>
          </div>
          <div>
            <label>Nombre Completo:</label>
            <input type="text"  value="<?php echo $_SESSION["nombre"] ?>" readonly>
          </div>
          <div>
            <label>Carrera:</label>
            <input type="text" value="<?php echo $_SESSION["carrera"] ?>" readonly>
          </div>
          <div>
            <label>Telefono:</label>
            <input type="text" value="<?php echo $_SESSION["telefono"] ?>" readonly>
          </div>
          <div>
            <label>Direccion:</label>
            <input type="text" value="<?php echo $_SESSION["direccion"] ?>" readonly>
          </div>
          <div>
            <label>Comprobante de ingresos:</label>
            <input type="file" name="ingresos" id="ingresos" accept="application/pdf" required>
          </div>
          <div>
            <label>Comprobante de domicilio:</label>
            <input type="file"  name ="domicilio" id="domicilio" accept="application/pdf" required>
          </div>
          <div>
            <label>Solicitud con carta motivo:</label>
            <input type="file"  name ="solicitud"  id="solicitud" accept="application/pdf" required>
          </div>
          <input id="boton" type="submit" value="Enviar">
        </form>
      </div>
    </article>
	</div>

	<!--<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="particles.js"></script>
	<script src="particulas.js"></script>-->
</body>
</html>
