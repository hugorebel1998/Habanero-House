@extends('layouts.master')
@section('title', 'Sobre nosotros')
@section('content')

    <div class="container-fluid"><br><br>
        <div class="row justify-content-center">
            <div class="col-md-10 mt-5 mb-5"><br>
                <div class="card card-danger card-outline shadow">
                    <div class="row">
                        <div class="col-md-6">
                            <h1 class="text-center tituloshow mt-3">Habanero House </h1>
                            <form action="" method="POST">
                                <div class="row ml-4 mt-5">
                                    @csrf
                                    <div class="col-md-6 mt-3">
                                        <h4 class="tittleshow">Categoria</h4>
                                        <p class="h4show">{{ $categoria->nombre }}</p>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <h4 class="tittleshow">Nombre</h4>
                                        <p class="h4show">{{ $producto->nombre }}</p>
                                    </div>

                                    <div class="col-md-6 mt-3">
                                        <h4 class="tittleshow">Precio</h4>
                                        <p class="h4show"> $ {{ number_format($producto->precio, 2, '.', ',') }}
                                            MXN</p>
                                    </div>

                                    <div class="col-md-6 mt-3">
                                        <h4 class="tittleshow">En descuento</h4>
                                        {{-- <p>{{ $producto->indescuento }}</p> --}}
                                        @if ($producto->indescuento == 0)
                                            <p class="h4show">No hay descuento</p>
                                        @elseif($producto->indescuento == 1)
                                            <p class="h4show">En descuento</p>
                                        @endif
                                    </div class="h4show">

                                    <!-- <div class="col-md-6 mt-3">
                                        <h4 class="tittleshow">Descuento</h4>
                                        <p class="h4show"> {{ $producto->descuento }} %</p>
                                    </div> -->

                                    <div class="col-md-12 mt-3">
                                        <h4 class="tittleshow">Descripción</h4>
                                        <p class="h4show"> {{ $producto->descripcion }}</p>
                                    </div>

                                </div>
                                <div class="d-flex flex-row-reverse">
                                    <div class="p-2">
                                        <a href="#" class="btn btn-sm btn-primary" data-action="minus"> <i
                                                class="fas fa-cart-arrow-down"></i> Agregar al carrito</a>
                                    </div>
                                    <div class="p-1">
                                        <a href="#" class="btn btn-sm btn-success" data-action="minus"> <i
                                                class="fas fa-minus"></i></a>
                                    </div>
                                    <div class="p-1">
                                        <input type="number" id="add_to_cart" name="cantidad" class="form-control"
                                            value="1" min="1">
                                    </div>
                                    <div class="p-1 ">
                                        <a href="#" class="btn btn-sm btn-success" data-action="plus"> <i
                                                class="fas fa-plus"></i></a>
                                    </div>
                                </div>
                        </div>
                        </form>

                        <div class="col-md-6">
                            <img src="{{ asset('img/products/' . $producto->imagen_producto) }}"
                                class="rounded mx-auto d-block" width="100%" height="100%">

                        </div>
                    </div>

                </div>
            </div>
        </div><br><br>
    </div>


@endsection
