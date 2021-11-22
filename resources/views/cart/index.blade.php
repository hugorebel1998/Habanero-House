@extends('layouts.master')
@section('title', 'Carrito de compras')
@section('content')

@if(count(collect($items)) == "0")
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 mt-5 mb-5"> <br>
            <div class="card mt-5 shadow-lg">
                <img src="{{ asset('img/sin-carrito-de-compras.png')}}" class="rounded mx-auto d-block" width="30%"
                    height="30%">
                <div class="card-body">
                    <p class="card-text" id="no-card-text">Hola <b>{{ Auth::user()->name}} {{
                            Auth::user()->apellido_paterno}}</b>, Aun no tienes nada en tu carrito de compra,
                        animate a agregar uno de nuestros increibles platillos. <i class="fas fa-utensils"></i>
                    </p>
                    <div class="text-center">
                        <a href="{{ route('usuario.mostrar.menu')}}" class="btn btn-dark"><i
                                class="fas fa-arrow-left"></i> Ir al menú</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-5 mb-5"><br><br><br>
            <div class="row">
                <div class="col-md-8">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="bg-danger text-white">
                                <tr class="text-center">
                                    <th scope="col"></th>
    
                                    <th scope="col">Producto</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Subtotal</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
    
                                <tr class="text-center">
                                    <th>
                                        <img src="{{ asset('img/products/' . $item->getProduct->imagen_producto) }}"
                                            class="rounded mx-auto img-thumbnail" width="80">
    
                                    </th>
                                    <td>
                                        <a href="{{ route('usuario.mostrar.show',  $item->getProduct->id)}}">{{
                                            $item->label_item}}</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('usuario.cart.update', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="number" name="cantidad" class="form-control" id="cantidad_cart" value="{{ $item->cantidad }}">
                                            <button type="submit" class="btn btn-outline-primary ml-2">
                                                <i class="far fa-save"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td>$ {{ $item->total }} MXN</td>
                                    <td>
                                        <a href="#" class="btn btn-danger">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
    
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Información de la compra
                        </div>
                        <div class="car-body">
                         <p>
                             Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolore repellendus cupiditate cumque sint distinctio, maxime quo blanditiis inventore quaerat rerum, ratione, nesciunt delectus quam hic corporis nihil vero at illo.
                         </p>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endif

@endsection