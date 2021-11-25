@extends('layouts.home')
@section('content')
@section('title', 'Editar configuracion del sistema')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-danger shadow">
                <div class="card-header">
                    <div class="card-tittle"><i class="fas fa-toolbox"></i> Editar información</div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.ajustes.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-4">
                                <label for="nombre_encargado">Nombre del encargado</label>
                                <input type="hidden" name="id_restaurant" value="{{ $restaurante->id }}">
                                <input type="text" name="nombre_encargado"
                                    class="form-control @error('nombre_encargado') is-invalid @enderror"
                                    value="{{ $restaurante->nombre_encargado }}">
                                @error('nombre_encargado')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="nombre_razón_social">Nombre razón social</label>
                                <input type="text" name="nombre_razón_social"
                                    class="form-control @error('nombre_razón_social') is-invalid @enderror"
                                    value="{{ $restaurante->nombre_razon_social }}">
                                @error('nombre_razón_social')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="teléfono">Teléfono</label>
                                <input type="number" name="teléfono"
                                    class="form-control @error('teléfono') is-invalid @enderror"
                                    value="{{ $restaurante->telefono_razon_social }}">
                                @error('teléfono')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mt-4">
                                <label for="correo_electrónico">Correo electrónico</label>
                                <input type="email" name="correo_electrónico"
                                    class="form-control @error('correo_electrónico') is-invalid @enderror"
                                    value="{{ $restaurante->email_razon_social }}">
                                @error('correo_electrónico')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-4 mt-4">
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

                            <div class="col-md-4 mt-4">
                                <div class="form-group">
                                    <label for="imagen">Imagen destacada</label>
                                    <div class="custom-file">
                                        <input accept="image/*" type="file"
                                            class="custom-file-input @error('imagen') is-invalid @enderror"
                                            name="imagen">
                                        <label class="custom-file-label"for="customFile">Selecciona imagen</label>
                                        @error('imagen')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mt-4">
                                <label for="dirección">Ubicación</label>
                                <input type="text" name="dirección"
                                    class="form-control @error('dirección') is-invalid @enderror"
                                    value="{{ $restaurante->direccion_razon_social }}">
                                @error('dirección')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mt-4">
                                <div class="form-group">
                                    <label>Configración de precio de envío</label>
                                    <select name="precio_envio"
                                        class="custom-select select2bs4 @error('precio_envio') is-invalid @enderror"
                                        style="width: 100%;">
                                        {{-- <option value="" selected>-- Selecciona una opción--</option> --}}
                                        <option value="0" @if ($restaurante->precio_envio == 0) selected @endif>Gratis</option>
                                        <option value="1" @if ($restaurante->precio_envio == 1) selected @endif>Valor fijo</option>
                                        <option value="2" @if ($restaurante->precio_envio == 2) selected @endif>Valor variable por ubicación</option>
                                        <option value="3" @if ($restaurante->precio_envio == 3) selected @endif>Valor fijo por profucto</option>
                                        
                                    </select>
                                    @error('precio_envio')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 mt-4">
                                <label for="valor_por_defecto">Valor del envio</label>
                                <input type="number" name="valor_por_defecto"
                                    class="form-control @error('valor_por_defecto') is-invalid @enderror"
                                    value="{{ $restaurante->valor_por_defecto}}">
                                @error('valor_por_defecto')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="text-center mt-4 mb-4">
                            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-save"></i>
                                Actualizar
                                información</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection