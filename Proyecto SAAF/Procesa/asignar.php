<?php
  date_default_timezone_set('America/Mexico_City');
  include("bd.php");

  $idAsig = $_POST["idAsignacion"];
  $canDis = $_POST["canDis"];
  $can = $_POST["can"];
  $fch = date('Y-m-d');

  $query = 'UPDATE ASIGNACION
            SET CANTIDAD = '.$can.', FECHA = "'.$fch.'", STATUS = 1
            WHERE ID_ASIGNACION = "'.$idAsig.'"';
  $result=bd_consulta($query);

  $query = 'SELECT ID_ACTIVO FROM ASIGNACION WHERE ID_ASIGNACION = '.$idAsig.'';
  $result=bd_consulta($query);
  $row=mysqli_fetch_assoc($result);
  $nvoDis = $canDis-$can;

  $query = 'UPDATE ACTIVO
            SET CANTIDAD_DISPONIBLE = '.$nvoDis.'
            WHERE ID_ACTIVO = "'.$row["ID_ACTIVO"].'"';
  $result=bd_consulta($query);

  $query = 'SELECT * FROM ASIGNACION WHERE ID_ASIGNACION = '.$idAsig.'';
  $result=bd_consulta($query);
  $row=mysqli_fetch_assoc($result);

  $query = 'INSERT INTO HISTORIAL VALUES (NULL, "'.$row["CORREO"].'", "'.$row["ID_ACTIVO"].'", "'.$row["ID_UBICACION"].'", "'.$row["CANTIDAD"].'", "'.$row["FECHA"].'", "ASIGNACION")';
  $result=bd_consulta($query);
  
  header('Location: ../index.php?op=120');
?>
