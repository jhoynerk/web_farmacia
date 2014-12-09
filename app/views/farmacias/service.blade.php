@extends('layouts.master')
@section('tituloWeb')
Imagenes
@stop
@section('contenido')
<div class="container">
    <div class="row">
        <div style="text-align: center"><h2>Farmacias ByS | Farmacia servicios </h2></div>
    </div>
    <div class="row">
        <a href="<?php echo url('admin/'); ?>/farmacias">Volver</a><br /> <br />
    </div>
    <div class="row"> 	    

        <table width="95%" id="" class="table table-striped">
            <tr>
                <th><span style="color: #C0C0C0;">Servicios</span></th>               
            </tr>

            <tbody id="">  
                @foreach($farmacia->servicios as $ser)
                <tr id="usuario_">
                    <td> {{ $servicios->find($ser->pivot->servicio_id)->nombre}} </td>                                         
                </tr>               
                @endforeach                       
            </tbody>
        </table>

    </div>
</div>
@stop
