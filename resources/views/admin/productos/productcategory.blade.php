@extends('layouts.home')
@section('content')
@section('title', 'Creación de productos')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
          <div class="row">
              <div class="col-md-12 mt-5">
                  <div class="card transparente">
                      <div class="card-body">
                        <table class="order-table table table-hover" cellspacing="0" width="100%" id="example2">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Categoria</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Imagen</th>
                                    <th scope="col">Fecha de creación</th>
                                    {{-- <th scope="col">Fecha de modificación</th> --}}
                                    <th scope="col" class="text-center">Administrador</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productoListas as $productoLista)
                                    <tr @if ($productoLista->status == 0) class="table-danger" @endif>
                                        <td>{{ $productoLista->id }}</td>
                                        <td>{{ $productoLista->categoriaProduct->nombre }}</td>
                                        <td>{{ $productoLista->nombre }}</td>
                                        <td><img src="{{ asset('img/products/' . $productoLista->imagen_producto) }}"
                                                class="rounded mx-auto img-thumbnail" width="80"></td>
                                        <td> {{ date('d M Y - H:i:s', $productoLista->created_at->timestamp) }}</td>
                                        {{-- <td> {{ date('d M Y - H:i:s', $producto->updated_at->timestamp) ?: '--' }}</td> --}}
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
                                                        href="{{ route('admin.productos.show', $productoLista->id) }}"><i
                                                            class="far fa-bookmark"></i> Ver
                                                        producto</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.productos.edit', $productoLista->id) }}"><i
                                                            class="fas fa-edit"></i> Editar
                                                        producto</a>
                                                   @can('delete producto')
                                                    <form action="{{ route('admin.productos.delete', $productoLista->id) }}"
                                                        method="POST" class="eliminar_producto">
                                                        @csrf
                                                        @method('Delete')
                                                        <button class="dropdown-item"
                                                            href="{{ route('admin.productos.delete', $productoLista->id) }}"><i
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
                  </div>   
              </div>
          </div>
        </div>
    </div>
</div>
@endsection