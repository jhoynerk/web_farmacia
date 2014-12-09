@extends('layouts.master')
@section('tituloWeb')
Promociones
@stop
@section('contenido')
<div class="container">
    <div class="row">
        <div style="text-align: center"><h2>Farmacias ByS</h2></div>
    </div>
    <div class="row"> 
        <a href="<?php echo url('admin/'); ?>">Volver</a> | 
        <a href="<?php echo url('admin/'); ?>/promociones/create">Crear Promocion</a> | 
        <a href="<?php echo url('admin/'); ?>/promociones/descuento">Cargar PDF descuentos</a><br /><br />
    </div>
    <div class="row"> 
        <table width="95%" id="table_usuarios" class="table table-striped">
            <tr>
                <th><span style="color: #C0C0C0;">Nombre</span></th>
                <th><span style="color: #C0C0C0;">Descripcion</span></th>
                <th><span style="color: #C0C0C0;">Tipo</span></th>
                <th><span style="color: #C0C0C0;">Imagen</span></th>
                <th><span style="color: #C0C0C0;">Vencimiento</span></th>
                <th><span style="color: #C0C0C0;">Creada</span></th>
                <th><span style="color: #C0C0C0;">Ultima vez modificada</span></th>
                <th colspan="2"><span style="color: #C0C0C0;">Acciones</span></th>
            </tr>
            <tbody id="tb_usuarios">
                @if($promociones)
                @foreach($promociones as $promocion)
                <tr id="usuario_">
                    <td> {{$promocion->nombre}} </td>
                    <td> {{$promocion->descripcion}} </td>
                    <td> {{$promocion->tipo}} </td>
                    <td> {{HTML::image('/upload-images/'.$promocion->ruta)}} </td>
                    <td> {{date('d/m/Y', (strtotime($promocion->vencimiento)))}} </td>
                    <td> {{date('d/m/Y h:i:s A', (strtotime($promocion->created_at)))}} </td>
                    <td> {{date('d/m/Y h:i:s A', (strtotime($promocion->updated_at)))}} </td>
                    <td> {{ HTML::link('admin/promociones/update/'.$promocion->id, 'Editar') }} </td>
                    <td> {{ HTML::link('admin/promociones/delete/'.$promocion->id, 'Eliminar') }} </td>
                </tr>
                @endforeach
                @else
                Todavia no hay ninguna promoción registrada
                @endif
            </tbody>
        </table>
    </div>
</div>
@stop

