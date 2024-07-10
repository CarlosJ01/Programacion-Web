<?php
  $id = $_POST["idConvocatoria"];
  $nom = $_POST["nombre"];
  $des = $_POST["desc"];
  $fch = $_POST["fecha"];
  include("bd.php");

  $query = 'UPDATE convocatorias SET
            nombre = "'.$nom.'", descripcion = "'.$des.'", fecha ="'.$fch.'"
            WHERE idConvocatoria = "'.$id.'"';
  $result=bd_consulta($query);

  header('Location: ../principalAdmin.php');
?>
