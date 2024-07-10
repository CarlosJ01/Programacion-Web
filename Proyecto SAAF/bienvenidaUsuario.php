<div class="Titulo">
  <p>Bienvenido</p>
  <p>al</p>
  <p>Sistema de Administracion de Activos Fijos</p>
</div>
<div class="Texto">
  <p> Correo:   <?php echo $_SESSION["correo"] ?></p>
  <br>
  <p> Nombre:  <?php echo $_SESSION["nombre"] ?></p>
  <br>
  <p> Departamento:  <?php echo $_SESSION["departamento"] ?></p>
</div>

<form class="Formulario" action="index.php" method="get">
  <input type="hidden" name="op" value="11">
  <div class="Botones">
    <div>
      <input type="submit" value="Cambiar Contraseña" class="btnG">
    </div>
  </div>
</form>
