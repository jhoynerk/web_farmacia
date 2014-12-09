@extends('layouts.master')
@section('tituloWeb')
Imagenes
@stop
@section('contenido')
<div class="container">
    <div class="row">
        <div style="text-align: center"><h2>Farmacias ByS|Imagenes de {{$farmacia->nombre}}</h2></div>
    </div>

    <div class="row">    
        <a href="<?php echo url('admin/'); ?>/farmacias/">Volver a farmacias</a> | 
        <a href="<?php echo url('admin/'); ?>/imagenes/create/{{$farmacia->id}}">Agregar Imagen</a><br /><br />

        <table width="95%" id="table_imagenes" class="table table-striped">
            <tr>
                <th><span style="color: #C0C0C0;">Nombre imagen</span></th>
                <th><span style="color: #C0C0C0;">Nombre Farmacia</span></th>
                <th><span style="color: #C0C0C0;">Imagen 600x600</span></th>
                <th><span style="color: #C0C0C0;">Imagen 250x250</span></th>
                <th><span style="color: #C0C0C0;">Imagen 60x60</span></th>
                <th><span style="color: #C0C0C0;">Tipo</span></th>
                <th colspan='2'><span style="color: #C0C0C0;">Acciones</span></th>
            </tr>
            <tbody id="tb_imagenes">

                @if($farmacia->imagenes)

                @foreach($farmacia->imagenes as $imagen)
                <tr id="usuario_">
                    <td> {{$imagen->alt}} </td>
                    <td> {{$imagen->farmacia->nombre}} </td>
                    <td> {{HTML::image('/upload-images/'.$imagen->imagen600,$imagen->alt)}} </td>
                    <td> {{HTML::image('/upload-images/'.$imagen->imagen250,$imagen->alt)}} </td>
                    <td> {{HTML::image('/upload-images/'.$imagen->imagen60,$imagen->alt)}} </td>
                    <td> {{$imagen->tipo}} </td>
                    <td> {{ HTML::link('admin/imagenes/delete/'.$imagen->id, 'Eliminar') }} </td>
                    <td> {{ HTML::link('admin/imagenes/update/'.$imagen->id, 'Editar') }} </td>
                </tr>
                @endforeach

                @else
                Todavia no hay ninguna imagen registrada a esta farmacia
                @endif

            </tbody>
        </table>


    </div>
</div>
@stop

