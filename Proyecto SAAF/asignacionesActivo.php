<?php
  $idTipo = 0;
  if (isset($_GET["tipo"])) {
    $idTipo = $_GET["tipo"];
  }
?>
<div class="Titulo">
  <p>Todos los Activos con Asignacion</p>
</div>
<div class="Texto">
  <p></p>
</div>

<form class="Formulario" action="index.php" method="get">
  <div class="Informacion">
    <div>
      <label for="tipo">Tipo de Activo</label>
      <select name="tipo">
        <option value="0" <?php if ($idTipo == 0) echo "selected"; ?> ></option>
        <?php
          $query = 'SELECT * FROM TIPO_ACTIVO';
          $result=bd_consulta($query);
          while ($row=mysqli_fetch_assoc($result)) {
            ?>
            <option value="<?php echo $row["ID_TIPO"] ?>" <?php if ($idTipo == $row["ID_TIPO"]) echo "selected"; ?> ><?php echo $row["TIPO"] ?></option>
            <?php
          }
        ?>
      </select>
    </div>
    <input type="hidden" name="op" value="131">
  </div>
  <div class="Botones">
    <div>
      <input type="submit" value="Buscar">
    </div>
  </div>
</form>

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
      if ($idTipo == 0) {
        $query = 'SELECT ASIGNACION.ID_ACTIVO, ACTIVO.NOMBRE AS ACTIVO, DESCRIPCION, TIPO, COUNT(*) AS NUMERO FROM ASIGNACION
                  INNER JOIN ACTIVO ON ASIGNACION.ID_ACTIVO = ACTIVO.ID_ACTIVO
                  INNER JOIN TIPO_ACTIVO ON ACTIVO.ID_TIPO = TIPO_ACTIVO.ID_TIPO
                  WHERE STATUS = 1 AND STATUS = 1
                  GROUP BY ASIGNACION.ID_ACTIVO
                  ORDER BY ACTIVO.NOMBRE';
      }else {
        $query = 'SELECT ASIGNACION.ID_ACTIVO, ACTIVO.NOMBRE AS ACTIVO, DESCRIPCION, TIPO, COUNT(*) AS NUMERO FROM ASIGNACION
                  INNER JOIN ACTIVO ON ASIGNACION.ID_ACTIVO = ACTIVO.ID_ACTIVO
                  INNER JOIN TIPO_ACTIVO ON ACTIVO.ID_TIPO = TIPO_ACTIVO.ID_TIPO
                  WHERE STATUS = 1 AND STATUS = 1 AND ACTIVO.ID_TIPO = '.$idTipo.'
                  GROUP BY ASIGNACION.ID_ACTIVO
                  ORDER BY ACTIVO.NOMBRE';
      }
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
