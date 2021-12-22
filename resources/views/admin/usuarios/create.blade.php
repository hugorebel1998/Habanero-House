@extends('layouts.home')
@section('content')
@section('title', 'Creación de usuarios')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow">
                <div class="card-header bg-rojo">
                    <div class="card-tittle"><i class="fas fa-user-plus"></i> Crear usuario</div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.usuarios.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off" >
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <label for="nombre">Nombre</label>
                                <input type="text" name="nombre"
                                    class="form-control @error('nombre') is-invalid @enderror"
                                    placeholder="Nombre" value="{{ old('nombre') }}">
                                @error('nombre')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="apellido_paterno">Apellido Paterno</label>
                                <input type="text" name="apellido_paterno"
                                    class="form-control @error('apellido_paterno') is-invalid @enderror"
                                    placeholder="Apellido paterno" value="{{ old('apellido_paterno') }}">
                                @error('apellido_paterno')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="apellido_materno">Apellido Materno</label>
                                <input type="text" name="apellido_materno"
                                    class="form-control @error('apellido_materno') is-invalid @enderror"
                                    placeholder="Apellido materno" value="{{ old('apellido_materno') }}">
                                @error('apellido_materno')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4 mt-4">
                                <label for="fecha_de_nacimiento">Fecha de nacimiento</label>
                                <input type="date" name="fecha_de_nacimiento"
                                    class="form-control @error('fecha_de_nacimiento') is-invalid @enderror" value="{{ old('fecha_de_nacimiento') }}">
                                @error('fecha_de_nacimiento')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4 mt-4">
                                <label for="teléfono mt-3">Teléfono</label>
                                <input type="number" name="teléfono"
                                    class="form-control @error('teléfono') is-invalid @enderror" placeholder="77-77-77-77-77" value="{{ old('teléfono') }}">
                                @error('teléfono')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4 mt-4">
                                <div class="form-group">
                                    <label for="imagen">Imagen destacada</label>
                                    <div class="custom-file">
                                        <input accept="image/*" type="file"
                                            class="custom-file-input @error('imagen') is-invalid @enderror"
                                            name="imagen" value="{{ old('imagen') }}">
                                        <label class="custom-file-label"for="customFile">Selecciona imagen</label>
                                        @error('imagen')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mt-4">
                                <label for="correo_electrónico">Correo electrónico</label>
                                <input type="email" name="correo_electrónico"
                                    class="form-control @error('correo_electrónico') is-invalid @enderror" placeholder="correo@correo.com" value="{{ old('correo_electrónico') }}">
                                    <span class="form-text text-muted">Puedes utilizar letras, números y puntos</span>
                                @error('correo_electrónico')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4 mt-4">
                                <label for="contraseña">Contraseña</label>
                                <input type="password" name="contraseña"
                                    class="form-control @error('contraseña') is-invalid @enderror" value="{{ old('contraseña') }}">
                                @error('contraseña')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4 mt-4">
                                <label for="confirmar_contraseña">Confirmar contraseña</label>
                                <input type="password" name="confirmar_contraseña"
                                    class="form-control" value="{{ old('confirmar_contraseña') }}">
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-sm btn-danger"> <i class="fas fa-save"></i>
                                Guardar usuario</button>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>

    
@endsection