@extends('layouts.home')
@section('content')
@section('title', 'Inventario producto editar')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card shadow">
                <div class="card-header bg-rojo">
                    <div class="card-tittle"><i class="fas fa-edit"></i> Editar inventario "{{ $inventario->nombre}}"</div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.productos.inventario.update', $inventario->id)}}" method="POST" enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        @method('PUT')
                        <div class="row">

                            <div class="col-md-6">
                                <label for="nombre">Nombre</label>
                                <input type="hidden" value="{{ $inventario->id}}">
                                <input type="text" name="nombre"
                                    class="form-control @error('nombre') is-invalid @enderror" placeholder="Nombre"
                                    value="{{ $inventario->nombre }}">
                                @error('nombre')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="col-md-6">
                                <label for="cantidad">Cantidad</label>
                                <input type="number" name="cantidad"
                                    class="form-control @error('cantidad') is-invalid @enderror" min="0.00" step="any"
                                    value="{{ $inventario->cantidad_inventario	 }}">
                                @error('cantidad')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mt-4">
                                <label for="precio">Precio</label>
                                <input type="number" name="precio"
                                    class="form-control @error('precio') is-invalid @enderror" min="0.00" step="any"
                                    value="{{ $inventario->precio }}">
                                @error('precio')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mt-4">
                                <div class="form-group">
                                    <label>Limite de inventario</label>
                                    <select name="limitado"
                                        class="custom-select select2bs4 @error('limitado') is-invalid @enderror"
                                        style="width: 100%;">
                                        {{-- <option value="" selected>-- Selecciona una opción--</option> --}}
                                        <option value="0" @if ($inventario->limitado_inventario == 0) selected @endif }}>Limitado</option>
                                        <option value="1" @if ($inventario->limitado_inventario == 1) selected @endif }}>Ilimitado</option>
                                    </select>
                                    @error('limitado')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mt-3">
                                <label for="minimo">Inventario minimo</label>
                                <input type="number" name="minimo"
                                    class="form-control @error('minimo') is-invalid @enderror" min="1" value="{{ $inventario->inventario_minimo}}">
                                @error('minimo')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-sm btn-danger"> <i class="fas fa-save"></i>
                                Actualizar inventario</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
