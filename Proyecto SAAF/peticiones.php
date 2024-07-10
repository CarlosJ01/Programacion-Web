<div class="Titulo">
  <p>Peticiones Realizadas</p>
</div>

<div class="Texto">
  <p>Peticiones Realizadas por los usuarios</p>
</div>

<table>
  <thead>
    <tr>
      <th></th>
      <th>Nombre</th>
      <th>Activo</th>
      <th>Cantidad</th>
      <th>Fecha</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php
      $query = 'SELECT ID_ASIGNACION, CONCAT(NOMBRES, " ", APELLIDOS) AS NOMCOM, NOMBRE AS ACTIVO, CANTIDAD, FECHA FROM ASIGNACION
                INNER JOIN USUARIO ON ASIGNACION.CORREO = USUARIO.CORREO
                INNER JOIN ACTIVO ON ASIGNACION.ID_ACTIVO = ACTIVO.ID_ACTIVO
                WHERE STATUS = 0
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
          <td><?php echo $row["CANTIDAD"] ?></td>
          <td><?php echo $row["FECHA"] ?></td>
          <td><a href="index.php?op=121&&idAsignacion=<?php echo $row["ID_ASIGNACION"] ?>" id="Pedir">Asignar</a></td>
          <td><a href="Procesa/eliminarAsignacion.php?idAsignacion=<?php echo $row["ID_ASIGNACION"] ?>" id="Eliminar">Eliminar</a></td>
        </tr>
        <?php
        $cont++;
      }
    ?>
  </tbody>
</table>
