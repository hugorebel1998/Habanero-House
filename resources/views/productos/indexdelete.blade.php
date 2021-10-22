@extends('layouts.home')
@section('content')
@section('title', 'Lista de productos')


<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <b class="lead font-weight-bold"> Productos eliminados </b>
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
                                    <td>{{ $producto->nombre }}</td>
                                    <td>{{ $producto->categoriaProduct->nombre }}</td>
                                    <td><img src="{{ asset('img/products/'.$producto->imagen_producto)}}" class="rounded mx-auto img-thumbnail" width="80"></td>
                                    <td> {{ date('d M Y - H:i:s', $producto->created_at->timestamp )  }}</td>
                                    <td> {{ date('d M Y - H:i:s', $producto->updated_at->timestamp ) ?: '--'  }}</td>
                                    <td class="text-center">
                                       <a 
                                         href="{{ route('productos.productorestore', $producto->id )}}"
                                         onclick="return confirm('¿Estas Seguro de restablecer este producto?')"
                                         class="btn btn-sm btn-info">
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
@endsection
