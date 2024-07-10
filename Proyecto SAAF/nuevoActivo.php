<div class="Titulo">
  <p>Registrar un Activo</p>
</div>

<div class="Texto">
  <p>Llena el formulario para registrar un nuevo activo</p>
</div>

<script src="JS/formularioNuevoActivo.js"></script>

<form class="Formulario" action="Procesa/nuevoActivo.php" method="post" onsubmit="return formularioNuevoActivo('<?php echo date('Y-m-d'); ?>')">
  <div class="Informacion">
    <div>
      <label for="nombre">Nombre: </label>
      <input type="text" name="nombre" id="nombre" placeholder="Ingresa el nombre del activo" required>
    </div>
    <div>
      <label for="descripcion">Descripcion: </label>
      <textarea name="descripcion" rows="10" cols="55"></textarea>
    </div>
    <div>
      <label for="cantT">Cantidad: </label>
      <input type="number" name="cantT" id="cantT" placeholder="Ingresa la cantidad total" required>
    </div>
    <div>
      <label for="fecha">Fecha de Compra: </label>
      <input type="date" name="fecha" id="fecha" value="<?php echo date('Y-m-d'); ?>" required>
    </div>
    <div>
      <label for="tipo">Tipo de Activo</label>
      <select name="tipo" id="tipo">
        <option value="0"></option>
        <?php
          $query = 'SELECT * FROM TIPO_ACTIVO';
          $result=bd_consulta($query);
          while ($row=mysqli_fetch_assoc($result)) {
            ?>
            <option value="<?php echo $row["ID_TIPO"] ?>"><?php echo $row["TIPO"] ?></option>
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
