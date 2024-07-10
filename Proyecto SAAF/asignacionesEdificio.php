<div class="Titulo">
  <p>Nuemro de asignaciones por Edificio</p>
</div>
<div class="Texto">
  <p></p>
</div>

<table class="tablaG">
  <thead>
    <tr>
      <th></th>
      <th>Usuario</th>
      <th>Activo</th>
      <th>Descripcion</th>
      <th>Cantidad</th>
      <th>Lugar</th>
      <th>Edificio</th>
      <th>Fecha</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php
      $query = 'SELECT ASIGNACION.ID_ASIGNACION, CONCAT(NOMBRES, " ", APELLIDOS) AS NOMCOM,ACTIVO.NOMBRE AS ACTIVO, DESCRIPCION, CANTIDAD, UBICACION.NOMBRE AS LUGAR, EDIFICIO, FECHA FROM ASIGNACION
                INNER JOIN ACTIVO ON ASIGNACION.ID_ACTIVO = ACTIVO.ID_ACTIVO
                INNER JOIN USUARIO ON ASIGNACION.CORREO = USUARIO.CORREO
                INNER JOIN UBICACION ON ASIGNACION.ID_UBICACION = UBICACION.ID_UBICACION
                INNER JOIN EDIFICIO ON UBICACION.ID_EDIFICIO = EDIFICIO.ID_EDIFICIO
                WHERE STATUS = 1
                ORDER BY FECHA DESC';
      $result=bd_consulta($query);
      $cont = 1;
      while ($row=mysqli_fetch_assoc($result)) {
        $row["FECHA"] = substr($row["FECHA"],8,2)."/".substr($row["FECHA"],5,2)."/".substr($row["FECHA"],0,4);
        ?>
        <tr>
          <th><?php echo $cont ?></th>
          <td><?php echo $row["NOMCOM"] ?></td>
          <td><?php echo $row["ACTIVO"] ?></td>
          <td><?php echo $row["DESCRIPCION"] ?></td>
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
