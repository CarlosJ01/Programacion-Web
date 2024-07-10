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

  $periodo = 0;
  if (isset($_GET["periodo"])) {
    $periodo = $_GET["periodo"];
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
          <h1>Historico</h1>
          <p>Historial del periodo actual o algun pasado</p>
        </div>
        <div class="Formulario">
          <form action="historial.php" method="get">
            <div>
              <label for="">Periodo: </label>
              <select name="periodo">
                <option value="0" <?php if($periodo==0) echo "selected"; ?>>Actual</option>
                <?php
                  $query = 'SELECT * FROM periodo';
                  $result=bd_consulta($query);
                  while ($row=mysqli_fetch_assoc($result)) {
                    ?>
                    <option value="<?php echo $row["idPeriodo"] ?>" <?php if($periodo==$row["idPeriodo"]) echo "selected"; ?>><?php echo $row["nombre"]; ?></option>
                    <?php
                  }
                ?>
              </select>
            </div>
            <input id="boton" type="submit" value="Buscar">
          </form>
        </div>
      </article>

      <?php
        if ($periodo == 0) {
            ?>
            <article>
              <div class="Titulo">
                <h1>Periodo Actual</h1>
                <p></p>
                <p>Solicitudes del periodo actual</p>
              </div>
              <div class="tabla">
                <table>
                  <thead>
                    <tr>
                      <th>Numero Control</th>
                      <th>Nombre</th>
                      <th>Tipo</th>
                      <th>Lugar</th>
                      <th>Estatus</th>
                      <th>Ingresos</th>
                      <th>Domicilio</th>
                      <th>Solicitud</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $query = 'SELECT * FROM solicitudes
                                INNER JOIN usuarios ON solicitudes.numeroControl = usuarios.numeroControl';
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
                          <th><?php echo $row["numeroControl"] ?></th>
                          <td><?php echo $row["nombre"] ?></td>
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
            <?php
          }else {
            ?>
            <article>
              <div class="Titulo">
                <h1>Historico</h1>
                <p></p>
                <?php
                  $query = 'SELECT nombre FROM periodo WHERE idPeriodo = "'.$periodo.'"';
                  $result=bd_consulta($query);
                  $row=mysqli_fetch_assoc($result);
                ?>
                <p>Solicitudes realizadas en el periodo <?php echo $row["nombre"] ?></p>
              </div>
              <div class="tabla">
                <table>
                  <thead>
                    <tr>
                      <th>Numero Control</th>
                      <th>Nombre</th>
                      <th>Tipo</th>
                      <th>Lugar</th>
                      <th>Estatus</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $query = 'SELECT historico.numeroControl, usuarios.nombre AS alumno, tipo, lugar, estatus FROM historico
                                INNER JOIN usuarios ON historico.numeroControl = usuarios.numeroControl';
                      $result=bd_consulta($query);
                      $cont = 1;
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
                          <th><?php echo $row["numeroControl"] ?></th>
                          <td><?php echo $row["alumno"] ?></td>
                          <td><?php echo $row["tipo"] ?></td>
                          <td><?php echo $row["lugar"] ?></td>
                          <td><?php echo $row["estatus"] ?></td>
                        </tr>
                        <?php
                        $cont++;
                      }
                    ?>
                  </tbody>
                </table>
              </div>
            </article>
            <?php
          }
      ?>
    </div>
  </body>
</html>
