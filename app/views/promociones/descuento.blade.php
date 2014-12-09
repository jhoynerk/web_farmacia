@extends('layouts.master')
@section('tituloWeb')
Registro de Descuentos
@stop
@section('contenido')
<div class="container">
    <div class="row">
        <div style="text-align: center"><h2>Farmacias Bys | Registro de Descuentos</h2></div>
    </div>
    <div class="row">
        <a href="<?php echo url('admin/'); ?>/promociones/">Volver</a><br/><br/>
    </div>
    <div class="row">
        <hr />
        <p><h4>Nuevo Descuento</h4></p>
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

            
            <div class="control-group">
                <label class="control-label">PDF de descuentos</label>
                <div class="controls">
                    <input id="document" type="file" class="" name="document" required/>
                </div>
            </div>
           
            <button class='btn btn-info' type="submit">Guardar</button>
        </form>
    </div>
</div>
<!-- Optional: Incluir la librería de jQuery -->
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>

@stop
