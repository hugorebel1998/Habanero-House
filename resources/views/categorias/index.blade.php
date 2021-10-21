@extends('layouts.home')
@section('content')    
@section('title', 'Lista de categorias')


<div class="container-fluid">
    <div class="row justify-content-center">
    <div class="col-md-11">
        <div class="row">
        <div class="col-md-4">
            <div class="card card-danger shadow">
                <div class="card-header">
                    <div class="card-tittle"><i class="fas fa-box"></i> Crear categoria</div>
                </div>
                <div class="card-body">
                    <form action="#" method="POST" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label for="nombre">Nombre</label>
                                <input type="text" name="nombre"
                                    class="form-control @error('nombre') is-invalid @enderror"
                                    placeholder="Nombre" value="{{ old('nombre') }}">
                                @error('nombre')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12 mt-3">
                                <label for="nombre">Descripción</label>
                                <textarea class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" rows="6" required>{{ old('descripcion')}} </textarea>
                                @error('descripcion')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-sm btn-danger"> <i class="fas fa-save"></i>
                                Guardar categoria</button>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <b class="lead font-weight-bold"> Categorias</b>
                </div>
                <div class="d-flex justify-content-end mt-3 mr-4">
                    {{-- <a href="{{ route('categorias.create') }}" class="btn btn-sm btn-success"> <i class="fas fa-plus"></i> Nuevo categoria</a> --}}
                </div>
                <div class="card-body">
                    <table class="order-table table table-hover" cellspacing="0" width="100%" id="example2">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Fecha de creación</th>
                                <th scope="col" class="text-center">Administrador</th>
                            </tr>
                        </thead>
                        <tbody>
                      
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                
                                <td class="text-center">
                                    
                                       <div class="dropdown">
                                        <button class="btn btn-sm btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                         <i class="fas fa-cogs"></i> Acciones
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                          <a class="dropdown-item" href="#"><i class="far fa-bookmark"></i> Ver producto</a>
                                          <a class="dropdown-item" href="#"><i class="fas fa-edit"></i> Editar producto</a>
                                       
                                       <form action="#" method="POST">
                                        @csrf
                                        @method('Delete')
                                           <button class="dropdown-item" onclick="return confirm('¿Estas Seguro de eliminar este usuario')" href="#"><i class="far fa-trash-alt"></i> Eliminar producto</button>
                                       </form>
                                    
                                        </div>
                                      </div>
                                    
                                </td>
                            </tr>
                      
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
    </div>
</div>
</div>
@include('components.buscador')
@endsection