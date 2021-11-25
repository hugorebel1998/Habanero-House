@extends('layouts.home')
@section('content')
@section('title', 'Covertura envios')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-danger shadow">
                        <div class="card-header">
                            <div class="card-tittle"><i class="fas fa-truck"></i> Crear covertura de envio</div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.covertura.store')}}" method="POST" autocomplete="off">
                                @csrf
                                <div class="row">

                                    <div class="col-md-12 mt-3">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" name="nombre"
                                            class="form-control @error('nombre') is-invalid @enderror"
                                            placeholder="Nombre" value="{{ old('nombre') }}">
                                        @error('nombre')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-12 mt-4">
                                        <div class="form-group">
                                            <label>Tipo de covertura</label>
                                            <select name="tipo_covertura"
                                                class="custom-select select2bs4 @error('tipo_covertura') is-invalid @enderror"
                                                style="width: 100%;">
                                                <option value="" selected>-- Selecciona una opción--</option>
                                                <option value="0" @if ( old('tipo_covertura')=='0' ) selected="selected"
                                                    @endif }}>Estado de méxico</option>
                                                <option value="1" @if ( old('tipo_covertura')=='1' ) selected="selected"
                                                    @endif }}>Ciudad de méxico</option>
                                            </select>
                                            @error('tipo_covertura')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>


                                    <div class="col-md-12 mt-4">
                                        <div class="form-group">
                                            <label>Estados</label>
                                            <select name="valor_estado"
                                                class="custom-select  select2bs4 @error('valor_estado') is-invalid @enderror"
                                                style="width: 100%;">
                                                <option value="">Estado</option>
                                                @foreach ($valor_estados as $valor_estado)
                                                <option value="{{$valor_estado->id}}"
                                                    {{(old('valor_por_defecto')==$valor_estado->id ? 'selected' : '')}}
                                                    > {{$valor_estado->nombre }} </option>
                                                @endforeach
                                            </select>
                                            @error('valor_por_defecto')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>
                                </div>


                                <div class="col-md-12 mt-4">
                                    <div class="form-group">
                                        <label>Valor del envio</label>
                                        <select name="valor_por_defecto"
                                            class="custom-select  select2bs4 @error('valor_por_defecto') is-invalid @enderror"
                                            style="width: 100%;">

                                            @foreach ($settings as $setting)
                                            <option value="{{$setting->id}}" {{(old('valor_por_defecto')==$setting->id ?
                                                'selected' : '')}} > {{$setting->valor_por_defecto}} </option>
                                            @endforeach
                                        </select>
                                        @error('valor_por_defecto')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                        </div>


                        <div class="text-center mt-5 mb-4">
                            <button type="submit" class="btn btn-sm btn-danger"> <i class="fas fa-save"></i>
                                Guardar covertura</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection