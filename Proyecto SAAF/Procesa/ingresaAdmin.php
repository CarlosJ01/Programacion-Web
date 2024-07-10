<?php
  SESSION_START();
  include("bd.php");
  $usuario = $_POST["usuario"];
  $pass = $_POST["password"];

  $query = 'SELECT COUNT(*) AS exis FROM ADMINISTRADOR WHERE USUARIO="'.$usuario.'" AND PASSWORD = "'.$pass.'"';
  $result=bd_consulta($query);
  $row=mysqli_fetch_assoc($result);
  $exis = $row["exis"];
  if ($exis == 1) {
    $query = 'SELECT * FROM ADMINISTRADOR WHERE USUARIO="'.$usuario.'" AND PASSWORD = "'.$pass.'"';
    $result=bd_consulta($query);
    $row=mysqli_fetch_assoc($result);

    $_SESSION["OK"] = true;
    $_SESSION["usuario"] = $usuario;
    $_SESSION["nombre"] = $row["NOMBRE"];
    $_SESSION["password"] = $row["PASSWORD"];
    $_SESSION["tipo"] = "Administrador";

    header('Location: ../index.php?op=100');
  }else {
    header('Location: ../index.php?op=3&&msm=Usuario o Contraseña incorrectos');
  }
?>
