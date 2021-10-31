@extends('layouts.home')
@section('content')
@section('title', 'Información')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card card-danger shadow">
                <div class="card-header">
                    <div class="card-tittle"><i class="fas fa-spa"></i> Información</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <p class=""><i class="fas fa-dungeon"></i>  Nombre razón social</p>
                            <b class="">{{ $restaurante->nombre_razon_social }}</b>
                            <hr>
                        </div>
                        <div class="col-md-4">
                            <p class=""><i class="fas fa-user-tie"></i> Nombre del encargado</p>
                            <b class="">{{ $restaurante->nombre_encargado }}</b>
                            <hr>
                        </div>
                        <div class="col-md-4">
                            <p class=""><i class="fas fa-phone-volume"></i> Teléfono</p>
                            <b class="">{{ $restaurante->telefono_razon_social }}</b>
                            <hr>
                        </div>
                        <div class="col-md-7 mt-4">
                            <p class=""><i class="fas fa-map-marker-alt"></i> Dirección</p>
                            <b class="">{{ $restaurante->direccion_razon_social }}</b>
                            <hr>
                        </div>
                        <div class="col-md-5 mt-4">
                            <p class=""><i class="fas fa-map-marker-alt"></i> Correo electrónico</p>
                            <b class="">{{ $restaurante->email_razon_social }}</b>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="text-right mt-4 mb-4 mr-5">
                    <a href="{{ route('admin.ajustes.edit', $restaurante->id)}}" class="btn btn-danger"><i class="fas fa-edit"></i> Editar</a>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection
