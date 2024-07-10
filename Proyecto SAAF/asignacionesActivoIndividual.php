<?php
  $idAct = $_GET["id"];
  $query = 'SELECT NOMBRE, DESCRIPCION FROM ACTIVO
            WHERE ID_ACTIVO = '.$idAct.'';
  $result=bd_consulta($query);
  $row = mysqli_fetch_assoc($result);
?>
<div class="Titulo">
  <p>Todas las Asignaciones del Activo <?php echo $row["NOMBRE"]; ?></p>
</div>
<div class="Texto">
  <p>Descripcion</p>
  <p><?php echo $row["DESCRIPCION"]; ?></p>
</div>

<table class="tablaG">
  <thead>
    <tr>
      <th></th>
      <th>Usuario</th>
      <th>Cantidad</th>
      <th>Lugar</th>
      <th>Edificio</th>
      <th>Fecha</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php
      $query = 'SELECT ASIGNACION.ID_ASIGNACION, CONCAT(NOMBRES, " ", APELLIDOS) AS NOMCOM, CANTIDAD, UBICACION.NOMBRE AS LUGAR, EDIFICIO, FECHA FROM ASIGNACION
                INNER JOIN ACTIVO ON ASIGNACION.ID_ACTIVO = ACTIVO.ID_ACTIVO
                INNER JOIN USUARIO ON ASIGNACION.CORREO = USUARIO.CORREO
                INNER JOIN UBICACION ON ASIGNACION.ID_UBICACION = UBICACION.ID_UBICACION
                INNER JOIN EDIFICIO ON UBICACION.ID_EDIFICIO = EDIFICIO.ID_EDIFICIO
                WHERE STATUS = 1 AND ASIGNACION.ID_ACTIVO = '.$idAct.'
                ORDER BY FECHA DESC';
      $result=bd_consulta($query);
      $cont = 1;
      while ($row=mysqli_fetch_assoc($result)) {
        $row["FECHA"] = substr($row["FECHA"],8,2)."/".substr($row["FECHA"],5,2)."/".substr($row["FECHA"],0,4);
        ?>
        <tr>
          <th><?php echo $cont ?></th>
          <td><?php echo $row["NOMCOM"] ?></td>
          <td><?php echo $row["CANTIDAD"] ?></td>
          <td><?php echo $row["LUGAR"] ?></td>
          <td><?php echo $row["EDIFICIO"] ?></td>
          <td><?php echo $row["FECHA"] ?></td>
          <td><a href="Procesa/librerar.php?id=<?php echo $row["ID_ASIGNACION"] ?>" id="Eliminar">Liberar</a></td>
        </tr>
        <?php
        $cont++;
      }
    ?>
  </tbody>
</table>
