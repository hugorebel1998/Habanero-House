@extends('layouts.home')
@section('content')
@section('title', 'Creación de productos')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card card-danger shadow">
                <div class="card-header">
                    <div class="card-tittle"><i class="fas fa-box"></i> Crear productos</div>
                </div>
                <div class="card-body">
                    <form action="{{ route('productos.update') }}" method="POST" enctype="multipart/form-data"
                        autocomplete="off">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-4">
                                <label for="nombre">Nombre</label>
                                <input type="hidden" name="product_id" value="{{ $producto->id }}">
                                <input type="hidden" name="user_id" value="{{ $producto->user_id }}">
                                <input type="text" name="nombre"
                                    class="form-control @error('nombre') is-invalid @enderror"
                                    value="{{ $producto->nombre }}">
                                @error('nombre')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                             <div class="col-md-4">
                                <div class="form-group">
                                    <label>Categoria</label>
                                    <select name="categoria"
                                        class="custom-select  select2bs4 @error('categoria') is-invalid @enderror"
                                        style="width: 100%;">
                                        <option value="" selected>-- Selecciona una categoria--</option>
                                        @foreach ($categorias as $categoria)
                                            @if ($categoria->id == $producto->category_id)
                                                <option value="{{ $categoria->id }}" selected>
                                                    {{ $categoria->nombre }}
                                                </option>
                                            @else
                                                <option value="{{ $categoria->id }}"> 
                                                    {{ $categoria->nombre }}
                                                </option>
                                            @endif
                                            {{ $producto->nombre }}
                                            </option>
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
                                            name="imagen" >
                                        <label class="custom-file-label" for="customFile">Selecciona imagen</label>
                                        @error('imagen')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <span class="form-text text-muted">{{ $producto->imagen_producto }}</span>
                                </div>
                            </div>


                            <div class="col-md-4 mt-3">
                                <label for="precio">Precio</label>
                                <input type="number" name="precio"
                                    class="form-control @error('precio') is-invalid @enderror" min="0.00" step="any"
                                    value="{{ $producto->precio }}">
                                @error('precio')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            {{-- <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <label>¿En descuento?</label>
                                    <select name="en_descuento"
                                        class="custom-select select2bs4 @error('en_descuento') is-invalid @enderror"
                                        style="width: 100%;">
                                        <option value="" selected>-- Selecciona una opción--</option>
                                        <option value="0" @if ($producto->en_descuento === '0') selected @endif>No</option>
                                        <option value="1" @if ($producto->en_descuento === '1') selected @endif>Si</option>
                                    </select>
                                    @error('en_descuento')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> --}}
                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <label>¿En descuento?</label>
                                    <select name="en_descuento"
                                        class="custom-select select2bs4 @error('en_descuento') is-invalid @enderror"
                                        style="width: 100%;">
                                        <option value="" selected>-- Selecciona una opción--</option>
                                  
                                    </select>
                                    @error('en_descuento')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-4 mt-3">
                                <label for="descuento">Descuento</label>
                                <input type="number" name="descuento"
                                    class="form-control @error('descuento') is-invalid @enderror"
                                    value="{{ $producto->descuento }}">
                                @error('descuento')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="col-md-12 mt-4">
                                <label for="descripcion">Descripción</label>
                                <textarea class="form-control @error('descripcion') is-invalid @enderror"
                                    name="descripcion" rows="6" required>{{ $producto->descripcion }} </textarea>
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
