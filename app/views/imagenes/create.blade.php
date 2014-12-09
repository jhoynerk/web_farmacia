@extends('layouts.master')
@section('tituloWeb')
Asignar imagen
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
        <p><h4>Nueva Imagen</h4></p>
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
                <input type='hidden' name='id_farmacia' id='id_farmacia' value='{{$idFarmacia}}' >
            </div>
            <div class="control-group">
                <label class="control-label">Nombre Imagen</label>
                <div class="controls">
                    <input id="nombreImagen" type="text" class="" name="nombreImagen" value="{{Input::old('nombre')}}" maxlength="50" required/>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Tipo</label>
                <div class="controls">
                    <select id="tipoImagen" type="text" name="tipoImagen" class="selectpicker" required>
                        <option value=''>-</option>
                        <option value='Fachada'>Fachada</option>
                        <option value='Interior'>Interior</option>
                    </select>
                </div>
            </div>
            @if(isset($errorArchivo))
            <ul class="messages" style="color:#FF0000;">
                <li>Ocurrio un error al subir el archivo, esto es lo que sabemos: {{ $errorArchivo }}</li>
            </ul>
            @endif
            <div class="control-group">
                <label class="control-label">Imagen a subir</label>
                <div class="controls">
                    <input id="imagen" type="file" class="" name="imagen" required/>
                </div>
            </div>
            <button class='btn btn-info' type="submit">Guardar Imagen</button>
        </form>


    </div>
</div>
@stop
