<?php
  $id = $_POST["id"];
  $tipo = $_POST["tipo"];
  $lugar = $_POST["lugar"];

  include("bd.php");

  $query = 'UPDATE solicitudes SET
            tipo = "'.$tipo.'", lugar = "'.$lugar.'", estatus = 1
            WHERE idSolicitud = "'.$id.'"';
  $result=bd_consulta($query);

  header('Location: ../solicitudes.php');
?>
