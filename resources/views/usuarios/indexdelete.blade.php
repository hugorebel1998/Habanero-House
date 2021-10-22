@extends('layouts.home')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <b class="lead font-weight-bold"> Usuarios eliminados</b>
                </div>
                <div class="d-flex justify-content-end mt-3 mr-4">
                        {{-- <a href="{{ route('usuarios.create') }}" class="btn btn-sm btn-success"> <i class="fas fa-plus"></i> Nuevo usuario</a> --}}
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="order-table table table-hover" cellspacing="0" width="100%" id="example2">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellidos</th>
                                <th scope="col">Edad</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col">Correo electrónico</th>
                                <th scope="col" class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $usuario)
                            <tr @if ($usuario->deleted_at) class="table-danger" @endif>
                                <td>{{ $usuario->id }}</td>
                                <td>{{ $usuario->name}}</td>
                                <td>{{ $usuario->apellido_paterno}} {{ $usuario->apellido_materno}}</td>
                                <td>{{ $usuario->age }} años</td>
                                <td>{{ $usuario->telefono }}</td>
                                <td>{{ $usuario->email }}</td>
                                
                                {{-- <td class="text-center">
                                    @can('update usuario')
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-cogs"></i> Acciones
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="{{ route('usuarios.show', $usuario->id)}}"><i class="far fa-bookmark"></i> Ver usuario</a>
                                        <a class="dropdown-item" href="{{ route('usuarios.edit', $usuario->id) }}"><i class="fas fa-edit"></i> Editar información</a>
                                    @can('delete usuario')
                                        <a class="dropdown-item" onclick="return confirm('¿Estas Seguro de eliminar este usuario')" href="{{ route('usuarios.delete',$usuario->id) }}"><i class="far fa-trash-alt"></i> Eliminar usuario</a>
                                    @endcan
                                        </div>
                                    </div>
                                    @endcan
                                </td> --}}
                                <td class="text-center">
                                    <a 
                                    href="{{ route('usuarios.usuariorestore', $usuario->id )}}"
                                    onclick="return confirm('¿Estas Seguro de restablecer este usuario?')"
                                    class="btn btn-sm btn-info">
                                     <i class="fas fa-trash-restore"></i> Restablecer</a>

                                </td>
                            </tr>
                            @endforeach                     
                            
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>
@include('components.buscador')
@endsection