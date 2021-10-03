@extends('layouts.home')
@section('content')

<div class="container">
    <div class="row justify-content-center" id="app">
        <div class="col-md-10">
            <div class="card card-danger">
                <div class="card-header">
                    <div class="card-tittle"><i class="fas fa-user-plus"></i> Crear usuario</div>
                </div>
                <div class="card-body">
                    <form action="#" method="POST" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-md-5">
                                <label for="nombre">Nombre</label>
                                <input type="text" name="nombre"
                                    class="form-control @error('nombre') is-invalid @enderror"
                                    placeholder="Nombre" value="{{ old('nombre') }}">
                                @error('nombre')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-3">
                                <label for="apellido_paterno">Apellido Paterno</label>
                                <input type="text" name="apellido_paterno"
                                    class="form-control @error('apellido_paterno') is-invalid @enderror"
                                    placeholder="Apellido paterno" value="{{ old('apellido_paterno') }}">
                                @error('apellido_paterno')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-3">
                                <label for="apellido_materno">Apellido Materno</label>
                                <input type="text" name="apellido_materno"
                                    class="form-control @error('apellido_materno') is-invalid @enderror"
                                    placeholder="Apellido materno" value="{{ old('apellido_materno') }}">
                                @error('apellido_materno')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mt-3">
                                <label for="fecha_nacimiento">Fecha de nacimiento</label>
                                <input type="date" name="fecha_nacimiento"
                                    class="form-control @error('fecha_nacimiento') is-invalid @enderror">
                                @error('fecha_nacimiento')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mt-3">
                                <label for="telefono mt-3">Teléfono</label>
                                <input type="number" name="telefono"
                                    class="form-control @error('telefono') is-invalid @enderror" value="{{ old('telefono') }}">
                                @error('telefono')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mt-3">
                                <label for="correo_electronico">Correo electrónico</label>
                                <input type="email" name="correo_electronico"
                                    class="form-control @error('correo_electronico') is-invalid @enderror" value="{{ old('correo_electronico') }}">
                                @error('correo_electronico')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mt-3">
                                <label for="contraseña">Contraseña</label>
                                <input type="password" name="contraseña"
                                    class="form-control @error('contraseña') is-invalid @enderror" value="{{ old('contraseña') }}">
                                @error('contraseña')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mt-3">
                                <label for="confirmar_contraseña">Confirmar contraseña</label>
                                <input type="password" name="confirmar_contraseña"
                                    class="form-control @error('confirmar_contraseña') is-invalid @enderror" value="{{ old('confirmar_contraseña') }}">
                                @error('confirmar_contraseña')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-sm btn-danger"> <i class="fas fa-save"></i>
                                Guardar</button>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>

    
@endsection