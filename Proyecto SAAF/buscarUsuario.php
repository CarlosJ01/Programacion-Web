<div class="Titulo">
  <p>Buscar un Usuario</p>
</div>

<div class="Texto">
  <p>Busca las asignaciones de un usuario, por su correo</p>
</div>

<form class="Formulario" action="Procesa/buscarUsuario.php" method="post">
  <div class="Informacion">
    <div>
      <label for="correo">Correo Electronico: </label>
      <input type="email" name="correo" placeholder="Ingresa el correo del usuario" required>
    </div>
  </div>
  <div class="Botones">
    <div>
      <input type="submit" value="Buscar">
    </div>
  </div>
</form>
