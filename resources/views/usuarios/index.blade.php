@extends('layouts.home')
@section('content')
@section('title', 'Lista de usuarios')


<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <b class="lead font-weight-bold"> Usuarios</b>
                </div>
                <div class="d-flex flex-row-reverse mr-4">
                            
                 <div class="p-2">
                  <div class="dropdown">
                     <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <i class="fas fa-sort-amount-up-alt"></i> Filtrar por
                       </a>

                         <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                             <a class="dropdown-item" href="#">
                             <i class="fas fa-user-friends"></i>
                             Usurios registrados
                            </a>
                            <a class="dropdown-item" href="{{ route('usuarios.indexdelete') }}">
                             <i class="fas fa-users-slash"></i>
                            Usuarios eliminados
                       </a>
                     </div>
                 </div> 
                 </div> 
                 <div class="p-2">
                   <a href="{{ route('usuarios.create') }}" class="btn btn-success"> <i
                            class="fas fa-plus"></i> Nuevo usuario</a>

                </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="order-table table table-hover" cellspacing="0" width="100%" id="example2">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Rol</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellidos</th>
                                <th scope="col">Edad</th>
                                <th scope="col">Teléfono</th>
                                {{-- <th scope="col">Correo electrónico</th> --}}
                                <th scope="col" class="text-center">Administrador</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $usuario)

                                <tr>
                                    <td>{{ $usuario->id }}</td>
                                    <td>{{ $usuario->rol ?: 'Cliente' }}</td>
                                    <td>{{ $usuario->name ?: 'Sin nombre' }}</td>
                                    <td>{{ $usuario->apellido_paterno }}
                                        {{ $usuario->apellido_materno ?: 'Sin apellidos' }}</td>
                                    <td>{{ $usuario->age ?: 'Sin edad' }} años</td>
                                    <td>{{ $usuario->telefono ?: 'Sin telefono' }}</td>
                                    {{-- <td>{{ $usuario->email }}</td> --}}

                                    <td class="text-center">
                                        @can('update usuario')
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-info dropdown-toggle" type="button"
                                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="fas fa-cogs"></i> Acciones
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item"
                                                        href="{{ route('usuarios.show', $usuario->id) }}"><i
                                                            class="far fa-bookmark"></i> Ver usuario</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('usuarios.edit', $usuario->id) }}"><i
                                                            class="fas fa-edit"></i> Editar información</a>
                                                    @can('delete usuario')
                                                        <form action="{{ route('usuarios.delete', $usuario->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('Delete')
                                                            <button class="dropdown-item"
                                                                onclick="return confirm('¿Estas Seguro de eliminar este usuario')"
                                                                href="{{ route('usuarios.delete', $usuario->id) }}"><i
                                                                    class="far fa-trash-alt"></i> Eliminar usuario</button>
                                                        </form>
                                                        
                                                    @endcan
                                                </div>
                                            </div>
                                        @endcan
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
