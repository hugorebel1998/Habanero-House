@extends('layouts.home')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card card-danger card-outline shadow">
                    <div class="row">
                        <div class="col-md-6">
                            <a id="tituloshow">
                                <h1 class="text-center mt-3">Habanero House </h1>
                            </a>
                            <div class="row ml-4 mt-5">
                                <div class="col-md-6 mt-3">
                                    <h4 class="tittleshow">Categoria</h4>
                                    <a class="h4show">
                                        <p>{{ $categoria->nombre }}</p>
                                    </a>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <h4 class="tittleshow">Nombre</h4>
                                    <a class="h4show">
                                        <p>{{ $producto->nombre }}</p>
                                    </a>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <h4 class="tittleshow">Precio</h4>
                                    <a class="h4show">
                                        <p> $ {{ $producto->precio }}</p>
                                    </a>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <h4 class="tittleshow">En descuento</h4>
                                    {{-- <p>{{ $producto->indescuento }}</p> --}}
                                    @if ($producto->indescuento == 0)
                                        <a class="h4show">
                                            <p>No hay descuento</p>
                                        </a>
                                    @elseif($producto->indescuento == 1)
                                        <a class="h4show">
                                            <p>En descuento</p>
                                        </a>
                                    @endif
                                </div class="h4show">

                                <div class="col-md-6 mt-3">
                                    <h4 class="tittleshow">Descuento</h4>
                                    <a class="h4show">
                                        <p> {{ $producto->descuento }} %</p>
                                    </a>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <h4 class="tittleshow">Codigo</h4>
                                    <a class="h4show">
                                        <p> {{ $producto->codigo_producto }}</p>
                                    </a>
                                </div>

                                <div class="col-md-12 mt-3">
                                    <h4 class="tittleshow">Descripción de producto</h4>
                                    <a class="h4show">
                                        <p class="h4show">{{ $producto->descripcion }}</p>
                                    </a>
                                </div>
                            </div>
                            <a href="{{ route('admin.productos.index') }}" class="btn btn-primary mb-2 ml-4 h4show"> <i
                                    class="far fa-hand-point-left"></i> Regresar</a>
                        </div>

                        <div class="col-md-6">
                            <img src="{{ asset('img/products/'.$producto->imagen_producto) }}" class="rounded mx-auto d-block"
                                width="100%" height="100%">
                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
