<?php
  $id = $_GET["id"];

  include("bd.php");


  $query = 'DELETE FROM ASIGNACION WHERE ID_ACTIVO = '.$id.'';
  $result=bd_consulta($query);

  $query = 'DELETE FROM HISTORIAL WHERE ID_ACTIVO = '.$id.'';
  $result=bd_consulta($query);

  $query = 'DELETE FROM ACTIVO WHERE ID_ACTIVO = '.$id.'';
  $result=bd_consulta($query);

  header('Location: ../index.php?op=110');
?>
