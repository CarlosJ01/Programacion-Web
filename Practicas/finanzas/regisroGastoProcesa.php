<?php
  SESSION_START();
  include('bd.php');

  $usr=$_SESSION['correo'];

  for ($i=0; $i<14; $i++) {
      $fch =$_GET["fecha".$i];
      $mont = $_GET["monto".$i];
      $desc = $_GET["descripcion".$i];
      $lug = $_GET["lugar".$i];
      $tpo_gast = $_GET["tipo_gasto".$i];

      if ($fch!="" && $tpo_gast!="" && $desc!="" && $lug!="" && $mont!="") {
        $qry='INSERT INTO gasto(descripcion,monto,fecha,lugar,tipo_gasto_descripcion,tipo_gasto_usuario_correo)
              VALUES("'.$desc.'", "'.$mont.'", "'.$fch.'", "'.$lug.'", "'.$tpo_gast.'", "'.$usr.'")';
        echo $qry;
        bd_consulta($qry);
      }
      header('Location: index.php?op=10');
  }
?>
