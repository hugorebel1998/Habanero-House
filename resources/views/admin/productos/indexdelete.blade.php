@extends('layouts.home')
@section('content')
@section('title', 'Gestión platillos eliminados')


<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-danger card-outline transparente">
                <div class="card-header">
                    <b class="lead font-weight-bold"><i class="fas fa-utensils"></i> Platillos eliminados </b>
                </div>
                <div class="card-body">
                    <table class="order-table table table-hover" cellspacing="0" width="100%" id="example2">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Imagen</th>
                                <th scope="col">Fecha de creación</th>
                                <th scope="col">Fecha de modificación</th>
                                <th scope="col" class="text-center">Administrador</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productos as $producto)
                                <tr @if ($producto->deleted_at) class="table-danger" @endif>
                                    <td>{{ $producto->id }}</td>
                                    <td>{{ ucfirst($producto->nombre) }}</td>
                                    <td>{{ ucfirst($producto->categoriaProduct->nombre) }}</td>
                                    <td><img src="{{ asset('img/products/' . $producto->imagen_producto) }}"
                                            class="rounded mx-auto img-thumbnail" width="80"></td>
                                    <td> {{ date('d M Y - H:i:s', $producto->created_at->timestamp) }}</td>
                                    <td> {{ date('d M Y - H:i:s', $producto->updated_at->timestamp) ?: '--' }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.productos.productorestore', $producto->id) }}"
                                            class="btn btn-sm btn-info restablecer_producto">
                                            <i class="fas fa-trash-restore"></i>
                                            Restablecer
                                        </a>
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

@section('alerta')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(".restablecer_producto").click(function(e) {
            e.preventDefault();
            const href = $(this).attr('href');
            Swal.fire({
                title: 'Estas seguro de querer restablecerlo?',
                text: `Este poducto sera restablecido`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, restablecer!'
            }).then((result) => {
                if (result.value) {
                    Swal.fire(
                    'Éxito',
                    'Restableciste este producto.',
                    'success'
                    )
                    document.location.href = href;
                }
            })
        })
    </script>
@endsection

@endsection
