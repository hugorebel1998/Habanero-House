@extends('layouts.home')
@section('content')
@section('title', 'Covertura envios')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="card shadow">
                        <div class="card-header bg-rojo">
                            <div class="card-tittle"><i class="fas fa-archway"></i> Crear municipio / Delegación</div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.covertura.store') }}" method="POST">
                                @csrf
                                <div class="row">

                                    <div class="col-md-12 mt-3">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" name="nombre"
                                            class="form-control @error('nombre') is-invalid @enderror"
                                            placeholder="Nombre" value="{{ old('nombre') }}">
                                        @error('nombre')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-12 mt-4">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select name="status"
                                                class="custom-select select2bs4 @error('status') is-invalid @enderror"
                                                style="width: 100%;">
                                                <option value="" selected>-- Selecciona una opción--</option>
                                                <option value="0" @if (old('status') == '0') selected="selected" @endif }}> No activo</option>
                                                <option value="1" @if (old('status') == '1') selected="selected" @endif }}> Activo</option>
                                            </select>
                                            @error('status')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                        </div>

                        <div class="text-center mt-2 mb-4">
                            <button type="submit" class="btn btn-sm btn-danger"> <i class="fas fa-save"></i>
                                Guardar covertura</button>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-8">

                    <div class="card card-danger card-outline shadow">
                        <div class="card-header">
                            <b class="lead font-weight-bold"> <i class="fas fa-archway"></i> Municipios /
                                Delegaciones</b>
                        </div>
                        <div class="d-flex flex-row-reverse mr-5">

                            <div class="p-2">
                                @can('delete categoria')
                                    <div class="dropdown dropleft">
                                        <a class="btn btn-primary dropdown-toggle" href="#" role="button"
                                            id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <i class="fas fa-sort-amount-up-alt"></i> Filtrar por
                                        </a>

                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                                            <a class="dropdown-item" href="{{ route('admin.covertura.index.delete') }}">
                                                <i class="fas fa-ban"></i>
                                                Coverturas eliminados
                                            </a>
                                        </div>
                                    </div>
                                @endcan
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="order-table table table-hover" cellspacing="0" width="100%" id="example2">
                                <thead>
                                    <tr>
                                        <th scope="col">Status</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col" class="text-center">Administrador</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($coverturas as $covertura)

                                        <tr>

                                            <td>
                                                @if ($covertura->status == 1)
                                                    <span class="badge badge-pill badge-info p-2"
                                                        style="font-size: .8rem">Activo</span>
                                                @else
                                                    <span class="badge badge-pill badge-danger p-2"
                                                        style="font-size: .8rem">No activo</span>
                                                @endif
                                            </td>
                                            <td>{{ ucfirst($covertura->nombre) }}</td>
                                            <td class="text-center">
                                                <div class="dropdown">
                                                    <button class="btn btn-sm btn-info dropdown-toggle" type="button"
                                                        id="dropdownMenuButton" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-cogs"></i> Acciones
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.covertura.edit', $covertura->id) }}">
                                                            <i class="fas fa-edit"></i>
                                                            Editar covertura
                                                        </a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.covertura.localidad', $covertura->id) }}">
                                                            <i class="fas fa-map-marked-alt"></i>
                                                            Localidades
                                                        </a>
                                                        <form
                                                            action="{{ route('admin.covertura.delete', $covertura->id) }}"
                                                            method="POST" class="covertura_platillo">
                                                            @csrf
                                                            @method('Delete')
                                                            <button class="dropdown-item"
                                                                href="{{ route('admin.covertura.delete', $covertura->id) }}"><i
                                                                    class="far fa-trash-alt"></i>
                                                                Eliminar covertura</button>
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
    </div>
</div>
@include('components.buscador')
@section('alerta')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('.covertura_platillo').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Estas seguro de eliminar?',
                text: `Esta covertura sera eliminado`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Eliminado!',
                        'Haz eliminado esta covertura.',
                        'success'
                    )
                    this.submit();

                }
            })
        });
    </script>
@endsection
@endsection
