@extends('layouts.master')
@section('tituloWeb')
Registro de rol
@stop
@section('contenido')
<div class="container">
    <div class="row">
        <div style="text-align: center"><h2>Farmacias Bys | Creación de nuevo rol</h2></div>
    </div>
    <div class="row">

        <a href="<?php echo url('admin/'); ?>/rol/">Volver</a><br /><br />            

    </div>
    <div class="row">

    </div>
    <div class="row">

    </div>
    <div class="row">

        <hr />
        <p><h4>Nuevo Rol</h4></p>
        <form method="post" class="form-vertical" id="registrar-form">
            <ul class="messages">

            </ul>

            <div style='display:none'><input type='hidden' name='csrfmiddlewaretoken' value='IrZwy4iuA1VPBcD8NBnCrMHiOUlcdtZO' /></div>

            <div class="control-group">
                <label class="control-label">Nombre</label>
                <div class="controls">
                    <input id="id_nombre" type="text" class="" name="nombre" maxlength="50" />
                </div>
            </div>        

            <button class='btn btn-info' type="submit">Guardar</button>
        </form>


    </div>
</div>
@stop
