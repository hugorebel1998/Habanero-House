@extends('layouts.master')
@section('title', 'Sobre nosotros')
@section('content')

<div class="container-fluid"><br><br>
    <div class="row justify-content-center">
        <div class="col-md-11 mt-5 mb-5"><br>
            <div class="card card-danger card-outline shadow">
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="text-center tituloshow mt-3">Habanero House </h1>
                        <form action="" method="POST">
                            <div class="row ml-4 mt-5">
                                @csrf
                                <div class="col-md-6 mt-3">
                                    <h4 class="tittleshow">Nombre</h4>
                                    <p class="h4show">{{ $producto->nombre }}</p>
                                </div>

                                <div class="col-md-12 mb-5">
                                    @foreach ($producto->getInventary as $inventario)    
                                    <a href="#" style="font-size: 13px" class="badge badge-info p-2">
                                        <i class="fas fa-cloud-meatball"></i>
                                        {{$inventario->nombre}} - $ {{$inventario->precio}} </a>
                                    @endforeach

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
                                    <input type="number" id="add_to_cart" name="cantidad" class="form-control" value="1"
                                        min="1">
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