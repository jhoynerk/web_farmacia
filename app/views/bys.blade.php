<html>
    <head>
        <meta charset='utf-8' name="viewport" content="width=device-width, initial-scale=1.0">
        <title>¿Qu&eacute; es ByS?</title>
        {{HTML::style('fonts/stylesheet.css')}}
        {{HTML::style('css/bootstrap.min.css')}}
        {{HTML::style('css/home.css')}}
        {{HTML::style('css/quees.css')}}
    </head>
    <body>
        {{$header_home}}
        <div class="container">
            
            <div class="grid">
                <div class="head-contenido"><h1 class="text-purple titulo-principal">¿Qu&eacute; es ByS?</h1></div>
                <div class="contenido">
                    <div class="inner-grid-left">   
                        <p class="text-content">ByS <span class="text-purple-dark">(Bienestar y Salud)</span> es una marca que busca elevar el nivel de efectividad comercial de las farmacias independientes con &eacute;nfasis en ambientaci&oacute;n y excelencia operacional para los clientes que visitan la farmacia. Busca ser un s&iacute;mbolo de confiablidad, servicio, responsabilidad, comodidad y bienestar.</p>
                        <p class="text-content">ByS <span class="text-purple-dark">(Bienestar y Salud)</span> busca fortalecer a la farmacia independiente logrando negociaciones por volumen, para lograr estrategias efectivas y llamativas direccionando a los clientes potenciales a las farmacias independientes que se encuentra dentro del programa ByS <span class="text-purple-dark">(Bienestar y Salud)</span>. El programa busca certificar a las farmacias independientes en 4 aspectos fundamentales:</p>

                    </div>
                    <div class="inner-grid-right">
                        <!-- <div class="arrow-big right"></div> -->                        
                        {{HTML::image('img/home/flecha_derecha.png', 'flecha', array('class'=>'content-arrow'))}}
                        {{HTML::image('img/recuadro2.jpg', 'linea')}}
                    </div>
                </div>
            </div>
            <div class="hr">
                
            </div>
            <div class="grid">
                <div class="contenido">
                    <div class="inner-grid-left">
                        {{HTML::image('img/recuadro.jpg', 'recuadro')}}
                    </div>
                    <div class="inner-grid">
                        <ul class="list">
                            <li> <span class="text-purple-dark">Ambientaci&oacute;n:</span> mejora la imagen de la farmacia iniciando desde una ambientaci&oacute;n interna y externa de la farmacia identific&aacute;ndola como una farmacia del programa ByS, sin perder su identidad.</li>
                            <li><span class="text-purple-dark">Capacitaci&oacute;n:</span> genera un programa de capacitaci&oacute;n constante tanto para el personal de la farmacia, como para los propietarios. Manteniendo a las farmacias dependientes actualizadas.</li>
                            <li><span class="text-purple-dark">Procesos:</span> ByS (Bienestar y Salud) trabajar&aacute; de la mano de las farmacias para mejorar sus procesos, tanto administrativos, operacionales y de mercadeo. Con el fin de hacer crecer a las crecer a las farmacia en su rentabilidad.</li>
                            <li><span class="text-purple-dark">Tecnolog&iacute;a:</span> ByS (Bienestar y Salud) cuenta con un sistema de inform&aacute;tica, hecho a la medida del negocio farmac&eacute;utico en donde la farmacia independiente podr&aacute; llevar un mejor control de sus inventarios, pedidos, fecha de vencimiento, control total de la caja y un contacto directo con sus proveedores, realizando pedidos en l&iacute;nea.</li>
                            <li class="no-style">Dentro del programa de ByS <span class="text-purple-dark">(Bienestar y Salud)</span> se busca que las farmacias tengan un soporte con el cual puedan lograr negociaciones para adquirir servicios y/o equipos  como: motos para servicio a domicilio, seguros, POS, publicidad masiva y alternativa, imagen de marca, estrategia de marketing dirigidas a sus negocios y clientes, entre otros. </li>
                        </ul>
                    </div>
                </div>
            </div>
              
        </div>
        {{$footer_home}} 
    </body>
</html>
