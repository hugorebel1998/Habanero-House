@extends('layouts.home')
@section('content')
@section('title', 'Lista de categorias')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-danger shadow">
                        <div class="card-header">
                            <div class="card-tittle"><i class="fas fa-box"></i> Crear categoria</div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.categorias.store') }}" method="POST" autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 mt-2">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" name="nombre"
                                            class="form-control @error('nombre') is-invalid @enderror"
                                            placeholder="Nombre" value="{{ old('nombre') }}">
                                        @error('nombre')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-12 mt-4">
                                        <label for="nombre">Descripción</label>
                                        <textarea class="form-control @error('descripcion') is-invalid @enderror"
                                            name="descripcion" rows="6">{{ old('descripcion') }} </textarea>
                                        @error('descripcion')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="text-center mt-4 mb-4">
                                    <button type="submit" class="btn btn-sm btn-danger"> <i class="fas fa-save"></i>
                                        Guardar categoria</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card shadow">
                        <div class="card-header">
                            <b class="lead font-weight-bold"> Categorias</b>
                        </div>
                        <div class="d-flex flex-row-reverse mr-5">

                            <div class="p-2">
                            @can('delete categoria')
                                <div class="dropdown">
                                    <a class="btn btn-primary dropdown-toggle" href="#" role="button"
                                        id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <i class="fas fa-sort-amount-up-alt"></i> Filtrar por
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        
                                        <a class="dropdown-item" href="{{ route('admin.categorias.indexdelete') }}">
                                            <i class="fas fa-ban"></i>
                                            Categorias eliminados
                                        </a>
                                    </div>
                                </div>
                                @endcan
                            </div>

                            {{-- <div class="p-2">
                                <a href="{{ route('categorias.create') }}" class="btn btn-success"> <i
                                        class="fas fa-plus"></i> Nuevo categoria</a>
                            </div> --}}
                        </div>
                        <div class="card-body">
                            <table class="order-table table table-hover" cellspacing="0" width="100%" id="categoria">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Descripcion</th>
                                        <th scope="col">Fecha de creación</th>
                                        <th scope="col" class="text-center">Administrador</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($categorias as $categoria)
                                        <tr>

                                            <td>{{ $categoria->id }}</td>
                                            <td>{{ $categoria->nombre }}</td>
                                            <td>{{ $categoria->descripcion }}</td>
                                            <td>{{ $categoria->created_at }}</td>

                                            <td class="text-center">
                                             @can('update categoria')
                                                <div class="dropdown">
                                                    <button class="btn btn-sm btn-info dropdown-toggle" type="button"
                                                        id="dropdownMenuButton" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-cogs"></i> Acciones
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="{{ route('admin.productos.categoria', $categoria->id ) }}"><i class="far fa-bookmark"></i> Ver produstos</a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.categorias.edit', $categoria->id) }}"><i
                                                                class="fas fa-edit"></i> Editar categoria</a>
                                                      @can('delete categoria')
                                                        <form
                                                            action="{{ route('admin.categorias.delete', $categoria->id) }}"
                                                            method="POST" class="categoria_producto">
                                                            @csrf
                                                            @method('Delete')
                                                            <button class="dropdown-item"
                                                                href="{{ route('admin.categorias.delete', $categoria->id) }}"><i
                                                                    class="far fa-trash-alt"></i> Eliminar
                                                                categoria</button>
                                                        </form>
                                                     @endcan

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
    </div>
</div>
@include('components.buscador')

@section('alerta')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('.categoria_producto').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Estas seguro de eliminar?',
                text: `Esta categoria sera eliminado`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Eliminado!',
                        'Haz eliminado esta categria.',
                        'success'
                    )
                    this.submit();

                }
            })
        });
    </script>
@endsection
@endsection
