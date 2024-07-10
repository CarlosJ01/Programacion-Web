<?php
  include('bd.php');

  $usr = $_POST['correo'];
  $qry = 'SELECT COUNT(*) as cont FROM usuario WHERE correo = "'.$usr.'"';
  $res = bd_consulta($qry);
  $row = mysqli_fetch_assoc($res);

  if ($row['cont'] == 1) {
    header('Location: index.php?op=-3');
  }
  else {
    $apePat = $_POST["paterno"];
    $apeMat = $_POST["materno"];
    $nom = $_POST["nombre"];
    $fch = $_POST["fecha"];
    $tel = $_POST["telefono"];
    $cod = $_POST["codigo"];
    $pass = $_POST["password"];
    $ocu = $_POST["ocupacion"];

    //Subir Fotos
    if ( isset($_FILES) && isset($_FILES['foto']) && !empty($_FILES['foto']['name'] && !empty($_FILES['foto']['tmp_name']))) {
      //Si no se procesa
      if(! is_uploaded_file( $_FILES['foto']['tmp_name'] ) ){
        //echo "Error el fichero encontrado no fue procesado por la subida";
        exit;
      }
      $fuente = $_FILES['foto']['tmp_name'];
      $dirDes = __DIR__.'\\Fotos\\'.$usr.'.jpg';

      if ( is_file($dirDes)) {
        //echo "Error: Ya existe almacenado un fichero con el mismo nombre";
        @unlink(ini_get('upload_tmp_dir').$_FILES['foto']['tmp_name']);
      }

      if (!@move_uploaded_file($fuente, $dirDes)) {
        //echo "Error: No se ha podido mover el fichero enviado";
        @unlink(ini_get('upload_tmp_dir').$_FILES['foto']['tmp_name']);
      }
      //echo "Fichero subido correctamente a :".$dirDes;
    }
    if ($fuente=="") {
      $dir="Fotos/default.png";
    }else {
      $dir="Fotos/".$usr.".jpg";
    }
    
    $qry = 'INSERT INTO usuario(correo, paterno, materno, nombre, fecha_nacimiento, telefono, codigo_postal, PASSWORD, ocupacion_clave, imagen)
    VALUES("'.$usr.'","'.$apePat.'","'.$apeMat.'","'.$nom.'","'.$fch.'","'.$tel.'","'.$cod.'","'.$pass.'",'.$ocu.',"'.$dir.'")';
    $res = bd_consulta($qry);

    if ($res)
      header('Location: index.php');
    else{
      header('Location: index.php?op=-4');
    }
  }
?>
