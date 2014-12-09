@extends('layouts.master')
@section('tituloWeb')
@stop
@section('contenido')
<div class="container">
    <div class="row">
        <div style="text-align: center"><h2>Farmacias ByS | Usuarios</h2></div>
    </div>
    <div class="row">
        <a href="<?php echo url('admin/'); ?>">Volver</a> | 
        <a href="<?php echo url('admin/'); ?>/admin/create">Crear usuario</a><br /><br />
    </div>
    <div class="row">
        <table width="95%" id="table_usuarios" class="table table-striped">
            <tr>
                <th><span style="color: #C0C0C0;">Nombre</span></th>
                <th><span style="color: #C0C0C0;">email</span></th>
                <th colspan="2"><span style="color: #C0C0C0;">Acciones</span></th>
            </tr>
            <tbody id="tb_usuarios">

                @if($users)

                @foreach($users as $users)
                <tr id="usuario_">
                    <td> {{$users->first_name}} </td>
                    <td> {{$users->email}} </td>
                    <td> {{ HTML::link('admin/admin/update/'.$users->id, 'Editar') }} </td>
                    <td> {{ HTML::link('admin/admin/delete/'.$users->id, 'Eliminar') }} </td>
                </tr>
                @endforeach

                @else
                Todavia no hay ningun usuario registrado
                @endif

            </tbody>
        </table>


    </div>
</div>
@stop
