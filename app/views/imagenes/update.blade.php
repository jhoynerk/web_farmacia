@extends('layouts.master')
@section('tituloWeb')
Actualizar imagen
@stop
@section('contenido')
<div class="container">
    <div class="row">
        <div style="text-align: center"><h2>Farmacias Bys</h2></div>
    </div>
    <div class="row">
        <a href="<?php echo url('admin/'); ?>/farmacias/">Volver</a>
    </div>
    
    <div class="row">

        <hr />
        <p><h4>Actualizar Imagen</h4></p>
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

            <div style='display:none'>
                <input type='hidden' name='csrfmiddlewaretoken' value='IrZwy4iuA1VPBcD8NBnCrMHiOUlcdtZO' />
                <input type="hidden" name='id_imagen' id="id_imagen" value='{{$imagen->id}}'>
                <input type="hidden" name='id_farmacia' id="id_farmacia" value='{{$imagen->farmacia_id}}'>
            </div>
            <div class="control-group">
                <label class="control-label">Nombre Imagen</label>
                <div class="controls">                
                    {{ Form::text('nombreImagen', $imagen->alt,array('required'=>'')) }}        
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Tipo</label>
                <div class="controls">
                    {{ Form::select('tipoImagen', array(''=>'-', 'Fachada' => 'Fachada', 'Interior' => 'Interior'), $imagen->tipo,array('required'=>''))}}
                </div>
            </div>
            @if(isset($errorArchivo))
            <ul class="messages" style="color:#FF0000;">
                <li>Ocurrio un error al subir el archivo, esto es lo que sabemos: {{ $errorArchivo }}</li>
            </ul>
            @endif
            <div class="control-group">
                <label class="control-label">Cambiar Imagen</label>
                <div class="controls">
                    {{ Form::file('imagen') }}
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Imagen</label>
                <div class="controls">
                    {{HTML::image('/upload-images/'.$imagen->imagen600)}}
                </div>
            </div>

            <button class='btn btn-info' type="submit">Guardar</button>
        </form>
    </div>
</div>
@stop
