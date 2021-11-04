@extends('layouts.home')
@section('content')
@section('title', 'Inventario producto')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-danger shadow">
                    <div class="card-header">
                        <div class="card-tittle"><i class="fas fa-clipboard-check"></i> Crear inventario</div>
                    </div>
                    <div class="card-body">
                        <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            <div class="row">
    
                                <div class="col-md-12">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" name="nombre"
                                        class="form-control @error('nombre') is-invalid @enderror" placeholder="Nombre"
                                        value="{{ old('nombre') }}">
                                    @error('nombre')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
    
                                <div class="col-md-12 mt-4">
                                    <label for="cantidad_invventario">Cantidad de inventario</label>
                                    <input type="number" name="cantidad_invventario"
                                        class="form-control @error('cantidad_invventario') is-invalid @enderror"
                                        value="1" min="1" >
                                    @error('cantidad_invventario')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
    
    
                                <div class="col-md-12 mt-4">
                                    <label for="precio">Precio</label>
                                    <input type="number" name="precio"
                                        class="form-control @error('precio') is-invalid @enderror" min="1" step="any"
                                        value="{{ old('precio') }}" placeholder="0.00">
                                    @error('precio')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12 mt-4">
                                    <div class="form-group">
                                        <label>Limite de inventario</label>
                                        <select name="limitado_inventario" class="custom-select select2bs4 @error('limitado_inventario') is-invalid @enderror" 
                                         style="width: 100%;">
                                             <option value="" selected>-- Selecciona una opción--</option>
                                            <option value="0" @if ( old('limitado_inventario') == '0') selected="selected" @endif  }}>Limitado</option>
                                            <option value="1" @if ( old('limitado_inventario') == '1') selected="selected" @endif  }}>Ilimitado</option>
                                        </select>
                                    @error('limitado_inventario')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>

                                <div class="col-md-12 mt-4">
                                    <label for="inventario_minimo">Inventario minimo</label>
                                    <input type="number" name="inventario_minimo"
                                        class="form-control @error('inventario_minimo') is-invalid @enderror" min="1" 
                                        value="1" >
                                    @error('inventario_minimo')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

    
    
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-sm btn-danger"> <i class="fas fa-save"></i>
                                    Guardar inventario</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
        </div>
    </div>
</div>

@endsection