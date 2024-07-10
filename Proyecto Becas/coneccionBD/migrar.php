<?php
  include("bd.php");
  $periodo = $_POST["periodo"];
  $usr = $_POST["usuario"];
  $pass = $_POST["pass"];

  //Verifica el password
  $query = 'SELECT COUNT(*) AS num FROM administrador WHERE usuario = "'.$usr.'" AND clave = SHA1("'.$pass.'")';
  $result=bd_consulta($query);
  if (mysqli_fetch_assoc($result)["num"] == 1) {
    //Verifica el periodo
    $query = 'SELECT COUNT(*) AS num FROM periodo WHERE nombre = "'.$periodo.'"';
    $result=bd_consulta($query);
    if (mysqli_fetch_assoc($result)["num"] == 0) {
      //Registramos el periodo y sacamos el id
      $query = 'INSERT INTO periodo VALUES (NULL, "'.$periodo.'")';
      $result=bd_consulta($query);

      $query = 'SELECT idPeriodo FROM periodo WHERE nombre = "'.$periodo.'"';
      $result=bd_consulta($query);
      $idPeriodo=mysqli_fetch_assoc($result)["idPeriodo"];

      //Migramos
      //Migramos datos de solicitudes a historico y ponemos en un arreglo las direcciones de los archivos a eliminar
      $rutas = array();
      $query = 'SELECT * FROM solicitudes';
      $result=bd_consulta($query);
      while ($row=mysqli_fetch_assoc($result)) {
        $query = 'INSERT INTO historico VALUES (NULL, "'.$row["numeroControl"].'", "'.$row["tipo"].'", "'.$row["lugar"].'", "'.$row["estatus"].'", "'.$idPeriodo.'")';
        $rutas[] = $row["rutaIngresos"];
        $rutas[] = $row["rutaDomicilio"];
        $rutas[] = $row["rutaSolicitud"];
        bd_consulta($query);
      }

      //Eliminamos los archivos
      for ($i=0; $i <count($rutas); $i++) {
        $rutas[$i] = substr(__DIR__, 0, -11).$rutas[$i];
        unlink($rutas[$i]);
      }

      //Eliminamos los registros de solicitudes
      $query = 'DELETE FROM solicitudes';
      $result=bd_consulta($query);

      header('Location: ../historial.php?periodo='.$idPeriodo.'');
    }else {
      //Periodo ya registrado
      header('Location: ../becados.php?peri=Periodo '.$periodo.' ya registrado');
    }
  }else{
    //Password incorrecto
    header('Location: ../becados.php?pass=Contraseña Incorrecta');
  }
  /*Me mame*/
?>
