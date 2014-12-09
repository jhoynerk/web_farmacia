@extends('layouts.master')
@section('tituloWeb')
Registro
@stop
@section('contenido')
<div class="container">
    <div class="row">
        <div style="text-align: center"><h2>Farmacias Bys</h2></div>
    </div>
    <div class="row">
        <a href="<?php echo url('admin/'); ?>/farmacias">Volver</a><br />
    </div>
    <div class="row">
        <hr />
        <p><h4>Nueva Farmacia</h4></p>
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
                    <input id="id_nombre" type="text" class="" name="nombre" maxlength="50" value="{{Input::old('nombre')}}" required/>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Slogan</label>
                <div class="controls">
                    <input id="id_slogan" type="text" class="" name="slogan" maxlength="50" value="{{Input::old('slogan')}}"/>
                </div>
            </div>

            <label class="control-label">Ubique su farmacia</label>
            <input id="input_buscar" class="controls" type="text" placeholder="Buscar">		
            <div id="input_map"></div>

            <div class="control-group">
                <label class="control-label">Dirección</label>
                <div class="controls">
                    <textarea id="id_direccion" type="text" class="" name="direccion" maxlength="200" required>
                                
                    </textarea>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Latitud</label>
                <div class="controls">
                    <input id="id_latitud" type="number" step="any" class="" name="latitud" maxlength="50" readonly="readonly" required/>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Longitud</label>
                <div class="controls">
                    <input id="id_longitud" type="number" step="any" class="" name="longitud" maxlength="50" readonly="readonly" required/>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Horario</label>
                <div class="controls">
                    <textarea id="id_horario" type="text" class="" name="horario" maxlength="50" required/>{{Input::old('horario')}}</textarea>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Teléfono Ejem: 04121234567</label>
                <div class="controls">
                    <input id="id_telefono" type="tel" class="" name="telefono" value="{{Input::old('telefono')}}" maxlength="20" pattern="[0-9]{11}"/>
                </div>
            </div>
            <div class="control-group">
                <div class="checkbox">
                    <label>
                        <input id="destacada" type="checkbox" class="" name="destacada" value="1" @if(Input::old('destacada')==1) checked @endif/> ¿Colocar como farmacia destacada?
                    </label>
                </div>
            </div>
            @if(count($servicios)> 0)
            <div class="control-group">
                <label class="control-label">Servicios</label>                            
                <div class="checkbox">    
                    @foreach($servicios as $servicio)                                              
                    <label> 
                        {{ Form::checkbox('servicios[]', $servicio->id) }} {{ $servicio->nombre }}
                    </label> 
                    @endforeach
                </div>
            </div>       
            @endif	
            <button class='btn btn-info' type="submit">Guardar</button>
        </form>
    </div>
</div>
<!-- Apis Google Maps -->
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true&libraries=places"></script>
<!-- Config Google Maps -->
<script type="text/javascript">
        @if(Input::old('latitud') != '')
        var latlng = new google.maps.LatLng({{Input::old('latitud')}}, {{Input::old('longitud')}});
        @else
        var latlng;
        @endif
        var clickdireccion=true;
</script>
<script type="text/javascript" src="{{URL::to('/js/farmacias/config_map.js')}}"></script>
@stop
