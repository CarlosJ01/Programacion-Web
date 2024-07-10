<div class="Titulo">
  <p>Buscar un Activo</p>
</div>

<div class="Texto">
  <p>Busca las asignaciones de un activo(s), por su nombre</p>
</div>

<script type="text/javascript">
  function enviarBuscar() {
    document.getElementById("nombre").value = document.getElementById("nombre").value.trim();
  }
</script>

<form class="Formulario" action="index.php" method="get" onsubmit="enviarBuscar()">
  <input type="hidden" name="op" value="138">
  <div class="Informacion">
    <div>
      <label for="nombre">Nombre del Activo: </label>
      <input type="text" name="nombre" id="nombre" placeholder="Ingresa el nombre del activo a buscar" style="width: 60%;" required>
    </div>
  </div>
  <div class="Botones">
    <div>
      <input type="submit" value="Buscar">
    </div>
  </div>
</form>
