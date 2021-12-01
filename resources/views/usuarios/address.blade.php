@extends('layouts.master')
@section('title', 'Dirección')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6 mt-5"> <br>
                        <div class="card card-danger shadow mt-5 mb-5">
                            <div class="card-header">
                                <i class="fas fa-map-marked-alt"></i> Agregar direccioón
                            </div>
                            <div class="card-body">
                                <form action="{{ route('usuario.address.store')}}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="nombre_referencia">Nombre</label>
                                            <input type="text" name="nombre_referencia"
                                                class="form-control @error('nombre_referencia') is-invalid @enderror"
                                                value="{{ old('nombre_referencia') }}">
                                            @error('nombre_referencia')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror

                                        </div>

                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label>Delegaciones / Municipios</label>
                                                <select name="state" id="state"
                                                    class="custom-select select2bs4 @error('state') is-invalid @enderror"
                                                    style="width: 100%;">
                                                    @foreach ($states as $state)
                                                        <option value="{{ $state->id }}"
                                                            {{ old('state') == $state->id ? 'selected' : '' }}>
                                                            {{ $state->nombre }} </option>
                                                    @endforeach
                                                </select>
                                                @error('categoria')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label>Colonias </label>
                                                <select name="city" id="address_city"
                                                    class="custom-select select2bs4 @error('city') is-invalid @enderror"
                                                    style="width: 100%;" required>
                                                </select>
                                                @error('city')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-12 mt-3">
                                            <label for="calle_o_avenida">Calle / Avenida</label>
                                            <input type="text" name="calle_o_avenida"
                                                class="form-control @error('calle_o_avenida') is-invalid @enderror"
                                                value="{{ old('calle_o_avenida') }}">
                                            @error('calle_o_avenida')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror

                                        </div>

                                        <div class="col-md-12 mt-3">
                                            <label for="casa_o_departamento">No. Casa / Departamento</label>
                                            <input type="number" name="casa_o_departamento"
                                                class="form-control @error('casa_o_departamento') is-invalid @enderror"
                                                value="{{ old('casa_o_departamento') }}">
                                            @error('casa_o_departamento')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror

                                        </div>

                                        <div class="col-md-12 mt-3">
                                            <label for="referencia">Referencia</label>
                                            <input type="text" name="referencia"
                                                class="form-control @error('referencia') is-invalid @enderror"
                                                value="{{ old('referencia') }}">
                                            @error('referencia')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="text-center mt-3 mb-3">
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-paper-plane"></i>
                                            Enviar</button>

                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">

                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
