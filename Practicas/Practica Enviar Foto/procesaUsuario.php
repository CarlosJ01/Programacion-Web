<link rel="stylesheet" href="estiloFicha.css">

<body>
<div id="principal">
  <header id="cabecera">
    <h1>Informacion Personal</h1>
  </header>

  <section id="seccion">

<?php
  $apePat = $_POST["paterno"];
  $apeMat = $_POST["materno"];
  $nom = $_POST["nombre"];
  $fch = $_POST["fecha"];
  $tel = $_POST["telefono"];
  $ocu = $_POST["ocupacion"];
  $cod = $_POST["codigo"];
  $cor = $_POST["correo"];

  //Si si se subio la Foto
  if ( isset($_FILES) && isset($_FILES['foto']) && !empty($_FILES['foto']['name'] && !empty($_FILES['foto']['tmp_name']))) {
    //Si no se procesa
    if(! is_uploaded_file( $_FILES['foto']['tmp_name'] ) ){
      //echo "Error el fichero encontrado no fue procesado por la subida";
      exit;
    }

    $fuente = $_FILES['foto']['tmp_name'];
    $dirDes = __DIR__.'\\Fotos\\'.$_FILES['foto']['name'];

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

  echo "<div id='Foto'>";
  echo "<img src='"."Fotos/".$_FILES['foto']['name']."' border='0' width='300' height='300'>";
  echo "</div>";
  echo "<br>";

  echo "<div id='Informacion'>";
  echo "<span>Nombre Completo: ".$nom." ".$apePat." ".$apeMat."</span>";
  echo "<br>";
  echo "<span>Fecha de Nacimiento: ".$fch."</span>";
  echo "<br>";
  echo "<span>Telefono: ".$tel."</span>";
  echo "<br>";

  $ocuNom = "";
  switch ($ocu) {
    case '1':
        $ocuNom="Empleado";
      break;
    case '2':
        $ocuNom="Hogar";
      break;
    case '3':
        $ocuNom="Independiente";
      break;
    case '4':
        $ocuNom="Empresario";
      break;
  }

  echo "<span>Ocupación: ".$ocuNom."</span>";
  echo "<br>";
  echo "<span>Codigo Postal: ".$cod."</span>";
  echo "<br>";
  echo "<span>Correo electrónico: ".$cor."</span>";
  echo "</div>";
?>

</section>
</div>
</body>
