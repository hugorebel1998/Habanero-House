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
                            <div class="card-tittle"><i class="fas fa-truck"></i> Crear covertura de envio
                                (Localidad)</div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.covertura.localidad.store') }}" method="POST">
                                @csrf
                                <div class="row">

                                    <div class="col-md-12 mt-3">
                                        <label for="nombre">Nombre</label>
                                        <input type="hidden" name="state_id" value="{{ $id }}">
                                        <input type="text" name="nombre"
                                            class="form-control @error('nombre') is-invalid @enderror"
                                            placeholder="Nombre" value="{{ old('nombre') }}">
                                        @error('nombre')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-12 mt-4">
                                        <div class="form-group">
                                            <label>Valor del envio</label>
                                            <input type="number" name="precio"
                                                class="form-control @error('precio') is-invalid @enderror"
                                                value="{{ $setting }}" placeholder="0.00">
                                            @error('precio')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                        </div>
                        <div class="text-center mt-5 mb-4">
                            <button type="submit" class="btn btn-sm btn-danger"> <i class="fas fa-save"></i>
                                Guardar covertura</button>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card card-danger card-outline shadow">
                        <div class="card-header">
                            <b class="lead font-weight-bold"> <i class="fas fa-truck"></i> Coverturas de envio</b>
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

                                            <a class="dropdown-item" href="{{ route('admin.covertura.index.local.delete')}}">
                                                <i class="fas fa-ban"></i>
                                                Localidades eliminados
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
                                        <th scope="col">Precio de envío</th>
                                        <th scope="col" class="text-center">Administrador</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($localidades as $localidad)
                                        <tr>
                                            <td>
                                                @if ($localidad->status == 1)
                                                    <span class="badge badge-pill badge-info p-2"
                                                        style="font-size: .8rem">Activo</span>
                                                @else
                                                    <span class="badge badge-pill badge-danger p-2"
                                                        style="font-size: .8rem">No activo</span>
                                                @endif
                                            </td>
                                            <td>{{ $localidad->nombre }}</td>
                                            <td>$ {{ $localidad->precio }} MXN</td>

                                            <td class="text-center">

                                                <div class="dropdown">
                                                    <button class="btn btn-sm btn-info dropdown-toggle" type="button"
                                                        id="dropdownMenuButton" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-cogs"></i> Acciones
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="{{ route('admin.covertura.localidad.edit', $localidad->id)}}">
                                                            <i class="fas fa-edit"></i>
                                                            Editar localidad
                                                        </a>
                                                        <form action="{{ route('admin.covertura.localidad.delete', $localidad->id)}}" method="POST" class="covertura_localidad">
                                                            @csrf
                                                            @method('Delete')
                                                            <button class="dropdown-item" href="{{ route('admin.covertura.localidad.delete', $localidad->id)}}"><i
                                                                    class="far fa-trash-alt"></i>
                                                                Eliminar localidad</button>
                                                        </form>
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
        $('.covertura_localidad').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Estas seguro de eliminar?',
                text: `Esta localidad sera eliminada`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Eliminado!',
                        'Haz eliminado esta localidad.',
                        'success'
                    )
                    this.submit();

                }
            })
        });
    </script>
@endsection
@endsection
