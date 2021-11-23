@extends('layouts.home')
@section('content')
@section('title', 'Editar información')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card card-danger shadow">
                <div class="card-header">
                    <div class="card-tittle"><i class="fas fa-toolbox"></i> Editar información</div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.ajustes.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <label for="nombre_encargado">Nombre del encargado</label>
                                <input type="hidden" name="id_restaurant" value="{{ $restaurante->id }}">
                                <input type="text" name="nombre_encargado"
                                    class="form-control @error('nombre_encargado') is-invalid @enderror"
                                    value="{{ $restaurante->nombre_encargado }}">
                                @error('nombre_encargado')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="nombre_razón_social">Nombre razón social</label>
                                <input type="text" name="nombre_razón_social"
                                    class="form-control @error('nombre_razón_social') is-invalid @enderror"
                                    value="{{ $restaurante->nombre_razon_social }}">
                                @error('nombre_razón_social')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mt-4">
                                <label for="teléfono">Teléfono</label>
                                <input type="number" name="teléfono"
                                    class="form-control @error('teléfono') is-invalid @enderror"
                                    value="{{ $restaurante->telefono_razon_social }}">
                                @error('teléfono')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mt-4">
                                <label for="correo_electrónico">Correo electrónico</label>
                                <input type="email" name="correo_electrónico"
                                    class="form-control @error('correo_electrónico') is-invalid @enderror"
                                    value="{{ $restaurante->email_razon_social }}">
                                @error('correo_electrónico')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mt-4">
                                <label for="dirección">Direccion</label>
                                <input type="text" name="dirección"
                                    class="form-control @error('dirección') is-invalid @enderror"
                                    value="{{ $restaurante->direccion_razon_social }}">
                                @error('dirección')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="text-center mt-4 mb-4">
                            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-save"></i> Actualizar
                                información</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
