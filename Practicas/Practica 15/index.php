<?php
  include('db.php');
  include('encabezado.php');

  //Mostrar el formulario
  $mensaje_from="";
  if (!$_SESSION['userOK']) {
    if ($op=='-1')
      $mensaje_from="Usuario o contraseña incorrectos";
    include('autenticar.php');
  }
  include('pie.php');
?>
