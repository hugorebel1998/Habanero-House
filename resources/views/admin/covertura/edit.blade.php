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
                    <form action="{{ route('admin.covertura.update', $covertura->id)}}" method="POST" autocomplete="off">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label for="status">Status</label>
                                <input type="hidden" value="{{ $covertura->id}}">
                                <input type="number" name="status"
                                    class="form-control @error('status') is-invalid @enderror"
                                    placeholder="Nombre" value="{{ $covertura->status }}">
                                @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12 mt-3">
                                <label for="nombre">Nombre</label>
                                <input type="hidden" value="{{ $covertura->id}}">
                                <input type="text" name="nombre"
                                    class="form-control @error('nombre') is-invalid @enderror"
                                    placeholder="Nombre" value="{{ $covertura->nombre }}">
                                @error('nombre')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    <label>Tipo de covertura</label>
                                    <select name="tipo_covertura"
                                        class="custom-select select2bs4 @error('tipo_covertura') is-invalid @enderror"
                                        style="width: 100%;">
                                            <option value="0" @if ($covertura->tipo_covertura == 0) selected @endif>Estado de méxico</option>
                                            <option value="1" @if ($covertura->tipo_covertura == 1) selected @endif>Ciudad de méxico</option>
                                    </select>
                                    @error('tipo_covertura')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <div class="col-md-12 mt-3">
                                <label for="precio">Precio de envio</label>
                                <input type="number" name="precio"
                                    class="form-control @error('precio') is-invalid @enderror"
                                     value="{{ $covertura->precio }}">
                                @error('precio')
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