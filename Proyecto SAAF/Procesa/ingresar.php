<?php
  SESSION_START();
  include("bd.php");
  $email = $_POST["correo"];
  $pass = $_POST["password"];

  $query = 'SELECT COUNT(*) AS exis FROM USUARIO WHERE CORREO="'.$email.'" AND PASSWORD = "'.$pass.'"';
  $result=bd_consulta($query);
  $row=mysqli_fetch_assoc($result);
  $exis = $row["exis"];
  if ($exis == 1) {
    $query = 'SELECT * FROM USUARIO
              INNER JOIN DEPARTAMENTO ON USUARIO.id_departamento = DEPARTAMENTO.id_departamento
              WHERE CORREO="'.$email.'" AND PASSWORD = "'.$pass.'"';
    $result=bd_consulta($query);
    $row=mysqli_fetch_assoc($result);

    $_SESSION["OK"] = true;
    $_SESSION["correo"] = $row["CORREO"];
    $_SESSION["nombre"] = $row["NOMBRES"]." ".$row["APELLIDOS"];
    $_SESSION["telefono"] = $row["TELEFONO"];
    $_SESSION["password"] = $row["PASSWORD"];
    $_SESSION["departamento"] = $row["NOMBRE"];
    $_SESSION["tipo"] = "Normal";

    header('Location: ../index.php?op=10');
  }else {
    header('Location: ../index.php?op=1&&msm=Usuario o Contraseña incorrectos');
  }
?>
