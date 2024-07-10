<?php
  $username_err = "";
  if (isset($_GET["error"])) {
    $username_err = $_GET["error"];
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - MagtimusPro</title>
    <link rel="stylesheet" href="css/estilos.css">

    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body>

    <div class="container-all">
        <div class="ctn-form">
            <img src="images/logoITM.png" alt="" class="logo">
            <h1 class="title"></h1>

            <script src="js/registro.js"></script>
            <form action="coneccionBD/registrarUsuario.php" method="post" onsubmit="return registro()">
                <label for="">Numero de control</label>
                <input type="text" name="numeroControl" id="numeroControl" required>
                <span class="msg-error"><?php echo $username_err; ?></span>

                <label for="">Nombre Completo</label>
                <input type="text" name="nombre" required>

                <label for="">Carrera</label>
                <select name="carrera">
                  <option value="Ing. en Sistemas Computacionales">Ing. en Sistemas Computacionales</option>
                  <option value="Ing. en Tecnologias de la Comunicacion y Informacion">Ing. en Tecnologias de la Comunicacion y Informacion</option>
                  <option value="Ing. en Informatica">Ing. en Informatica</option>
                  <option value="Ing. Materiales">Ing. Materiales</option>
                  <option value="Ing. en Gestion Empresarial">Ing. en Gestion Empresarial</option>
                  <option value="Ing. Mecanica">Ing. Mecanica</option>
                  <option value="Ing. Mecatronica">Ing. Mecatronica</option>
                  <option value="Ing. Industrial">Ing. Industrial</option>
                  <option value="Ing. Electrica">Ing. Electrica</option>
                  <option value="Ing. Electronica">Ing. Electronica</option>
                  <option value="Ing. Bioquimica">Ing. Bioquimica</option>
                  <option value="Lic. Contador Publico">Lic. Contador Publico</option>
                  <option value="Lic. en Adminisracion">Lic. en Adminisracion</option>
                </select>

                <label for="">Telefono</label>
                <input type="text" name="telefono" required>

                <label for="">Direccion</label>
                <input type="text" name="direccion" required>

                <label for="">Contraseña</label>
                <input type="password" name="password1" id="password1" required>
                <label for="">Repite Contraseña</label>
                <input type="password" name="password2" id="password2" required>

                <input type="submit" value="Registrarse">

            </form>

            <span class="text-footer">¿Ya te has registrado?
                <a href="index.php">Iniciar Sesión</a>
            </span>
        </div>

        <div class="ctn-text">
            <div class="capa"></div>
            <h1 class="title-description">Registro</h1>
            <p class="text-description">Llenas los campos con tu informacion para, para hacer el registro en el sistema y puedas iniciar</p>
        </div>

    </div>

</body>

</html>
