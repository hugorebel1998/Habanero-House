@extends('layouts.home')
@section('content')
@section('title', 'Gestión usuarios')


<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card card-danger card-outline transparente">
                <div class="card-header">
                    <b class="lead font-weight-bold"> 
                        <i class="fas fa-user-friends"></i>
                        Usuarios
                    </b>
                </div>
                <div class="d-flex flex-row-reverse mr-4">

                    <div class="p-2">
                    @can('delete usuario')
                        <div class="dropdown dropleft">
                            <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-sort-amount-up-alt"></i> Filtrar por
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="{{ route('admin.usuarios.indexdelete') }}">
                                    <i class="fas fa-users-slash"></i>
                                    Usuarios eliminados
                                </a>
                            </div>
                        </div>
                        @endcan
                    </div>
                    <div class="p-2">
                        <a href="{{ route('admin.usuarios.create') }}" class="btn btn-success"> <i
                                class="fas fa-plus"></i> Nuevo usuario</a>

                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="order-table table table-hover" cellspacing="0" width="100%" id="example2">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col"></th>
                                <th scope="col">Rol</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellidos</th>
                                <th scope="col">Edad</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col" class="text-center">Administrador</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $usuario)

                                <tr>
                                    <td>{{ $usuario->id }}</td>
                                    <td>
                                        @if (is_null($usuario->imagen_usuario))
                                        <img src="{{ asset('img/users/sin_asignar/foto.jpg') }}"
                                            class="rounded-circle mx-auto d-block" id="img-user">
                                        @else
                                        <img src="{{ asset('img/users/'.$usuario->imagen_usuario) }}"
                                        class="rounded-circle mx-auto d-block" id="img-user">
                                        @endif
                                    </td>
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
                                                    <i class="fas fa-cogs"></i>
                                                     Acciones
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.usuarios.show', $usuario->id) }}">
                                                        <i class="far fa-bookmark"></i>
                                                         Ver usuario
                                                    </a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.usuarios.edit', $usuario->id) }}">
                                                        <i class="fas fa-edit"></i> 
                                                        Editar información
                                                    </a>
                                                    @can('delete usuario')
                                                        <form action="{{ route('admin.usuarios.delete', $usuario->id) }}"
                                                            method="POST" class="eliminar_usuario">
                                                            @csrf
                                                            @method('Delete')
                                                            <button class="dropdown-item"
                                                                href="{{ route('admin.usuarios.delete', $usuario->id) }}">
                                                                <i class="far fa-trash-alt"></i> 
                                                                Eliminar usuario
                                                            </button>
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
            </div>
        </div>
    </div>
</div>
@include('components.buscador')

@section('alerta')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('.eliminar_usuario').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Estas seguro de eliminar?',
                text: `Este usuario sera eliminado`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Eliminado!',
                        'Haz eliminado este usuario.',
                        'success'
                    )
                    this.submit();

                }
            })
        });
    </script>
@endsection

@endsection
