<?php
  include("bd.php");
  $id = $_GET["id"];

  $query = 'UPDATE ACTIVO SET ID_TIPO = 6
            WHERE ID_TIPO = "'.$id.'"';
  $result=bd_consulta($query);

  $query = 'DELETE FROM TIPO_ACTIVO WHERE ID_TIPO = '.$id.'';
  $result=bd_consulta($query);

  header('Location: ../index.php?op=113');
?>
