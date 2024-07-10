<?php
  $idTipo = 0;
  if (isset($_GET["tipo"])) {
    $idTipo = $_GET["tipo"];
  }
?>

<div class="Titulo">
  <p>Peticiones de Activos</p>
</div>

<div class="Texto">
  <p>Listado de todos los activos disponibles, seleccione alguno para hacer la peticion</p>
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
    <input type="hidden" name="op" value="20">
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
      <th>Stock</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php
      if ($idTipo == 0) {
        $query = 'SELECT * FROM ACTIVO INNER JOIN TIPO_ACTIVO ON ACTIVO.ID_TIPO = TIPO_ACTIVO.ID_TIPO
                  WHERE CANTIDAD_DISPONIBLE > 0
                  ORDER BY NOMBRE DESC';
      }else {
        $query = 'SELECT * FROM ACTIVO INNER JOIN TIPO_ACTIVO ON ACTIVO.ID_TIPO = TIPO_ACTIVO.ID_TIPO
                  WHERE ACTIVO.ID_TIPO = '.$idTipo.' AND CANTIDAD_DISPONIBLE > 0
                  ORDER BY NOMBRE DESC';
      }
      $result=bd_consulta($query);
      while ($row=mysqli_fetch_assoc($result)) {
        $row["FECHA_COMPRA"] = substr($row["FECHA_COMPRA"],8,2)."/".substr($row["FECHA_COMPRA"],5,2)."/".substr($row["FECHA_COMPRA"],0,4);
        ?>
        <tr>
          <th><?php echo $row["NOMBRE"] ?></th>
          <td><?php echo $row["DESCRIPCION"] ?></td>
          <td><?php echo $row["TIPO"] ?></td>
          <td><?php echo $row["CANTIDAD_DISPONIBLE"] ?></td>
          <td><a href="index.php?op=21&&id=<?php echo $row["ID_ACTIVO"] ?>" id="Pedir">Pedir</a></td>
        </tr>
        <?php
      }
    ?>
  </tbody>
</table>
