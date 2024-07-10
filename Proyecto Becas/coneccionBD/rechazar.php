<?php
  $id = $_POST["id"];
  include("bd.php");

  $query = 'UPDATE solicitudes SET
            tipo = " ", lugar = " ", estatus = 2
            WHERE idSolicitud = "'.$id.'"';
  $result=bd_consulta($query);

  header('Location: ../solicitudes.php');
?>
