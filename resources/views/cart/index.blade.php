@extends('layouts.master')
@section('title', 'Carrito de compras')
@section('content')

    @if (count(collect($items)) == '0')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 mt-5 mb-5"> <br>
                    <div class="card mt-5 shadow-lg">
                        <img src="{{ asset('img/sin-carrito-de-compras.png') }}" class="rounded mx-auto d-block" width="30%"
                            height="30%">
                        <div class="card-body">
                            <p class="card-text" id="no-card-text">Hola <b>{{ Auth::user()->name }}
                                    {{                                     Auth::user()->apellido_paterno }}</b>, Aun no tienes
                                nada en tu carrito de compra,
                                animate a agregar uno de nuestros increibles platillos. <i class="fas fa-utensils"></i>
                            </p>
                            <div class="text-center">
                                <a href="{{ route('usuario.mostrar.menu') }}" class="btn btn-dark"><i
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
                <div class="col-md-11 mt-5 mb-5"><br><br><br>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped shadow">
                                    <thead class="bg-danger text-white">
                                        <tr class="text-center">
                                            <th scope="col"></th>
                                            <th scope="col"></th>
                                            <th scope="col">Producto</th>
                                            <th scope="col"></th>
                                            <th scope="col">Cantidad</th>
                                            <th scope="col">Subtotal</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($items as $item)

                                            <tr class="text-center">
                                                <td>
                                                    <form action="{{ route('usuario.cart.delete', $item->id) }}"
                                                        method="POST" class="eliminar_orden">
                                                        @csrf
                                                        @method('Delete')
                                                        <button class="btn btn-outline-danger"
                                                            href="{{ route('usuario.cart.delete', $item->id) }}"><i
                                                                class="far fa-trash-alt"></i></button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <img src="{{ asset('img/products/' . $item->getProduct->imagen_producto) }}"
                                                        class="rounded mx-auto img-thumbnail" width="80">

                                                </td>
                                                <td>
                                                    <a href="{{ route('usuario.mostrar.show', $item->getProduct->id) }}"
                                                        class="text-dark">{{ $item->label_item }}</a>
                                                </td>
                                                <td>
                                                    @if ($item->descuento_status == 1)
                                                        <span class="badge badge-pill badge-success">
                                                            En descuento -
                                                            {{ $item->descuento }} %
                                                        </span>
                                                    @else
                                                        <span class="badge badge-pill badge-danger">Sin descuento</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <form action="{{ route('usuario.cart.update', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="number" name="cantidad" class="form-control"
                                                            id="cantidad_cart" value="{{ $item->cantidad }}">
                                                        <button type="submit" class="btn btn-outline-primary ml-2">
                                                            <i class="far fa-save"></i>
                                                        </button>

                                                </td>
                                                <td>$ {{ $item->total }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="card card-danger shadow">
                                <div class="card-header">
                                    <i class="fas fa-bookmark"></i> Información de la compra
                                </div>
                                <div class="car-body">
                                    <div class="row">
                                        <div class="col-md-4 mt-3 ml-3">
                                            <b><i class="fas fa-coins"></i> Subtotal: </b>
                                            ${{ $orden->getSubtotal() }} MXN
                                        </div>
                                        <div class="col-md-7 mt-3 ml-3">
                                            <b> <i class="fas fa-truck"></i> Precio por envio: </b>
                                            $ 0 MXN
                                        </div>
                                        <div class="col-md-12 mt-3 ml-3">
                                            <b><i class="fas fa-coins"></i> Total a pagar: </b>
                                            $ 0 MXN
                                        </div>
                                        <form action="#" method="post">
                                            <div class="col-md-12 mt-4 ml-3">
                                                <b><i class="fas fa-map-marker-alt"></i> Direccion de envío</b>
                                            </div>


                                            <button type="submit" class="btn btn-sm btn-danger mt-4 mb-4 ml-3">
                                                <i class="fas fa-badge-dollar"></i> Realizar compra
                                            </button>



                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    @endif
@section('alerta')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('.eliminar_orden').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Estas seguro de eliminar?',
                text: `Esta orden sera eliminada`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Eliminado',
                        'Haz eliminado esta orden.',
                        'success'
                    )
                    this.submit();

                }
            })
        });
    </script>
@endsection
@endsection
