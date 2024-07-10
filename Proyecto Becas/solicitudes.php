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
                <th>Ingresos</th>
                <th>Domicilio</th>
                <th>Solicitud</th>
                <th>Tipo</th>
                <th>Lugar</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php
                $query = 'SELECT * FROM solicitudes
                          INNER JOIN usuarios ON solicitudes.numeroControl = usuarios.numeroControl
                          WHERE estatus = 0';
                $result=bd_consulta($query);
                while ($row=mysqli_fetch_assoc($result)) {
                  ?>
                  <form method="post">
                    <input type="hidden" name="id" value="<?php echo $row["idSolicitud"] ?>">
                    <tr>
                      <th><?php echo $row["numeroControl"] ?></th>
                      <td><?php echo $row["nombre"] ?></td>
                      <td><a href="<?php echo $row["rutaIngresos"] ?>" target="_blank">ver</a></td>
                      <td><a href="<?php echo $row["rutaDomicilio"] ?>" target="_blank">ver</a></td>
                      <td><a href="<?php echo $row["rutaSolicitud"] ?>" target="_blank">ver</a></td>
                      <td>
                        <select name="tipo">
                          <option value="Completa">Completa</option>
                          <option value="Par">Par</option>
                          <option value="Inpar">Inpar</option>
                        </select>
                      </td>
                      <td>
                        <select name="lugar">
                          <option value="Comedor">Comedor</option>
                          <option value="Cafeteria">Cafeteria</option>
                        </select>
                      </td>
                      <td>
                        <input type="submit" value="Aceptar" formaction="coneccionBD/aceptar.php">
                      </td>
                      <td>
                        <input type="submit" value="Rechazar" formaction="coneccionBD/rechazar.php">
                      </td>
                    </tr>
                  </form>
                  <?php
                }
              ?>
            </tbody>
          </table>
        </div>
      </article>

    </div>
  </body>
</html>
