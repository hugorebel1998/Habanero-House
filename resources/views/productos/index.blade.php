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
                <div class="d-flex justify-content-end mt-3 mr-4">
                    <a href="{{ route('productos.create') }}" class="btn btn-sm btn-success"> <i
                            class="fas fa-plus"></i> Nuevo producto</a>
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
                                    <td><img src="{{ asset('img/products/'.$producto->imagen_producto)}}" class="rounded mx-auto img-thumbnail" width="80"></td>
                                    <td> {{ date('d M Y - H:i:s', $producto->created_at->timestamp )  }}</td>
                                    <td> {{ date('d M Y - H:i:s', $producto->updated_at->timestamp ) ?: '--'  }}</td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-info dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i class="fas fa-cogs"></i> Acciones
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="{{ route('productos.show', $producto->id) }}"><i class="far fa-bookmark"></i> Ver
                                                    producto</a>
                                                <a class="dropdown-item" href="{{ route('productos.edit', $producto->id) }}"><i class="fas fa-edit"></i> Editar
                                                    producto</a>

                                                    <form action="{{ route('productos.delete', $producto->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('Delete')
                                                        <button class="dropdown-item"
                                                            onclick="return confirm('¿Estas Seguro de eliminar este usuario')"
                                                            href="{{ route('productos.delete', $producto->id) }}"><i
                                                                class="far fa-trash-alt"></i> Eliminar usuario</button>
                                                    </form>

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
