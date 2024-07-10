<?php
  include("bd.php");
  $email = $_POST["correo"];
  $nombres = $_POST["nombres"];
  $apellidos = $_POST["apellidos"];
  $telefono = "00 00 00 00 00";//$_POST["telefono"];
  $departamento = $_POST["departamento"];
  $password = $_POST["password01"];

  $query = 'SELECT COUNT(*) AS exis FROM USUARIO WHERE CORREO="'.$email.'" AND PASSWORD = "'.$password.'"';
  $result=bd_consulta($query);
  $row=mysqli_fetch_assoc($result);
  $exis = $row["exis"];
  if ($exis == 0) {
    $query = 'INSERT INTO USUARIO VALUES ("'.$email.'", "'.$nombres.'", "'.$apellidos.'", "'.$telefono.'", "'.$password.'", '.$departamento.');';
    $result=bd_consulta($query);
    header('Location: ../index.php?op=1');
  }else {
      header('Location: ../index.php?op=2&&msm=Correo ya registrado');
  }
?>
