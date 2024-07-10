<?php
  $idTipo = 0;
  if (isset($_GET["tipo"])) {
    $idTipo = $_GET["tipo"];
  }
?>
<div class="Titulo">
  <p>Activos en Almacen</p>
</div>

<div class="Texto">
  <p>Todos los activos que existen en almacen</p>
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
    <input type="hidden" name="op" value="110">
  </div>
  <div class="Botones">
    <div>
      <input type="submit" value="Buscar">
    </div>
  </div>
</form>

<table>
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Descripcion</th>
      <th>Tipo</th>
      <th>Fecha de Compra</th>
      <th>Total</th>
      <th>Stock</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php
      if ($idTipo == 0) {
        $query = 'SELECT * FROM ACTIVO INNER JOIN TIPO_ACTIVO ON ACTIVO.id_tipo = TIPO_ACTIVO.id_tipo
                  ORDER BY fecha_compra DESC';
      }else {
        $query = 'SELECT * FROM ACTIVO INNER JOIN TIPO_ACTIVO ON ACTIVO.id_tipo = TIPO_ACTIVO.id_tipo
                  WHERE ACTIVO.id_tipo = '.$idTipo.'
                  ORDER BY fecha_compra DESC';
      }
      $result=bd_consulta($query);
      while ($row=mysqli_fetch_assoc($result)) {
        $row["FECHA_COMPRA"] = substr($row["FECHA_COMPRA"],8,2)."/".substr($row["FECHA_COMPRA"],5,2)."/".substr($row["FECHA_COMPRA"],0,4);
        ?>
        <tr>
          <th><?php echo $row["NOMBRE"] ?></th>
          <td><?php echo $row["DESCRIPCION"] ?></td>
          <td><?php echo $row["TIPO"] ?></td>
          <td><?php echo $row["FECHA_COMPRA"] ?></td>
          <td><?php echo $row["CANTIDAD_TOTAL"] ?></td>
          <td><?php echo $row["CANTIDAD_DISPONIBLE"] ?></td>
          <td><a href="index.php?op=111&&id=<?php echo $row["ID_ACTIVO"] ?>" id="Editar">Editar</a></td>
          <td><a href="Procesa\elminarActivo.php?id=<?php echo $row["ID_ACTIVO"] ?>" id="Eliminar">Eliminar</a></td>
        </tr>
        <?php
      }
    ?>
  </tbody>
</table>
