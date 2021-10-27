@extends('layouts.master')
@section('title', 'Editar perfil')
@section('content')

<div class="container">
<br><br><br>
    <div class="row justify-content-center">
    
        <div class="col-md-10 mt-5">
            <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
                @csrf @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <label for="nombre">Nombre</label>
                        <input type="hidden" value="{{ $usuario->id }}">
                        <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ $usuario->name }}"> 
                        @error('nombre')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-3">
                        <label for="apellido_paterno">Apellido Paterno</label>
                        <input type="text" name="apellido_paterno" class="form-control @error('apellido_paterno') is-invalid @enderror" value="{{ $usuario->apellido_paterno }}"> 
                        @error('apellido_paterno')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-3">
                        <label for="apellido_materno">Apellido Materno</label>
                        <input type="text" name="apellido_materno" class="form-control @error('apellido_materno') is-invalid @enderror" value="{{ $usuario->apellido_materno }}">
                        @error('apellido_materno')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4 mt-3">
                        <label for="fecha_de_nacimiento">Fecha de nacimiento</label>
                        <input type="date" name="fecha_de_nacimiento" class="form-control @error('fecha_de_nacimiento') is-invalid @enderror" value="{{ $usuario->fecha_nacimiento }}"> 
                        @error('fecha_de_nacimiento')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4 mt-3">
                        <label for="teléfono mt-3">Teléfono</label>
                        <input type="number" name="teléfono" class="form-control @error('teléfono') is-invalid @enderror" value="{{ $usuario->telefono }}"> 
                        @error('teléfono')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- <div class="col-md-4 mt-4">
                        <div class="form-group">
                            <label for="imagen">Imagen destacada</label>
                            <div class="custom-file">
                                <input accept="image/*" type="file" class="custom-file-input @error('imagen') is-invalid @enderror" name="imagen" value="{{ old('imagen') }}">
                                <label class="custom-file-label" for="customFile">Selecciona imagen</label> @error('imagen')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div> -->
                    <div class="col-md-6 mt-2">
                        <label for="correo_electrónico">Correo electrónico</label>
                        <input type="email" disabled name="correo_electrónico" class="form-control @error('correo_electrónico') is-invalid @enderror" value="{{ $usuario->email }}">
                        @error('correo_electrónico')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-danger mb-3"> <i class="fas fa-save"></i>
                        Actualizar información</button>
                </div>
            </form>
         
        </div>
    </div>

</div>

@endsection