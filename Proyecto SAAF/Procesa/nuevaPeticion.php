<?php
  SESSION_START();
  date_default_timezone_set('America/Mexico_City');
  include("bd.php");

  $usr = $_SESSION["correo"];
  $idActivo = $_POST["idActivo"];
  $can = $_POST["can"];
  $fch = date('Y-m-d');
  $edi = $_POST["edif"];
  $nomLug = strtoupper($_POST["nomLug"]);

  $query = 'SELECT COUNT(*) AS exis FROM UBICACION
            WHERE NOMBRE = "'.$nomLug.'" AND ID_EDIFICIO = "'.$edi.'"';
  $result=bd_consulta($query);
  $row=mysqli_fetch_assoc($result);
  if ($row["exis"] == 0) {
    $query = 'INSERT INTO UBICACION VALUES (NULL, "'.$nomLug.'", '.$edi.')';
    $result=bd_consulta($query);
  }
  $query = 'SELECT ID_UBICACION FROM UBICACION
            WHERE NOMBRE = "'.$nomLug.'" AND ID_EDIFICIO = "'.$edi.'"';
  $result=bd_consulta($query);
  $row=mysqli_fetch_assoc($result);
  $idUbi = $row["ID_UBICACION"];

  $query = 'INSERT INTO ASIGNACION VALUES (NULL, "'.$usr.'", "'.$idActivo.'", '.$can.', "'.$fch.'", '.$idUbi.', 0)';
  $result=bd_consulta($query);

  header('Location: ../index.php?op=20');
?>
