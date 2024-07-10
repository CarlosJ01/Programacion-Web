<link rel="stylesheet" href="estilos.css">
<link rel="stylesheet" href="estiloTabla.css">

<div id="principal">
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
      listado();
    else
      echo "Usuario no registrado";
  }
?>

<?php
function listado(){
  echo "<h1>Listado de Usuarios</h1>
        <p>Todos los usuarios registrados en la base de datos</p>
        <table class='tabla'>
          <thead>
            <tr>
              <td>Correo</td>
              <td>Nombre Completo</td>
              <td>Fecha de Nacimiento</td>
              <td>Telefono</td>
              <td>Codigo Postal</td>
              <td>Ocupacion</td>
            </tr>
          </thead>";

  $qry = "SELECT usuario.*, descripcion FROM usuario INNER JOIN ocupacion ON ocupacion_clave = clave";
  $res = bd_consulta($qry);

  while ($row = mysqli_fetch_assoc($res)) {
      echo "<tr>";
        echo "<td>".$row['correo']."</td>";
        echo "<td>".$row['nombre']." ".$row['paterno']." ".$row['materno']."</td>";
        echo "<td>".$row['fecha_nacimiento']."</td>";
        echo "<td>".$row['telefono']."</td>";
        echo "<td>".$row['codigo_postal']."</td>";
        echo "<td>".$row['descripcion']."</td>";
      echo "</tr>";
  }
  echo "</table>";
}
?>
</div>
