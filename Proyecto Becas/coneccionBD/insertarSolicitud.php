<?php
  $numCont = $_POST["numCont"];

  include("bd.php");
  //Insertamos
  $query = 'INSERT INTO solicitudes VALUES (NULL,"'.$numCont.'", "", "", "", "Por Asignar", "Sin Asignar", 0)';
  $result=bd_consulta($query);

  //Samos el Id
  $query = 'SELECT idSolicitud FROM solicitudes WHERE numeroControl = "'.$numCont.'" ORDER BY idSolicitud DESC LIMIT 1';
  $result=bd_consulta($query);
  $row=mysqli_fetch_assoc($result);
  $idSolicitud = $row["idSolicitud"];

  //Creamos las direcciones de los documentos
  $dirIngresos = "Documentos/".$numCont."/Ingresos".$idSolicitud.".pdf";
  $dirDomicilio = "Documentos/".$numCont."/Domicilio".$idSolicitud.".pdf";
  $dirSolicitud = "Documentos/".$numCont."/Solicitud".$idSolicitud.".pdf";

  //Actulizamos
  $qry = 'UPDATE solicitudes
          SET rutaIngresos = "'.$dirIngresos.'", rutaDomicilio = "'.$dirDomicilio.'", rutaSolicitud = "'.$dirSolicitud.'"
          WHERE idSolicitud = "'.$idSolicitud.'" ';
  $rsl = bd_consulta($qry);

  //Subimos Documentos
  if ( isset($_FILES) && isset($_FILES['ingresos']) && !empty($_FILES['ingresos']['name'] && !empty($_FILES['ingresos']['tmp_name']))) {
    if(! is_uploaded_file( $_FILES['ingresos']['tmp_name'] ) )//Si se subio el temporal
      exit;

    $dirOri = $_FILES['ingresos']['tmp_name'];//Direccion original del archivo
    $dirNva = substr(__DIR__, 0, -11).$dirIngresos;//Direccion nueva a donde se va a guardar el documento

    if (is_file($dirNva)) { //Si ya existe el archivo borramos el temporal
      @unlink(ini_get('upload_tmp_dir').$_FILES['ingresos']['tmp_name']);
    }

    if (!@move_uploaded_file($dirOri, $dirNva)) {//Subimos el documento
      @unlink(ini_get('upload_tmp_dir').$_FILES['ingresos']['tmp_name']);//Si no se subio borramos el temporal
      exit;
    }
  }

  if ( isset($_FILES) && isset($_FILES['domicilio']) && !empty($_FILES['domicilio']['name'] && !empty($_FILES['domicilio']['tmp_name']))) {
    if(! is_uploaded_file( $_FILES['domicilio']['tmp_name'] ) )//Si se subio el temporal
      exit;

    $dirOri = $_FILES['domicilio']['tmp_name'];//Direccion original del archivo
    $dirNva = substr(__DIR__, 0, -11).$dirDomicilio;//Direccion nueva a donde se va a guardar el documento

    if (is_file($dirNva)) { //Si ya existe el archivo borramos el temporal
      @unlink(ini_get('upload_tmp_dir').$_FILES['domicilio']['tmp_name']);
    }

    if (!@move_uploaded_file($dirOri, $dirNva)) {//Subimos el documento
      @unlink(ini_get('upload_tmp_dir').$_FILES['domicilio']['tmp_name']);//Si no se subio borramos el temporal
      exit;
    }
  }

  if ( isset($_FILES) && isset($_FILES['solicitud']) && !empty($_FILES['solicitud']['name'] && !empty($_FILES['solicitud']['tmp_name']))) {
    if(! is_uploaded_file( $_FILES['solicitud']['tmp_name'] ) )//Si se subio el temporal
      exit;

    $dirOri = $_FILES['solicitud']['tmp_name'];//Direccion original del archivo
    $dirNva = substr(__DIR__, 0, -11).$dirSolicitud;//Direccion nueva a donde se va a guardar el documento

    if (is_file($dirNva)) { //Si ya existe el archivo borramos el temporal
      @unlink(ini_get('upload_tmp_dir').$_FILES['solicitud']['tmp_name']);
    }

    if (!@move_uploaded_file($dirOri, $dirNva)) {//Subimos el documento
      @unlink(ini_get('upload_tmp_dir').$_FILES['solicitud']['tmp_name']);//Si no se subio borramos el temporal
      exit;
    }
  }

  header('Location: ../consultar.php');
?>
