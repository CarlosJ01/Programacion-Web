<?php
  $idTipo = 0;
  if (isset($_GET["tipo"])) {
    $idTipo = $_GET["tipo"];
  }
?>
<div class="Titulo">
  <p>Todos los Usuarios</p>
</div>
<div class="Texto">
  <p></p>
</div>

<form class="Formulario" action="index.php" method="get">
  <div class="Informacion">
    <div>
      <label for="tipo">Departamento</label>
      <select name="tipo">
        <option value="0" <?php if ($idTipo == 0) echo "selected"; ?> ></option>
        <?php
          $query = 'SELECT * FROM DEPARTAMENTO';
          $result=bd_consulta($query);
          while ($row=mysqli_fetch_assoc($result)) {
            ?>
            <option value="<?php echo $row["ID_DEPARTAMENTO"] ?>" <?php if ($idTipo == $row["ID_DEPARTAMENTO"]) echo "selected"; ?> ><?php echo $row["NOMBRE"] ?></option>
            <?php
          }
        ?>
      </select>
    </div>
    <input type="hidden" name="op" value="140">
  </div>
  <div class="Botones">
    <div>
      <input type="submit" value="Buscar">
    </div>
  </div>
</form>

<table class="tablaG">
  <thead>
    <tr>
      <th></th>
      <th>Correo</th>
      <th>Nombre</th>
      <th>Departamento</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php
      if ($idTipo == 0) {
        $query = 'SELECT CORREO, CONCAT(NOMBRES, " ", APELLIDOS) AS NOMCOM, DEPARTAMENTO.NOMBRE FROM USUARIO
                  INNER JOIN DEPARTAMENTO ON USUARIO.ID_DEPARTAMENTO = DEPARTAMENTO.ID_DEPARTAMENTO
                  ORDER BY NOMCOM';
      }else {
        $query = 'SELECT CORREO, CONCAT(NOMBRES, " ", APELLIDOS) AS NOMCOM, DEPARTAMENTO.NOMBRE FROM USUARIO
                  INNER JOIN DEPARTAMENTO ON USUARIO.ID_DEPARTAMENTO = DEPARTAMENTO.ID_DEPARTAMENTO
                  WHERE USUARIO.ID_DEPARTAMENTO = '.$idTipo.'
                  ORDER BY NOMCOM';
      }
      $result=bd_consulta($query);
      $cont = 1;
      while ($row=mysqli_fetch_assoc($result)) {
        ?>
        <tr>
          <th><?php echo $cont ?></th>
          <td><?php echo $row["CORREO"] ?></td>
          <td><?php echo $row["NOMCOM"] ?></td>
          <td><?php echo $row["NOMBRE"] ?></td>
          <td><a href="index.php?op=142&&id=<?php echo $row["CORREO"] ?>" id="Pedir">Historial</a></td>
        </tr>
        <?php
        $cont++;
      }
    ?>
  </tbody>
</table>
