<?php
  $idActivo = $_GET["id"];
  $query = 'SELECT NOMBRE, DESCRIPCION, CANTIDAD_DISPONIBLE FROM ACTIVO
            WHERE ID_ACTIVO = '.$idActivo.'';
  $result=bd_consulta($query);
  $row=mysqli_fetch_assoc($result);
?>

<div class="Titulo">
  <p>Realizar una Peticion</p>
</div>
<div class="Texto">
  <p>Llenas los campos faltantes para hacer la peticion</p>
</div>

<script src="JS/formularioPeticion.js"></script>

<form class="Formulario" action="Procesa/nuevaPeticion.php" method="post" onsubmit="return peticion()">
  <div class="Informacion">
    <input type="hidden" name="idActivo" value="<?php echo $idActivo ?>">
    <div>
      <label for="nom">Nombre: </label>
      <input type="text" name="nom" value="<?php echo $row["NOMBRE"] ?>" readonly>
    </div>
    <div>
      <label for="des">Descripcion: </label>
      <textarea name="des" rows="auto" cols="50" readonly><?php echo $row["DESCRIPCION"] ?></textarea>
    </div>
    <div>
      <label>Cantidad Disponible: </label>
      <input type="text" id="canDis" value="<?php echo $row["CANTIDAD_DISPONIBLE"] ?>" readonly>
    </div>

    <div>
      <label for="can">Cantidad Deseada: </label>
      <input type="number" name="can" id="can" placeholder="Ingrese la cantidad que desea" required>
    </div>

    <div>
      <label for="edif">Edificio: </label>
      <select name="edif" id="edif">
        <option value="0"></option>
        <?php
          $query = 'SELECT * FROM EDIFICIO';
          $result=bd_consulta($query);
          while ($row=mysqli_fetch_assoc($result)) {
            ?>
            <option value="<?php echo $row["ID_EDIFICIO"] ?>"><?php echo $row["EDIFICIO"] ?></option>
            <?php
          }
        ?>
      </select>
    </div>

    <div>
      <label for="nomLug">Nombre del Lugar: </label>
      <input type="text" name="nomLug" id="nomLug" placeholder="Ej. Salon K4">
    </div>
  </div>
  <div class="Botones">
    <div>
      <input type="submit" value="Pedir">
    </div>
  </div>
</form>
