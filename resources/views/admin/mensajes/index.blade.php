@extends('layouts.home')
@section('content')
@section('title', 'Mensajes')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">
                    <b class="lead font-weight-bold"> Mensajes</b>
                </div>
                <div class="d-flex flex-row-reverse mr-4">
                    <div class="p-2">

                        <div class="dropdown">
                            <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-sort-amount-up-alt"></i> Filtrar por
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-ban"></i>
                                    Mensajes no leidos
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="order-table table table-hover" cellspacing="0" width="100%" id="example2">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Correo electrónico</th>
                                <th scope="col">Fecha</th>
                                <th scope="col" class="text-center">Administrador</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mensajes as $mensaje)
                                <tr>
                                    <td>{{ $mensaje->id }}</td>
                                    <td>{{ $mensaje->nombre }}</td>
                                    <td>{{ $mensaje->email }}</td>
                                    <td>{{ date('d M Y - H:i:s', $mensaje->created_at->timestamp) }}</td>
                                    <td class="d-flex justify-content-center">
                                        <div class="p-2">
                                            <a href="{{ route('admin.contacto.mensaje',$mensaje->id)}}" class="btn btn-sm btn-success"><i class="far fa-envelope"></i> Enviar email</a>
                                        </div>
                                        <div class="p-2">
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-info dropdown-toggle" type="button"
                                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="fas fa-cogs"></i> Acciones
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="#"><i class="far fa-bookmark"></i>
                                                        Ver
                                                        producto</a>
                                                    <a class="dropdown-item" href="#"><i class="fas fa-edit"></i>
                                                        Editar
                                                        producto</a>
                                                </div>
                                            </div>
                                        </div>

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


@endsection
