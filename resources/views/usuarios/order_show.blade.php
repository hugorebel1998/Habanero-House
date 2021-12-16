@extends('layouts.master')
@section('content')
@section('title', 'Orde No.' . $orden->numero_orden)


<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-11 mt-5 mb-5"><br>
            <div class="row">
                <div class="col-md-8">
                    <div class="card shadow mt-5">
                        <div class="card-header bg-negro">
                            <h3 class="card-title"><i class="fas fa-file-signature"></i> Detalles de tu orden
                                No.{{ $orden->numero_orden }}</h3>
                        </div>
                        <div class="card-body">

                            <table class="order-table table table-hover" cellspacing="0" width="100%" id="example2">
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
                                    @foreach ($orden->getItems as $item)
                                        <tr class="text-center">
                                            <td>
                                                <img src="{{ asset('img/products/' . $item->getProduct->imagen_producto) }}"
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

                <div class="col-md-4 mt-5">
                    <div class="card shadow">
                        <div class="card-header bg-negro">
                            <div class="card-title"> <i class="fas fa-map-pin"></i> Información de envio </div>
                        </div>
                        <div class="car-body">
                            <div class="row">
                                <div class="col-md-5 mt-3 ml-3">
                                    <b><i class="fas fa-city"></i> CDMX / Estado: </b>
                                    <p class="ml-3">
                                        <span>{{ $orden->getUserAddress->getStates->nombre   }}</span>
                                    </p>
                                </div>
                                <div class="col-md-6 mt-3 ml-3">
                                    <b> <i class="fas fa-archway"></i> Colonia: </b>
                                    <p class="ml-3">
                                        <span>{{ $orden->getUserAddress->getCities->nombre }}</span>
                                    </p>
                                </div>
                                <div class="col-md-5 mt-3 ml-3">
                                    <b><i class="fas fa-map-pin"></i> Dirección: </b>
                                    <p class="ml-3">
                                        <span>{{ $orden->getUserAddress->nombre }} /
                                            {{ $orden->getUserAddress->calle_av }} / No.
                                            {{ $orden->getUserAddress->casa_dp }}
                                        </span>
                                    </p>
                                </div>
                                <div class="col-md-6  mt-3 ml-3">
                                    <b> <i class="fas fa-location-arrow"></i> Referencia:</b>
                                    <p class="ml-3">
                                        <span>
                                            {{ $orden->getUserAddress->referencia }}
                                        </span>
                                    </p>
                                </div>

                            </div>
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
                                    <p class="ml-3"><span>${{ $orden->subtotal }} MXN</span></p>

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

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>


@endsection
