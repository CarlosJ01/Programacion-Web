<?php
  date_default_timezone_set('America/Mexico_City');
  include("bd.php");

  $idAsig = $_GET["id"];

  $query = 'SELECT * FROM ASIGNACION WHERE ID_ASIGNACION = "'.$idAsig.'"';
  $result=bd_consulta($query);
  $row=mysqli_fetch_assoc($result);

  $correo = $row["CORREO"];
  $activo = $row["ID_ACTIVO"];
  $cantidad = $row["CANTIDAD"];
  $fch = date('Y-m-d');
  $ubicacion = $row["ID_UBICACION"];

  $query = 'SELECT CANTIDAD_DISPONIBLE FROM ACTIVO WHERE ID_ACTIVO = "'.$activo.'"';
  $result=bd_consulta($query);
  $row=mysqli_fetch_assoc($result);
  $cantDis = $row["CANTIDAD_DISPONIBLE"];

  $nvaCan = $cantDis + $cantidad;
  $query = 'UPDATE ACTIVO
            SET CANTIDAD_DISPONIBLE = '.$nvaCan.'
            WHERE ID_ACTIVO = "'.$activo.'"';
  $result=bd_consulta($query);

  $query = 'DELETE FROM ASIGNACION WHERE ID_ASIGNACION="'.$idAsig.'"';
  $result=bd_consulta($query);

  $query = 'INSERT INTO HISTORIAL VALUES (NULL, "'.$correo.'", "'.$activo.'", "'.$ubicacion.'", "'.$cantidad.'", "'.$fch.'", "LIBERACION")';
  $result=bd_consulta($query);

  header('Location: ../index.php?op=130');
?>
