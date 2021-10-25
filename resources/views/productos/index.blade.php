@extends('layouts.home')
@section('content')
@section('title', 'Lista de productos')


<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <b class="lead font-weight-bold"> Productos</b>
                </div>

                <div class="d-flex flex-row-reverse mr-4">
                    <div class="p-2">
                        @can('delete producto')
                        <div class="dropdown">
                            <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-sort-amount-up-alt"></i> Filtrar por
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="{{ route('productos.indexDelete') }}">
                                    <i class="fas fa-ban"></i>
                                    Productos eliminados
                                </a>
                            </div>
                        </div>
                        @endcan
                    </div>
                    <div class="p-2">
                        <a href="{{ route('productos.create') }}" class="btn btn-success"> <i
                                class="fas fa-plus"></i> Nuevo producto</a>
                    </div>
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
                                <tr @if ($producto->status == 0) class="table-danger" @endif>
                                    <td>{{ $producto->id }}</td>
                                    <td>{{ $producto->nombre }}</td>
                                    <td>{{ $producto->categoriaProduct->nombre }}</td>
                                    <td><img src="{{ asset('img/products/' . $producto->imagen_producto) }}"
                                            class="rounded mx-auto img-thumbnail" width="80"></td>
                                    <td> {{ date('d M Y - H:i:s', $producto->created_at->timestamp) }}</td>
                                    <td> {{ date('d M Y - H:i:s', $producto->updated_at->timestamp) ?: '--' }}</td>
                                    <td class="text-center">
                                @can('update producto')
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-info dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i class="fas fa-cogs"></i> Acciones
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item"
                                                    href="{{ route('productos.show', $producto->id) }}"><i
                                                        class="far fa-bookmark"></i> Ver
                                                    producto</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('productos.edit', $producto->id) }}"><i
                                                        class="fas fa-edit"></i> Editar
                                                    producto</a>
                                               @can('delete producto')
                                                <form action="{{ route('productos.delete', $producto->id) }}"
                                                    method="POST" class="eliminar_producto">
                                                    @csrf
                                                    @method('Delete')
                                                    <button class="dropdown-item"
                                                        href="{{ route('productos.delete', $producto->id) }}"><i
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
@section('alerta')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('.eliminar_producto').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Estas seguro de eliminar?',
                text: `Este poducto sera eliminado`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Deleted!',
                        'Haz eliminado este producto.',
                        'success'
                    )
                    this.submit();

                }
            })
        });
    </script>
@endsection

@include('components.buscador')

@endsection
