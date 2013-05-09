$(document).on("ready", inicio);

function inicio()
{
	$("#form_login").on("submit",login);
}

function login(form)
{
	form.preventDefault();
		var data = $('#form_login').serialize();
		$.ajax({
			url : '/doc/login/verificacion',
			type : 'POST',
			data : data,
			beforeSend : function(){
				$('#info_ajax').html('<img src="img/login/wait.gif" /> ')
			},
			success: function(data){
				if (data=="vacio") 
				{
					$('#info_ajax').html("Llene todos los campos.")
				}else if(data=="no")	
				{
					$('.input_form').val("");
					$('#info_ajax').html('Usuario no registrado.')
				}else if(data=="si")
				{
					window.location.href="/doc/";
				}
			}
		})
}	