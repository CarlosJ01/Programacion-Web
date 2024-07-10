<?php
  include("bd.php");
  $id = $_POST["id"];
  $nom = $_POST["nombre"];
  $des = $_POST["descripcion"];
  $can = $_POST["cantT"];
  $fch = $_POST["fecha"];
  $tpo = $_POST["tipo"];

  $query = 'UPDATE ACTIVO SET
            NOMBRE = "'.$nom.'",
            DESCRIPCION = "'.$des.'",
            CANTIDAD_TOTAL = "'.$can.'",
            FECHA_COMPRA = "'.$fch.'",
            ID_TIPO = "'.$tpo.'"
            WHERE ID_ACTIVO = "'.$id.'"';
  $result=bd_consulta($query);

  header('Location: ../index.php?op=110');
?>
