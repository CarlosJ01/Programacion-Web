<link rel="stylesheet" href="estilos.css">
<div id="principal">
<h2>Validar Usuario</h2>
<?php
  include('bd_consulta.php');

  $usr = $_POST['usuario'];
  $pass = $_POST['password'];

  $query = "SELECT COUNT(*) AS num FROM usuario WHERE correo = '".$usr."' AND PASSWORD= '".$pass."'";
  $result = bd_consulta($query);
  $row = mysqli_fetch_assoc($result);

  if($row['num'] == 1){
    $query = "SELECT usuario.*, descripcion
              FROM usuario INNER JOIN ocupacion ON ocupacion_clave = clave
              WHERE correo = '".$usr."' AND PASSWORD= '".$pass."'";
    $result = bd_consulta($query);
    $row = mysqli_fetch_assoc($result);

    echo "<h1>Usuario valido</h1><br>";
    echo "<h3>Bienvenido</h3><br>";
    echo "Correo: ".$row['correo']."<br>";
    echo "Nombre completo: ".$row['nombre']." ".$row['paterno']." ".$row['materno']."<br>";
    echo "Fecha de nacimiento: ".$row['fecha_nacimiento']."<br>";
    echo "Telefono: ".$row['telefono']."<br>";
    echo "Codigo Postal: ".$row['codigo_postal']."<br>";
    echo "Ocupacion: ".$row['descripcion']."<br>";
  }

  else{
    $query = "SELECT * FROM usuario WHERE correo = '".$usr."'";
    $result = bd_consulta($query);
    $row = mysqli_fetch_assoc($result);

    if ($row['correo'] == $usr) {
      echo "<h3>Contraseña incorrecta</h3>";
      echo "Por favor ".$row['nombre']." ".$row['paterno']." ".$row['materno']." ";
      echo "Ingrese su contraseña correctamente";
    }
    else
      echo "<h3>Contraseña y usuario incorrectos</h3>";
  }
?>
</div>
<footer id="pie">
  Derechos Reservados &copy; 2019 por la tarde
</footer>
