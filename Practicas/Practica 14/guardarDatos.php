
<?php
  include('bd_consulta.php');
  
  $usr = $_POST['correo'];

  $qry = 'SELECT COUNT(*) as cont FROM usuario WHERE correo = "'.$usr.'"';
  $res = bd_consulta($qry);
  $row = mysqli_fetch_assoc($res);

  if ($row['cont'] == 1) {
    echo "Correo ya repetido<br>";
  }
  else {
    echo "Puedes sin problemas registrar los demas datos<br>";
    $apePat = $_POST["paterno"];
    $apeMat = $_POST["materno"];
    $nom = $_POST["nombre"];
    $fch = $_POST["fecha"];
    $tel = $_POST["telefono"];
    $cod = $_POST["codigo"];
    $pass = $_POST["password"];
    $ocu = $_POST["ocupacion"];

    $qry = 'INSERT INTO usuario(correo, paterno, materno, nombre, fecha_nacimiento, telefono, codigo_postal, PASSWORD, ocupacion_clave)
    VALUES("'.$usr.'","'.$apePat.'","'.$apeMat.'","'.$nom.'","'.$fch.'","'.$tel.'","'.$cod.'","'.$pass.'",'.$ocu.')';
    $res = bd_consulta($qry);

    if ($res)
      echo "Datos almacenados<br>";
    else
      echo "Ocurrio algun error<br>";
  }
?>
