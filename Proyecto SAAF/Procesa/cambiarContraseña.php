<?php
  SESSION_START();
  include("bd.php");
  $nvoPass = $_POST["passNeo"];

  if ($_SESSION["tipo"] == "Normal") {
    $query = 'UPDATE USUARIO SET PASSWORD = "'.$nvoPass.'"
              WHERE CORREO = "'.$_SESSION["correo"].'"';
    $result=bd_consulta($query);
  }else if ($_SESSION["tipo"] == "Administrador"){
    $query = 'UPDATE ADMINISTRADOR SET PASSWORD = "'.$nvoPass.'"
              WHERE USUARIO = "'.$_SESSION["usuario"].'"';
    $result=bd_consulta($query);
  }

  header('Location: ../salir.php');
?>
