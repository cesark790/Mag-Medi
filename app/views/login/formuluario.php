<form action="<?= $url_server;?>" id="form_login" method="POST" >
	<div id="contendor_login">
	<h2>
		Inicia Sesión
	</h2>
	<hr class="linea_azul">
			<div>
				<input class="input_form" type="text" name="usuario" id="usuario" placeholder="Nombre de usuario" required="required">
			</div>
			<div>
				<input class="input_form" type="password" name="password" id="password" placeholder="Password" required="required">
			</div>
			<div>
				<input type="submit" value="INGRESAR" name="ingresar" id="ingresar" class="boton_login">
			</div>
			<div>
				<span class="img_login" id="info_ajax"></span>
			</div>
</form>
	</div>