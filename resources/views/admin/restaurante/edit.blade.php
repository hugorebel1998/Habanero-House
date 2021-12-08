@extends('layouts.home')
@section('content')
@section('title', 'Editar configuracion del sistema')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form action="{{ route('admin.ajustes.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-danger">
                        <div class="card-header">
                            <div class="card-tittle"><i class="fas fa-cogs"></i> General</div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="nombre_encargado">Nombre del encargado</label>
                                    <input type="hidden" name="id_restaurant" value="{{ $restaurante->id }}">
                                    <input type="text" name="nombre_encargado"
                                        class="form-control @error('nombre_encargado') is-invalid @enderror"
                                        value="{{ $restaurante->nombre_encargado }}">
                                    @error('nombre_encargado')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mt-2">
                                    <label for="nombre_razón_social">Nombre razón social</label>
                                    <input type="text" name="nombre_razón_social"
                                        class="form-control @error('nombre_razón_social') is-invalid @enderror"
                                        value="{{ $restaurante->nombre_razon_social }}">
                                    @error('nombre_razón_social')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mt-3">
                                    <label for="teléfono">Teléfono</label>
                                    <input type="number" name="teléfono"
                                        class="form-control @error('teléfono') is-invalid @enderror"
                                        value="{{ $restaurante->telefono_razon_social }}">
                                    @error('teléfono')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mt-2">
                                    <label for="correo_electrónico">Correo electrónico</label>
                                    <input type="email" name="correo_electrónico"
                                        class="form-control @error('correo_electrónico') is-invalid @enderror"
                                        value="{{ $restaurante->email_razon_social }}">
                                    @error('correo_electrónico')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mt-2">
                                    <div class="form-group">
                                        <label>Modo mantenimiento</label>
                                        <select name="mantenimiento"
                                            class="custom-select select2bs4 @error('mantenimiento') is-invalid @enderror"
                                            style="width: 100%;">
                                            <option value="" selected>-- Selecciona una opción--</option>
                                            <option value="0" @if ($restaurante->mantenimiento == 0) selected @endif>Desactivado</option>
                                            <option value="1" @if ($restaurante->mantenimiento == 1) selected @endif>Activado</option>
                                        </select>
                                        @error('mantenimiento')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 mt-2">
                                    <label for="dirección">Ubicación</label>
                                    <input type="text" name="dirección"
                                        class="form-control @error('dirección') is-invalid @enderror"
                                        value="{{ $restaurante->direccion_razon_social }}">
                                    @error('dirección')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card card-danger">
                        <div class="card-header">
                            <div class="card-tittle"><i class="fas fa-dollar-sign"></i> Moneda y precio</div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="monto_minimo_de_compra">Monto minimo de compra</label>
                                    <input type="number" name="monto_minimo_de_compra"
                                        class="form-control @error('monto minimo de compra') is-invalid @enderror"
                                        value="{{ $restaurante->monto_minimo_de_compra }}" min="1">
                                    @error('monto_minimo_de_compra')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mt-2">
                                    <div class="form-group">
                                        <label>Configración de precio de envío</label>
                                        <select name="precio_envio"
                                            class="custom-select select2bs4 @error('precio_envio') is-invalid @enderror"
                                            style="width: 100%;">
                                            {{-- <option value="" selected>-- Selecciona una opción--</option> --}}
                                            <option value="0" @if ($restaurante->precio_envio == 0) selected @endif>Gratis</option>
                                            <option value="1" @if ($restaurante->precio_envio == 1) selected @endif>Valor fijo</option>
                                            <option value="2" @if ($restaurante->precio_envio == 2) selected @endif>Valor variable por ubicación
                                            </option>
                                            <option value="3" @if ($restaurante->precio_envio == 3) selected @endif>Envio gratis / Monto minimo
                                            </option>
                                        </select>
                                        @error('precio_envio')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 ">
                                    <label for="valor_por_defecto">Valor del envio</label>
                                    <input type="number" name="valor_por_defecto"
                                        class="form-control @error('valor_por_defecto') is-invalid @enderror"
                                        value="{{ $restaurante->valor_por_defecto }}">
                                    @error('valor_por_defecto')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mt-2">
                                    <label for="cantidad_de_envio_min">Envio gratis monto minimo</label>
                                    <input type="number" name="cantidad_de_envio_min"
                                        class="form-control @error('cantidad_de_envio_min') is-invalid @enderror"
                                        value="{{ $restaurante->cantidad_de_envio_min }}">
                                    @error('cantidad_de_envio_min')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card card-danger">
                        <div class="card-header">
                            <div class="card-tittle"><i class="fas fa-wifi"></i> Redes sociales</div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <label for="whatsapp">Whatsapp</label>
                                    <input type="text" name="whatsapp"
                                        class="form-control @error('whatsapp') is-invalid @enderror"
                                        value="{{ $restaurante->whatsapp }}">
                                    @error('whatsapp')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mt-2">
                                    <label for="facebook">Facebook</label>
                                    <input type="text" name="facebook"
                                        class="form-control @error('facebook') is-invalid @enderror"
                                        value="{{ $restaurante->facebook }}">
                                    @error('facebook')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mt-2">
                                    <label for="instagram">Instagram</label>
                                    <input type="text" name="instagram"
                                        class="form-control @error('instagram') is-invalid @enderror"
                                        value="{{ $restaurante->instagram }}">
                                    @error('instagram')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mt-2">
                                    <label for="twitter">Twitter</label>
                                    <input type="text" name="twitter"
                                        class="form-control @error('twitter') is-invalid @enderror"
                                        value="{{ $restaurante->twitter }}">
                                    @error('twitter')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mt-2">
                                    <label for="youtube">Youtube</label>
                                    <input type="text" name="youtube"
                                        class="form-control @error('youtube') is-invalid @enderror"
                                        value="{{ $restaurante->youtube }}">
                                    @error('youtube')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-danger">
                        <div class="card-header">
                            <div class="card-tittle"><i class="fas fa-wallet"></i> Metodos de pago</div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <label>Metodo por efectivo</label>
                                        <select name="metodo_por_efectivo"
                                            class="custom-select select2bs4 @error('metodo_por_efectivo') is-invalid @enderror"
                                            style="width: 100%;">
                                            <option value="0" @if ($restaurante->metodo_por_efectivo == 0) selected @endif>Desactivado</option>
                                            <option value="1" @if ($restaurante->metodo_por_efectivo == 1) selected @endif>Activado</option>
                                        </select>
                                        @error('metodo_por_efectivo')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 mt-2">
                                    <div class="form-group">
                                        <label>Metodo por trasferencia / Deposito bancario</label>
                                        <select name="metodo_por_transferencia"
                                            class="custom-select select2bs4 @error('metodo_por_transferencia') is-invalid @enderror"
                                            style="width: 100%;">
                                            <option value="0" @if ($restaurante->metodo_por_transferencia == 0) selected @endif>Desactivado</option>
                                            <option value="1" @if ($restaurante->metodo_por_transferencia == 1) selected @endif>Activado</option>
                                        </select>
                                        @error('metodo_por_transferencia')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12 mt-2">
                                    <div class="form-group">
                                        <label>Metodo por paypal</label>
                                        <select name="metodo_por_paypal"
                                            class="custom-select select2bs4 @error('metodo_por_paypal') is-invalid @enderror"
                                            style="width: 100%;">
                                            <option value="0" @if ($restaurante->metodo_por_paypal == 0) selected @endif>Desactivado</option>
                                            <option value="1" @if ($restaurante->metodo_por_paypal == 1) selected @endif>Activado</option>
                                        </select>
                                        @error('metodo_por_paypal')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12 mt-2">
                                    <div class="form-group">
                                        <label>Metodo por paypal</label>
                                        <select name="metodo_por_tarjeta"
                                            class="custom-select select2bs4 @error('metodo_por_tarjeta') is-invalid @enderror"
                                            style="width: 100%;">
                                            <option value="0" @if ($restaurante->metodo_por_tarjeta == 0) selected @endif>Desactivado</option>
                                            <option value="1" @if ($restaurante->metodo_por_tarjeta == 1) selected @endif>Activado</option>
                                        </select>
                                        @error('metodo_por_tarjeta')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                          
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-right mt-4 mb-4">
                <button type="submit" class="btn btn-danger"><i class="fas fa-save"></i>
                    Actualizar
                    información</button>
            </div>
        </div>
    </div>
</div>

@endsection
