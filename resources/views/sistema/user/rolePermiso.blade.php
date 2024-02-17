@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Roles y Permisos</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Rol: <strong>{{$role->name}}</strong></h4>
        </div>
        <div class="card-body">
            <h5>Lista de Permisos</h5>
            {!! Form::model($role, ['route' => ['roles.update', $role],'method'=>'put']) !!}
                @foreach ($permisos as $permiso)
                    <div>
                        <label>
                        </label>
                        {!! Form::checkbox('permisos[]', $permiso->id, $role->hasPermissionTo($permiso->id) ?  : false, ['class'=>'mr-1']) !!}
                        {{$permiso->name}}
                    </div>
                @endforeach
                {!! Form::submit('Asignar Permisos', ['class'=>'btn btn-primary mt-3']) !!} 
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi')
    </script>
@stop