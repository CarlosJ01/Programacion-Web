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

  include("coneccionBD/bd.php");

  $query = 'SELECT * FROM convocatorias ORDER BY idConvocatoria DESC LIMIT 1';
  $result=bd_consulta($query);
  $row=mysqli_fetch_assoc($result);
  $row["fecha"] = substr($row["fecha"],8,2)."/".substr($row["fecha"],5,2)."/".substr($row["fecha"],0,4);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido </title>
    <link rel="stylesheet" href="css/estilos_2.css">

    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body>

  <div id="BecasITM"></div>

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
    <h2>Bienvenido <?php echo $_SESSION["nombre"];?> </h2>
    <br>
    <p>INSTITUTO TECNOLOGICO DE MORELIA</p>
  </div>

  <?php  ?>
  <div class="principal contenedor">
    <article>
      <div id="container">
        <div class="Titulo">
          <h1>Convoctoria</h1>
          <p>Descarga la convocatoria para ver los requisitos</p>
        </div>
        <div class="Descargar">
          <div>
            <a href="<?php echo $row["rutaConvocatoria"] ?>" target="_blank">Descargar Convocatoria</a>
          </div>
        </div>
      </div>
    </article>

    <article>
      <h2 class="titulo"><?php echo $row["nombre"] ?></h2>
      <p class="fecha"><?php echo $row["fecha"] ?></p>
      <p><?php echo $row["descripcion"] ?></p>

      <p>
        <div class="Descargar DescargarC">
          <div>
            <a href="<?php echo $row["rutaFormulario"] ?>" download="formulario.pdf" target="_blank">Descargar Solicitud</a>
          </div>
        </div>
      </p>
    </article>
  </div>

  <!--<script src="http://code.jquery.com/jquery-latest.js"></script>
  <script src="particles.js"></script>
  <script src="particulas.js"></script>-->
</body>
</html>
