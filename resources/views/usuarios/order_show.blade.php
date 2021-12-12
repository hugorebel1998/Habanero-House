@extends('layouts.master')
@section('content')
@section('title', 'Orde No.'. $orden->numero_orden)


<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-11 mt-5 mb-5"><br>
            <div class="row">
                <div class="col-md-8">
                    <div class="card shadow mt-5">
                        <div class="card-header bg-negro">
                            <h3 class="card-title"><i class="fas fa-shopping-cart"></i> Carrito de compras</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="col"></th>
                                            <th scope="col">Producto</th>
                                            <th scope="col"></th>
                                            <th scope="col">Cantidad</th>
                                            <th scope="col">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orden_items as $item)
                                            <tr class="text-center">
                                                <td>
                                                    <img src="{{ asset('img/products/' . $item->imagen_producto) }}"
                                                        class="rounded mx-auto img-thumbnail" width="80">

                                                </td>
                                                <td>
                                                    <a href="{{ route('usuario.mostrar.show', $item->id) }}"
                                                        class="text-dark">{{ $item->label_item }}</a>
                                                </td>
                                                <td>
                                                    @if ($item->descuento_status == 1)
                                                        <span class="badge badge-pill badge-success">
                                                            En descuento -
                                                            {{ $item->descuento }} %
                                                        </span>
                                                    @else
                                                        <span class="badge badge-pill badge-danger">Sin
                                                            descuento</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $item->cantidad }}
                                                </td>
                                                <td>$ {{ $item->total }}</td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mt-5">
                    <div class="card shadow">
                        <div class="card-header bg-negro">
                            <div class="card-title"> <i class="fas fa-car-side"></i> Tipo de envio </div>
                        </div>
                        <div class="car-body">

                            
                            <div class="row">
                                <div class="col-md-5 mt-3 ml-3">
                                    <b><i class="fas fa-city"></i> CDMX / Estado: </b>
                                    <p class="ml-3">
                                        <span>{{ Auth::user()->getAddressDefault->getStates->nombre }}</span>
                                    </p>
                                </div>
                                <div class="col-md-6 mt-3 ml-3">
                                    <b> <i class="fas fa-archway"></i> Colonia: </b>
                                    <p class="ml-3">
                                        <span>{{ Auth::user()->getAddressDefault->getCities->nombre }}</span>
                                    </p>
                                </div>
                                <div class="col-md-5 mt-3 ml-3">
                                    <b><i class="fas fa-map-pin"></i> Dirección: </b>
                                    <p class="ml-3">
                                        <span>{{ Auth::user()->getAddressDefault->nombre }} /
                                            {{ Auth::user()->getAddressDefault->calle_av }} / No.
                                            {{ Auth::user()->getAddressDefault->casa_dp }}
                                        </span>
                                    </p>
                                </div>
                                <div class="col-md-6  mt-3 ml-3">
                                    <b> <i class="fas fa-location-arrow"></i> Referencia:</b>
                                    <p class="ml-3">
                                        <span>
                                            {{ Auth::user()->getAddressDefault->referencia }}
                                        </span>
                                    </p>
                                </div>

                            </div>

                            
                            {{-- @if ($to_go == 1) --}}
                                <div class="d-flex justify-content-center mt-4 mb-4">
                                     <a href="{{ route('usuario.cart.cambiar.tipo', [$orden->id, 0])}}"
                                        class="btn btn-outline-primary btn-md btn-block-1 m-1 @if ($orden->orden_tipo == '0') active @endif">
                                        Enviar a domicilio
                                    </a>

                                    <a href="{{ route('usuario.cart.cambiar.tipo', [$orden->id, 1])}}"
                                        class="btn btn-outline-primary  btn-md btn-block-1 m-1 @if ($orden->orden_tipo == '1') active @endif">
                                        Ir a recoger
                                    </a> 
                                </div> 

                            {{-- @endif --}}
                        </div>
                    </div>

                    <div class="card shadow">
                        <div class="card-header bg-negro">
                            <div class="card-title"><i class="fas fa-bookmark"></i> Información de la compra
                            </div>
                        </div>
                        <div class="car-body">
                            <div class="row">
                                <div class="col-md-4 mt-3 ml-3">
                                    <b><i class="fas fa-coins"></i> Subtotal: </b>
                                    <p class="ml-3"><span>${{ $orden->getSubtotal() }} MXN</span></p>

                                </div>
                                <div class="col-md-7 mt-3 ml-3">
                                    <b> <i class="fas fa-truck"></i> Precio por envio: </b>
                                    <p class="ml-3"><span>${{ $orden->deliver }} MXN</span></p>

                                </div>
                                <div class="col-md-12 mt-3 ml-3">
                                    <b><i class="fas fa-coins"></i> Total a pagar: </b>

                                    <p class="ml-3"><span>${{ $orden->total }} MXN</span></p>
                                </div>
                            </div>
                            @if (!is_null(Auth::user()->getAddressDefault))
                                <div class="text-right mr-2 mb-2">
                                    <a href="{{ route('usuario.cart.mostrar', $orden->id) }}"
                                        class="btn btn-sm bg-negro">
                                        <i class="fas fa-badge-dollar"></i> Realizar compra
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
    

@endsection