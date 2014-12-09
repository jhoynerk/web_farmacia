<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8' name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Descuentos Farmacias Bys</title>
        <meta name="description" content="">
        <meta name="keywords" content="red de farmacias bys, guatemala, medicamentos, farmaceuticas, medicinas, ">
        {{HTML::style('fonts/stylesheet.css')}}
        {{HTML::style('css/bootstrap.min.css')}}
        {{HTML::style('css/home.css')}}
        {{HTML::style('css/descuentos.css')}}       
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
    </head>
    <body>
        {{$header_home}}
        <div class="container">


            <div class="contenido-superior">
                <div class="caruseles-superiores">
                    <div id="dctos-superior-grande1" class="carousel slide"> 
                        <div class="carousel-inner">
                            <!-- Carousel items -->
                            @if(count($carruseles['dctos-superior-grande1'])>0)
                            <?php $primero = true; ?>
                            @foreach($carruseles['dctos-superior-grande1'] as $key=>$carrusel)
                            <div class="<?php echo ($primero) ? 'active ' : '' ?>item">{{HTML::image('upload-images/'.$carrusel->ruta, $carrusel->nombre, array('width' => '400px','height' => '270px'))}}</div>
                            <?php $primero = false; ?>
                            @endforeach
                            @else
                            <div class="active item">{{HTML::image('img/blanco1.png', 'Blanco', array('width' => '400px','height' => '270px'))}}</div>
                            @endif
                        </div> 
                         <!-- Carousel nav -->
                        <a class="carousel-control left" href="#dctos-superior-grande1" data-slide="prev"><div class="arrow-min left"></div></a>
                        <a class="carousel-control right" href="#dctos-superior-grande1" data-slide="next"><div class="arrow-min right"></div></a>
                    </div> 
                    <div id="dctos-superior-pequenos1" class="carousel slide"> 
                        <div class="carousel-inner">
                            <!-- Carousel items -->
                            @if(count($carruseles['dctos-superior-pequenos1'])>0)
                            <?php $primero = true; ?>
                            @foreach($carruseles['dctos-superior-pequenos1'] as $key=>$carrusel)
                            <div class="<?php echo ($primero) ? 'active ' : '' ?>item">{{HTML::image('upload-images/'.$carrusel->ruta, $carrusel->nombre, array('width' => '400px','height' => '130px'))}}</div>
                            <?php $primero = false; ?>
                            @endforeach
                            @else
                            <div class="active item">{{HTML::image('img/blanco1.png', 'Blanco', array('width' => '400px','height' => '130px'))}}</div>
                            @endif
                        </div> 
                         <!-- Carousel nav -->
                        <a class="carousel-control left" href="#dctos-superior-pequenos1" data-slide="prev"><div class="arrow-min left"></div></a>
                        <a class="carousel-control right" href="#dctos-superior-pequenos1" data-slide="next"><div class="arrow-min right"></div></a>
                    </div>
                    <div id="dctos-superior-pequenos2" class="carousel slide"> 
                        <div class="carousel-inner">
                            <!-- Carousel items -->
                            @if(count($carruseles['dctos-superior-pequenos2'])>0)
                            <?php $primero = true; ?>
                            @foreach($carruseles['dctos-superior-pequenos2'] as $key=>$carrusel)
                            <div class="<?php echo ($primero) ? 'active ' : '' ?>item">{{HTML::image('upload-images/'.$carrusel->ruta, $carrusel->nombre, array('width' => '400px','height' => '130px'))}}</div>
                            <?php $primero = false; ?>
                            @endforeach
                            @else
                            <div class="active item">{{HTML::image('img/blanco1.png', 'Blanco', array('width' => '400px','height' => '130px'))}}</div>
                            @endif
                        </div> 
                         <!-- Carousel nav -->
                        <a class="carousel-control left" href="#dctos-superior-pequenos2" data-slide="prev"><div class="arrow-min left"></div></a>
                        <a class="carousel-control right" href="#dctos-superior-pequenos2" data-slide="next"><div class="arrow-min right"></div></a>
                    </div>
                    <div class="superior-pquenos">
                        <div id="dctos-superior-pequenos3" class="carousel slide"> 
                            <div class="carousel-inner">
                                <!-- Carousel items -->
                                @if(count($carruseles['dctos-superior-pequenos3'])>0)
                                <?php $primero = true; ?>
                                @foreach($carruseles['dctos-superior-pequenos3'] as $key=>$carrusel)
                                <div class="<?php echo ($primero) ? 'active ' : '' ?>item">{{HTML::image('upload-images/'.$carrusel->ruta, $carrusel->nombre, array('width' => '400px','height' => '130px'))}}</div>
                                <?php $primero = false; ?>
                                @endforeach
                                @else
                                <div class="active item">{{HTML::image('img/blanco1.png', 'Blanco', array('width' => '400px','height' => '130px'))}}</div>
                                @endif
                            </div> 
                             <!-- Carousel nav -->
                            <a class="carousel-control left" href="#dctos-superior-pequenos3" data-slide="prev"><div class="arrow-min left"></div></a>
                            <a class="carousel-control right" href="#dctos-superior-pequenos3" data-slide="next"><div class="arrow-min right"></div></a>
                        </div>
                        <div id="dctos-superior-pequenos4" class="carousel slide"> 
                            <div class="carousel-inner">
                                <!-- Carousel items -->
                                @if(count($carruseles['dctos-superior-pequenos4'])>0)
                                <?php $primero = true; ?>
                                @foreach($carruseles['dctos-superior-pequenos4'] as $key=>$carrusel)
                                <div class="<?php echo ($primero) ? 'active ' : '' ?>item">{{HTML::image('upload-images/'.$carrusel->ruta, $carrusel->nombre, array('width' => '400px','height' => '130px'))}}</div>
                                <?php $primero = false; ?>
                                @endforeach
                                @else
                                <div class="active item">{{HTML::image('img/blanco1.png', 'Blanco', array('width' => '400px','height' => '130px'))}}</div>
                                @endif
                            </div> 
                             <!-- Carousel nav -->
                            <a class="carousel-control left" href="#dctos-superior-pequenos4" data-slide="prev"><div class="arrow-min left"></div></a>
                            <a class="carousel-control right" href="#dctos-superior-pequenos4" data-slide="next"><div class="arrow-min right"></div></a>
                        </div>
                    </div>

                    <div id="dctos-superior-grande2" class="carousel slide"> 
                        <div class="carousel-inner">
                            <!-- Carousel items -->
                            @if(count($carruseles['dctos-superior-grande2'])>0)
                            <?php $primero = true; ?>
                            @foreach($carruseles['dctos-superior-grande2'] as $key=>$carrusel)
                            <div class="<?php echo ($primero) ? 'active ' : '' ?>item">{{HTML::image('upload-images/'.$carrusel->ruta, $carrusel->nombre, array('width' => '400px','height' => '270px'))}}</div>
                            <?php $primero = false; ?>
                            @endforeach
                            @else
                            <div class="active item">{{HTML::image('img/blanco1.png', 'Blanco', array('width' => '400px','height' => '270px'))}}</div>
                            @endif
                        </div> 
                         <!-- Carousel nav -->
                        <a class="carousel-control left" href="#dctos-superior-grande2" data-slide="prev"><div class="arrow-min left"></div></a>
                        <a class="carousel-control right" href="#dctos-superior-grande2" data-slide="next"><div class="arrow-min right"></div></a>
                    </div> 
                </div>                  
            </div>
        </div>
        <div class="purple">     	
            <a href="{{$filePdf}}">
	        <div class="contenido-nav">   
                <div class=" container">
                    <p class="mensaje-left">¿Quieres m&aacute;s ofertas?</p>
                    <p class="mensaje-right">Haz clic aqu&iacute; y revisa todo nuestro cat&aacute;logo de ofertas farmac&eacute;uticas.</p>
                </div>
            </div>
            </a>
        </div>
        <div class="container">
            <div class="contenido-inferior">
                <div id="dctos-inferior-grande1" class="carousel slide"> 
                    <div class="carousel-inner">
                        <!-- Carousel items -->
                        @if(count($carruseles['dctos-inferior-grande1'])>0)
                        <?php $primero = true; ?>
                        @foreach($carruseles['dctos-inferior-grande1'] as $key=>$carrusel)
                        <div class="<?php echo ($primero) ? 'active ' : '' ?>item">{{HTML::image('upload-images/'.$carrusel->ruta, $carrusel->nombre, array('width' => '400px','height' => '270px'))}}</div>
                        <?php $primero = false; ?>
                        @endforeach
                        @else
                        <div class="active item">{{HTML::image('img/blanco1.png', 'Blanco', array('width' => '400px','height' => '270px'))}}</div>
                        @endif
                    </div> 
                     <!-- Carousel nav -->
                    <a class="carousel-control left" href="#dctos-inferior-grande1" data-slide="prev"><div class="arrow-min left"></div></a>
                    <a class="carousel-control right" href="#dctos-inferior-grande1" data-slide="next"><div class="arrow-min right"></div></a>
                </div>
                <div id="dctos-inferior-grande2" class="carousel slide"> 
                    <div class="carousel-inner">
                        <!-- Carousel items -->
                        @if(count($carruseles['dctos-inferior-grande2'])>0)
                        <?php $primero = true; ?>
                        @foreach($carruseles['dctos-inferior-grande2'] as $key=>$carrusel)
                        <div class="<?php echo ($primero) ? 'active ' : '' ?>item">{{HTML::image('upload-images/'.$carrusel->ruta, $carrusel->nombre, array('width' => '400px','height' => '270px'))}}</div>
                        <?php $primero = false; ?>
                        @endforeach
                        @else
                        <div class="active item">{{HTML::image('img/blanco1.png', 'Blanco', array('width' => '400px','height' => '270px'))}}</div>
                        @endif
                    </div> 
                     <!-- Carousel nav -->
                    <a class="carousel-control left" href="#dctos-inferior-grande2" data-slide="prev"><div class="arrow-min left"></div></a>
                    <a class="carousel-control right" href="#dctos-inferior-grande2" data-slide="next"><div class="arrow-min right"></div></a>
                </div> 
            </div> 

            <div class="clear"></div>
        </div>		
        {{$footer_home}}
    </body>  
    

    <!-- Optional: Incorporar los plug-ins de JavaScript de Bootstrap -->
    <script type="text/javascript" src="<?php URL::to('/') ?>js/bootstrap.min.js"></script>

    <script type="text/javascript" src="<?php URL::to('/') ?>js/home.js"></script>
</html>
