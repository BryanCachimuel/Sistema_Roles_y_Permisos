@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Administración de Clientes</h1>
@stop

@section('content')
   
    <p>Actualice la Información del Cliente</p>

   <div class="card">
        <div class="card-body">
            <form action="{{route('cliente.update',$cliente)}}" method="post" autocomplete="off">
                @csrf
                @method('PUT')
                <x-adminlte-input type="text" name="cedula" label="Cedula" label-class="text-lightblue"  value="{{$cliente->cedula}}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-address-card text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
        
                <x-adminlte-input type="text" name="apellido" label="Apellido" label-class="text-lightblue" value="{{$cliente->apellido}}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
        
                <x-adminlte-input type="text" name="nombre" label="Nombre" label-class="text-lightblue"  value="{{$cliente->nombre}}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
        
                <x-adminlte-input type="email" name="email" label="Email" label-class="text-lightblue"  value="{{$cliente->email}}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-envelope text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
        
                <x-adminlte-input type="text" name="telefono" label="Teléfono" label-class="text-lightblue"  value="{{$cliente->telefono}}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-phone text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
        
                <x-adminlte-textarea name="direccion" label="Direccion" rows=5 label-class="text-lightblue" igroup-size="sm">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-lg fa-file-alt text-lightblue"></i>
                        </div>
                    </x-slot>
                    {{$cliente->direccion}}
                </x-adminlte-textarea>
        
                <x-adminlte-select name="estado" label="Estado Civil" label-class="text-lightblue" igroup-size="lg">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-male text-lightblue"></i>
                        </div>
                    </x-slot>
                    <option value="{{$cliente->estado}}">{{$cliente->estado}}</option>
                    <option value="">Seleccione el estado civil</option>
                    <option value="Casado">Casado</option>
                    <option value="Soltero">Soltero</option>
                    <option value="Unión Libre">Unión Libre</option>
                </x-adminlte-select>
        
                <x-adminlte-button type="submit" label="Actualizar" theme="primary" icon="fas fa-save"/>
            </form>
        </div>
   </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
   @if (session("message"))
       <script>
            $(document).ready(function(){
                let mensaje = "{{session('message')}}";
                Swal.fire({
                    'title': 'Resultado',
                    'text': mensaje,
                    'icon': 'success'
                })
            });
       </script>
   @endif
@stop
