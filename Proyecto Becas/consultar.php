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
<body  >

	<div id="particles-js"></div>

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

	<div class="texto">
<img src="images/logoITM.png" alt="" class="logo">
<br>
		<h2>Consulta tu beca</h2>
		<br>
		<p>INSTITUTO TECNOLOGICO DE MORELIA</p>


	</div>

	<div class="principal contenedor">
		<article>
      <div class="tabla">
        <table>
          <thead>
            <tr>
              <th>Tipo</th>
              <th>Lugar</th>
              <th>Estatus</th>
              <th>Comprobate Ingresos</th>
              <th>Comprobate Domicilio</th>
              <th>Comprobate Solicitud</th>
            </tr>
          </thead>
          <tbody>
            <?php
              include("coneccionBD/bd.php");
              $query = 'SELECT * FROM solicitudes WHERE numeroControl = "'.$_SESSION["numeroControl"].'"';
              $result=bd_consulta($query);
              while ($row=mysqli_fetch_assoc($result)) {
                switch ($row["estatus"]) {
                  case 0:
                    $row["estatus"] = "En espera";
                    break;
                  case 1:
                    $row["estatus"] = "Aceptada";
                    break;
                  case 2:
                    $row["estatus"] = "Rechazada";
                    break;
                }
                ?>
                <tr>
                  <td><?php echo $row["tipo"] ?></td>
                  <td><?php echo $row["lugar"] ?></td>
                  <td><?php echo $row["estatus"] ?></td>
                  <td><a href="<?php echo $row["rutaIngresos"] ?>" target="_blank">ver</a></td>
                  <td><a href="<?php echo $row["rutaDomicilio"] ?>" target="_blank">ver</a></td>
                  <td><a href="<?php echo $row["rutaSolicitud"] ?>" target="_blank">ver</a></td>
                </tr>
                <?php
              }
            ?>
          </tbody>
        </table>
      </div>
		</article>


	</div>

	<!--<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="particles.js"></script>
	<script src="particulas.js"></script>-->
</body>
</html>
