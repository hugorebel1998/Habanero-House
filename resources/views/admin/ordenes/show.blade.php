@extends('layouts.home')

@section('content')
@section('title', 'Orden No.' . $orden->id)
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-danger card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                @if (is_null($orden->getUser->imagen_usuario))
                                    <img src="{{ asset('img/users/sin_asignar/foto.jpg') }}"
                                        class="rounded mx-auto d-block" width="60%" height="50%">
                                @else
                                    <img class="profile-user-img img-fluid img-circle"
                                        src="{{ asset('img/users/' . $orden->getUser->imagen_usuario) }}"
                                        alt="User profile picture">
                                @endif
                            </div>

                            <h3 class="profile-username text-center">
                                {{ $orden->getUser->name }} {{ $orden->getUser->apellido_paterno }}
                            </h3>
                            @if (is_null($orden->getUser->rol))
                                <p class="text-muted text-center">Cliente</p>
                            @else
                                <p class="text-muted text-center">{{ $orden->getUser->rol }}</p>
                            @endif

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <i class="fas fa-envelope"></i> <b>Email:</b> <span
                                        class="ml-1">{{ $orden->getUser->email }}</span>
                                </li>
                                <li class="list-group-item">
                                    <i class="fas fa-phone-alt"></i> <b>Teléfono:</b>
                                    @if (is_null($orden->getUser->telefono))
                                        <span class="ml-1">Sin información</span>
                                    @else
                                        <span class="ml-1">{{ $orden->getUser->telefono }}</span>
                                    @endif
                                </li>

                                <li class="list-group-item">
                                    <i class="fas fa-birthday-cake"></i>
                                    <b>Edad:</b>
                                    @if (is_null($orden->getUser->fecha_nacimiento))
                                        <span class="ml-1">Sin información</span>
                                    @else
                                        <span
                                            class="ml-1">{{ Carbon\Carbon::createFromDate($orden->getUser->fecha_nacimiento)->age }}Años
                                        </span>
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-danger card-outline">
                        <h3 class="card-title text-center mt-4"> <i class="fas fa-map-pin"></i>
                            <b>Dirección de la orden a entregar</b>
                        </h3>
                        <div class="card-body box-profile">
                            @if (is_null($orden->getUserAddress))

                                <p class="ml-3">Esta orden fue definida como pasar al restaurante para recoger
                                    la orden.</p>
                            @else
                                <div class="row">
                                    <div class="col-md-6 mt-3">
                                        <b>
                                            <i class="fas fa-city"></i>
                                            Cdmx ó Edo.Méx: ​
                                        </b>
                                        <p class="ml-3">
                                            <span>{{ $orden->getUserAddress->getStates->nombre }}</span>
                                        </p>

                                    </div>
                                    <div class="col-md-6 mt-3">

                                        <b>
                                            <i class="fas fa-archway"></i>
                                            Colonia: ​
                                        </b>
                                        <p class="ml-3 mt-1">
                                            {{ $orden->getUserAddress->getCities->nombre }}
                                        </p>
                                    </div>
                                    <div class="col-md-12 mt-1">
                                        <b><i class="fas fa-map-pin"></i>
                                            Dirección:
                                        </b>
                                        <p class="ml-3 mt-1">
                                            {{ $orden->getUserAddress->nombre }} /
                                            {{ $orden->getUserAddress->calle_av }} / No.
                                            {{ $orden->getUserAddress->casa_dp }}
                                        </p>
                                    </div>

                                    <div class="col-md-12 mt-1">
                                        <b><i class="fas fa-paragraph"></i>
                                            Referencia:
                                        </b>
                                        <p class="ml-3 mt-2 mb-3">
                                            {{ $orden->getUserAddress->referencia }}
                                        </p>
                                    </div>

                                    <div class="col-md-12">
                                        <b><i class="fas fa-paper-plane"></i>
                                            Entregar en mi :
                                        </b>
                                        <p class="ml-3">
                                            {{ $orden->getUserAddress->nombre }}
                                        </p>
                                    </div>

                                </div>

                            @endif
                        </div>     
                    </div>

                    <div class="card card-danger card-outline">
                        <h3 class="card-title text-center mt-4"> <i class="fas fa-search-dollar"></i>
                            <b>Metodo de pago</b>
                        </h3>
                        <div class="row">
                            <div class="col-md-12 p-4 mb-2">
                                @if($orden->metodo_pago == 0)
                                <button type="button" class="btn btn-danger btn-sm btn-block">Pago en efectivo</button>
                                @elseif($orden->metodo_pago == 1)
                                <button type="button" class="btn btn-danger btn-sm btn-block">Transferencia bancaria</button>
                                @elseif($orden->metodo_pago == 2)
                                <button type="button" class="btn btn-danger btn-sm btn-block">Pago por PayPal</button>
                                @elseif($orden->metodo_pago == 3)
                                <button type="button" class="btn btn-danger btn-sm btn-block">Pago con tarjeta de credito</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-danger card-outline">
                        <h3 class="card-title text-center mt-4"> <i class="fas fa-toggle-off"></i>
                            <b>Status de la orden</b>
                        </h3>
                        <div class="row">
                            <div class="col-md-10 p-4">
                                <form action="{{ route('admin.orden.store',$orden->id)}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label>Status de orden</label>

                                        @if ($orden->orden_tipo == '0')
                                            <select name="status"
                                                class="custom-select select2bs4 @error('status') is-invalid @enderror"
                                                style="width: 100%;">
                                                <option value="1" @if ($orden->status == 1) selected @endif>Pago pendiente de confirmación</option>
                                                <option value="2" @if ($orden->status == 2) selected @endif>Pago recibido</option>
                                                <option value="3" @if ($orden->status == 3) selected @endif>Procesando la orden</option>
                                                <option value="4" @if ($orden->status == 4) selected @endif>Orden enviada</option>
                                                <option value="6" @if ($orden->status == 6) selected @endif>Orden entregada</option>
                                                <option value="100" @if ($orden->status == 100) selected @endif>Orden rechazada</option>
                                            </select>
                                        @else

                                        <select name="status"
                                            class="custom-select select2bs4 @error('status') is-invalid @enderror"
                                            style="width: 100%;">
                                            <option value="1" @if ($orden->status == 1) selected @endif>Pago pendiente de confirmación</option>
                                            <option value="2" @if ($orden->status == 2) selected @endif>Pago recibido</option>
                                            <option value="3" @if ($orden->status == 3) selected @endif>Procesando la orden</option>
                                            <option value="5" @if ($orden->status == 5) selected @endif>Orden lista para recoger</option>
                                            <option value="6" @if ($orden->status == 6) selected @endif>Orden entregada</option>
                                            <option value="100" @if ($orden->status == 100) selected @endif>Orden rechazada</option>
                                        </select>
                                        @endif
                                        @error('precio_envio')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    @if ($orden->status == '6'|| $orden->status == '100' )
                                    <div class="text-left">
                                        <button type="submit" disabled class="btn btn-sm btn-danger">
                                            <i class="fas fa-save"></i> Actualizar
                                        </button>
                                    </div>
                                    @else
                                    <div class="text-left">
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-save"></i> Actualizar
                                        </button>
                                    </div>
                                        
                                    @endif

                                </form>
                            </div>
                        </div>
                    </div>

                    @if ($orden->metodo_pago == 1)
                    
                    <div class="card card-danger card-outline">
                        <h3 class="card-title text-center mt-4"> <i class="fas fa-ticket-alt"></i>
                            <b>Comprobante de pago</b>
                        </h3>
                        <div class="row">
                            <div class="col-md-12 p-4">
                                <a href="{{ asset('img/orden_vauchers/'. $orden->imagen_vaucher)}}" target="_blank">
                                    <img src="{{ asset('img/orden_vauchers/'. $orden->imagen_vaucher)}}" class="rounded mx-auto d-block" width="78%" height="78%">
                                </a>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>

                

            </div>
        </div>

        <div class="col-md-12">
            <div class="row">
                <div class="col-md-8">

                    <div class="col-md-12">
                        <div class="card card-danger card-outline">
                            <div class="card-header bg-negro">
                                <h3 class="card-title">
                                    <i class="fas fa-file-signature"></i>
                                    Detalles de la orden No.{{ $orden->numero_orden }}
                                </h3>
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
                                                <p>Subtotal: $ {{ $orden->subtotal }} MXN</p>
                                                <p>Precio de envío: $ {{ $orden->deliver }} MXN</p>
                                                <p>Total: $ {{ $orden->total }} MXN</p>
                                            </th>
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="card card-danger card-outline">
                        <h3 class="card-title text-center mt-4"> <i class="fas fa-business-time"></i>
                            <b>Actividad</b>
                        </h3>

                        <p class="mt-3 ml-4">
                            <b><i class="fas fa-clock"></i> Orden solicitada:</b>
                            <span>{{ $orden->fecha_pago_proceso }}</span>
                        </p>

                        <p class="mt-3 ml-4">
                            <b><i class="fas fa-calendar-alt"></i> Orden pagada:</b>
                            <span>{{ $orden->fecha_pago_recibido }}</span>
                        </p>

                        <p class="mt-3 ml-4">
                            <b><i class="fas fa-box"></i> Orden procesando pago:</b>
                            <span>{{ $orden->fecha_pago_procesado }}</span>
                        </p>

                        <p class="mt-3 ml-4">
                            @if ($orden->orden_tipo == '0')
                                <b><i class="fas fa-motorcycle"></i> Orden enviada:</b>
                                <span>{{ $orden->fecha_pago_enviado }}</span>
                            @else
                                <b><i class="fas fa-motorcycle"></i> Orden Lista:</b>
                                <span>{{ $orden->fecha_pago_entregado }}</span>

                            @endif
                            
                        </p>

                        <p class="mt-3 ml-4">
                            <b><i class="fas fa-truck-moving"></i> Orden entregada:</b>
                            <span>{{ $orden->fecha_pago_entregada }}</span>
                        </p>


                        @if($orden->fecha_pago_rechazado)
                        <p class="mt-3 ml-4">
                            <b><i class="fas fa-recycle"></i> Orden rechazada:</b>
                            <span>{{ $orden->fecha_pago_rechazado }}</span>
                        </p>
                            
                        @endif


                    </div>

                </div>

            </div>

        </div>

    </div>
</div>


@endsection

