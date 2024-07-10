<div class="Titulo">
  <p>Cambiar Contraseña</p>
</div>
<div class="Informacion">
  <p>Ingresa tu contraseña anterior y crea una nueva</p>
</div>

<script src="JS/formularioCambiarContraseña.js"></script>
<form class="Formulario" action="Procesa/cambiarContraseña.php" method="post" onsubmit="return cambiarContraseña(<?php echo "'".$_SESSION["password"]."'" ?>)">
  <div class="Informacion">
    <div>
      <label for="passOld">Contraseña Actual</label>
      <input type="password" name="passOld" id="passOld" placeholder="Ingresa tu contraseña actual" required>
    </div>
    <div>
      <label for="passNeo">Nueva Contraseña</label>
      <input type="password" name="passNeo" id="passNeo" placeholder="Ingresa tu nueva contraseña" required>
    </div>
    <div>
      <label for="passNeoR">Repite Nueva Contraseña</label>
      <input type="password" name="passNeoR" id="passNeoR" placeholder="Vuelve a ingresar tu nueva contraseña" required>
    </div>
  </div>
  <div class="Botones">
    <div>
      <input type="submit" value="Cambiar">
    </div>
  </div>
</form>
