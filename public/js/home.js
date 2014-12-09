$(document).ready(function() {
    $('.carousel').carousel({
        interval: 3000
    });
     
	$('.carousel').hover(
		function(){
			$(this).find('.carousel-control').css('visibility', 'visible');
		},
		function(){
			$(this).find('.carousel-control').css('visibility', 'hidden');
		}
	);
	$("#suscribir").on( 'submit', function( event )                
    {
         
        $.ajax(
		{
			url: myurl,
			type: "get",
			dataType: 'json',
			data: { email: $('#email').val(), nombre: $('#nombre').val() },
		})
		.done(function(data)
		{			
			if(data.response == 'true'){
				$('#suscribir').slideToggle(0);
				$('#message-error').show(0).html('<p class="title">'+data.message+'</p>');				
				$('#suscribir').delay(5000).slideToggle(400);
				$('#message-error').delay(4600).slideToggle('slow');
				$('input').val('');				
			}else{
				$('#suscribir').slideToggle(0);
				$('#message-error').show(0).html('<p class="title error">'+data.message+'</p>');
				$('#suscribir').delay(5000).slideToggle(400);
				$('#message-error').delay(4600).slideToggle('slow');
				$('input').val('');
			}			
		})
		.fail(function(jqXHR, ajaxOptions, thrownError)
		{
			  alert('No hay respuesta del servidor');
		});
		event.preventDefault();  
    });
});

