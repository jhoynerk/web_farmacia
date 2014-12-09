@extends('layouts.master')
@section('tituloWeb')
Servicios
@stop
@section('contenido')
<div class="container">
    <div class="row">
        <div style="text-align: center"><h2> Farmacias ByS | Servicios </h2></div>
    </div>
    <div class="row">
        <a href="<?php echo url('admin/'); ?>">Volver</a> | 
        <a href="<?php echo url('admin/'); ?>/farmacias">ir Farmacia</a> | 
        <a href="<?php echo url('admin/'); ?>/servicios/create">Crear servicio</a><br /><br />
        <table width="95%" id="table_usuarios" class="table table-striped">
            <tr>
                <th><span style="color: #C0C0C0;">Nombre</span></th>
                <th colspan="2"><span style="color: #C0C0C0;">Acciones</span></th>
            </tr>
            <tbody id="tb_usuarios">

                @if($servicios)

                @foreach($servicios as $servicio)
                <tr id="usuario_">
                    <td> {{$servicio->nombre}} </td>						
                    <td> {{ HTML::link('admin/servicios/update/'.$servicio->id, 'Editar') }} 
                        {{ HTML::link('admin/servicios/delete/'.$servicio->id, 'Eliminar') }} </td>
                </tr>
                @endforeach

                @else
                Todavia no hay ninguna farmacia registrada
                @endif

            </tbody>
        </table>


    </div>
</div>
@stop
