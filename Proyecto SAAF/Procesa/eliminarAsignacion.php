<?php
  $idAsig = $_GET["idAsignacion"];

  include("bd.php");
  $query = 'DELETE FROM ASIGNACION
            WHERE ID_ASIGNACION = '.$idAsig.'';
  $result=bd_consulta($query);

  header('Location: ../index.php?op=120');
?>
