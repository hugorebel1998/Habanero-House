@extends('layouts.home')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-danger card-outline shadow">
                    <div class="row">
                        <div class="col-md-6">
                            <a id="tituloshow">
                                <h1 class="text-center mt-3">Habanero House </h1>
                            </a>
                            <div class="row ml-4 mt-5">
                                <div class="col-md-6 mt-3">
                                      <h4 class="tittleshow">Nombre</h4>
                                      <p class="h4show">{{ $producto->nombre }}</p>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <h4 class="tittleshow">Precio</h4>
                                    <p class="h4show"> $ {{ $producto->precio }}</p>
                                </div>
                                
                                <div class="col-md-6 mt-3">
                                    <h4 class="tittleshow">En descuento</h4>
                                    <p>{{ $producto->indescuento }}</p>
                              </div class="h4show">
                              
                              <div class="col-md-6 mt-3">
                                  <h4 class="tittleshow">Descuento</h4>
                                  <p class="h4show"> ${{ $producto->descuento }}</p>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <h4 class="tittleshow">Descripción de producto</h4>
                                    <p class="h4show">{{ $producto->descripcion }}</p>
                                </div>
                            </div>
                            <a href="{{ route('productos.index')}}" class="btn btn-sm btn-danger mb-2 ml-4 h4show"> <i class="far fa-hand-point-left"></i> Regresar</a>
                        </div>

                        <div class="col-md-6">
                            <img src="{{ asset($producto->imagen_producto) }}" class="img-fluid. max-width: 100%;"
                                width="100%" height="100%">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
