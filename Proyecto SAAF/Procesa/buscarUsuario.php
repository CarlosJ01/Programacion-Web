<?php
  $email = $_POST["correo"];

  include("bd.php");

  $query = 'SELECT COUNT(*) AS exis FROM USUARIO WHERE CORREO="'.$email.'"';
  $result=bd_consulta($query);
  $row=mysqli_fetch_assoc($result);
  $exis = $row["exis"];
  if ($exis == 1) {
    header('Location: ../index.php?op=135&&id='.$email.'');
  }else {
    header('Location: ../index.php?op=136&&msm=Usuario inexistente');
  }
?>
