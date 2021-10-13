@extends('layouts.home')
@section('content')    
@section('title', 'Lista de categorias')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <b class="lead font-weight-bold"> Categorias</b>
                </div>
                <div class="d-flex justify-content-end mt-3 mr-4">
                    <a href="{{ route('categorias.create') }}" class="btn btn-sm btn-success"> <i class="fas fa-plus"></i> Nuevo categoria</a>
                </div>
                <div class="card-body">
                    <table class="order-table table table-hover" cellspacing="0" width="100%" id="example2">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Imagen</th>
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
@include('components.buscador')
@endsection