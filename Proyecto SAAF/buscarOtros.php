<?php
  $buscar = false;
  if (isset($_GET["correo"])) {
    $usr = $_GET["correo"];
    $buscar = true;

    $query = 'SELECT COUNT(*) AS exis FROM USUARIO WHERE CORREO="'.$usr.'"';
    $result=bd_consulta($query);
    if (mysqli_fetch_assoc($result)["exis"] == 0) {
      header('Location: index.php?op=40&&msm=Correo no existe');
    }
  }
?>

<div class="Titulo">
  <p>Buscar Asignaciones</p>
</div>

<div class="Texto">
  <p>Busca asignacines de otros usuarios</p>
</div>

<form class="Formulario" action="index.php" method="get">
  <div class="Informacion">
    <div>
      <label for="correo">Correo: </label>
      <input type="email" name="correo" placeholder="Ingrese el correo del usuario a buscar" <?php if (isset($_GET["correo"])){?>value="<?php echo $usr ?>"<?php }?> style="width: 60%;" required>
    </div>
    <input type="hidden" name="op" value="40">
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
      <th></th>
      <th>Activo</th>
      <th>Descripcion</th>
      <th>Cantidad</th>
      <th>Lugar</th>
      <th>Edificio</th>
      <th>Fecha</th>
    </tr>
  </thead>
  <tbody>
    <?php
      if ($buscar) {
        $query = 'SELECT ACTIVO.NOMBRE AS ACTIVO, DESCRIPCION, CANTIDAD, UBICACION.NOMBRE AS LUGAR, EDIFICIO, FECHA FROM ASIGNACION
                  INNER JOIN ACTIVO ON ASIGNACION.ID_ACTIVO = ACTIVO.ID_ACTIVO
                  INNER JOIN UBICACION ON ASIGNACION.ID_UBICACION = UBICACION.ID_UBICACION
                  INNER JOIN EDIFICIO ON UBICACION.ID_EDIFICIO = EDIFICIO.ID_EDIFICIO
                  WHERE CORREO = "'.$usr.'" AND STATUS = 1';
        $result=bd_consulta($query);
        $cont = 1;
        while ($row=mysqli_fetch_assoc($result)) {
          $row["FECHA"] = substr($row["FECHA"],8,2)."/".substr($row["FECHA"],5,2)."/".substr($row["FECHA"],0,4);
          ?>
          <tr>
            <th><?php echo $cont ?></th>
            <td><?php echo $row["ACTIVO"] ?></td>
            <td><?php echo $row["DESCRIPCION"] ?></td>
            <td><?php echo $row["CANTIDAD"] ?></td>
            <td><?php echo $row["LUGAR"] ?></td>
            <td><?php echo $row["EDIFICIO"] ?></td>
            <td><?php echo $row["FECHA"] ?></td>
          </tr>
          <?php
          $cont++;
        }
      }
    ?>
  </tbody>
</table>
