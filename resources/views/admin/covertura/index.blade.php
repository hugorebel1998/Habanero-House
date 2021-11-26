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
                            <form action="{{ route('admin.covertura.store')}}" method="POST">
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
                                                <option value="0">Estado</option>
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


                                {{-- <div class="col-md-12 mt-4">
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

                                </div> --}}
                                <div class="col-md-12 mt-4">
                                    <div class="form-group">
                                        <label>Valor del envio</label>
                                        <input type="number" name="precio"
                                            class="form-control @error('precio') is-invalid @enderror"
                                            value="{{ $setting}}">
                                        @error('precio')
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
                <div class="col-md-8">

                    <div class="card shadow">
                        <div class="card-header">
                            <b class="lead font-weight-bold"> Categorias</b>
                        </div>
                        <div class="d-flex flex-row-reverse mr-5">

                            <div class="p-2">
                                @can('delete categoria')
                                <div class="dropdown dropleft">
                                    <a class="btn btn-primary dropdown-toggle" href="#" role="button"
                                        id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <i class="fas fa-sort-amount-up-alt"></i> Filtrar por
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-ban"></i>
                                            Coverturas eliminados
                                        </a>
                                    </div>
                                </div>
                                @endcan
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="order-table table table-hover" cellspacing="0" width="100%" id="categoria">
                                <thead>
                                    <tr>
                                        <th scope="col">Status</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Precio de envío</th>
                                        <th scope="col" class="text-center">Administrador</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($coverturas as $covertura)
                                        
                                    
                                    <tr>

                                        <td>{{ $covertura->status }}</td>
                                        <td>{{ $covertura->nombre }}</td>
                                        <td>$ {{ $covertura->precio }} MXN</td>
                                        
                                        <td class="text-center">
                                            
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-info dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i class="fas fa-cogs"></i> Acciones
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#"><i class="far fa-bookmark"></i>
                                                    Ver productos</a>
                                                    <a class="dropdown-item" href="#"><i class="fas fa-edit"></i> Editar
                                                        categoria</a>>
                                                        
                                                        
                                                        
                                                    </td>
                                                </tr>
                                                

                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

@endsection