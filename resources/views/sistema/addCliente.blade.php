@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Administración de Clientes</h1>
@stop

@section('content')
   
    <p>Ingrese Información del Cliente</p>

     <!-- notificación -->
     @php
         if (session()) {
            if(session('message') == 'ok'){
                echo '<x-adminlte-alert class="bg-teal text-uppercase mb-4" icon="fa fa-lg fa-thumbs-up" title="Done" dismissable>
                            Registro realizado correctamente
                      </x-adminlte-alert>';
            }
         }
     @endphp

   <div class="card">
        <div class="card-body">
            <form action="{{route('cliente.store')}}" method="post" autocomplete="off">
                @csrf
                
                <x-adminlte-input type="text" name="cedula" label="Cedula" placeholder="Ingrese su Cédula" label-class="text-lightblue"  value="{{old('cedula')}}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-address-card text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
        
                <x-adminlte-input type="text" name="apellido" label="Apellido" placeholder="Ingrese su Apellido" label-class="text-lightblue" value="{{old('apellido')}}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
        
                <x-adminlte-input type="text" name="nombre" label="Nombre" placeholder="Ingrese su Nombre" label-class="text-lightblue"  value="{{old('nombre')}}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
        
                <x-adminlte-input type="email" name="email" label="Email" placeholder="Ingrese su email" label-class="text-lightblue"  value="{{old('email')}}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-envelope text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
        
                <x-adminlte-input type="text" name="telefono" label="Teléfono" placeholder="Ingrese su Telefono" label-class="text-lightblue"  value="{{old('telefono')}}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-phone text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
        
                <x-adminlte-textarea name="direccion" label="Direccion" rows=5 label-class="text-lightblue" igroup-size="sm" placeholder="Ingrese su Dirección">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-lg fa-file-alt text-lightblue"></i>
                        </div>
                    </x-slot>
                    {{old('apellido')}}
                </x-adminlte-textarea>
        
                <x-adminlte-select name="estado" label="Estado Civil" label-class="text-lightblue" igroup-size="lg">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-male text-lightblue"></i>
                        </div>
                    </x-slot>
                    <option value="">Seleccione el estado civil</option>
                    <option value="Casado">Casado</option>
                    <option value="Soltero">Soltero</option>
                    <option value="Unión Libre">Unión Libre</option>
                </x-adminlte-select>
        
                <x-adminlte-button type="submit" label="Guardar" theme="primary" icon="fas fa-save"/>
            </form>
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
