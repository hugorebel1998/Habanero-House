@extends('layouts.master')
@section('title', 'Editar perfil')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 mt-5"><br>
            <div class="card shadow mt-5">
                <div class="card-header">
                    <div class="card-tittle"><i class="fas fa-unlock-alt"></i> Cambiar contraseña</div>
                </div>
                <div class="card-body">
                    <form action="{{ route('usuario.contraseña.update')}}" method="POST" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mt-3">
                                <label for="contraseña">Contraseña actual</label>
                                <input type="password" name="contraseña"
                                    class="form-control @error('contraseña') is-invalid @enderror"
                                    value="{{ old('contraseña') }}">
                                <input type="hidden" name="id"
                                    class="form-control @error('contraseña') is-invalid @enderror"
                                    value="{{ $perfile }}">
                                @error('contraseña')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12 mt-3">
                                <label for="nueva_contraseña">Contraseña nueva</label>
                                <input type="password" name="nueva_contraseña"
                                    class="form-control @error('nueva_contraseña') is-invalid @enderror"
                                    value="{{ old('nueva_contraseña') }}">
                                @error('nueva_contraseña')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12 mt-3">
                                <label for="confirmar_nueva_contraseña">Confirmar contraseña</label>
                                <input type="password" name="confirmar_nueva_contraseña"
                                    class="form-control @error('confirmar_nueva_contraseña') is-invalid @enderror">
                                @error('confirmar_nueva_contraseña')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="  text-center mt-4">
                            <button type="submit" class="btn btn-sm btn-danger"> <i class="fas fa-pen-nib"></i>
                                Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection