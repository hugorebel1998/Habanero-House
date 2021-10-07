@extends('layouts.home')
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



@endsection
