<?php
  $id = $_POST["idConvocatoria"];
  $ruta = $_POST["ruta"];

  //Resubimos el documento
  if ( isset($_FILES) && isset($_FILES['convoctoria']) && !empty($_FILES['convoctoria']['name'] && !empty($_FILES['convoctoria']['tmp_name']))) {
    if(! is_uploaded_file( $_FILES['convoctoria']['tmp_name'] ) )//Si se subio el temporal
      exit;

    $dirOri = $_FILES['convoctoria']['tmp_name'];//Direccion original del archivo
    $dirNva = substr(__DIR__, 0, -11).$ruta;

    if (!@move_uploaded_file($dirOri, $dirNva)) {//Subimos el documento
      @unlink(ini_get('upload_tmp_dir').$_FILES['convoctoria']['tmp_name']);//Si no se subio borramos el temporal
      exit;
    }
  }

  header('Location: ../principalAdmin.php');
?>
