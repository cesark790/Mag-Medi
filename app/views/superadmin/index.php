<div class="content">
	<div class="window_mas_content">
			<div class="window_mas">
				+
			</div>
			<div class="windows_nav">
				<div class="window_active " data-window="users">
					Usuarios
				</div>
				<div class="window_active" data-window="group">
					Grupos
				</div>
				<div class="window_active" data-window="apps">
					Aplicaciones
				</div>
				<div class="window_active" data-window="guias">
					Guias
				</div>
			</div>
	</div>
	<br />
	<br />
	<section class="window_index" data-window="users">
		<div class="window_info">
			<span>
				Usuarios
			</span>
			<div class="window_close">
			</div>
		</div>
			<table width="100%" border="1">
				<tr>
					<th width="40%">Nombre</th>
					<th width="40%">User</th>
					<th width="20%"></th>
				</tr>
			</table>

	</section>
	<section  class="window_index" data-window="group">
		<div class="window_info">
			<span>
				Grupos
			</span>
			<div class="window_close">
				
			</div>
		</div>
	</section>
	<section class="window_index" data-window="apps">
		<div class="window_info">
			<span>
				Aplicaciones 
			</span>
			<div class="window_close">
				
			</div>
		</div>
	</section>
	<section class="window_index" data-window="guias">
		<div class="window_info">
			<span>
				Guias
			</span>
			<div class="window_close">
				
			</div>
		</div>
	</section>
</div>

<script>
	$(document).on("ready",inicio)

	function inicio()
	{
	 users();
	//Animacones 
	var nav_in = {
		marginTop : '0px'
	}
	$('nav').css(nav_in);
	}

	$('.window_close').on("click", function()
	{
		$(this).parent().parent().fadeOut();
		var element = $(this).parent().parent().attr('data-window');
		$(".window_active[data-window='"+ element+"']").addClass('window_inactive');
	})

	$('.window_mas').on("click",function(){
		if ($('.windows_nav').css('display')=='none') 
		{
			$('.window_mas').text("-");
			$('.windows_nav').fadeIn();
			return;
		}
		$('.window_mas').text("+");
		$('.windows_nav').fadeOut();
	})

	$('.window_active').on("click",function()
	{
		var element = $(this).attr("data-window");
		var win = $('.window_index[data-window="' + element + '"]');
		if (win.css('display')!="none") {
			return;
		}
		console.log(element);
		$('.window_index[data-window="'+ element+'"]').fadeIn();
		$(this).removeClass("window_inactive");
	})

	// functtiones de JSON

	function users()
	{
		$.getJSON('<?=base_url()?>panel/get_users',function(data){
		$.each(data,function(key,val){
			$('<tr/>',{
				html : "<td>"+ val.nombre +" " + val.ap_pat  +"</td><td>" + val.user_name + "</td><td></td>"
			}).appendTo('.window_index[data-window="users"] table');
		})
	})

		function groups()
		{
			$.getJSON('<?= base_url()?>panel/get_groups',function (data){
				$.each(data,function(key,val){
					
				})
			})
		}
	}
</script>