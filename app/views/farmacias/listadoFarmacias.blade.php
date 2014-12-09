<div class="row">
    <?php $style = 0 ?>
    @foreach ($farmacias as $farmacia)
        @if($style == 0)
            <div class="grid">
            <?php $style = 1 ?>    
        @else
            <div class="grid2">
            <?php $style = 0 ?>    
        @endif

        @if(count($farmacia->imagenes) > 0)
        <?php $imprime = false; ?>
        @foreach ($farmacia->imagenes as $imagen)
        @if($imagen->tipo == "Fachada" && !$imprime)
        <a href="<?php echo url('/') ?>/farmacias/{{ $farmacia->slug }}">
            {{HTML::image('upload-images/'.$imagen->imagen250,$imagen->alt,array('width'=>'160px','height'=>'auto', 'class'=>'list-img'))}}
        </a>
        <?php $imprime=true;?>
        @endif
        @endforeach
        @if(!$imprime)
        <a href="<?php echo url('/') ?>/farmacias/{{ $farmacia->slug }}">
            {{HTML::image('img/3.jpg','',array('width'=>'160px','height'=>'auto', 'class'=>'list-img'))}}
        </a>
        @endif
        @else        
        <a href="<?php echo url('/') ?>/farmacias/{{ $farmacia->slug }}">
            {{HTML::image('img/3.jpg','',array('width'=>'160px','height'=>'auto', 'class'=>'list-img'))}}
        </a>
        @endif
        <a href="<?php echo url('/') ?>/farmacias/{{ $farmacia->slug }}"><h2 class="titulo text-purple">{{ $farmacia->nombre }}</h2></a>
        <div class="resena"><p>{{ $farmacia->slogan }}</p>
            <u>{{ $farmacia->direccion}}</u></div>
    </div>    
    @endforeach
</div>	
<div class="row">
    <center>
        {{ $farmacias_pages }}
    </center>				
</div>	