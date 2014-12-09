@extends('layouts.master')
@section('tituloWeb')
Registro de usuario
@stop
@section('contenido')
<div class="container">
    <div class="row">
        <div style="text-align: center"><h2>Farmacias Bys | Registro de usuario</h2></div>
    </div>
    <div class="row">
        <a href="<?php echo url('admin/'); ?>/admin/">Volver</a>
    </div>
    <div class="row">

        <hr />
        <p><h4>Nuevo Usuario</h4></p>

        {{Form::open(array('method' => 'POST', 'class'  => 'form-vertocal'))}}    
        <div style='display:none'><input type='hidden' name='csrfmiddlewaretoken' value='IrZwy4iuA1VPBcD8NBnCrMHiOUlcdtZO' /></div>

        <div class="control-group">
            <label class="control-label">Nombre</label>
            <div class="controls">
                <input id="id_nombre" type="text" class="" name="nombre" maxlength="50" placeholder="Ingresar el nombre"/>
            </div>
            {{$errors->first('nombre')}}
        </div>

        <div class="control-group">
            <label class="control-label">Apellido</label>
            <div class="controls">
                <input id="id_apellido" type="text" class="" name="apellido" maxlength="50" placeholder="Ingresar el apellido" />
            </div>
            {{$errors->first('apellido')}}
        </div>

        <div class="control-group">
            <label class="control-label">Email</label>
            <div class="controls">
                <input id="id_email" type="text" class="" name="email" maxlength="50" placeholder="ingrese email" />
            </div>
            {{$errors->first('email')}}
        </div>


        <div class="control-group">
            <label class="control-label">Password</label>
            <div class="controls">
                <input id="id_password" type="password" class="" name="password" maxlength="50" />
            </div>
            {{$errors->first('password')}}
        </div>

        <div class="control-group">
            <label class="control-label">Password repetir</label>
            <div class="controls">
                <input id="id_password_re" type="password" class="" name="password_re" maxlength="50" />
            </div>
            {{$errors->first('password_re')}}
        </div>

        @if(count($groups)> 0)
        <div class="control-group">
            <label class="control-label">Groups / Rol</label>                            
            <div class="checkbox">  
                <select name="rol">
                    @foreach($groups as $groups)
                    <option value="{{$groups->id}}">{{ $groups->name }}</option>
                    @endforeach
                </select>  
            </div>
        </div>       
        @endif        
        <button class='btn btn-info' type="submit">Guardar</button>

        {{Form::close()}}

    </div>
</div>
@stop
