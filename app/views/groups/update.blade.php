@extends('layouts.master')
@section('tituloWeb')
Actualizar roles
@stop
@section('contenido')
<div class="container">
    <div class="row">
        <div style="text-align: center"><h2>Farmacias Bys | Actualizar Roles</h2></div>
    </div>
    <div class="row">

        <a href="<?php echo url('admin/'); ?>/rol/">Volver</a><br /><br />  

    </div>
    <div class="row">

        <hr />
        <p><h4>Actualizar rol</h4></p>
        <form method="post" class="form-vertical" id="registrar-form">
            <ul class="messages">

            </ul>

            <div style='display:none'><input type='hidden' name='csrfmiddlewaretoken' value='IrZwy4iuA1VPBcD8NBnCrMHiOUlcdtZO' /></div>

            <div class="control-group">
                <label class="control-label">Nombre</label>
                <div class="controls">                        
                    {{ Form::text('nombre', $groups->name ) }}
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Tipo de Permiso</label>
                <div class="controls">                        
                    {{ Form::label('permisos',$groups->permissions ) }}
                </div>
            </div>
            <br /><br /><br />
            <button class='btn btn-info' type="submit">Guardar</button>
        </form>
    </div>
</div>
@stop
