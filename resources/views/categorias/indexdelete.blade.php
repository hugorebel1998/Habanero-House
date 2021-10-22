@extends('layouts.home')
@section('content')    
@section('title', 'Lista de categorias')


<div class="container-fluid">
    <div class="row justify-content-center">
    <div class="col-md-7">
        
            <div class="card shadow">
                <div class="card-header">
                <b class="lead font-weight-bold">Categorias eliminadas</b>
                </div>
                <div class="card-body">
                    <table class="order-table table table-hover" cellspacing="0" width="100%" id="categoria">
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
                      
                            @foreach ( $categorias as $categoria)
                            <tr @if ($categoria->deleted_at) class="table-danger" @endif>
                                
                                <td>{{ $categoria->id }}</td>
                                <td>{{ $categoria->nombre }}</td>
                                <td>{{ $categoria->descripcion }}</td>
                                <td>{{ $categoria->created_at }}</td>
                                
                                <td class="text-center">
                                    
                                         <a 
                                    href="{{ route('categorias.categoriarestore', $categoria->id )}}"
                                    onclick="return confirm('¿Estas Seguro de restablecer esta categoria?')"
                                    class="btn btn-sm btn-info">
                                     <i class="fas fa-trash-restore"></i> Restablecer</a>
                                </td>
                            </tr>
                            @endforeach
                      
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
</div>
@include('components.buscador')
@endsection