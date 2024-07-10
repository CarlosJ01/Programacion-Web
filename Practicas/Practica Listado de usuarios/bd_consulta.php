<?php
  function bd_consulta($query){
    $hostname = "localhost";
    $user = "root";
    $password = "";
    $db = "finanzas";

    $connection = mysqli_connect($hostname, $user, $password);
    if (!$connection->set_charset("utf8")) {
      printf("Error cargado el conjunto de caracteres utf8: %s\n", $mysqli->error);
      exit();
    }
    if ($connection == false)
      echo "Ha habido un error <br>".mysqli_connect_error();
    //else
      //echo "Conectado a la base de datos<br>";

    mysqli_select_db($connection, $db);
    $result =  mysqli_query($connection, $query);
    mysqli_close($connection);
    return $result;
  }
?>
