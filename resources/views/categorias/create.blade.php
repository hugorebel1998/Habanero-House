@extends('layouts.home')
@section('content')
@section('title', 'Creación de categorias')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card card-danger shadow">
                <div class="card-header">
                    <div class="card-tittle"><i class="fas fa-box"></i> Crear categoria</div>
                </div>
                <div class="card-body">
                    <form action="#" method="POST" autocomplete="off">
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
                                <div class="form-group">
                                    <label>Categoria</label>
                                    <select class="custom-select">                                    
                                    </select>
                                </div>
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