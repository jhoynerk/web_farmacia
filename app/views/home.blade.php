<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8' name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Red de Farmacias ByS</title>
        <meta name="description" content="">
        <meta name="keywords" content="red de farmacias bys, bienestar y salud, guatemala, medicamentos, farmaceuticas, medicinas, farmacias independientes, confiabilidad, servicio, responsabilidad, comodidad, bienestar">
        <link rel="stylesheet" type="text/css" href="<?php URL::to('/') ?>fonts/stylesheet.css">
        <link rel="stylesheet" type="text/css" href="<?php URL::to('/') ?>css/bootstrap.min.css" >
        <link rel="stylesheet" type="text/css" href="<?php URL::to('/') ?>css/home.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true&libraries=places"></script> 
        <script>
            var map;
            var marcadores = [];
            var prev_infowindow = false;
            function initialize() {
                var mapOptions = {
                    zoom: 8,
                    center: new google.maps.LatLng(14.876623, -91.591355)
                };
                map = new google.maps.Map(document.getElementById('input_map'),
                        mapOptions);

                LatLngExtend = new google.maps.LatLngBounds;
                $.each({{$farmacias}}, function(i, obj) {
                    var LatLng = new google.maps.LatLng(obj.latitud, obj.longitud);
                    LatLngExtend.extend(LatLng);
                    var contentString = '<div id="content">'+
                                    '<div id="siteNotice">'+
                                    '<a id="link" href=<?php echo url('/') ?>/farmacias/'+obj.slug+'>'+
                                    '<h4 id="firstHeading" class="firstHeading titulo-map text-purple">'+obj.nombre+'</h4>'+
                                    '</a>'+
                                    '</div>'+
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
                    marcadores.push(marcador);
                    google.maps.event.addListener(map, 'click', function() {
                        infowindow.close();
                    });
                });
                map.setCenter( LatLngExtend.getCenter() );
            }

            google.maps.event.addDomListener(window, 'load', initialize);
            
            var myurl = "<?php echo url('/') ?>/suscribir";
        </script>
        <style>
           

        </style>
    </head>
    <body>
        {{$header_home}}

        <div class="purple">    	
	        <div class="container" id="banner">
                <div id="carousel">
                    <div id="home-principal" class="carousel slide">
                        
                        <!-- Carousel items -->
                        <div class="carousel-inner">
                            @if(count($carruseles['home-principal'])>0)
                            <?php $primero = true; ?>
                            @foreach($carruseles['home-principal'] as $key=>$carrusel)
                            <div class="<?php echo ($primero) ? 'active ' : '' ?>item">{{HTML::image('upload-images/'.$carrusel->ruta, $carrusel->nombre, array('width' => '960px','height' => '400px'))}}</div>
                            <?php $primero = false; ?>
                            @endforeach
                            @else
                            <div class="active item">{{HTML::image('img/blanco1.png', 'Blanco', array('width' => '960px','height' => '400px'))}}</div>
                            @endif
                        </div>
                        <!-- Carousel nav -->
                        <a class="carousel-control left" href="#home-principal" data-slide="prev"><div class="arrow-big left"></div></a>
                        <a class="carousel-control right" href="#home-principal" data-slide="next"><div class="arrow-big right"></div></a>
                    </div>			
                </div>	
            </div>
         </div>

         <div class="purple">
	        <div class="container" id="login">
                <div id="form-login">
                    <form id="suscribir" class="navbar-form" method="get">
                        <span id="title">¡Obt&eacute;n nuestro bolet&iacute;n de ofertas! </span>
                        <input class="span2" id="nombre" name="nombre" type="text" placeholder="Nombre" required>
                        <input class="span2" id="email" name="email" type="email" placeholder="Correo" required>
                        <button type="submit" class="btn" id="button">Ingresar</button>
                    </form>
                    <div id="message-error" style="display:hidden;"> </div>
                </div>				
            </div>
         </div>

        <div class="container" id="container-section">
            <div>
                <div class="grid center"><div class='iconos arrow-down'></div><p class="titulo-aviso">Síguenos en</p></div>
                <div class="grid center"><div class='iconos plus'></div><p class="titulo-aviso"> Farmacias Destacadas </p></div>
                <div class="grid center"><div class='iconos map'></div><p class="titulo-aviso"> Mapa ByS </p></div>
            </div>
            <div>
                <div class="grid">
                    <div class="center">
                        <a href="https://www.twitter.com/FarmaciasByS"><img src="img/home/twitter.png" alt="twitter" width="125px"/></a><a href="https://www.facebook.com/farmaciasbys"><img src="img/home/facebook.png" alt="facebook" width="125px"/></a>
                    </div>
                </div>
                <div class="grid">
                    <div class="center border-purple">
                        @if(is_object($imagen_farmacia))
                        <a href="<?php echo url('/') ?>/farmacias/{{$imagen_farmacia->slug}}">
                        {{HTML::image('upload-images/'.$imagen_farmacia->imagen250,$imagen_farmacia->alt,array('width'=>'250px','height'=>'250px'))}}
                        </a>
                        @else
                        <a>
                        {{HTML::image('img/2.jpg','',array('width'=>'250px','height'=>'250px'))}}
                        </a>  
                        @endif
                                                
                    </div>
                    @if(is_object($imagen_farmacia))
                    <p id="grid-text"> {{$imagen_farmacia->direccion}} </p>
                    @endif 
                </div>
                <div class="grid">                        
                    <div id="input_map" class="centrarMap"></div>
                </div>
            </div>
        </div>

        <div class="purple">
	        <div class="container" id="container-bot">
                <div class="grid-half">
                    <div id="ad-large">
                        <div id="home-inferior-grande" class="carousel slide">                           
                            <!-- Carousel items -->
                            <div class="carousel-inner">
                                @if(count($carruseles['home-inferior-grande'])>0)
                                <?php $primero = true; ?>
                                @foreach($carruseles['home-inferior-grande'] as $key=>$carrusel)
                                <div class="<?php echo ($primero) ? 'active ' : '' ?>item">{{HTML::image('upload-images/'.$carrusel->ruta, $carrusel->nombre, array('width' => '400px','height' => '270px'))}}</div>
                                <?php $primero = false; ?>
                                @endforeach
                                @else
                                <div class="active item">{{HTML::image('img/blanco2.png', 'Blanco', array('width' => '400px','height' => '270px'))}}</div>
                                @endif
                            </div>
                            <!-- Carousel nav -->
                            <a class="carousel-control left" href="#home-inferior-grande" data-slide="prev"><div class="arrow-min left"></div></a>
                            <a class="carousel-control right" href="#home-inferior-grande" data-slide="next"><div class="arrow-min right"></div></a>
                        </div>
                    </div>
                </div>
                <div class="grid-half">
                    <div class="first" id="ad-short">
                        <div id="home-inferior-pequeno1" class="carousel slide">                            
                            <!-- Carousel items -->
                            <div class="carousel-inner">
                                @if(count($carruseles['home-inferior-peque1'])>0)
                                <?php $primero = true; ?>
                                @foreach($carruseles['home-inferior-peque1'] as $key=>$carrusel)
                                <div class="<?php echo ($primero) ? 'active ' : '' ?>item">{{HTML::image('upload-images/'.$carrusel->ruta, $carrusel->nombre, array('width' => '400px','height' => '130px'))}}</div>
                                <?php $primero = false; ?>
                                @endforeach
                                @else
                                <div class="active item">{{HTML::image('img/blanco3.png', 'Blanco', array('width' => '400px','height' => '130px'))}}</div>
                                @endif
                            </div>
                            <!-- Carousel nav -->
                            <a class="carousel-control left" href="#home-inferior-pequeno1" data-slide="prev"><div class="arrow-min left"></div></a>
                            <a class="carousel-control right" href="#home-inferior-pequeno1" data-slide="next"><div class="arrow-min right"></div></a>
                        </div>	
                    </div>
                    <div id="ad-short">
                        <div id="home-inferior-pequeno2" class="carousel slide">                            
                            <!-- Carousel items -->
                            <div class="carousel-inner">	
                                @if(count($carruseles['home-inferior-peque2'])>0)
                                <?php $primero = true; ?>
                                @foreach($carruseles['home-inferior-peque2'] as $key=>$carrusel)
                                <div class="<?php echo ($primero) ? 'active ' : '' ?>item">{{HTML::image('upload-images/'.$carrusel->ruta, $carrusel->nombre, array('width' => '400px','height' => '130px'))}}</div>
                                <?php $primero = false; ?>
                                @endforeach
                                @else
                                <div class="active item">{{HTML::image('img/blanco3.png', 'Blanco', array('width' => '400px','height' => '130px'))}}</div>
                                @endif
                            </div>
                            <!-- Carousel nav -->
                            <a class="carousel-control left" href="#home-inferior-pequeno2" data-slide="prev"><div class="arrow-min left"></div></a>
                            <a class="carousel-control right" href="#home-inferior-pequeno2" data-slide="next"><div class="arrow-min right"></div></a>
                        </div>
                    </div>
                </div>
            </div>

            {{$footer_home}}

            <div class="clear"></div>

    </body>  
    

    <!-- Optional: Incorporar los plug-ins de JavaScript de Bootstrap -->
    <script type="text/javascript" src="<?php URL::to('/') ?>js/bootstrap.min.js"></script>

    <script type="text/javascript" src="<?php URL::to('/') ?>js/home.js"></script>
</html>
