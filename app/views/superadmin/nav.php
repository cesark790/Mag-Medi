<nav>
	<ul>
		<li><a href="<?=base_url()?>">Inicio</a></li>
		<li><a href="<?=base_url()?>">Usuarios</a></li>
		<li><a href="#">Gruposs</a></li>
		<li><a href="#">App</a></li>
		<li><a href="#">Guias</a></li>
	</ul>
	<ul>
		<li class="name_user">
			Administrador -	<?= $usuario;?> 
		</li>
		<li>
			<a href="#">
				<img class="msg" src="<?=base_url()?>img/iconos/msg.png">
			</a>
		</li>
		<li>
			<a href="#">
				<img class="msg" src="<?=base_url()?>img/iconos/notificaciones.png">
			</a>
		</li>
		<li>
			<a href="#">
				<img class="msg" src="<?=base_url()?>img/iconos/conf.png">
			</a>
		</li>
		<li>
			<a href="<?=base_url()?>login/destroy">
				<img class="msg" src="<?=base_url()?>img/iconos/logout.png">
			</a>
		</li>
		<li>
			<a href="#">
				<img class="msg" src="<?=base_url()?>img/iconos/user.png">
			</a>
		</li>
	</ul>
</nav>
