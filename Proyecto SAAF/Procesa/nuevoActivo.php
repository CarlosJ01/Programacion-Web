<?php
  include("bd.php");
  $nom = $_POST["nombre"];
  $des = $_POST["descripcion"];
  $can = $_POST["cantT"];
  $fch = $_POST["fecha"];
  $tpo = $_POST["tipo"];

  $query = 'INSERT INTO ACTIVO VALUES(NULL, "'.$nom.'", "'.$des.'", '.$can.', '.$can.', "'.$fch.'", '.$tpo.')';
  $result=bd_consulta($query);

  header('Location: ../index.php?op=110');
?>
