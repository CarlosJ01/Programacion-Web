<div class="Titulo">
  <h1>Administracion</h1>
</div>
<div class="Texto">
  <p>Ingrese su usuario y contraseña para ingresar</p>
</div>

  <form class="Formulario" action="Procesa/ingresaAdmin.php" method="post">
    <div class="Informacion">
      <div>
        <label for="usuario">Usuario: </label>
        <input type="text" name="usuario" placeholder="Ingrese su usuario" required>
      </div>
      <div>
        <label for="password">Contraseña: </label>
        <input type="password" name="password" placeholder="Ingrese su contraseña" required>
      </div>
    </div>
    <div class="Botones">
      <div>
        <input type="submit" value="Ingresar">
      </div>
    </div>
  </form>
