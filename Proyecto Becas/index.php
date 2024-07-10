<?php
  $password_err = "";
  $usr = "";
  if (isset($_GET["error"])) {
    $password_err = $_GET["error"];
  }
  if (isset($_GET["usr"])) {
    $usr = $_GET["usr"];
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BECAS ITM- login</title>
    <link rel="stylesheet" href="css/estilos.css">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>

<body>
    <div class="container-all">

        <div class="ctn-form">
            <img src="images/logoITM.png" alt="" class="logo">
            <h1 class="title">Iniciar Sesión</h1>

            <form action="coneccionBD/login.php" method="post">

                <label for="">Numero de Control</label>
                <input type="text" name="numCont" value="<?php echo $usr ?>">

                <label for="">Contraseña</label>
                <input type="password" name="password">
                <span class="msg-error"><?php echo $password_err; ?></span>

                <input type="submit" value="Iniciar">

            </form>

            <span class="text-footer">¿Aún no te has regsitrado?
                <a href="registrar.php">Registrate</a>
            </span>
        </div>

        <div class="ctn-text">
            <div class="capa"></div>
            <h1 class="title-description">SALUDOS ESTUDIANTE</h1>
            <p class="text-description">Bienvenido al sistema de becas alimenticias del Institto Tecnologico de Morelia</p>
        </div>
    </div>
</body>
</html>
