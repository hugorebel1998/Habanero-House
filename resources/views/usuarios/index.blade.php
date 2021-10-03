@extends('layouts.home')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <b class="lead font-weight-bold"> Usuarios</b>
                </div>
                <div class="d-flex justify-content-end mt-3 mr-4">
               <a href="{{ route('usuarios.create') }}" class="btn btn-sm btn-success"> <i class="fas fa-plus"></i> Nuevo usuario</a>
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
                                <th scope="col" class="text-center">Administrador</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $usuario)
                            <tr>
                                <td>{{ $usuario->id }}</td>
                                <td>{{ $usuario->name}}</td>
                                <td>{{ $usuario->apellido_paterno}} {{ $usuario->apellido_materno}}</td>
                                <td>{{ $usuario->fecha_nacimiento }} años</td>
                                <td>{{ $usuario->telefono }}</td>
                                <td>{{ $usuario->email }}</td>
                                
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                         <i class="fas fa-cogs"></i> Acciones
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                          <a class="dropdown-item" href="{{ route('usuarios.edit', $usuario->id) }}"><i class="fas fa-edit"></i> Editar información</a>
                                          <a class="dropdown-item" href="#"><i class="far fa-trash-alt"></i> Eliminar usuario</a>
                                        </div>
                                      </div>
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