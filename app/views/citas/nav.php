<script>
	var base_url = "<?= base_url()?>";
</script>
<div class="navbar navbar-inverse navbar-fixed-top">
<div class="navbar-inner">
    <div class="container-fluid">
		<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> 
			<span class="icon-bar"></span> 
			<span class="icon-bar"></span> 
			<span class="icon-bar"></span> 
		</button>
		<div class="search-global">
		    <input id="globalSearch" class="search search-query input-medium" type="search">
				<a class="search-button" href="javascript:void(0);"><i class="fontello-icon-search-5">			
				</i>
			</a> 
		</div>
    <div class="nav-collapse collapse">
		<ul class="nav user-menu visible-desktop">
			<li>
				<a class="btn-glyph fontello-icon-edit tip-bc" href="javascript:void(0);" title="Messages">
					<span class="badge badge-important">
						8
					</span>
				</a>
			</li>
			<li>
				<a class="btn-glyph fontello-icon-mail-1 tip-bc" href="javascript:void(0);" title="Emails">				
				</a>
			</li>
			<li>
				<a class="btn-glyph fontello-icon-lifebuoy tip-bc" href="javascript:void(0);" title="Support">
					<span class="badge badge-important">
						4
					</span>
				</a>
			</li>
		</ul>
		<ul class="nav">
			<li class="dropdown"> 
				<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
					<span class="fontello-icon-list-1"></span>+ <b class="caret"></b>
				</a>
			 	<ul class="dropdown-menu">
					<li><a href="component-form-demo.html">Demo Form</a></li>
					<li><a href="component-widgets-remember.html">Remember</a></li>
					<li><a href="component-widgets-users.html">User List</a></li>
					<li class="divider"></li>
					<li class="nav-header">Next Update</li>
					<li><a href="javascript:void(0);">Contacts</a></li>
					<li><a href="javascript:void(0);">Email</a></li>
                </ul>
			</li>
			<li>
				<a href="javascript:void(0);">Inicio</a>
			</li>
			<li class="active">
				<a href="javascript:void(0);">Consultas</a>
			</li>
			<li>
				<a href="component-fullcalendar-demo.html">
					<span class="fontello-icon-calendar">						
					</span>Citas
				</a> 
			</li>
			<li> 
				<a href="page-contact.html">º
					<span class="fontello-icon-users">
					</span>Pacientes
				</a>
			</li>
			
		</ul>
	</div>
</div>
</div>
</div>
<div class="nav-collapse collapse">
<nav class="nav">
<li class="dropdown-menu">
			<a href="#"> + </a>
			<ul class="dropdown-menu">
				<li class="window_active " data-window="consultas">
					Consultas
				</li>
				<li class="window_active" data-window="citas">
					Citas
				</li>
				<li class="window_active" data-window="notas">
					Notas
				</li>
				<li class="window_active" data-window="calendario">
					Calendario
				</li>
			</ul>
</li>
	<ul class="menu_left">
		<li><a href="<?=base_url()?>agenda-auxiliar/<?=date("d-m-Y")?>">Inicio</a></li>
		<li><a href="<?=base_url()?>">Consultas</a></li>
		<li><a href="#">Citas</a></li>
		<li><a href="#">Pacientes</a></li>
	</ul>
<ul class="menu_left menu_center">
<div class="fecha_current">
	<span><?=fechaletra(date("d-m-Y"))?></span>
	<input type="hidden" name="current_date" id="current_date" value="<?=date("d-m-Y")?>">
</div>
</ul>
	<ul class="menu_right">
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
		<li class="name_user">
			<?= $usuario;?> 
		</li>
	</ul>
</nav>
</div>