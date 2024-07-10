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

  $numCont = "";
  if (isset($_GET["numCont"])) {
    $numCont = $_GET["numCont"];
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
          <h1>Buscar un Alumno</h1>
          <p>Busca un alumno por su numero de control</p>
        </div>
        <div class="Formulario">
          <form action="buscar.php" method="get">
            <div>
              <label for="">Numero de Control: </label>
              <input type="text" name="numCont" style="width: 65%;" placeholder="Ingrese el numero de control a buscar" value="<?php if($numCont != "") echo $numCont; ?>" required>
            </div>
            <input id="boton" type="submit" value="Buscar">
          </form>
        </div>
      </article>

      <?php
        if ($numCont != "") {
          $query = 'SELECT COUNT(*) AS num FROM usuarios WHERE numeroControl = "'.$numCont.'"';
          $result=bd_consulta($query);
          $row=mysqli_fetch_assoc($result);
          if ($row["num"] == 1) {
            $query = 'SELECT * FROM usuarios WHERE numeroControl = "'.$numCont.'"';
            $result=bd_consulta($query);
            $row = mysqli_fetch_assoc($result);

            $nom = $row["nombre"];
            $car = $row["carrera"];
            $tel = $row["telefono"];
            $dir = $row["direccion"];
            ?>
            <article>
              <div class="Titulo">
                <h1>Informacion del Alumno</h1>
                <p></p>
                <p>Nombre: <?php echo $nom ?></p>
                <p>Carrera: <?php echo $car ?></p>
                <p>Telefono: <?php echo $tel ?></p>
                <p>Direccion: <?php echo $dir ?></p>
              </div>
            </article>

            <article>
              <div class="Titulo">
                <h1>Periodo Actual</h1>
                <p></p>
                <p>Solicitud del periodo actual</p>
              </div>
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
                      $query = 'SELECT * FROM solicitudes WHERE numeroControl = "'.$numCont.'"';
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

            <article>
              <div class="Titulo">
                <h1>Historico</h1>
                <p></p>
                <p>Solicitudes realizadas</p>
              </div>
              <div class="tabla">
                <table>
                  <thead>
                    <tr>
                      <th>Numero</th>
                      <th>Tipo</th>
                      <th>Lugar</th>
                      <th>Estatus</th>
                      <th>Periodo</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $query = 'SELECT * FROM historico
                                INNER JOIN periodo ON historico.periodo = periodo.idPeriodo
                                WHERE numeroControl = "'.$numCont.'"';
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
                          <th><?php echo $cont ?></th>
                          <td><?php echo $row["tipo"] ?></td>
                          <td><?php echo $row["lugar"] ?></td>
                          <td><?php echo $row["estatus"] ?></td>
                          <td><?php echo $row["nombre"] ?></td>
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
          }else {
            ?>
            <article>
              <div class="Advertencia">
                <p>No existe un alumno con el numero de control <?php echo $numCont; ?></p>
              </div>
            </article>
            <?php
          }
        }
      ?>
    </div>
  </body>
</html>
