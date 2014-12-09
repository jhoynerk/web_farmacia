@extends('layouts.master')
@section('tituloWeb')
Administrador
@stop
@section('contenido')
<div class="container">
    <div class="row">
        <div style="text-align: center"><h2>Farmacias Bys | Administrador</h2></div>        
    </div>
    <div class="row">
         <a style="float:right" href="<?php echo url('login/'); ?>/logout">Salir</a><br /><br />
    </div>
    <div class="row">
        <div class="control-group">
            <label class="control-label">{{ HTML::link('admin/admin', 'Control de usuarios') }}</label>
        </div>
        <div class="control-group">
            <label class="control-label">{{ HTML::link('admin/farmacias', 'Control de farmacias') }}</label>
        </div>
        <div class="control-group">
            <label class="control-label">{{ HTML::link('admin/servicios', 'Control de servicios') }}</label>
        </div>
        <div class="control-group">
            <label class="control-label">{{ HTML::link('admin/promociones', 'Control de descuentos') }}</label>
        </div>
    </div>
</div>
@stop
