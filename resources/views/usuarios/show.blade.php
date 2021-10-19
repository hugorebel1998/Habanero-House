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
                               <h1 class="text-center mt-3"> Datos de usuario </h1>
                            </a>
                            <div class="row ml-4 mt-5">
                                <div class="col-md-6 mt-3">
                                    <h4 class="tittleshow">Cargo</h4>
                                    <a class="h4show">
                                        <p>{{ $usuario->cargo ?: 'Cliente'}}</p>
                                    </a>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <h4 class="tittleshow">Nombres</h4>
                                    <a class="h4show">
                                        <p>  {{ $usuario->name ?: 'Sin información'}}</p>
                                    </a>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <h4 class="tittleshow">Apellidos</h4>
                                    <a class="h4show">
                                        <p>  {{ $usuario->apellido_paterno }} {{ $usuario->apellido_materno ? : 'Sin información'}} </p>
                                    </a>
                                </div>

                                 <div class="col-md-6 mt-3">
                                    <h4 class="tittleshow">Cumpleaños</h4>
                                    <a class="h4show">
                                        <p> {{ $cumple }}</p>
                                    </a>
                                </div>

                                 <div class="col-md-6 mt-3">
                                    <h4 class="tittleshow">Teléfono</h4>
                                    <a class="h4show">
                                        <p> {{ $usuario->telefono ?: 'Sin información' }}</p>
                                    </a>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <h4 class="tittleshow">Correo electrónico</h4>
                                    <a class="h4show">
                                        <p> {{ $usuario->email }}</p>
                                    </a>
                                </div>

                              

                                
                            </div>
                            <a href="{{ route('usuarios.index') }}" class="btn btn-danger mb-2 ml-4 h4show"> <i
                                    class="far fa-hand-point-left"></i> Regresar</a>
                        </div>

                        <div class="col-md-6">
                        @if ($usuario->imagen_usuario)
                            <img src="{{ asset('img/users/'.$usuario->imagen_usuario) }}" class="img-fluid. max-width: 100%;"
                                width="100%" height="100%">
                            @else
                            <img src="{{ asset('img/users/sin_asignar/foto.jpg') }}" class="img-fluid. max-width: 100%;"
                                width="100%" height="100%">
                            
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
