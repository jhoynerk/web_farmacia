<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8' name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Farmacia {{$farmacia->nombre}} | Farmacias ByS</title>
        {{HTML::style('fonts/stylesheet.css')}}
        {{HTML::style('css/bootstrap.min.css')}}
        {{HTML::style('css/home.css')}}
        {{HTML::style('css/style.css')}}
        {{HTML::style('css/farmacias/detalle.css')}}
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
        <script>
            var map;
            function initialize() {
                var mapOptions = {
                    zoom: 12,
                    center: new google.maps.LatLng({{$farmacia->latitud}}, {{$farmacia->longitud}})
                };
                map = new google.maps.Map(document.getElementById('input_map'), mapOptions);
                var marker = new google.maps.Marker({
                    position: map.getCenter(),
                    map: map,
                    icon: '../img/gotas.png',
                });
            }
            google.maps.event.addDomListener(window, 'load', initialize);
    </script>    
    </head>
    <body>
        {{$header_home}}
        <div class="container">
        	<div class="grid">
                <div class="head-contenido">
                        <h1 class="titulo text-purple" title="{{$farmacia->nombre}}">{{$farmacia->nombre}}</h1>
                        <p>{{$farmacia->slogan}}</p>
                    </div>
                    
                <div class="row">
                    <div class="container-left">
                        <hr/>
                        <div id="home-inferior-grande" class="carousel slide">                           
                            <!-- Carousel items -->
                            <div class="carousel-inner">                                
                                @if(count($imagen) > 0)
                                <?php $primero = true; ?>
                                @foreach($imagen as $key=>$carrusel)
                                <div class="<?php echo ($primero) ? 'active ' : '' ?>item">{{HTML::image('upload-images/'.$carrusel->imagen600,$carrusel->alt, array('width' => '470px','height' => '470px', 'title' => $farmacia->nombre))}}</div>
                                <?php $primero = false; ?>
                                @endforeach
                                @else
                                <div class="active item">{{HTML::image('img/1.jpg','',array('width'=>'470px','height'=>'470px'))}}</div>
                                @endif
                            </div>
                            <!-- Carousel nav -->
                            <a class="carousel-control left" href="#home-inferior-grande" data-slide="prev"><div class="arrow-min left"></div></a>
                            <a class="carousel-control right" href="#home-inferior-grande" data-slide="next"><div class="arrow-min right"></div></a>
                        </div>

                    </div>
                    <div class="container-right">
                        <div class="bot-content">
                            <center>{{HTML::image('img/gota.png','Gota',array('align'=>'center'))}}</center>
                            <p><span class="NombreTitulo titulo text-purple">Encu&eacute;ntranos</span></p>
                            <hr/>
                            <div id="input_map"></div>
                            <p><u>{{$farmacia->direccion}}</u></p>
                            <p>
                                {{$farmacia->nombre}} <br/>
                                Horario: <font class="text-purple"><b>{{$farmacia->horario}}</b></font>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="container-bottom">
                        <ul class="list-unstyled">
                            @foreach($servicios as $servicio)
                                <li>{{ $servicio->nombre }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>		
       {{$footer_home}}

    </body>
    <!-- Optional: Incluir la librería de jQuery -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    {{ HTML::script('js/bootstrap.min.js'); }}
    <script>
         $('.carousel').carousel({
            interval: 0
        });
         
        $('.carousel').hover(
            function(){
                $(this).find('.carousel-control').css('visibility', 'visible');
            },
            function(){
                $(this).find('.carousel-control').css('visibility', 'hidden');
            }
        );
    </script>
</html>
