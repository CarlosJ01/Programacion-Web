<?php
  SESSION_START();
  if (isset($_SESSION["login"])) {
    if ($_SESSION["login"] != "admin") {
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
              <li><a href="principalAdmin.php">INICIO</a></li>
              <li><a href="solicitudes.php">SOLICITUDES</a></li>
              <li><a href="becados.php">BECADOS</a></li>
              <li><a href="historial.php">HISTORIAL</a></li>
              <li><a href="buscar.php">BUSCAR</a></li>
              <li><a href="salir.php">SALIR</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </header>

    <div class="texto">
      <img src="images/logoITM.png" alt="" class="logo"><br>
      <h2>Bienvenido <?php echo $_SESSION["nombre"];?> </h2>
      <br>
      <p>INSTITUTO TECNOLOGICO DE MORELIA</p>
    </div>

    <div class="principal contenedor">
      <article>
        <div class="Titulo">
          <h1>Convoctoria</h1>
          <p>Edita Convocatoria</p>
        </div>
        <div class="Formulario">
          <form action="coneccionBD/editarConvocatoriaDatos.php" method="post">
            <input type="hidden" name="idConvocatoria" value="<?php echo $row["idConvocatoria"] ?>">
            <div>
              <label for="">Nombre</label>
              <input type="text" name="nombre" value="<?php echo $row["nombre"] ?>">
            </div>

            <div>
              <label for="">Descripcion</label>
              <textarea name="desc" rows="8" cols="50"><?php echo $row["descripcion"] ?></textarea>
            </div>

            <div>
              <label for="">Fecha Limite</label>
              <input type="date" name="fecha" value="<?php echo $row["fecha"] ?>">
            </div>

            <input id="boton" type="submit" value="Editar">
          </form>
        </div>
      </article>

      <article>
        <div class="Titulo">
          <p>Editar Convoctoria</p>
        </div>
        <script src="js/editarPDF.js"></script>
        <div class="Formulario">
          <form action="coneccionBD/editarConvocatoriaDoc.php" enctype="multipart/form-data" method="post" onsubmit="return convocatoria()">
            <input type="hidden" name="idConvocatoria" value="<?php echo $row["idConvocatoria"] ?>">
            <input type="hidden" name="ruta" value="<?php echo $row["rutaConvocatoria"] ?>">
            <div>
              <label for="">Nueva Convocatoria</label>
              <input type="file" name="convoctoria" id="convoctoria"  accept="application/pdf" required>
            </div>
            <input id="boton" type="submit" value="Editar">
          </form>
        </div>
      </article>

      <article>
        <script src="js/editarPDF.js"></script>
        <div class="Titulo">
          <p>Editar Solicitud</p>
        </div>
        <div class="Formulario">
          <form action="coneccionBD/editarSolicitudPDF.php" enctype="multipart/form-data" method="post" onsubmit="return solicitudEnviar()">
            <input type="hidden" name="idConvocatoria" value="<?php echo $row["idConvocatoria"] ?>">
            <input type="hidden" name="ruta" value="<?php echo $row["rutaFormulario"] ?>">
            <div>
              <label for="">Nueva Solicitud</label>
              <input type="file" name="solicitud" id="solicitud"  accept="application/pdf" required>
            </div>
            <input id="boton" type="submit" value="Editar">
          </form>
        </div>
      </article>

    </div>
  </body>
</html>
