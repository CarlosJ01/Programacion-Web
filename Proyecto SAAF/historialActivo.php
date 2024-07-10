<?php
  $idAct = $_GET["id"];
  $filtro = 0;
  if (isset($_GET["filtro"])) {
    $filtro = $_GET["filtro"];
  }
  $query = 'SELECT NOMBRE, DESCRIPCION FROM ACTIVO
            WHERE ID_ACTIVO = '.$idAct.'';
  $result=bd_consulta($query);
  $row = mysqli_fetch_assoc($result);
?>

<div class="Titulo">
  <p>Historial del Activo <?php echo $row["NOMBRE"]; ?></p>
</div>
<div class="Texto">
  <p>Descripcion</p>
  <p><?php echo $row["DESCRIPCION"]; ?></p>
</div>

<form class="Formulario" action="index.php" method="get">
  <input type="hidden" name="op" value="143">
  <input type="hidden" name="id" value="<?php echo $idAct ?>">
  <div class="Informacion">
    <div>
      <label for="filtro">Filtro: </label>
      <select name="filtro">
        <option value="0" <?php if($filtro == 0) echo "selected"; ?>>Todos</option>
        <option value="1" <?php if($filtro == 1) echo "selected"; ?>>Asignaciones</option>
        <option value="2" <?php if($filtro == 2) echo "selected"; ?>>Liberaciones</option>
      </select>
    </div>
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
      <th>Usuario</th>
      <th>Lugar</th>
      <th>Edificio</th>
      <th>Cantidad</th>
      <th>Fecha</th>
      <?php if ($filtro == 0): ?>
      <th>Accion</th>
      <?php endif; ?>
    </tr>
  </thead>
  <tbody>
    <?php
      switch ($filtro) {
        case 0:
            $query = 'SELECT  CONCAT(NOMBRES, " ", APELLIDOS) AS NOMCOM, UBICACION.NOMBRE AS LUGAR, EDIFICIO, CANTIDAD, FECHA, ACCION FROM HISTORIAL
                      INNER JOIN USUARIO ON HISTORIAL.ID_USUARIO = USUARIO.CORREO
                      INNER JOIN UBICACION ON HISTORIAL.ID_LUGAR = UBICACION.ID_UBICACION
                      INNER JOIN EDIFICIO ON UBICACION.ID_EDIFICIO = EDIFICIO.ID_EDIFICIO
                      WHERE ID_ACTIVO = "'.$idAct.'"
                      ORDER BY FECHA DESC';
          break;

        case 1:
            $query = 'SELECT  CONCAT(NOMBRES, " ", APELLIDOS) AS NOMCOM, UBICACION.NOMBRE AS LUGAR, EDIFICIO, CANTIDAD, FECHA, ACCION FROM HISTORIAL
                      INNER JOIN USUARIO ON HISTORIAL.ID_USUARIO = USUARIO.CORREO
                      INNER JOIN UBICACION ON HISTORIAL.ID_LUGAR = UBICACION.ID_UBICACION
                      INNER JOIN EDIFICIO ON UBICACION.ID_EDIFICIO = EDIFICIO.ID_EDIFICIO
                      WHERE ID_ACTIVO = "'.$idAct.'" AND ACCION = "ASIGNACION"
                      ORDER BY FECHA DESC';
          break;

        case 2:
            $query = 'SELECT  CONCAT(NOMBRES, " ", APELLIDOS) AS NOMCOM, UBICACION.NOMBRE AS LUGAR, EDIFICIO, CANTIDAD, FECHA, ACCION FROM HISTORIAL
                      INNER JOIN USUARIO ON HISTORIAL.ID_USUARIO = USUARIO.CORREO
                      INNER JOIN UBICACION ON HISTORIAL.ID_LUGAR = UBICACION.ID_UBICACION
                      INNER JOIN EDIFICIO ON UBICACION.ID_EDIFICIO = EDIFICIO.ID_EDIFICIO
                      WHERE ID_ACTIVO = "'.$idAct.'" AND ACCION = "LIBERACION"
                      ORDER BY FECHA DESC';
          break;
      }
      $result=bd_consulta($query);
      while ($row=mysqli_fetch_assoc($result)) {
        $row["FECHA"] = substr($row["FECHA"],8,2)."/".substr($row["FECHA"],5,2)."/".substr($row["FECHA"],0,4);
        ?>
        <tr>
          <td><?php echo $row["NOMCOM"] ?></td>
          <td><?php echo $row["LUGAR"] ?></td>
          <td><?php echo $row["EDIFICIO"] ?></td>
          <td><?php echo $row["CANTIDAD"] ?></td>
          <td><?php echo $row["FECHA"] ?></td>
          <?php if ($filtro == 0): ?>
            <td><?php echo $row["ACCION"] ?></td>
          <?php endif; ?>
        </tr>
        <?php
      }
    ?>
  </tbody>
</table>
