<section id="seccion_autenticar">
	<header id="header_form"> Formulario para autenticar usuarios</header>
	<form action="validaAutenticacion.php" name="miformulario" id="miformulario" method="post" >
		<div class="myField">
			<label for="usuario"> Usuario: </label>
			<input type="text" name="usuario" id="usuario"  placeholder="nombre de usuario"
				value="" required >
		</div>
		<div class="myField">
			<label for="password"> Password: </label>
			<input type="password" name="password" id="password" placeholder="escribe tu contraseña" required>
		</div>
		<div class="myField">
			<label >  </label>
			<input type="submit" class="formButton" value="Enviar" autofocus>
		</div>
		<div class="myField">
			<label >  </label>
			<a href=""> Olvidé mi password</a>&emsp;
			<a href="index.php?op=-2">Nuevo usuario</a>   
		</div>
	</form>
	<span id="footer_form">
		<br>Introduce tu usuario y tu contraseña o agrega uno
	</span>
</section>
