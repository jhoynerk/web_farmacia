@extends('layouts.master')
@section('tituloWeb')
Actulizar Descuentos
@stop
@section('contenido')
<div class="container">
    <div class="row">
        <div style="text-align: center"><h2>Farmacias Bys | Registro de promociones</h2></div>
    </div>
    <div class="row">
        <a href="<?php echo url('admin/'); ?>/promociones/">Volver</a><br/><br/>
    </div>
    <div class="row">
        <hr />
        <p><h4>Actualizar promoción</h4></p>
        <form method="post" class="form-vertical" id="registrar-form" enctype="multipart/form-data">
            <ul class="messages" style="color:#FF0000;">
                @if($errors->has())
                Ocurrieron los siguientes errores al procesar el formulario
                <ul>
                    @foreach($errors->all() as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </ul>

            <div style='display:none'><input type='hidden' name='csrfmiddlewaretoken' value='IrZwy4iuA1VPBcD8NBnCrMHiOUlcdtZO' /></div>

            <div class="control-group">
                <label class="control-label">Nombre</label>
                <div class="controls">
                    <input id="id_nombre" type="text" class="" name="nombre" value="{{$promocion->nombre}}" required/>
                </div>
            </div>   

            <div class="control-group">
                <label class="control-label">Descripción</label>
                <div class="controls">
                    <input id="id_descripcion" type="text" class="" name="descripcion" value="{{$promocion->descripcion}}" required/>
                </div>
            </div> 

            <div class="control-group">
                <label class="control-label">Tipo</label>
                <div class="controls">
                     {{Form::select('tipoPromocion',array('home-principal'=>'HOME Principal','home-inferior-grande'=>'HOME Inferior grande',
                    'home-inferior-peque1'=>'HOME inferior pequeño arriba','home-inferior-peque2'=>'HOME inferior pequeño abajo',
                    'dctos-superior-grande1'=>'Descuentos superior grande izquierdo','dctos-superior-grande2'=>'Descuentos superior grande derecho',
                    'dctos-superior-pequenos1'=>'Descuentos superior pequeño derecho arriba','dctos-superior-pequenos2'=>'Descuentos superior pequeño derecho abajo',
                    'dctos-superior-pequenos3'=>'Descuentos superior pequeño izquieda arriba','dctos-superior-pequenos4'=>'Descuentos superior pequeño izquieda abajo',
                    'dctos-inferior-grande1'=>'Descuentos inferior grande izquierdo','dctos-inferior-grande2'=>'Descuentos inferior grande derecho'
                    ),$promocion->tipo,array('required'=>''));}}                    
                </div>
            </div> 
            <div class="control-group">
                <label class="control-label">Imagen de la promoción</label>
                <div class="controls">
                    {{HTML::image('/upload-images/'.$promocion->ruta)}}
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Cambiar imagen de la promoción</label>
                <div class="controls">
                    <input id="imagen" type="file" class="" name="imagen"/>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Fecha de vencimiento</label>
                <div class="controls">
                    <input id="fechaVencimiento" type="text" class="" value="{{$promocion->vencimiento}}" name="fechaVencimiento" required/>
                </div>
            </div>
            <button class='btn btn-info' type="submit">Guardar</button>
        </form>


    </div>
</div>
<!-- Optional: Incluir la librería de jQuery -->
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script type="text/javascript">
// When the document is ready
$(document).ready(function() {
    $('#fechaVencimiento').datepicker({
        dateFormat: 'yy-mm-dd',
        showButtonPanel: true,
        minDate: 0 // minDate: '0' would work too
    });
});
</script>
@stop
