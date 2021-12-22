@extends('layouts.home')
@section('content')
@section('title', 'Editar localidad')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-rojo">
                    <div class="card-tittle"><i class="fas fa-edit"></i> Editar localidad</div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.covertura.localidad.update', $localidad->id)}}" method="POST" autocomplete="off">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status"
                                        class="custom-select select2bs4 @error('status') is-invalid @enderror"
                                        style="width: 100%;">
                                        <option value="0" @if ($localidad->status == 0) selected @endif>No activo</option>
                                        <option value="1" @if ($localidad->status == 1) selected @endif>Activo</option>
                                    </select>
                                    @error('tipo_covertura')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12 mt-3">
                                <label for="nombre">Nombre</label>
                                <input type="text" name="nombre"
                                    class="form-control @error('nombre') is-invalid @enderror" placeholder="Nombre"
                                    value="{{ $localidad->nombre }}">
                                @error('nombre')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12 mt-3">
                                <label for="precio">Precio de eníio</label>
                                <input type="number" name="precio"
                                    class="form-control @error('precio') is-invalid @enderror" placeholder="Nombre"
                                    value="{{ $localidad->precio }}">
                                @error('precio')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-sm btn-danger"> <i class="fas fa-save"></i>
                                Actualizar localidad
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
