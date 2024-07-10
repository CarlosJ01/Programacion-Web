<div class="Titulo">
  <h1>Registrar</h1>
</div>
<div class="Texto">
  <p>Ingrese sus datos para registrase</p>
</div>

<script src="JS/formularioRegistrar.js"></script>

<form class="Formulario" action="Procesa/nuevoUsuario.php" method="post" onsubmit="return validarRegistro()">
  <div class="Informacion">
    <div>
      <label for="correo">Correo Electronico:</label>
      <input type="email" name="correo" id="correo" placeholder="Ingrese su correo electronico" required>
    </div>
    <div>
      <label for="nombres">Nombre(s): </label>
      <input type="text" name="nombres" id="nombres" placeholder="Ingres su nombre o nombres" required>
    </div>
    <div>
      <label for="apellidos">Apellido (s): </label>
      <input type="text" name="apellidos" id="apellidos" placeholder="Ingrese sus apellidos" required>
    </div>
    <!--
    <div>
      <label for="telefono">Telefono: </label>
      <input type="tel" name="telefono" id="telefono" placeholder="Ingrese su telefono">
    </div>
    -->
    <div>
      <label for="departamento">Departamento</label>
      <select name="departamento" id="departamento" required>
        <option value="0"></option>
        <?php
          $query = 'SELECT * FROM DEPARTAMENTO';
          $result=bd_consulta($query);
          while ($row=mysqli_fetch_assoc($result)) {
            ?>
            <option value="<?php echo $row["ID_DEPARTAMENTO"] ?>"><?php echo $row["NOMBRE"] ?></option>
            <?php
          }
        ?>
      </select>
    </div>
    <div>
    </div>
    <div>
      <label for="password01">Contraseña: </label required>
      <input type="password" name="password01" id="password01" placeholder="Ingrese su contraseña">
    </div>
    <div>
      <label for="password02">Repite Contraseña: </label required>
      <input type="password" name="password02" id="password02" placeholder="Vuelve a ingresar su contraseña">
    </div>
  </div>
  <div class="Botones">
    <div>
      <input type="submit" value="Enviar">
      <input type="reset" value="Borrar">
    </div>
  </div>
</form>
