<?php
  include("bd.php");
  $nom = $_POST["nombre"];

  $query = 'INSERT INTO TIPO_ACTIVO VALUES (NULL, "'.$nom.'")';
  $result=bd_consulta($query);

  header('Location: ../index.php?op=113');
?>
