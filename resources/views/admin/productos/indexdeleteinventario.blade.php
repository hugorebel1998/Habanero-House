@extends('layouts.home')
@section('content')
@section('title', 'Gestión de inventarios eliminados')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-danger card-outline transparente">
                <div class="card-header">
                    <b class="lead font-weight-bold"><i class="fas fa-boxes"></i> Inventarios eliminados </b>
                </div>
                <div class="card-body">
                    <table class="order-table table table-hover" cellspacing="0" width="100%" id="example2">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Existencia</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Fecha</th>
                                <th scope="col" class="text-center">Administrador</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inventarios as $inventario)
                                <tr @if ($inventario->deleted_at) class="table-danger" @endif>
                                    <td>{{ $inventario->id }}</td>
                                    <td>{{ ucfirst($inventario->nombre) }}</td>
                                    <td>
                                        @if ($inventario->limitado_inventario == '1')
                                            Ilimitada
                                        @else
                                            {{ $inventario->cantidad_inventario }}
                                        @endif
                                    </td>
                                    <td>$ {{ $inventario->precio }} MXN</td>
                                    <td> {{ date('d M Y - H:i:s', $inventario->deleted_at->timestamp) }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.productos.inventario.inventariorestore', $inventario->id) }}" 
                                            class="btn btn-sm btn-info restablecer_inventario">
                                            <i class="fas fa-trash-restore"></i>
                                            Restablecer
                                        </a>
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
        $(".restablecer_inventario").click(function(e) {
            e.preventDefault();
            const href = $(this).attr('href');
            Swal.fire({
                title: 'Estas seguro de querer restablecerlo?',
                text: `Este inventario sera restablecido`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, restablecer!'
            }).then((result) => {
                if (result.value) {
                    Swal.fire(
                        'Éxito',
                        'Restableciste este un inventario.',
                        'success'
                    )
                    document.location.href = href;
                }
            })
        })
    </script>
@endsection
@endsection
