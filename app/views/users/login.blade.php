@extends('layouts.master')
@section('tituloWeb')
Admin login
@stop
@section('contenido')
<div class="container">
    <div class="row">
        <div style="text-align: center"><h2>Farmacias Bys | Admin login</h2></div>
    </div>
    <div class="row">
        <hr />
        <p><h4>Login</h4></p>

        {{Form::open(array('method' => 'POST', 'class'  => 'form-vertocal'))}}    
        <div style='display:none'><input type='hidden' name='csrfmiddlewaretoken' value='IrZwy4iuA1VPBcD8NBnCrMHiOUlcdtZO' /></div>
        <ul class="messages" style="color:#FF0000;">
            @if(isset($error_login))
            {{$error_login}}
            @endif
        </ul>
        <div class="control-group">
            <label class="control-label">Ingrese su correo electrónico</label>
            <div class="controls">
                <input id="email" type="email" class="" name="email" placeholder="Ingrese su correo" required/>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Contraseña</label>
            <div class="controls">
                <input id="passwd" type="password" class="" name="passwd" required/>
            </div>
        </div>
        <button class='btn btn-info' type="submit">Iniciar sesión</button>

        {{Form::close()}}

    </div>
</div>
@stop
