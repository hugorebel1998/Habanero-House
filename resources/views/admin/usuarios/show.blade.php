
@extends('layouts.home')
@section('title', $nombre)
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
                                    <h4 class="tittleshowuser">Cargo</h4>
                                    <a class="h4showuser">
                                        <p>{{ $usuario->cargo ?: 'Cliente'}}</p>
                                    </a>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <h4 class="tittleshowuser">Nombres</h4>
                                    <a class="h4showuser">
                                        <p>  {{ $usuario->name ?: 'Sin información'}}</p>
                                    </a>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <h4 class="tittleshowuser">Apellidos</h4>
                                    <a class="h4showuser">
                                        <p>  {{ $usuario->apellido_paterno }} {{ $usuario->apellido_materno ? : 'Sin información'}} </p>
                                    </a>
                                </div>

                                 <div class="col-md-6 mt-3">
                                    <h4 class="tittleshowuser">Cumpleaños</h4>
                                    <a class="h4showuser">
                                        <p> {{ $cumple }}</p>
                                    </a>
                                </div>

                                 <div class="col-md-6 mt-3">
                                    <h4 class="tittleshowuser">Teléfono</h4>
                                    <a class="h4showuser">
                                        <p> {{ $usuario->telefono ?: 'Sin información' }}</p>
                                    </a>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <h4 class="tittleshowuser">Correo electrónico</h4>
                                    <a class="h4showuser">
                                        <p> {{ $usuario->email }}</p>
                                    </a>
                                </div>
                                
                            </div>
                            <div class="d-flex justify-content-between">
                                   <div class="p-2">
                                   <a href="{{ route('admin.usuarios.index') }}" class="btn btn-primary mb-2 ml-4 h4show"> <i
                                    class="far fa-hand-point-left"></i> Regresar</a>
                                   </div>
                                   <div class="p-2">
                                   {{-- <form action="{{ route('usuarios.delete', $usuario->id) }}" method="POST">
                                      @csrf
                                      @method('Delete')
                                    <a class="btn btn-danger"
                                      onclick="return confirm('¿Estas Seguro de eliminar este usuario')"
                                      href="{{ route('usuarios.delete', $usuario->id) }}"><i
                                      class="far fa-trash-alt"></i> Eliminar usuario</a>
                                 </form> --}}
                                   </div>
                             </div>
                        </div>

                        <div class="col-md-6">
                        @if ($usuario->imagen_usuario)
                            <img src="{{ asset('img/users/'.$usuario->imagen_usuario) }}" class="img-fluid. max-width: 100%;"
                                id="imagen_user" width="100%" height="100%">
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
