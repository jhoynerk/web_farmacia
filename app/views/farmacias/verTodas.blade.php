<!DOCTYPE html>
<html>
	<head>
		<title>Listado de Farmacias | Farmacias ByS</title>
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
		<meta charset="utf-8">			
		{{HTML::style('fonts/stylesheet.css')}}
		{{HTML::style('css/bootstrap.min.css')}}
		{{HTML::style('css/home.css')}}
		{{HTML::style('css/farmacias/verTodas.css')}}
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true&libraries=places"></script>
		
		<script>
			var map;
			var marcadores = [];
			var prev_infowindow = false;
			var ponerFarmacias = function(data) {
				LatLngExtend = new google.maps.LatLngBounds;
				$.each(data, function(i, obj) {
					
					var LatLng = new google.maps.LatLng(obj.latitud, obj.longitud);
					LatLngExtend.extend(LatLng);

					var imagen = "" ;
					if(obj.imagenes.length > 0){
						var imprime = false;
						for(var i = 0;i<obj.imagenes.length;i++)
						{
							if(obj.imagenes[i].tipo=="Fachada")
							{
								imagen = "<p><img src='<?php echo url('/') ?>/upload-images/"+obj.imagenes[i].imagen60+"' width='72px' height='72px'></p>";
								imprime = true;
								break;
							}
						}
						if(!imprime){
							imagen = "<p><img src='<?php echo url('/') ?>/img/3.jpg' width='72px' height='72px'></p>";
						}
					}else{
						imagen = "<p><img src='<?php echo url('/') ?>/img/3.jpg' width='72px' height='72px'></p>";
					}					
					var contentString = '<div id="content">'+
									'<div id="siteNotice">'+
									'<a href=<?php echo url('/') ?>/farmacias/'+obj.slug+'><span id="firstHeading" class="titulo text-purple">'+obj.nombre+'</span></a>'+
									'<p class="resena"><u>'+obj.direccion+'</u></p>'+
									'</div>'+
									'<div id="sitephoto">'+imagen+'</div>'+	
									'</div>';
					var infowindow = new google.maps.InfoWindow({
						content: contentString
					});

					var marcador = new google.maps.Marker({
						title: obj.nombre,
						position: new google.maps.LatLng(obj.latitud, obj.longitud),
						map: map,
						icon: 'img/gotas.png'
					});
					map.setCenter(new google.maps.LatLng(obj.latitud, obj.longitud));
					google.maps.event.addListener(marcador, 'click', function() {
						if( prev_infowindow )
						{
							prev_infowindow.close();
						}
						prev_infowindow = infowindow;
						infowindow.open(map, marcador);
					});
					google.maps.event.addListener(map, 'click', function() {
						infowindow.close();
					});
				});
				map.setCenter( LatLngExtend.getCenter() );
			};
			function initialize() {

				var mapOptions = {
					zoom: 8,
					center: new google.maps.LatLng(14.876623, -91.591355),
				    mapTypeControl: true,
				    mapTypeControlOptions: {
				        style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
				        position: google.maps.ControlPosition.TOP_RIGHT
				    },
				    panControl: true,
				    panControlOptions: {
				        position: google.maps.ControlPosition.TOP_LEFT
				    },
				    zoomControl: true,
				    scaleControl: false,
				    streetViewControl: true

				};
				map = new google.maps.Map(document.getElementById('input_map'),
						mapOptions);
                                
                                var geocoder = new google.maps.Geocoder();
                                var input = document.getElementById('input_buscar');
                                map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
                                var autocomplete = new google.maps.places.Autocomplete(input);
                                google.maps.event.addDomListener(input, 'keydown', function(e) {
                                    if (e.keyCode == 13) {
                                        var address = document.getElementById("input_buscar").value;
                                        if (geocoder)
                                        {
                                            geocoder.geocode({'address': address}, function(results, status) {
                                                if (status == google.maps.GeocoderStatus.OK)
                                                {
                                                    map.setCenter(results[0].geometry.location);
                                                    map.setZoom(13);
                                                }
                                            });
                                        }
                                        e.preventDefault();
                                    }
                                });

				$.getJSON('<?php echo url('/') ?>/ajax', ponerFarmacias);
			}

			google.maps.event.addDomListener(window, 'load', initialize);

		</script>
		
		<script type="text/javascript">
			$(document).ready(function()
			{				
				$(".pagination a").on('click', function( event )
				{
					event.preventDefault();
					var myurl = $(this).attr('href');
					$.ajax(
					{
						url: myurl,
						type: "get",
						datatype: "html",
					})
					.done(function(data)
					{
						$('#farmacias').html(data.html);						
						google.maps.event.addDomListener(window, 'load', initialize);
					})
					.fail(function(jqXHR, ajaxOptions, thrownError)
					{
						  alert('No hay respuesta del servidor');
					});
					
				});
			});

		</script>
	</head>
	<body>
		{{ $header_home }}
		<div class="container">	
			
			<div class="head-contenido"><h1 class="text-purple titulo-principal">Listado de Farmacias </h1>&nbsp;&nbsp;&nbsp;
				<img src="<?php URL::to('/') ?>img/home/microscopio-morado.png" alt="microscopio"></div>
			
			<div class="row row-mapa">
                                <input id="input_buscar" class="controls" type="text" placeholder="Buscar" style="visibility:hidden;">	
				<div id="input_map"></div>
			</div>
			<div class="row">
				<hr id="hr">
			</div>
			<div  id="farmacias">
				{{ $listado_farmacias }}
			</div>
				

			<div class="clear"></div>
		</div>
		{{$footer_home}}
	</body>
</html>
