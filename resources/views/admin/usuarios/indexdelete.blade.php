@extends('layouts.home')
@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card transparente">
                <div class="card-header">
                <b class="lead font-weight-bold"> 
                    <i class="fas fa-users-slash"></i>
                    Usuarios eliminados
                </b>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="order-table table table-hover" cellspacing="0" width="100%" id="example2">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col"></th>
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
                                <td>
                                   @if (is_null($usuario->imagen_usuario))
                                   <img src="{{ asset('img/users/sin_asignar/foto.jpg') }}"
                                       class="rounded-circle mx-auto d-block" id="img-user">
                                   @else
                                   <img src="{{ asset('img/users/'.$usuario->imagen_usuario) }}"
                                   class="rounded-circle mx-auto d-block" id="img-user">
                                   @endif
                                </td>
                                <td>{{ $usuario->name}}</td>
                                <td>{{ $usuario->apellido_paterno}} {{ $usuario->apellido_materno}}</td>
                                <td>{{ $usuario->age }} años</td>
                                <td>{{ $usuario->telefono }}</td>
                                <td>{{ $usuario->email }}</td>
                                <td class="text-center">
                                    <a 
                                    href="{{ route('admin.usuarios.usuariorestore', $usuario->id )}}"
                                    class="btn btn-sm btn-info restablecer_usuario">
                                     <i class="fas fa-trash-restore"></i> Restablecer</a>

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
        $(".restablecer_usuario").click(function(e) {
            e.preventDefault();
            const href = $(this).attr('href');
            Swal.fire({
                title: 'Estas seguro de querer restablecerlo?',
                text: `Este usuario sera restablecido`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, restablecer!'
            }).then((result) => {
                if (result.value) {
                    Swal.fire(
                    'Éxito',
                    'Restableciste este usuario.',
                    'success'
                    )
                    document.location.href = href;
                }
            })
        })
    </script>
@endsection

@endsection