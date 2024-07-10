<?php
  include('bd.php');

  //Datos enviados
  $oldPass = $_POST['oldPass'];
  $nvoPass = $_POST['nvoPass'];

  //Informacion de secion
  SESSION_START();
  $usr=$_SESSION['correo'];

  //Si la contraseña anterior es correcta
  $qry='SELECT password FROM usuario WHERE correo="'.$usr.'"';
  if ($oldPass == mysqli_fetch_assoc(bd_consulta($qry))['password']) {
    //Actualizar contraseña
    $qry='UPDATE usuario SET password ="'.$nvoPass.'" WHERE correo="'.$usr.'" AND password="'.$oldPass.'"';
    //Si se actualizo regresa al login
    if (bd_consulta($qry) == 1) {
      header('Location: salir.php');
    } else {//Si no se registra marca error
      header('Location: index.php?op=37');
    }
  }else { //Si la contraseña no es correcta marca error
    header('Location: index.php?op=36');
  }
?>
