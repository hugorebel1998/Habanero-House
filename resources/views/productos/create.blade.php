@extends('layouts.home')
@section('content')
@section('title', 'Creación de productos')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card card-danger shadow">
                <div class="card-header">
                    <div class="card-tittle"><i class="fas fa-box"></i> Crear productos</div>
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
                                    <option>Categoria 1</option>
                                    <option>Categoria 2</option>
                                    
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="customFile">Imagen destacada</label>

                                    <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Selecciona imagen</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mt-3">
                                <label for="fecha_de_nacimiento">Precio</label>
                                <input type="number" name="fecha_de_nacimiento"
                                    class="form-control" min="0.00" step="any" >
                                
                            </div>

                            <div class="col-md-4 mt-3">
                               <div class="form-group">
                                    <label>¿En descuento?</label>
                                    <select class="custom-select">
                                    <option value="0">No</option>
                                    <option value="1">Si</option>
                                    
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 mt-3">
                                <label for="correo_electrónico">Descuento</label>
                                <input type="number" name="correo_electrónico"
                                    class="form-control" min="0.00" step="any" >
                            </div>

                            <div class="col-md-12 mt-4">
                                 <label>Descripción</label>
                                <textarea class="form-control" rows="6" placeholder="....."></textarea>
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