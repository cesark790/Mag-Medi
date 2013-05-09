	$(document).on("ready",inicio)

	function inicio()
	{
	//Cargando mediante el hisotory pushState
	var url_str = location.pathname;
	var url_path = url_str.split("/");
	var dateText= url_path[3];
	if(dateText!='')
	{
	get_history();
	}
	else
	{
	//JSON de las ventanas de inicio
	get_consultas();	
 	get_citas();
 	get_notas();
 	}
	//Calendario
	$('#calendario').datepicker({ numberOfMonths: 2,
	dateFormat: "dd-mm-yy",
	dayNames:["Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado"], 
	dayNamesMin:[ "Do", "Lu", "Ma", "Mie", "Ju", "Vi", "Sa" ],
	monthNames :["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"] ,
	onSelect : function(dateText, inst)
	 		{ 
	 			 history.pushState(null, null,base_url + 'agenda-auxiliar/'+ dateText);
       			 $.getJSON('<?=base_url()?>/citas/change_date',{ fecha : dateText},function(val){
				 	$('.window_index[data-window="consultas"] .t_body tbody , .window_index[data-window="citas"] .t_body tbody , .window_index[data-window="notas"] .t_body tbody').empty();
       	 			$('.fecha_current>span').text(val);
       	 			$('#current_date').val(dateText);
       	 			get_consultas();	
       	 			get_citas();	
       	 			get_notas();
       			 })
   			 }
   		 });

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
			$('.window_index[data-window="'+ element+'"]').fadeOut();
			$(this).addClass("window_inactive");
			return;
		}
		$('.window_index[data-window="'+ element+'"]').fadeIn();
		$(this).removeClass("window_inactive");
	})

	// functtiones de JSON
	//Consultas
	var get_consultas = function()
	{
		var date = $("#current_date").val();
		$.ajax({
			url : base_url + "citas/get_consultas" ,
			type : "POST",
			dataType : 'json',
			data : { date : date},
			success : function(data){
				if (data == 0) {
					$('<tr />',{
						html : "<td bgColor='#fff' width='100%' height='233.9' border='0'> No hay consultas.</td>"
					}).appendTo('.window_index[data-window="consultas"] .t_body table tbody');	
					return;
					}
				$.each(data,function(key,val){
					
					$('<tr />',{
						html : "<td width='20.5%'>" + val.hora + "</td><td width='62%'>" + val.nombre + "</td><td width='180%'></td>"
					}).appendTo('.window_index[data-window="consultas"] .t_body table tbody');
				})
			}
		})
	}
	//Citas
	var get_citas = function()
	{
		var date = $("#current_date").val();
		$.ajax({
			url : base_url + "citas/get_citas" ,
			type : "POST",
			dataType : 'json',
			data : { date : date},
			success : function(data){
				if (data == 0) {
					$('<tr />',{
						html : "<td bgColor='#fff' width='100%' height='233.9' border='0'> No hay citas.</td>"
					}).appendTo('.window_index[data-window="citas"] .t_body table tbody');	
					return;
					}
				$.each(data,function(key,val){
					
					$('<tr />',{
						html : "<td width='20.5%'>" + val.hora + "</td><td width='62%'>" + val.nombre + "</td><td width='180%'></td>"
					}).appendTo('.window_index[data-window="citas"] .t_body table tbody');
				})
			}
		})
	}
	//Citas
	var get_notas = function()
	{
		var date = $("#current_date").val();
		$.ajax({
			url : base_url + "citas/get_notas" ,
			type : "POST",
			dataType : 'json',
			data : { date : date},
			success : function(data){
				if (data == 0) {
					$('<tr />',{
						html : "<td bgColor='#fff' width='100%' height='233.9' border='0'> No hay notas.</td>"
					}).appendTo('.window_index[data-window="notas"] .t_body table tbody');	
					return;
					}
				$.each(data,function(key,val){
					
					$('<tr />',{
						html : "<td width='20.5%'>" + val.hora + "</td><td width='77%'>" + val.nota_user 
					}).appendTo('.window_index[data-window="notas"] .t_body table tbody');
				})
			}
		})
	}

	//histpry pushState
	var get_history = function()
	{
		$(window).on('popstate',function(){
			var url_str = location.pathname;
			var url_path = url_str.split("/");
			var dateText= url_path[3];
			if (dateText) {};
			 $.getJSON('<?=base_url()?>/citas/change_date',{ fecha : dateText},function(val){
				 	$('.window_index[data-window="consultas"] .t_body tbody , .window_index[data-window="citas"] .t_body tbody , .window_index[data-window="notas"] .t_body tbody').empty();
       	 			$('.fecha_current>span').text(val);
       	 			$('#current_date').val(dateText);
       	 			get_consultas();	
       	 			get_citas();	
       	 			get_notas();
       			 })
		})
	}