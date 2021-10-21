@extends('layouts.home')
@section('content')
@section('title', 'Editar categoria')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-danger shadow">
                <div class="card-header">
                    <div class="card-tittle"><i class="fas fa-edit"></i> Editar categoria</div>
                </div>
                <div class="card-body">
                    <form action="{{ route('categorias.update', $categoria->id)}}" method="POST" autocomplete="off">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label for="nombre">Nombre</label>
                                <input type="hidden" value="{{ $categoria->id}}">
                                <input type="text" name="nombre"
                                    class="form-control @error('nombre') is-invalid @enderror"
                                    placeholder="Nombre" value="{{ $categoria->nombre }}">
                                @error('nombre')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="col-md-12 mt-3">
                                <label for="nombre">Descripción</label>
                                <textarea class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" rows="6">{{ $categoria->descripcion}} </textarea>
                                @error('descripcion')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>   

                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-sm btn-danger"> <i class="fas fa-save"></i>
                                Actualizar categoria</button>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>
   
@endsection