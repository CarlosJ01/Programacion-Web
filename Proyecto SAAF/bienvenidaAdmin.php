<div class="Titulo">
  <p>Bienvenido</p>
  <p>al</p>
  <p>Sistema de Administracion de Activos Fijos</p>
</div>
<div class="Texto">
  <p><?php echo $_SESSION["nombre"] ?></p>
</div>

<form class="Formulario" action="index.php" method="get">
  <input type="hidden" name="op" value="101">
  <div class="Botones">
    <div>
      <input type="submit" value="Cambiar Contraseña" class="btnG">
    </div>
  </div>
</form>
