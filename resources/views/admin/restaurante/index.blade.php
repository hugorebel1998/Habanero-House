@extends('layouts.home')
@section('content')
@section('title', 'Configuración')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card shadow">
                <div class="card-header bg-rojo text-white">
                    <h3 class="card-title"><i class="fas fa-book-open"></i> Datos generales de restaurante</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                            <i class="fas fa-plus text-white"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <p class=""><i class="fas fa-dungeon"></i> Nombre razón social</p>
                            <b class="">{{ $restaurante->nombre_razon_social }}</b>
                            <hr>
                        </div>
                        <div class="col-md-4">
                            <p class=""><i class="fas fa-user-tie"></i> Nombre del encargado</p>
                            <b class="">{{ $restaurante->nombre_encargado }}</b>
                            <hr>
                        </div>
                        <div class="col-md-4">
                            <p class=""><i class="fas fa-phone-volume"></i> Teléfono fijo</p>
                            <b class="">{{ $restaurante->telefono_razon_social }}</b>
                            <hr>
                        </div>
                        <div class="col-md-12">
                            <p class=""><i class="fas fa-map-marker-alt"></i> Dirección</p>
                            <b class="">{{ $restaurante->direccion_razon_social }}</b>
                            <hr>
                        </div>
                        <div class="col-md-4">
                            <p class=""><i class="fas fa-at"></i> Correo electrónico</p>
                            <b class="">{{ $restaurante->email_razon_social }}</b>
                            <hr>
                        </div>

                        <div class="col-md-4">
                            <p class=""><i class="fas fa-tools"></i> Modo mantenimiento</p>
                            <h5 class="">
                                @if ($restaurante->mantenimiento == 0)
                                    <span class="badge badge-primary p-1">
                                        <i class="fas fa-check-square"></i> Desactivado
                                    </span>
                                @else
                                    <span class="badge badge-danger">
                                        <i class="fas fa-tools"></i> En mantenimiento
                                    </span>
                                @endif
                            </h5>
                            <hr>
                        </div>

                        <div class="col-md-4">
                            <p class=""><i class="fab fa-whatsapp"></i> Whatsapp</p>
                            <b>{{ $restaurante->whatsapp}}</b>
                            <hr>
                        </div>
                        <div class="col-md-4">
                            <p class=""><i class="fab fa-facebook-square"></i> Facebook</p>
                            <b>
                                @if ($restaurante->facebook)
                                      Habanero House Autentica Comida Yucateca
                                 @else     
                                      Sin asignar
                                @endif
                            </b>
                            <hr>
                        </div>
                        <div class="col-md-4">
                            <p class=""><i class="fab fa-instagram"></i> Instagram</p>
                            <b>
                                @if ($restaurante->instagram)
                                  habanero_house_oficial (Habanero House)
                                @else
                                  Sin asignar  
                                @endif
                            </b>
                            <hr>
                        </div>

                        <div class="col-md-4">
                            <p class=""><i class="fab fa-twitter"></i> Twitter</p>
                            <b>
                                @if ($restaurante->twitter == null)
                                  Sin asignar
                                @else
                                  {{ $restaurante->twitter}}  
                                @endif
                            </b>
                            <hr>
                        </div>

                        <div class="col-md-4">
                            <p class=""><i class="fab fa-youtube"></i> Youtube</p>
                            <b>
                                @if ($restaurante->youtube == null)
                                  Sin asignar
                                @else
                                  {{ $restaurante->youtube}}  
                                @endif
                            </b>
                            <hr>
                        </div>
                        <div class="col-md-4">
                            <p class=""><i class="fas fa-phone-volume"></i> Configración de precio de envío</p>
                            <b class="">
                                @if ($restaurante->precio_envio == 0)
                                    Gratis
                                @elseif($restaurante->precio_envio == 1)
                                    Valor fijo
                                @elseif($restaurante->precio_envio == 2)
                                    Valor variable por ubicación
                                @elseif($restaurante->precio_envio == 3)
                                    Valor fijo por profucto
                                @endif
                            </b>
                            <hr>
                        </div>

                        <div class="col-md-4">
                            <p class=""><i class="fas fa-hand-holding-usd"></i> Valor del envio</p>
                            <b class="">{{ $restaurante->valor_por_defecto }}</b>
                            <hr>
                        </div>

                        <div class="col-md-4">
                            <p class=""><i class="fas fa-coins"></i> Envio gratis monto minimo</p>
                            <b class="">{{ $restaurante->cantidad_de_envio_min }}</b>
                            <hr>
                        </div>

                    </div>
                    <div class="text-center mr-5">
                        <a href="{{ route('admin.ajustes.edit', $restaurante->id) }}" class="btn btn-danger"><i
                                class="fas fa-edit"></i> Editar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection