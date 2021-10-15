{{-- @extends('layouts.home')
@section('content')
@section('title', 'Ver información')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-danger card-outline shadow">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle"
                                src="{{ asset('admin-lte/dist/img/user4-128x128.jpg') }} " alt="User profile picture">
                             <hr>
                        </div>
                        <div class="row mt-5">
                            <div class="col-md-6">
                               <p>Nombre: <b>{{ $usuario->name }}</b></p>
                            </div>
                            <div class="col-md-6">
                                <p>Apellidos: <b>{{ $usuario->apellido_paterno }} {{ $usuario->apellido_materno }} </b></p>
                             </div>

                             <div class="col-md-6 mt-3">
                                <p>Edad: <b>{{ $usuario->age }} años </b></p>
                             </div>

                             <div class="col-md-6 mt-3">
                                <p>Cumpleaños: <b>{{ $usuario->fecha_nacimiento }}  </b></p>
                             </div>

                             <div class="col-md-6 mt-3">
                                <p>Email: <b>{{ $usuario->email }}  </b></p>
                             </div>
                             <div class="col-md-6 mt-3">
                                <p>No.Telefónico: <b>{{ $usuario->telefono }}  </b></p>
                             </div>
                        </div>
                        <div class="text-center mt-4">
                            <a href="{{ route('usuarios.index')}}" class="btn btn-sm btn-danger"><i class="far fa-hand-point-left"></i> Atrás</a>
                     </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection --}}


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
                                <div class="col-md-12 mt-3">
                                    <h4 class="tittleshow">Descripción de producto</h4>
                                    <a class="h4show">
                                        <p class="h4show">{{ $producto->descripcion }}</p>
                                    </a>
                                </div>
                            </div>
                            <a href="{{ route('productos.index') }}" class="btn btn-danger mb-2 ml-4 h4show"> <i
                                    class="far fa-hand-point-left"></i> Regresar</a>
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
