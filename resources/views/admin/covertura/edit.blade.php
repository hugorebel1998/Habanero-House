@extends('layouts.home')
@section('content')
@section('title', 'Editar covertura')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-danger shadow">
                <div class="card-header">
                    <div class="card-tittle"><i class="fas fa-edit"></i> Editar covertura</div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.covertura.update', $covertura->id) }}" method="POST"
                        autocomplete="off">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status"
                                        class="custom-select select2bs4 @error('status') is-invalid @enderror"
                                        style="width: 100%;">
                                        <option value="0" @if ($covertura->status == 0) selected @endif>No activo</option>
                                        <option value="1" @if ($covertura->status == 1) selected @endif>Activo</option>
                                    </select>
                                    @error('tipo_covertura')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12 mt-3">
                                <label for="nombre">Nombre</label>
                                <input type="hidden" value="{{ $covertura->id }}">
                                <input type="text" name="nombre"
                                    class="form-control @error('nombre') is-invalid @enderror" placeholder="Nombre"
                                    value="{{ $covertura->nombre }}">
                                @error('nombre')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-sm btn-danger"> <i class="fas fa-save"></i>
                                Actualizar covertura</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
