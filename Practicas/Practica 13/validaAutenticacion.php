<?php
  include('bd_consulta.php');
  echo "<h1>Validando la conexion</h1>";

  $usr = $_POST['usuario'];
  $pass = $_POST['password'];

  $query = "SELECT COUNT(*) AS num FROM usuario WHERE correo = '".$usr."' AND PASSWORD= '".$pass."'";
  //echo "<br>".$query;
  $result = bd_consulta($query);

  $row = mysqli_fetch_assoc($result);
  if($row['num'] == 1)
    echo "<h2>Usuario valido</h2><br>";
  else
    echo "<h2>Usuario invalido</h2><br>";
?>
