@extends('layouts.home')
@section('content')
@section('title', 'Ordenes ir a recoger')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card transparente">
                <div class="card-header">
                    <b class="lead font-weight-bold"> <i class="fab fa-first-order"></i> Ordenes ir a recoger</b>
                </div>
                <div class="d-flex flex-row-reverse mr-4">
                    <div class="p-2">
                        @can('delete producto')
                        <div class="dropdown dropleft">
                            <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-sort-amount-up-alt"></i> Filtrar por
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="">
                                    <a class="dropdown-item" href="{{ route('admin.orden.index') }}">
                                        <i class="fas fa-list"></i>
                                        Todas las ordenes
                                    </a>
    
                                    <a class="dropdown-item" href="{{ route('admin.orden.a.domicilio')}}">
                                        <i class="fas fa-paper-plane"></i>
                                        Entregas a domicilio

                                    </a>

                            </div>
                        </div>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    <table class="order-table table table-hover" cellspacing="0" width="100%" id="example2">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Usuario</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Estado de la orden</th>
                                <th scope="col">Total</th>
                                <th scope="col" class="text-center">Administrador</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ordenes as $orden)
                            <tr>
                                <td>{{ $orden->numero_orden}}</td>

                                <td>
                                    @foreach ($usuarios as $usuario)
                                    @if ($orden->user_id === $usuario->id)
                                    {{ $usuario->name}} {{ $usuario->apellido_paterno}}
                                    @endif
                                    @endforeach

                                </td>

                                <td>{{ \Carbon\Carbon::parse($orden->fecha_pago_proceso)
                                ->formatLocalized('%d %B %Y %I:%M %p') }}</td>
                                {{-- <td><img src="{{ asset('img/products/' . $producto->imagen_producto) }}"
                                        class="rounded mx-auto img-thumbnail" width="80"></td>
                                <td> --}}
                                 <td>
                                    @if ($orden->status == 0)
                                    En proceso
                                @elseif($orden->status == 1)
                                    Pago pendiente de confirmación
                                    
                                @elseif($orden->status == 2)
                                    Pago recibido
                                @elseif($orden->status == 3)
                                    Procesando la orden
                                @elseif($orden->status == 4)
                                    Orden enviada
                                @elseif($orden->status == 5)
                                    Orden entregada
                                @elseif($orden->status == 5)
                                    Pagopendiente de confirmación

                                @endif
                                 </td>

                                <td>${{ $orden->total}} MNX</td>
                                <td class="text-center">

                                   <a href="" class="btn btn-sm btn-info">
                                    <i class="far fa-file-alt"></i>
                                    Ver orden
                                    </a>

                                </td>
                            </tr>
                            @endforeach
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