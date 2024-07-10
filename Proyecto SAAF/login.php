<div class="Titulo">
  <h1>Login</h1>
</div>
<div class="Texto">
  <p>Ingrese su correo electronico y contraseña para ingresar</p>
</div>

  <form class="Formulario" action="Procesa/ingresar.php" method="post">
    <div class="Informacion">
      <div>
        <label for="correo">Correo Electronico: </label>
        <input type="email" name="correo" placeholder="Ingrese su correo electronico" required>
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
