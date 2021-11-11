@extends('layouts.home')
@section('content')
@section('title', 'Crear platillo')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card card-danger shadow">
                <div class="card-header">
                    <div class="card-tittle"><i class="fas fa-utensils"></i> Crear platillo</div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.productos.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        <div class="row">

                            <div class="col-md-4">
                                <label for="nombre">Nombre</label>
                                <input type="text" name="nombre"
                                    class="form-control @error('nombre') is-invalid @enderror" placeholder="Nombre"
                                    value="{{ old('nombre') }}">
                                @error('nombre')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            {{-- <div class="col-md-4">
                                <div class="form-group">
                                    <label>Categoria</label>
                                    <select name="categoria" class="custom-select  select2bs4 @error('categoria') is-invalid @enderror"
                                        style="width: 100%;" value="{{ old('categoria') }}">
                                        <option value="" selected>-- Selecciona una categoria--</option>
                                        @foreach ($categorias as $categoria)
                                            <option value="{{ $categoria->id }}"> {{ $categoria->nombre }}</option>
                                        @endforeach
                                    </select>
                                @error('categoria')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div> --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Categoria</label>
                                    <select name="categoria" class="custom-select  select2bs4 @error('categoria') is-invalid @enderror"
                                        style="width: 100%;">
                                        <option value="" selected>-- Selecciona una categoria--</option>
                                        @foreach ($categorias as $categoria)
                                           <option value="{{$categoria->id}}" {{(old('categoria') == $categoria->id ? 'selected' : '')}} > {{$categoria->nombre}} </option>
                                        @endforeach
                                    </select>
                                @error('categoria')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="imagen">Imagen destacada</label>
                                    <div class="custom-file">
                                        <input accept="image/*" type="file"
                                            class="custom-file-input @error('imagen') is-invalid @enderror"
                                            name="imagen" value="{{ old('imagen') }}">
                                        <label class="custom-file-label"for="customFile">Selecciona imagen</label>
                                        @error('imagen')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-4 mt-3">
                                <label for="precio">Precio</label>
                                <input type="number" name="precio"
                                    class="form-control @error('precio') is-invalid @enderror" min="0.00" step="any"
                                    value="{{ old('precio') }}" placeholder="0.00">
                                @error('precio')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <label>¿En descuento?</label>
                                    <select name="en_descuento" class="custom-select select2bs4 @error('en_descuento') is-invalid @enderror" 
                                     style="width: 100%;">
                                         <option value="" selected>-- Selecciona una opción--</option>
                                        <option value="0" @if ( old('en_descuento') == '0') selected="selected" @endif  }}>No</option>
                                        <option value="1" @if ( old('en_descuento') == '1') selected="selected" @endif  }}>Si</option>
                                    </select>
                                @error('en_descuento')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>


                            <div class="col-md-4 mt-3">
                                <label for="descuento">Descuento</label>
                                <input type="number" name="descuento" class="form-control @error('descuento') is-invalid @enderror" value="{{ old('descuento') }}" 
                                     placeholder="0.00">
                                @error('descuento')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4 mt-3">
                                <label for="cantidad">Inventario</label>
                                <input type="number" name="cantidad" class="form-control @error('cantidad') is-invalid @enderror" value="{{ old('cantidad') }}" 
                                     placeholder="0" min="0">
                                @error('cantidad')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                             <div class="col-md-4 mt-3">
                                <label for="código_producto">Codigo producto</label>
                                <input type="text" name="código_producto" class="form-control @error('código_producto') is-invalid @enderror" value="{{ old('código_producto') }}" >
                                @error('código_producto')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="col-md-12 mt-4">
                                <label for="descripcion">Descripción</label>
                                <textarea class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" rows="6" required>{{ old('descripcion')}} </textarea>
                                @error('descripcion')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-sm btn-danger"> <i class="fas fa-save"></i>
                                Guardar producto</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
