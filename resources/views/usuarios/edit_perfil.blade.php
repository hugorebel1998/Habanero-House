@extends('layouts.master')
@section('title', 'Editar perfil')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-7 mt-5">
                <br>
                <div class="card card-danger shadow mt-5 mb-5">
                    <div class="card-header">
                        <div class="card-tittle"><i class="fas fa-user-edit"></i> Editar perfil</div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('usuario.update.perfil',$perfile->id) }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" name="nombre"
                                        class="form-control @error('nombre') is-invalid @enderror"
                                        value="{{ $perfile->name }}">
                                    @error('nombre')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-3">
                                    <label for="apellido_paterno">Apellido Paterno</label>
                                    <input type="text" name="apellido_paterno" class="form-control @error('apellido_paterno') is-invalid @enderror" value="{{ $perfile->apellido_paterno }}"> 
                                    @error('apellido_paterno')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                 <div class="col-md-3">
                                    <label for="apellido_materno">Apellido Materno</label>
                                    <input type="text" name="apellido_materno" class="form-control @error('apellido_materno') is-invalid @enderror" value="{{ $perfile->apellido_materno }}"> 
                                    @error('apellido_materno')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
    
                                <div class="col-md-4 mt-3">
                                    <label for="fecha_de_nacimiento">Fecha de nacimiento</label>
                                    <input type="date" name="fecha_de_nacimiento" class="form-control @error('fecha_de_nacimiento') is-invalid @enderror" value="{{ $perfile->fecha_nacimiento }}">
                                    @error('fecha_de_nacimiento')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
    
                                <div class="col-md-4 mt-3">
                                    <label for="teléfono mt-3">Teléfono</label>
                                    <input type="number" name="teléfono" class="form-control @error('teléfono') is-invalid @enderror" value="{{ $perfile->telefono }}" minlength="10"> 
                                    <span class="form-text text-muted">Debe de contener 10 digitos</span>
                                    @error('teléfono')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div> 
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="imagen">Imagen de usuario</label>
                                        <div class="custom-file">
                                            <input accept="image/*" type="file" class="custom-file-input @error('imagen') is-invalid @enderror" name="imagen" value="{{ old('imagen') }}">
                                            <label class="custom-file-label" for="customFile">Selecciona imagen</label>
                                            @error('imagen')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label for="correo_electrónico">Correo electrónico</label>
                                    <input type="email" name="correo_electrónico" 
                                    class="form-control @error('correo_electrónico') is-invalid @enderror" value="{{ $perfile->email }}">
                                    <span class="form-text text-muted">Puedes utilizar letras, números y puntos</span>
                                    @error('correo_electrónico')
                                            <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-danger mb-3"> <i class="fas fa-save"></i>
                                    Actualizar informacion</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-5">
                <br>
                <diV class="card card-danger shadow mt-5">
                    <div class="card-header">
                        <div class="card-tittle"><i class="fas fa-image"></i> Imagen destacada</div>
                    </div>
                    <div class="card-body">
                        
                            <div class="col-md-12">
                                @if ($perfile->imagen_usuario)
                                <img src="{{ asset('img/users/' . $perfile->imagen_usuario) }}"
                                    class="rounded mx-auto d-block" id="imagen_user" width="78%" height="78%">
                                @else
                                <img src="{{ asset('img/users/sin_asignar/foto.jpg') }}" class="rounded mx-auto d-block"
                                    width="78%" height="78%">
                                @endif
                            </div>
                        
                    </div>
                </diV>
            </div>
        </div>
    </div>

@endsection
