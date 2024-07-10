<?php
  include("bd.php");
  $numCont = $_POST["numCont"];
  $pass = $_POST["password"];


  $query = 'SELECT COUNT(*) AS num FROM usuarios WHERE numeroControl = "'.$numCont.'" AND clave = SHA1("'.$pass.'")';
  $result=bd_consulta($query);
  if (mysqli_fetch_assoc($result)["num"] == 1) {
    $query = 'SELECT * FROM usuarios WHERE numeroControl = "'.$numCont.'" AND clave = SHA1("'.$pass.'")';
    $result=bd_consulta($query);
    $row = mysqli_fetch_assoc($result);

    SESSION_START();
    $_SESSION["login"] = "usuario";
    $_SESSION["numeroControl"] = $row["numeroControl"];
    $_SESSION["nombre"] = $row["nombre"];
    $_SESSION["carrera"] = $row["carrera"];
    $_SESSION["telefono"] = $row["telefono"];
    $_SESSION["direccion"] = $row["direccion"];

    header('Location: ../bienvenida.php');
  }else {
    $query = 'SELECT COUNT(*) AS num FROM administrador WHERE usuario = "'.$numCont.'" AND clave = SHA1("'.$pass.'")';
    $result=bd_consulta($query);
    if (mysqli_fetch_assoc($result)["num"] == 1) {
      $query = 'SELECT * FROM administrador WHERE usuario = "'.$numCont.'" AND clave = SHA1("'.$pass.'")';
      $result=bd_consulta($query);
      $row = mysqli_fetch_assoc($result);

      SESSION_START();
      $_SESSION["login"] = "admin";
      $_SESSION["usuario"] = $row["usuario"];
      $_SESSION["nombre"] = $row["nombre"];

      header('Location: ../principalAdmin.php');
    }else {
      header('Location: ../index.php?usr='.$numCont.'&&error=Contraseña Incorrecta');
    }
  }
?>
