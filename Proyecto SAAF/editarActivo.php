<?php
  $id = $_GET["id"];

  $query = 'SELECT * FROM ACTIVO WHERE ID_ACTIVO = '.$id.'';
  $result=bd_consulta($query);
  $row=mysqli_fetch_assoc($result);
?>

<div class="Titulo">
  <p>Editar un Activo</p>
</div>

<div class="Texto">
  <p>Llena el formulario para editar un activo</p>
</div>

<script src="JS/formularioNuevoActivo.js"></script>

<form class="Formulario" action="Procesa/editarAcivo.php" method="post" onsubmit="return formularioNuevoActivo('<?php echo date('Y-m-d'); ?>')">
  <input type="hidden" name="id" value="<?php echo $id ?>">
  <div class="Informacion">
    <div>
      <label for="nombre">Nombre: </label>
      <input type="text" name="nombre" id="nombre" placeholder="Ingresa el nombre del activo" value="<?php echo $row["NOMBRE"] ?>" required>
    </div>
    <div>
      <label for="descripcion">Descripcion: </label>
      <textarea name="descripcion" rows="10" cols="55"><?php echo $row["DESCRIPCION"] ?></textarea>
    </div>
    <div>
      <label for="cantT">Cantidad: </label>
      <input type="number" name="cantT" id="cantT" placeholder="Ingresa la cantidad total" value="<?php echo $row["CANTIDAD_TOTAL"] ?>" required>
    </div>
    <div>
      <label for="fecha">Fecha de Compra: </label>
      <input type="date" name="fecha" id="fecha" value="<?php echo $row["FECHA_COMPRA"] ?>" required>
    </div>
    <div>
      <label for="tipo">Tipo de Activo</label>
      <select name="tipo" id="tipo">
        <option value="0"></option>
        <?php
          $tpo = $row["ID_TIPO"];
          $query = 'SELECT * FROM TIPO_ACTIVO';
          $result=bd_consulta($query);
          while ($row=mysqli_fetch_assoc($result)) {
            ?>
            <option value="<?php echo $row["ID_TIPO"] ?>" <?php if ($row["ID_TIPO"] == $tpo) echo "selected";?>><?php echo $row["TIPO"] ?></option>
            <?php
          }
        ?>
      </select>
    </div>
  </div>
  <div class="Botones">
    <div>
      <input type="submit" value="Enviar">
      <input type="reset"  value="Borrar">
    </div>
  </div>
</form>
