<div class="Titulo">
  <p>Nuevo Tipo de Activo</p>
</div>

<div class="Texto">
  <p>Registra un nuevo tipo de activo</p>
</div>

<form class="Formulario" action="Procesa/nuevoTipoActivo.php" method="post">
  <div class="Informacion">
    <div>
      <label for="nombre">Nombre del tipo: </label>
      <input type="text" name="nombre" placeholder="Ingresa el nuevo tipo" required>
    </div>
  </div>
  <div class="Botones">
    <div class="Botones">
      <input type="submit" value="Registrar">
    </div>
  </div>
</form>

<table class="tablaCh">
  <thead>
    <tr>
      <th>Tipo</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php
    $query = 'SELECT * FROM TIPO_ACTIVO';
    $result=bd_consulta($query);
    while ($row=mysqli_fetch_assoc($result)) {
      ?>
      <tr>
        <?php if ($row["TIPO"] != "Sin Tipo"): ?>
          <th><?php echo $row["TIPO"] ?></th>
          <td><a href="Procesa\eliminarTipoActivo.php?id=<?php echo $row["ID_TIPO"] ?>" id="Eliminar">Eliminar</a></td>
        <?php endif; ?>
      </tr>
      <?php
    }
    ?>
  </tbody>
</table>
