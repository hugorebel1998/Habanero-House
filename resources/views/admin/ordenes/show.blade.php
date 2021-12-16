@extends('layouts.home')

@section('content')
@section('title', 'Orden No.' . $orden->id)
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-danger card-outline">
                        @if ($orden->user_id == $usuario->id)
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                        src="{{ asset('img/users/' . $usuario->imagen_usuario) }}"
                                        alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center">
                                    {{ $usuario->name }} {{ $usuario->apellido_paterno }}
                                </h3>

                                <p class="text-muted text-center">{{ $usuario->rol }}</p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <i class="fas fa-envelope"></i> <b>Email:</b> <span
                                            class="ml-1">{{ $usuario->email }}</span>
                                    </li>
                                    <li class="list-group-item">
                                        <i class="fas fa-phone-alt"></i> <b>Teléfono:</b> <span
                                            class="ml-1">{{ $usuario->telefono }}</span>
                                    </li>

                                    <li class="list-group-item">
                                        <i class="fas fa-birthday-cake"></i>
                                        <b>Edad:</b> <span
                                            class="ml-1">{{ Carbon\Carbon::createFromDate($usuario->fecha_nacimiento)->age }}
                                            Años</span>

                                    </li>
                                </ul>
                                {{-- <a href="#" class="btn btn-primary btn-block"><b>Ver usuario</b></a> --}}
                            </div>
                        @endif

                    </div>
                    <div class="card card-danger card-outline">
                        <h3 class="card-title text-center mt-4"> <i class="fas fa-map-pin"></i> <b>Dirección de la orden
                                a entregar</b> </h3>

                        <div class="card-body box-profile">
                            <div class="row">
                                <div class="col-md-6">

                                    @foreach ($states as $state)
                                        <b>
                                            <i class="fas fa-city"></i>
                                            Cdmx ó Edo.Méx: ​
                                        </b>
                                        <p class="ml-3">{{ $state->nombre }}</p>
                                    @endforeach

                                </div>
                                <div class="col-md-6">
                                    @foreach ($cities as $city)
                                        <b>
                                            <i class="fas fa-archway"></i>
                                            Colonia: ​
                                        </b>
                                        <p class="ml-3">{{ $city->nombre }}</p>

                                    @endforeach
                                </div>

                                <div class="col-md-12">
                                    <b><i class="fas fa-map-pin"></i>
                                        Dirección:
                                    </b>
                                    <p class="ml-3">
                                        {{ $address->calle_av }} No.{{ $address->casa_dp }}
                                    </p>
                                </div>

                                <div class="col-md-12">
                                    <b><i class="fas fa-paragraph"></i>
                                        Referencia:
                                    </b>
                                    <p class="ml-3">
                                        {{ $address->referencia }}
                                    </p>
                                </div>

                                <div class="col-md-12">
                                    <b><i class="fas fa-paper-plane"></i>
                                        Entregar en mi :
                                    </b>
                                    <p class="ml-3">
                                        {{ $address->nombre }}
                                    </p>
                                </div>

                            </div>


                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card card-danger card-outline">
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
                                <tfoot>
                                    <tr class="text-center">
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col">
                                            <p>Subtotal: $ {{$orden->subtotal}} MXN</p> 
                                            <p>Precio de envío: $ {{$orden->deliver}} MXN</p> 
                                            <p>Total: $ {{$orden->total}} MXN</p> 
                                        </th>
                                    </tr>
                                    </tfoot>
                            </table>

                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
