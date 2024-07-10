<?php
  $nombre = $_GET["nombre"];

  $query = 'SELECT COUNT(*) AS NUM FROM ACTIVO WHERE NOMBRE LIKE "%'.$nombre.'%"';
  $result=bd_consulta($query);
  $num=mysqli_fetch_assoc($result)["NUM"];
  if ($num >= 1) {
    ?>
    <div class="Titulo">
      <p>Todos los Activos con el nombre de <?php echo $nombre ?></p>
    </div>
    <div class="Texto">
      <p></p>
    </div>
    <table class="tablaG">
      <thead>
        <tr>
          <th></th>
          <th>Activo</th>
          <th>Descripcion</th>
          <th>Tipo</th>
          <th>Numero de Asignaciones</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php
        $query = 'SELECT ASIGNACION.ID_ACTIVO, ACTIVO.NOMBRE AS ACTIVO, DESCRIPCION, TIPO, COUNT(*) AS NUMERO FROM ASIGNACION
                  INNER JOIN ACTIVO ON ASIGNACION.ID_ACTIVO = ACTIVO.ID_ACTIVO
                  INNER JOIN TIPO_ACTIVO ON ACTIVO.ID_TIPO = TIPO_ACTIVO.ID_TIPO
                  WHERE STATUS = 1 AND ACTIVO.NOMBRE LIKE "%'.$nombre.'%"
                  GROUP BY ASIGNACION.ID_ACTIVO
                  ORDER BY ACTIVO.NOMBRE';
        $result=bd_consulta($query);
        $cont = 1;
        while ($row=mysqli_fetch_assoc($result)) {
          ?>
          <tr>
            <th><?php echo $cont ?></th>
            <td><?php echo $row["ACTIVO"] ?></td>
            <td><?php echo $row["DESCRIPCION"] ?></td>
            <td><?php echo $row["TIPO"] ?></td>
            <td><?php echo $row["NUMERO"] ?></td>
            <td><a href="index.php?op=134&&id=<?php echo $row["ID_ACTIVO"] ?>" id="Pedir">Asignaciones</a></td>
          </tr>
          <?php
          $cont++;
        }
        ?>
      </tbody>
    </table>
    <?php
  }else {
    echo "No se encontraron activos con el nombre ".$nombre;
  }
?>
