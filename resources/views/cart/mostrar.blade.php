@extends('layouts.master')
@section('content')
@section('title', 'Mostrar-producto')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-5"> <br>
            <div class="card card-dark card-outline shadow-lg mt-5 mb-5"> <br>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="text-center"><strong>Información de la comprar</strong> </h5>
                            <div class="row">
                                <div class="col-md-6 mt-3">
                                    <b><i class="fas fa-city"></i> CDMX / Estado: </b>
                                    <p class="ml-3">
                                        <span>{{ Auth::user()->getAddressDefault->getStates->nombre }}</span>
                                    </p>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <b> <i class="fas fa-archway"></i> Colonia: </b>
                                    <p class="ml-3">
                                        <span>{{ Auth::user()->getAddressDefault->getCities->nombre }}</span>
                                    </p>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <b><i class="fas fa-map-pin"></i> Dirección: </b>
                                    <p class="ml-3">
                                        <span>{{ Auth::user()->getAddressDefault->nombre }} /
                                            {{ Auth::user()->getAddressDefault->calle_av }} / No.
                                            {{ Auth::user()->getAddressDefault->casa_dp }}
                                        </span>
                                    </p>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <b> <i class="fas fa-location-arrow"></i> Referencia:</b>
                                    <p class="ml-3">
                                        <span>
                                            {{ Auth::user()->getAddressDefault->referencia }}
                                        </span>
                                    </p>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <b><i class="fas fa-coins"></i> Subtotal: </b>
                                    <p class="ml-3"><span>${{ $orden->getSubtotal() }} MXN</span></p>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <b> <i class="fas fa-truck"></i> Precio por envio: </b>
                                            <p class="ml-3"><span>${{ $envio }} MXN</span></p>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <b><i class="fas fa-coins"></i> Total a pagar: </b>
                                            <p class="ml-3"><span>${{ $orden->total }} MXN</span></p>
                                </div>
                                <div class="col-md-6 mt-3">
                                       <form action="{{ route('usuario.cart.store.payment')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="metodo_pago" id="file_payment_method_id">
                                        <button type="submit"
                                         class="btn btn-dark disabled"
                                         id="btn-complete">
                                         <i class="fas fa-dollar-sign"></i> Realizar pago</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5 class="text-center"><strong>Realizar comprar</strong> </h5>
                            <input type="hidden" name="metodo_pago" id="file_payment_method_id">
                            <div class="payments_methods">
                                <div class="text-center">
                                    @if ($metodo_efectivo == '1')
                                    <a href="#" 
                                    class="btn btn-outline-warning btn-lg btn-block btn_paymet"
                                    id="payment_method_cash"
                                    data_payment_method_id="0">
                                    <i class="fas fa-coins"></i> Metodo por efectivo</a>
                                    @endif
                                </div>
                                <div class="text-center mt-4">
                                    @if ($metodo_transferencia == '1')
                                    <a href="#" 
                                    class="btn btn-outline-info btn-lg btn-block btn_paymet"
                                    id="payment_method_transfer"
                                    data_payment_method_id="1">
                                        <i class="fas fa-wallet"></i>
                                        Metodo por transferencia </a>
                                    @endif
                                </div>

                                <div class="text-center mt-4">
                                    @if ($metodo_paypal == '1')
                                    <a href="#"
                                     class="btn btn-outline-primary btn-lg btn-block btn_paymet"
                                     id="payment_method_paypal"
                                     data_payment_method_id="2">
                                      <i class="fab fa-paypal"></i>
                                        Metodo por PayPal</a>
                                    @endif
                                </div>

                                <div class="text-center mt-4">
                                    @if ($metodo_tarjeta == '1')
                                    <a href="#" 
                                    class="btn btn-outline-secondary btn-lg btn-block btn_paymet"
                                    id="payment_method_card"
                                    data_payment_method_id="3">
                                        <i class="far fa-credit-card"></i> Metodo por tarjeta</a>
                                    @endif
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