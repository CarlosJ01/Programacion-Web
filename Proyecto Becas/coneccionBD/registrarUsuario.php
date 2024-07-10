<?php
  include("bd.php");
  $numCont = $_POST["numeroControl"];
  $nombre = $_POST["nombre"];
  $carrera = $_POST["carrera"];
  $telefono = $_POST["telefono"];
  $direccion = $_POST["direccion"];
  $clave = $_POST["password1"];

  $query = 'SELECT COUNT(*) AS num FROM usuarios WHERE numeroControl = "'.$numCont.'"';
  $result=bd_consulta($query);

  if (mysqli_fetch_assoc($result)["num"] == 0) {
    $query = 'INSERT INTO usuarios VALUES("'.$numCont.'", "'.$nombre.'", "'.$carrera.'", "'.$telefono.'", "'.$direccion.'", SHA1("'.$clave.'"))';
    $result=bd_consulta($query);

    $carp = substr(__DIR__, 0, -11)."Documentos/".$numCont;
    mkdir($carp, 0777);

    header('Location: ../index.php');
  }else {
    header('Location: ../registrar.php?error=Numero de control registrado');
  }
  //
?>
