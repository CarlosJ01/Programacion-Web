<?php
  $idAsi = $_GET["idAsignacion"];
  $query = 'SELECT ACTIVO.NOMBRE AS ACTIVO, DESCRIPCION, CANTIDAD_DISPONIBLE, CANTIDAD, EDIFICIO.ID_EDIFICIO, EDIFICIO.EDIFICIO, UBICACION.NOMBRE AS LUGAR FROM ASIGNACION
            INNER JOIN ACTIVO ON ASIGNACION.ID_ACTIVO = ACTIVO.ID_ACTIVO
            INNER JOIN UBICACION ON ASIGNACION.ID_UBICACION = UBICACION.ID_UBICACION
            INNER JOIN EDIFICIO ON UBICACION.ID_EDIFICIO = EDIFICIO.ID_EDIFICIO
            WHERE ID_ASIGNACION = '.$idAsi.'';
  $result=bd_consulta($query);
  $row=mysqli_fetch_assoc($result);
?>

<div class="Titulo">
  <p>Asignar Activo Fijo</p>
</div>
<div class="Texto">
  <p>Asigna el activo, tambien puedes alterar la cantidad deseada</p>
</div>

<script src="JS/formularioPeticion.js"></script>

<form class="Formulario" action="Procesa/asignar.php" method="post" onsubmit="return peticion()">
  <div class="Informacion">
    <input type="hidden" name="idAsignacion" value="<?php echo $idAsi ?>">
    <div>
      <label for="nom">Nombre: </label>
      <input type="text" name="nom" value="<?php echo $row["ACTIVO"] ?>" readonly>
    </div>
    <div>
      <label for="des">Descripcion: </label>
      <textarea name="des" rows="auto" cols="50" readonly><?php echo $row["DESCRIPCION"] ?></textarea>
    </div>
    <div>
      <label>Cantidad Disponible: </label>
      <input type="text" name="canDis" id="canDis" value="<?php echo $row["CANTIDAD_DISPONIBLE"] ?>" readonly>
    </div>

    <div>
      <label for="can">Cantidad Deseada: </label>
      <input type="number" name="can" id="can" placeholder="Ingrese la cantidad que desea" value="<?php echo $row["CANTIDAD"] ?>" required>
    </div>

    <div>
      <label for="edif">Edificio: </label>
      <select name="edif" id="edif">
        <option value="<?php echo $row["ID_EDIFICIO"] ?>"><?php echo $row["EDIFICIO"] ?></option>
      </select>
    </div>

    <div>
      <label for="nomLug">Nombre del Lugar: </label>
      <input type="text" name="nomLug" id="nomLug" value="<?php echo $row["LUGAR"] ?>" readonly>
    </div>
  </div>
  <div class="Botones">
    <div>
      <input type="submit" value="Asignar">
      <input type="reset" value="Resetiar">
    </div>
  </div>
</form>
