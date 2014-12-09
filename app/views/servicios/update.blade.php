@extends('layouts.master')
@section('tituloWeb')
Actualizar servicio
@stop
@section('contenido')
<div class="container">
    <div class="row">
        <div style="text-align: center"><h2>Farmacias Bys</h2></div>
    </div>
    <div class="row">
        <a href="<?php echo url('admin/'); ?>/servicios">Volver</a><br /> <br /> 
    </div>
    <div class="row">

        <hr />
        <p><h4>Actualizar Servicio</h4></p>
        <form method="post" class="form-vertical" id="registrar-form">
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
                    {{ Form::text('nombre', $servicio->nombre, array('required'=>'')) }}        
                </div>
            </div>

            <button class='btn btn-info' type="submit">Guardar</button>
        </form>
    </div>
</div>
@stop
