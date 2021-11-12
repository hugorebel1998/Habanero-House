@extends('layouts.master')
@section('title', 'Sobre nosotros')
@section('content')

    <div class="container-fluid"><br><br>
        <div class="row justify-content-center">
            <div class="col-md-11 mt-5 mb-5"><br>
                <div class="card card-danger card-outline shadow">
                    <div class="row">
                        <div class="col-md-5">
                            <a href="#">
                                <h3 class="ml-5 mt-3">
                                    Regresar al catálogo
                                </h3>
                            </a>
                            <form action="" method="POST">
                                <div class="row ml-4 mt-3">
                                    @csrf
                                    <div class="col-md-7">
                                        <p class="show-menu">{{ strtoupper($producto->nombre) }}</p>
                                    </div>

                                    <div class="col-md-12 mb-5">
                                        @foreach ($producto->getInventary as $inventario)
                                            <a href="#" style="font-size: 13px" class="badge badge-info p-2">
                                                <i class="fas fa-cloud-meatball"></i>
                                                {{ $inventario->nombre }} - $ {{ $inventario->precio }} </a>
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
                                        <input type="number" id="add_to_cart" name="cantidad" class="form-control"
                                            value="1" min="1">
                                    </div>
                                    <div class="p-1 ">
                                        <a href="#" class="btn btn-sm btn-success" data-action="plus"> <i
                                                class="fas fa-plus"></i></a>
                                    </div>
                                </div>
                                <div class="row ml-4">
                                    <div class="col-md-12">
                                        <p>{{ $producto->descripcion }}</p>
                                    </div>

                                </div>
                        </div>
                        </form>

                        <div class="col-md-7">
                            <img src="{{ asset('img/products/' . $producto->imagen_producto) }}"
                                class="rounded mx-auto d-block" width="100%" height="100%">

                        </div>
                    </div>

                </div>
                <div class="row justify-content-center mt-5">
                    <div class="col-md-12">
                        <h1 class="h1envios text-center">Envios a Domicilio</h1>
                    </div>
                    <div class="col-md-12">
                        <p class="penviaos text-center">
                            De nuestra cocina a tu hogar. <br>
                            Disfruta de nuestra variedad de platillos hechos especialmente para ti.
                        </p>
                    </div>
                    <div class="col-md-12">
                        <p class="penviaosHorario text-center">
                            Nuestros horarios de servicio son: <br>
                            Desayunos: miércoles a domingo de 9:00 a 11:30 am <br>
                            Comidas y Cenas: Lunes a sábado de 1:00 a 10:00 pm <br>
                            Domingos de 1:00 a 5:30 pm
                        </p>
                    </div>
                </div>
            </div>
        </div><br><br>
    </div>


@endsection
