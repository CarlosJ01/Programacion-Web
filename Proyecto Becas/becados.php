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

  $errPass = "";
  if (isset($_GET["pass"])) {
    $errPass = $_GET["pass"];
  }

  $errPeriod = "";
  if (isset($_GET["peri"])) {
    $errPeriod = $_GET["peri"];
  }

  include("coneccionBD/bd.php");
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
          <h1>Solicitudes</h1>
          <p>Solicitudes realizadas, por los alumnos</p>
        </div>
        <div class="tabla tablaC">
          <table>
            <thead>
              <tr>
                <th>Numero Control</th>
                <th>Nombre</th>
                <th>Carrera</th>
                <th>Telefono</th>
                <th>Direccion</th>
                <th>Tipo</th>
                <th>Lugar</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $query = 'SELECT * FROM solicitudes
                          INNER JOIN usuarios ON solicitudes.numeroControl = usuarios.numeroControl
                          WHERE estatus = 1
                          ORDER BY solicitudes.idSolicitud, solicitudes.numeroControl, tipo, lugar';
                $result=bd_consulta($query);
                while ($row=mysqli_fetch_assoc($result)) {
                  ?>
                  <tr>
                    <th><?php echo $row["numeroControl"] ?></th>
                    <td><?php echo $row["nombre"] ?></td>
                    <td><?php echo $row["carrera"] ?></td>
                    <td><?php echo $row["telefono"] ?></td>
                    <td><?php echo $row["direccion"] ?></td>
                    <td><?php echo $row["tipo"] ?></td>
                    <td><?php echo $row["lugar"] ?></td>
                  </tr>
                  <?php
                }
              ?>
            </tbody>
          </table>
        </div>
      </article>

      <article>
        <div class="Titulo">
          <h1>Cerrar Periodo</h1>
          <div class="Advertencia">
            <p>AL CERRAR EL PERIODO SE QUITAN TODAS LAS BECAS A LOS ESTUDIANTES Y PASAN A SER PARTE DEL HISTORIAL</p>
            <p>SE BORRARAN LOS DOCUMENTOS SUBIDOS A LA APLICACION Y SE INICIARA UN NUEVO PERIODO ACTUAL</p>
            <p>ESTA ACCION ES INRREVERSIBLE ASI QUE DEBE DE ESTAR SEGURO DE REALIZAR ESTA ACCION</p>
            <p></p>
            <p>SI ESTA SEGURO DE REALIZAR ESTA ACCION POR FAVOR INDIQUE EL NOMBRE DEL PERIODO QUE SE CERRARA Y SU CONTRASEÑA DE ADMINISTRADOR</p>
          </div>
        </div>
        <div class="Formulario">
          <form action="coneccionBD/migrar.php" method="post">
            <input type="hidden" name="usuario" value="<?php echo $_SESSION["usuario"] ?>">
            <div>
              <label for="">Nombre del Periodo: </label>
              <input type="text" name="periodo" placeholder=" Ejemplo. Ago-Dic 2019" style="width: 60%;" required>
            </div>
            <?php if ($errPeriod != ""): ?>
              <span class="msg-error"><?php echo $errPeriod; ?></span>
              <br><br>
            <?php endif; ?>
            <div>
              <label for="">Contraseña: </label>
              <input type="password" name="pass" placeholder="Ingrese su Contraseña" style="width: 60%;" required>
            </div>
            <?php if ($errPass != ""): ?>
              <span class="msg-error"><?php echo $errPass; ?></span>
              <br><br>
            <?php endif; ?>
            <input id="boton" type="submit" value="Cerrar">
          </form>
        </div>


      </article>

    </div>
  </body>
</html>
