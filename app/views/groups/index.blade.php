@extends('layouts.master')
@section('tituloWeb')
Roles
@stop
@section('contenido')
<div class="container">
    <div class="row">
        <div style="text-align: center"><h2>Farmacias ByS | Roles</h2></div>
    </div>

    <div class="row">            
        <a href="<?php echo url('admin/'); ?>">Volver</a> | 
        <a href="<?php echo url('admin/'); ?>/rol/create">Crear rol</a><br /><br />

        <table width="95%" id="table_usuarios" class="table table-striped">
            <tr>
                <th><span style="color: #C0C0C0;">Nombre</span></th>
                <th><span style="color: #C0C0C0;">nivel</span></th>
                <th colspan="2"><span style="color: #C0C0C0;">Acciones</span></th>
            </tr>
            <tbody id="tb_usuarios">

                @if($groups)

                @foreach($groups as $groups)
                <tr id="usuario_">
                    <td> {{$groups->name}} </td>
                    <td> {{$groups->permissions}} </td>
                    <td> {{ HTML::link('admin/rol/update/'.$groups->id, 'Editar') }} </td>
                    <td> {{ HTML::link('admin/rol/delete/'.$groups->id, 'Eliminar') }} </td>
                </tr>
                @endforeach

                @else
                Todavia no hay ningun grupo/rol registrado
                @endif

            </tbody>
        </table>


    </div>
</div>
@stop

