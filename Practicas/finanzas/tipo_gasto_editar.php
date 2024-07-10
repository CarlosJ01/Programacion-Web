  <?php
  $descripcion=$_GET['desc'];
  $usuario=$_SESSION['correo'];
  ?>


   <header id="header_form"> Formulario para editar un tipo de gasto</header>
    <form action="tipo_gasto_edita_procesa.php" name="miformulario" id="miformulario" method="get" >
        <div class="myField">
            <label for="descripcion"> Tipo de gasto: </label>
            <input type="text" name="descripcion" id="descripcion" value="<?php echo $descripcion;?>">
		<input type="text" name="descOld" id="descOld" value="<?php echo $descripcion;?>" hidden>
		</div>

        <div class="myField">
            <label >  </label>
            <input type="submit" class="formButton" value="Enviar" autofocus>
			<input type="reset" class="formButton" value="Cancelar" >
        </div>
    </form>
    <span id="footer_form"> Introduce tu usuario y tu contraseña o agrega uno </span>
