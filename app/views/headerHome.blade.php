<div class="purple">
    <div class="container" id="header">	
	    <div id="nav-header">
	        <ul class="nav nav-pills">
	            <li><a class="" href="<?php echo URL('/')?>">Home</a></li>
	            <li><a class="" href="<?php echo URL('/') ?>/bys">¿Qu&eacute; es ByS?</a></li>
	            <li><a class="" href="<?php echo url('/'); ?>/farmacias">Farmacias</a></li>
	            <li class="last"><a href="<?php echo URL('/') ?>/descuentos">Descuentos</a></li>
	            <li class="last temporal">                							
	                <!-- <div class="controls">
	                    <div class="input-append">
	                        <input type="text" class="span2" id="btn-buscar" placeholder="Buscar">
	                        <span class="add-on" id="input-img"><i class="icon-search"></i></span>
	                    </div>
	                </div> -->
	            </li>				
	        </ul>					
	    </div>
	    <div id="logo">
	    	<a class="" href="<?php echo URL('/')?>">{{HTML::image('img/home/logo.png', 'logo Bys')}}</a>
	    </div>
	    <div id="nav-social">
	        <a href="https://www.facebook.com/farmaciasbys"> <div class='social purple-facebook'></div>
	        <a href="https://twitter.com/FarmaciasByS"><div class='social purple-twitter'></div></a>
	        <a href="{{$filePdf}}"><div class='social purple-d'></div></a>	
	    </div>
	</div>		
</div>	