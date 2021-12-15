@extends('layouts.home')

@section('content')
@section('title', 'Orden No.' . $orden->id)
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-primary card-outline">
                        @foreach ($usuarios as $usuario)
                        @if ($orden->user_id == $usuario->id)
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                    src="{{ asset('img/users/' . $usuario->imagen_usuario) }}"
                                    alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">
                                {{ $usuario->name }} {{ $usuario->apellido_paterno }}
                            </h3>

                            <p class="text-muted text-center">{{ $usuario->rol }}</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <i class="fas fa-envelope"></i> <span>{{ $usuario->email }}</span>
                                </li>
                                <li class="list-group-item">
                                    <i class="fas fa-phone-alt"></i> <span>{{ $usuario->telefono }}</span>
                                </li>

                                <li class="list-group-item">
                                    <i class="fas fa-birthday-cake"></i> <span>{{ $usuario->fecha_nacimiento }}</span>
                                </li>
                            </ul>
                            <a href="#" class="btn btn-primary btn-block"><b>Ver usuario</b></a>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    <div class="card card-primary card-outline">
                        <h3 class="card-title text-center mt-4"> <i class="fas fa-map-pin"></i> Tipo de orden</h3>

                        <div class="card-body box-profile">
                          
                           
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                   
                                    @foreach ( $user_states as $user_state)
                                    <i class="fas fa-birthday-cake"></i> Cdmx ó Edo. Méx.​
                                    @if ($orden->id == $usuario->id)
                                    <p class="ml-3">{{$user_state->nombre}}</p>
                                    @endif
                                 
                                    @endforeach
                                   
                                </li>
                                <li class="list-group-item">
                                    <i class="fas fa-birthday-cake"></i> Colonia.​
                                  
                                </li>

                            </ul>
                            <a href="#" class="btn btn-primary btn-block"><b>Ver usuario</b></a>
                           
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-8">

                </div>

            </div>
        </div>
    </div>
</div>

@endsection