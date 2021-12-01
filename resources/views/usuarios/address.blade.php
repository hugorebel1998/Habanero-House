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
                                <form action="" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="nombre">Nombre</label>
                                            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror"
                                            value="{{ old('nombre') }}">
                                            @error('nombre')
                                            <div class="text-danger">{{ $message }}</div>
                                             @enderror

                                        </div>

                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label>Delegaciones / Municipios</label>
                                                <select name="state"  id="state" class="form-control @error('state') is-invalid @enderror"
                                                    style="width: 100%;">
                                                    
                                                    @foreach ($coverturas as $covertura)
                                                       <option value="{{$covertura->id}}" {{(old('state') == $covertura->id ? 'selected' : '')}} > {{$covertura->nombre}} </option>
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
                                                <select name="city" class="form-control @error('city') is-invalid @enderror"
                                                    style="width: 100%;">
                                                       <option value="" id="address_city[]" multiple accept="image/*"> </option>
                                                </select>
                                            @error('city')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-12 mt-3">
                                            <label for="calle_av">Calle / Avenida</label>
                                            <input type="text" name="calle_av" class="form-control @error('calle_av') is-invalid @enderror"
                                            value="{{ old('calle_av') }}">
                                            @error('calle_av')
                                            <div class="text-danger">{{ $message }}</div>
                                             @enderror

                                        </div>

                                        <div class="col-md-12 mt-3">
                                            <label for="casa_dp">Casa / Departamento No.</label>
                                            <input type="text" name="casa_dp" class="form-control @error('casa_dp') is-invalid @enderror"
                                            value="{{ old('casa_dp') }}">
                                            @error('casa_dp')
                                            <div class="text-danger">{{ $message }}</div>
                                             @enderror

                                        </div>

                                        <div class="col-md-12 mt-3">
                                            <label for="referencia">Referencia</label>
                                            <input type="text" name="referencia" class="form-control @error('referencia') is-invalid @enderror"
                                            value="{{ old('referencia') }}">
                                            @error('referencia')
                                            <div class="text-danger">{{ $message }}</div>
                                             @enderror

                                        </div>
                                    </div>
                                    <div class="text-center mt-3 mb-3">
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-paper-plane"></i> Enviar</button>

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