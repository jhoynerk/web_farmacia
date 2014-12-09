@extends('layouts.master')
@section('tituloWeb')
Listado
@stop
@section('contenido')
<div class="container">
    <div class="row">
        <div style="text-align: center"><h2>Farmacias ByS</h2></div>
    </div>
    <div class="row"> 
        <a href="<?php echo url('admin/'); ?>">Volver</a> |       
        <a href="<?php echo url('admin/'); ?>/farmacias/create">Crear farmacia</a> | 
        <a href="<?php echo url('admin/'); ?>/servicios/create">Crear servicio</a><br /><br />
    </div>
    <div class="row">
        <table width="95%" id="table_usuarios" class="table table-striped">
            <tr>
                <th><span style="color: #C0C0C0;">Nombre</span></th>
                <th><span style="color: #C0C0C0;">Slogan</span></th>
                <th><span style="color: #C0C0C0;">Dirección</span></th>
                <th><span style="color: #C0C0C0;">Latitud</span></th>
                <th><span style="color: #C0C0C0;">Longitud</span></th>
                <th><span style="color: #C0C0C0;">Horario</span></th>
                <th><span style="color: #C0C0C0;">Teléfono</span></th>
                <th><span style="color: #C0C0C0;">Destacada</span></th>
                <th><span style="color: #C0C0C0;">Servicios</span></th>
                <th colspan="4"><span style="color: #C0C0C0;">Acciones</span></th>
            </tr>
            <tbody id="tb_usuarios">

                @if($farmacias)

                @foreach($farmacias as $farmacia)
                <tr id="usuario_" @if($farmacia->destacada)class="warning" @endif>
                    <td> {{$farmacia->nombre}} </td>
                    <td> {{$farmacia->slogan}} </td>
                    <td> {{$farmacia->direccion}} </td>
                    <td> {{$farmacia->latitud}} </td>
                    <td> {{$farmacia->longitud}} </td>
                    <td> {{$farmacia->horario}} </td>
                    <td> {{$farmacia->telefono}} </td>
                    <td> {{$farmacia->getDestacada()}} </td>
                    <td> {{ HTML::link('admin/farmacias/service/'.$farmacia->id, 'Ver') }} </td>
                    <td> {{ HTML::link('farmacias/'.$farmacia->slug, 'Detalle') }} </td>
                    <td> {{ HTML::link('admin/farmacias/update/'.$farmacia->id, 'Editar') }} </td>
                    <td> {{ HTML::link('admin/farmacias/delete/'.$farmacia->id, 'Eliminar') }} </td>
                    <td> {{ HTML::link('admin/farmacias/images/'.$farmacia->id, 'Ver Imagenes') }} </td>
                </tr>
                @endforeach
                @else
                Todavia no hay ninguna farmacia registrada
                @endif
            </tbody>
        </table>
        {{$farmacias->links()}}
    </div>
</div>
@stop

